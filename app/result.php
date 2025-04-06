<?php
// データを読み込む
require './functions/loadData.php';

require './components/head.php';

// タグで表示する為の文字列を定義
$array_age = array('10' => '～19歳', '20' => '20代', '30' => '30代', '40' => '40代', '50' => '50代', '60' => '60代', '70' => '70歳～');
$array_work = array('01' => '正社員/公務員', '02' => '派遣/契約社員', '03' => 'パート/アルバイト', '04' => '自営業/フリーランス', '05' => '学生', '06' => '主婦', '07' => 'その他');
$array_order_time = array('01' => '今日中に借りたい', '02' => '2～3日以内', '03' => '1週間以内');
$array_history = array('01' => 'プロミス', '02' => 'アコム', '03' => 'アイフル', '04' => 'SMBCモビット', '05' => '三菱UFJ銀行', '06' => '楽天銀行', '07' => 'レイク', '08' => '三井住友銀行', '09' => '三井住友カード');
$array_order_amount = array('01' => '1～49万円', '02' => '50～99万円', '03' => '100～499万円', '04' => '500万円以上');
$array_order_how = array('01' => '口座振込', '02' => 'ATM', '03' => '無人機');
$array_option = array('01' => '収入証明書不要', '02' => '即日融資', '03' => 'スピード診断有り', '04' => 'Web完結', '05' => '金利0円期間有り', '06' => '書類送付なし');

// カードデータを取得
$filteredResults = isset($GLOBALS['cardData']) ? $GLOBALS['cardData'] : [];

// フィルタリング処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $filteredResults = array_filter($GLOBALS['cardData'], function ($card) {
    $filters = [
      'age' => 'flagAge',
      'work' => 'flagWork',
      'order_time' => 'flagOrderTime',
      'order_amount' => 'flagOrderAmount',
      'order_how' => 'flagOrderWay',
    ];

    foreach ($filters as $key => $flag) {
      if (!empty($_POST[$key]) && $_POST[$key] !== '00') {
        if (empty($card[$flag]) || !in_array($_POST[$key], explode(',', $card[$flag]))) {
          return false;
        }
      }
    }

    if (!empty($_POST['option']) && is_array($_POST['option'])) {
      $optionFlags = [
        '01' => 'flagSecret',
        '02' => 'flagToday',
        '03' => 'flagExamSpeed',
        '04' => 'flagOnline',
        '05' => 'flag30dayFree',
        '06' => 'flag365day',
      ];

      foreach ($_POST['option'] as $option) {
        if ($option !== '00' && (empty($card[$optionFlags[$option]] ?? false))) {
          return false;
        }
      }
    }

    return true;
  });


  // ソート処理
  if (!empty($_POST['select'])) {
    $sortOptions = [
      'dec-users' => fn($a, $b) => ($b['users'] ?? 0) <=> ($a['users'] ?? 0),
      'asc-examtime' => fn($a, $b) => ($a['flagExamTime'] ?? PHP_INT_MAX) <=> ($b['flagExamTime'] ?? PHP_INT_MAX),
      'asc-rate' => fn($a, $b) => ($a['minRate'] ?? PHP_INT_MAX) <=> ($b['minRate'] ?? PHP_INT_MAX),
      'dec-limitamount' => fn($a, $b) => ($b['flagLimitAmount'] ?? 0) <=> ($a['flagLimitAmount'] ?? 0),
    ];

    if (isset($sortOptions[$_POST['select']])) {
      usort($filteredResults, $sortOptions[$_POST['select']]);
    }
  }
}

?>

<body>
  <div class="Wrapper">
    <?php require './components/header.php' ?>
    <main class="Result">
      <section class="Result_header">
        <div class="Result_info">
          <div class="header">
            <p class="header_text">
              検索結果<em class="js-result-number"><?php echo count($filteredResults); ?></em>件
            </p>
            <a href="#resultForm" class="link">
              <img src="images/ico_reload.png" alt="">
              条件を変更する
            </a>
          </div>
          <div class="content">
            <p class="title">
              <img src="images/ico_para.png" alt="">
              現在の設定条件
            </p>
            <ul class="list">
              <?php
              $check_age = $_REQUEST['age'] ?? '00';
              $check_work = $_REQUEST['work'] ?? '00';
              $check_order_time = $_REQUEST['order_time'] ?? '00';
              $check_history = $_REQUEST['occupation'] ?? ['00'];
              $check_order_amount = $_REQUEST['order_amount'] ?? '00';
              $check_order_how = $_REQUEST['order_how'] ?? '00';
              $check_option = $_REQUEST['option'] ?? ['00'];

              $selectItems = [];

              if ($check_age !== "00") $selectItems[] = $array_age[$check_age];
              if ($check_work !== "00") $selectItems[] = $array_work[$check_work];
              if ($check_order_time !== "00") $selectItems[] = $array_order_time[$check_order_time];
              if (!is_array($check_history)) $check_history = (array)$check_history;
              if (!in_array("00", $check_history)) {
                $selectItems[] = implode(' ', array_map(fn($row) => $array_history[$row] ?? '', $check_history));
              }
              if ($check_order_amount !== "00") $selectItems[] = $array_order_amount[$check_order_amount];
              if ($check_order_how !== "00") $selectItems[] = $array_order_how[$check_order_how];
              if (!is_array($check_option)) $check_option = (array)$check_option;
              if (!in_array("00", $check_option)) {
                $selectItems = array_merge($selectItems, array_map(fn($row) => $array_option[$row] ?? '', $check_option));
              }

              if (empty($selectItems)) {
                echo '<li class="default">設定なし</li>';
              } else {
                foreach ($selectItems as $item) {
                  echo '<li>' . htmlspecialchars($item) . '</li>';
                }
              }
              ?>
            </ul>
          </div>
        </div>
        <p class="Result_text">
          <?php echo count($filteredResults) > 0
            ? '条件に合ったカードローンを<em>オススメ順</em>で表示しています'
            : '該当するカードローンがございません'; ?>
        </p>
      </section>

      <?php if (count($filteredResults) > 0): ?>
        <section class="Result_items">
          <form id="select_form" method="post" action="result.php">
            <?php foreach ($_POST as $key => $value): ?>
              <?php if (is_array($value)): ?>
                <?php foreach ($value as $subValue): ?>
                  <input type="hidden" name="<?= htmlspecialchars($key) ?>[]" value="<?= htmlspecialchars($subValue) ?>">
                <?php endforeach; ?>
              <?php else: ?>
                <input type="hidden" name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($value) ?>">
              <?php endif; ?>
            <?php endforeach; ?>
            <select id="select" name="select" class="select" onchange="document.getElementById('select_form').submit();">
              <option value="def" <?= empty($_POST['select'] ?? '') || ($_POST['select'] ?? '') === 'def' ? 'selected' : '' ?>>---並び替え---</option>
              <option value="dec-users" <?= ($_POST['select'] ?? '') === 'dec-users' ? 'selected' : '' ?>>直近利用者数が多い</option>
              <option value="asc-examtime" <?= ($_POST['select'] ?? '') === 'asc-examtime' ? 'selected' : '' ?>>審査時間が早い</option>
              <option value="asc-rate" <?= ($_POST['select'] ?? '') === 'asc-rate' ? 'selected' : '' ?>>実質年率が低い</option>
              <option value="dec-limitamount" <?= ($_POST['select'] ?? '') === 'dec-limitamount' ? 'selected' : '' ?>>借入限度額が多い</option>
            </select>
          </form>
          <script>
            document.getElementById('select').addEventListener('change', function() {
              document.getElementById('select_form').submit();
            });
          </script>
          <div class="content">
            <?php foreach ($filteredResults as $result): ?>
              <aside class="Feature_contents">
                <div class="Feature_contents_header">
                  <h3 class="Feature_contents_title">
                    <?php echo $result['serviceName'] ?>
                  </h3>

                  <div class="Feature_contents_value">
                    <p class="title">申込実績</p>
                    <p class="value js-inview-value">
                      <em><?php echo $result['users'] ?></em>件
                    </p>
                  </div>
                </div>

                <div class="Feature_contents_body">
                  <ul class="Labels">
                    <?php if ($result['flagSecret']): ?>
                      <li>バレにくい</li>
                    <?php endif; ?>
                    <?php if ($result['flagToday']): ?>
                      <li>最短融資1h以内</li>
                    <?php endif; ?>
                    <?php if ($result['flagOnline']): ?>
                      <li>Webで完結</li>
                    <?php endif; ?>
                    <?php if ($result['flagExamSpeed']): ?>
                      <li>スピード診断あり</li>
                    <?php endif; ?>
                    <?php if ($result['flag30dayFree']): ?>
                      <li>30日間金利0円</li>
                    <?php endif; ?>
                    <?php if ($result['flag365day']): ?>
                      <li>土日祝OK</li>
                    <?php endif; ?>
                  </ul>
                  <div class="Feature_contents_main">
                    <a href="<?php echo $result['url'] ?>" class="thumb">
                      <img src="images/thumb/<?php echo $result['banner'] ?>" alt="">
                    </a>
                    <table>
                      <tbody>
                        <tr>
                          <th>審査時間</th>
                          <td><?php echo $result['strExamTime'] ?></td>
                        </tr>
                        <tr>
                          <th>融資時間</th>
                          <td><?php echo $result['strLoanTime'] ?></td>
                        </tr>
                        <tr>
                          <th>実質年率</th>
                          <td><?php echo $result['minRate'] ?>% ~<?php echo $result['maxRate'] ?>%</td>
                        </tr>
                        <tr>
                          <th>収入証明書</th>
                          <td><?php echo $result['strConfirmation'] ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <?php if (!empty($result['shortComment'])): ?>
                    <div class="Feature_contents_info">
                      <figure class="image">
                        <img src="images/feature_expart_img.png" alt="専門家の声">
                      </figure>
                      <div class="texts">
                        <p class="title">
                          <em><?php echo $result['serviceName'] ?></em><span>を</span>選ぶ理由
                        </p>
                        <p class="text">
                          <?php echo $result['shortComment']; ?>
                        </p>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
                <?php if (!empty($result['point1'])): ?>
                  <div class="CardDetail_point">
                    <p class="CardDetail_point_title">
                      おすすめポイント
                    </p>
                    <ul class="CardDetail_point_list">
                      <li class="CardDetail_point_list_item">
                        <?php echo $result['point1']; ?>
                      </li>
                      <?php if (!empty($result['point2'])): ?>
                        <li class="CardDetail_point_list_item">
                          <?php echo $result['point2']; ?>
                        </li>
                      <?php endif; ?>
                      <?php if (!empty($result['point3'])): ?>
                        <li class="CardDetail_point_list_item">
                          <?php echo $result['point3']; ?>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                <?php endif; ?>
                <div class="Feature_footer">
                  <?php if ($result['flagTimer'] === true): ?>
                    <div class="CountDown">
                      <div class="CountDownItem">
                        <div class="CountDownItem_content">
                          <p class="CountDownItem_title"><b>本日中借入</b><br>の場合</p>
                          <div class="CountDownItem_texts">
                            <p class="CountDownItem_text">
                              残り
                              <img src="images/ico_time.svg" alt="">
                            </p>
                            <p class="CountDownItem_value">
                              <span class="hour">0</span>時間<span class="minute">0</span>分<span class="second">0</span>秒
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                  <a href="<?php echo $result['url'] ?>" class="Button">
                    【公式】詳しくはこちら
                  </a>
                </div>
              </aside>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>

      <section class="Result_form" id="resultForm">
        <div class="Result_form_content">
          <div class="header">
            <img src="images/ico_search.png" alt="">
            最適なカードを探す
          </div>
          <form action="result.php" method="post" id="searchForm">
            <div class="body">
              <div class="select-wrap qs1">
                <select name="work" id="" form="searchForm">
                  <option hidden="" value="00" <?php echo (isset($_POST['work']) && $_POST['work'] === '00') ? 'selected' : ''; ?>>選択してください</option>
                  <option value="01" <?php echo (isset($_POST['work']) && $_POST['work'] === '01') ? 'selected' : ''; ?>>正社員/公務員</option>
                  <option value="02" <?php echo (isset($_POST['work']) && $_POST['work'] === '02') ? 'selected' : ''; ?>>派遣/契約社員</option>
                  <option value="03" <?php echo (isset($_POST['work']) && $_POST['work'] === '03') ? 'selected' : ''; ?>>パート/アルバイト</option>
                  <option value="04" <?php echo (isset($_POST['work']) && $_POST['work'] === '04') ? 'selected' : ''; ?>>自営業/フリーランス</option>
                  <option value="05" <?php echo (isset($_POST['work']) && $_POST['work'] === '05') ? 'selected' : ''; ?>>学生</option>
                  <option value="06" <?php echo (isset($_POST['work']) && $_POST['work'] === '06') ? 'selected' : ''; ?>>主婦</option>
                  <option value="07" <?php echo (isset($_POST['work']) && $_POST['work'] === '07') ? 'selected' : ''; ?>>その他</option>
                </select>
              </div>

              <div class="select-wrap qs2">
                <select name="order_time" id="" form="searchForm">
                  <option hidden="" value="00" <?php echo (isset($_POST['order_time']) && $_POST['order_time'] === '00') ? 'selected' : ''; ?>>選択してください</option>
                  <option value="01" <?php echo (isset($_POST['order_time']) && $_POST['order_time'] === '01') ? 'selected' : ''; ?>>今日中に借りたい</option>
                  <option value="02" <?php echo (isset($_POST['order_time']) && $_POST['order_time'] === '02') ? 'selected' : ''; ?>>2～3日以内</option>
                  <option value="03" <?php echo (isset($_POST['order_time']) && $_POST['order_time'] === '03') ? 'selected' : ''; ?>>1週間以内</option>
                </select>
              </div>

              <div class="select-wrap qs3">
                <select name="order_amount" id="" form="searchForm">
                  <option hidden="" value="00" <?php echo (isset($_POST['order_amount']) && $_POST['order_amount'] === '00') ? 'selected' : ''; ?>>選択してください</option>
                  <option value="01" <?php echo (isset($_POST['order_amount']) && $_POST['order_amount'] === '01') ? 'selected' : ''; ?>>1～49万円</option>
                  <option value="02" <?php echo (isset($_POST['order_amount']) && $_POST['order_amount'] === '02') ? 'selected' : ''; ?>>50～99万円</option>
                  <option value="03" <?php echo (isset($_POST['order_amount']) && $_POST['order_amount'] === '03') ? 'selected' : ''; ?>>100～499万円</option>
                  <option value="04" <?php echo (isset($_POST['order_amount']) && $_POST['order_amount'] === '04') ? 'selected' : ''; ?>>500万円以上</option>
                </select>
              </div>

              <div class="select-wrap qs4">
                <select name="order_how" id="" form="searchForm">
                  <option hidden="" value="00" <?php echo (isset($_POST['order_how']) && $_POST['order_how'] === '00') ? 'selected' : ''; ?>>選択してください</option>
                  <option value="01" <?php echo (isset($_POST['order_how']) && $_POST['order_how'] === '01') ? 'selected' : ''; ?>>口座振込</option>
                  <option value="02" <?php echo (isset($_POST['order_how']) && $_POST['order_how'] === '02') ? 'selected' : ''; ?>>ATM</option>
                  <option value="03" <?php echo (isset($_POST['order_how']) && $_POST['order_how'] === '03') ? 'selected' : ''; ?>>無人機</option>
                </select>
              </div>
            </div>

            <div class="wrapper">
              <input id="acd-check1" class="acd-check" type="checkbox" checked="true">
              <label class="acd-label" for="acd-check1">詳細条件を追加</label>
              <div class="acd-content">
                <table>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" name="option[]" value="01" form="searchForm" id="option01" <?php echo (isset($_POST['option']) && in_array('01', $_POST['option'])) ? 'checked' : ''; ?>><label for="option01">収入証明書不要</label><br></td>
                      <td><input type="checkbox" name="option[]" value="02" form="searchForm" id="option02" <?php echo (isset($_POST['option']) && in_array('02', $_POST['option'])) ? 'checked' : ''; ?>><label for="option02">即日融資</label><br></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="option[]" value="03" form="searchForm" id="option03" <?php echo (isset($_POST['option']) && in_array('03', $_POST['option'])) ? 'checked' : ''; ?>><label for="option03">スピード診断有り</label><br></td>
                      <td><input type="checkbox" name="option[]" value="04" form="searchForm" id="option04" <?php echo (isset($_POST['option']) && in_array('04', $_POST['option'])) ? 'checked' : ''; ?>><label for="option04">Web完結</label><br></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="option[]" value="05" form="searchForm" id="option05" <?php echo (isset($_POST['option']) && in_array('05', $_POST['option'])) ? 'checked' : ''; ?>><label for="option05">金利0円期間有り</label><br></td>
                      <td><input type="checkbox" name="option[]" value="06" form="searchForm" id="option06" <?php echo (isset($_POST['option']) && in_array('06', $_POST['option'])) ? 'checked' : ''; ?>><label for="option06">書類送付なし</label><br></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button class="submit" type="submit">検索する</button>
              </div>
            </div>
          </form>
        </div>
      </section>

      <?php require './components/faq.php' ?>
      <?php require './components/categories.php' ?>
    </main>

    <?php require './components/attention.php' ?>
    <?php require './components/footer.php' ?>
  </div>

</body>

</html>