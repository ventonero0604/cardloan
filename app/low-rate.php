<?php
// ページタイプを設定
$pageType = 'lowRate';

// データを読み込む
require './functions/loadData.php';

// 当該ページのデータを取得
$topData = $GLOBALS['pageData'][$pageType];

// データをセット
require './functions/setData.php';

require './components/head.php';
?>

<body>
  <div class="Wrapper">
    <?php require './components/header.php' ?>
    <main class="LowRate">
      <section class="Kv">
        <h2>
          <img src="images/kv_low-rate.png" alt="実際に借りられた人が選んでいる 審査が不安…な方は必見 厳選カードローン3選">
        </h2>
      </section>

      <div class="LowRate_wrapper">
        <section class="LowRate_info">
          <h3 class="heading">
            <img src="images/lowrate_info_1.svg" alt="金利を低く抑える方法その1">
          </h3>
          <figure class="image1">
            <img src="images/lowrate_info_2.png" alt="こんな方にぴったりです">
          </figure>
          <figure class="image2">
            <img src="images/lowrate_info_3.svg" alt="実はお得な消費者金融">
          </figure>
          <figure class="image3">
            <img src="images/lowrate_info_4.png" alt="例えば30万円を3ヶ月借りた場合">
          </figure>
          <figure class="image4">
            <img src="images/lowrate_info_5.svg" alt="融資が少額の場合、低金利な銀行カードローンよりも無利息期間のある消費者金融の方がおトクな可能性があります！">
          </figure>
        </section>
      </div>

      <section class="Feature">
        <h3 class="Feature_title">
          <img class="lowRate" src="images/feature_lowrate_title_1.svg" alt="無利息期間30日付きで低金利で借りられる気3社">
        </h3>
        <?php require 'components/tabTables.php'; ?>
      </section>

      <div class="LowRate_wrapper">
        <section class="LowRate_info">
          <figure class="image6">
            <img src="images/lowrate_info_6.svg" alt="金利を低く抑える方法その1">
          </figure>
        </section>
      </div>

      <div class="LowRate_table">
        <aside class="TabTables">
          <ul class="TabTables_tabs">
            <li class="TabTables_tab is-active">
              総合
            </li>
            <li class="TabTables_tab">
              スピード
            </li>
            <li class="TabTables_tab">
              金利
            </li>
          </ul>
          <div class="TabTables_contents">
            <table class="TabTable" data-table="0">
              <tbody>
                <tr>
                  <th>サービス</th>
                  <th>融資時間</th>
                  <th>実質年利</th>
                  <th>職場連絡</th>
                  <th>申込み</th>
                </tr>
                <?php
                $rankings = [
                  ['isNo1' => true, 'data' => $bankRanking1stData],
                  ['isNo1' => false, 'data' => $bankRanking2ndData],
                  ['isNo1' => false, 'data' => $bankRanking3rdData],
                ];

                foreach ($rankings as $ranking) {
                ?>
                  <tr class="<?php echo $ranking['isNo1'] ? 'highlight' : ''; ?>">
                    <td class="middle">
                      <div class="TabTable_item">
                        <?php if ($ranking['isNo1']): ?>
                          <img class="TabTable_item_badge" src="images/feature_no1_tooltip.png" alt="人気No.1！">
                        <?php endif; ?>
                        <a href="<?php echo $ranking['data']['url']; ?>">
                          <img class="thumb" src="images/thumb/<?php echo $ranking['data']['banner']; ?>" alt="">
                          <p class="text">
                            <span>
                              <?php echo $ranking['data']['serviceName']; ?>
                            </span>
                            <img src="images/ico_external_red.png" alt="">
                          </p>
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <?php echo getIconByType($ranking['data']['flagComparisonLoanTime']); ?>
                        <p class="TabTable_item_text">
                          <?php echo $ranking['data']['strLoanTime']; ?>
                        </p>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <?php echo getIconByType($ranking['data']['flagComparisonRate']); ?>
                        <p class="TabTable_item_text">
                          <?php echo $ranking['data']['minRate']; ?>％～<br>
                          <?php echo $ranking['data']['maxRate']; ?>％
                        </p>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <?php echo getIconByType($ranking['data']['flagComparisonTel']); ?>
                        <p class="TabTable_item_text">
                          <?php echo $ranking['data']['strComparisonTel']; ?>
                        </p>
                      </div>
                    </td>
                    <td class="middle button">
                      <div class="TabTable_item">
                        <a href="<?php echo $ranking['data']['url']; ?>" class="TabTable_item_button">
                          詳細は<br>こちら
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <table class="TabTable" data-table="1">
              <tbody>
                <tr>
                  <th>サービス</th>
                  <th>審査時間</th>
                  <th>融資時間</th>
                  <th>簡易診断</th>
                  <th>申込み</th>
                </tr>
                <?php
                $rankings = [
                  ['isNo1' => true, 'data' => $bankRanking1stData],
                  ['isNo1' => false, 'data' => $bankRanking2ndData],
                  ['isNo1' => false, 'data' => $bankRanking3rdData],
                ];

                foreach ($rankings as $ranking) {
                ?>
                  <tr class="<?php echo $ranking['isNo1'] ? 'highlight' : ''; ?>">
                    <td class="middle">
                      <div class="TabTable_item">
                        <?php if ($ranking['isNo1']): ?>
                          <img class="TabTable_item_badge" src="images/feature_no1_tooltip.png" alt="人気No.1！">
                        <?php endif; ?>
                        <a href="<?php echo $ranking['data']['url']; ?>">
                          <img class="thumb" src="images/thumb/<?php echo $ranking['data']['banner']; ?>" alt="">
                          <p class="text">
                            <span>
                              <?php echo $ranking['data']['serviceName']; ?>
                            </span>
                            <img src="images/ico_external_red.png" alt="">
                          </p>
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <?php echo getIconByType($ranking['data']['flagComparisonExamTime']); ?>
                        <p class="TabTable_item_text">
                          <?php echo $ranking['data']['strExamTime']; ?>
                        </p>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <?php echo getIconByType($ranking['data']['flagComparisonLoanTime']); ?>
                        <p class="TabTable_item_text">
                          <?php echo $ranking['data']['strLoanTime']; ?>
                        </p>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <img src="images/ico_compare_circle_single.svg" alt="">
                        <p class="TabTable_item_text">
                          あり
                        </p>
                      </div>
                    </td>
                    <td class="middle button">
                      <div class="TabTable_item">
                        <a href="<?php echo $ranking['data']['url']; ?>" class="TabTable_item_button">
                          詳細は<br>こちら
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            <table class="TabTable" data-table="2">
              <tbody>
                <tr>
                  <th>サービス</th>
                  <th>実質年率</th>
                  <th>無利息期間</th>
                  <th>限度額</th>
                  <th>申込み</th>
                </tr>
                <?php
                $rankings = [
                  ['isNo1' => true, 'data' => $bankRanking1stData],
                  ['isNo1' => false, 'data' => $bankRanking2ndData],
                  ['isNo1' => false, 'data' => $bankRanking3rdData],
                ];

                foreach ($rankings as $ranking) {
                ?>
                  <tr class="<?php echo $ranking['isNo1'] ? 'highlight' : ''; ?>">
                    <td class="middle">
                      <div class="TabTable_item">
                        <?php if ($ranking['isNo1']): ?>
                          <img class="TabTable_item_badge" src="images/feature_no1_tooltip.png" alt="人気No.1！">
                        <?php endif; ?>
                        <a href="<?php echo $ranking['data']['url']; ?>">
                          <img class="thumb" src="images/thumb/<?php echo $ranking['data']['banner']; ?>" alt="">
                          <p class="text">
                            <span>
                              <?php echo $ranking['data']['serviceName']; ?>
                            </span>
                            <img src="images/ico_external_red.png" alt="">
                          </p>
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <?php echo getIconByType($ranking['data']['flagComparisonRate']); ?>
                        <p class="TabTable_item_text">
                          <?php echo $ranking['data']['strExamTime']; ?>
                        </p>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <?php echo getIconByType($ranking['data']['flagComparisonNoFee']); ?>
                        <p class="TabTable_item_text">
                          <?php echo $ranking['data']['minRate']; ?>％～<br>
                          <?php echo $ranking['data']['maxRate']; ?>％
                        </p>
                      </div>
                    </td>
                    <td>
                      <div class="TabTable_item">
                        <?php echo getIconByType($ranking['data']['flagComparisonLimitAmount']); ?>
                        <p class="TabTable_item_text">
                          <?php echo $ranking['data']['strComparisonTel']; ?>
                        </p>
                      </div>
                    </td>
                    <td class="middle button">
                      <div class="TabTable_item">
                        <a href="<?php echo $ranking['data']['url']; ?>" class="TabTable_item_button">
                          詳細は<br>こちら
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </aside>
      </div>

      <?php require './components/explain.php' ?>

      <section class="LowRate_tab">
        <div class="wrapper">
          <ul class="tab">
            <li class="is-active">
              消費者金融
              <small>カードローン</small>
            </li>
            <li>銀行
              <small>カードローン</small>
            </li>
          </ul>
          <div class="contents" data-index="0">
            <div class="header">
              <img src="images/lowrate_cardloan_title_1.svg" alt="30日間無利息で早く借りる！「消費者金融」カードローン3選" class="title">
              <img src="images/lowrate_img_1.svg" alt="こんな方にぴったりです！" class="image">
            </div>
            <div class="body">
              <?php
              $rankings = [
                ['class' => '-gold', 'data' => $ranking1stData, 'score' => $ranking1stScore],
                ['class' => '-silver', 'data' => $ranking2ndData, 'score' => $ranking2ndScore],
                ['class' => '-bronze', 'data' => $ranking3rdData,  'score' => $ranking3rdScore],
              ];

              foreach ($rankings as $ranking) {
              ?>
                <aside class="CardDetail <?php echo $ranking['class']; ?>">
                  <div class="CardDetail_header">
                    <h3 class="CardDetail_title">
                      <?php echo $ranking['data']['serviceName']; ?>
                    </h3>
                  </div>
                  <div class="CardDetail_body">
                    <ul class="Labels">
                      <?php if ($ranking['data']['flagSecret']): ?>
                        <li>バレにくい</li>
                      <?php endif; ?>
                      <?php if ($ranking['data']['flagToday']): ?>
                        <li>最短融資1h以内</li>
                      <?php endif; ?>
                      <?php if ($ranking['data']['flagOnline']): ?>
                        <li>Webで完結</li>
                      <?php endif; ?>
                      <?php if ($ranking['data']['flagExamSpeed']): ?>
                        <li>スピード診断あり</li>
                      <?php endif; ?>
                      <?php if ($ranking['data']['flag30dayFree']): ?>
                        <li>30日間金利0円</li>
                      <?php endif; ?>
                      <?php if ($ranking['data']['flag365day']): ?>
                        <li>土日祝OK</li>
                      <?php endif; ?>
                    </ul>
                    <h4 class="CardDetail_body_title">
                      <?php echo $ranking['data']['mainCopy']; ?>
                    </h4>
                    <div class="CardDetail_main">
                      <a href="<?php echo $ranking['data']['url']; ?>" class="CardDetail_main_thumb">
                        <img src="images/thumb/<?php echo $ranking['data']['banner']; ?>" alt="">
                      </a>
                      <div class="CardDetail_main_texts">
                        <?php if ($GLOBALS['displayStar'] === true): ?>
                          <div class="CardDetail_rating">
                            <svg class="rating" xmlns="http://www.w3.org/2000/svg" width="88" height="16" viewBox="0 0 88 16" fill="none">
                              <path class="star" data-index="1"
                                d="M11.3515 4.43109L11.3514 4.43114L11.357 4.43851C11.4658 4.58173 11.6321 4.71579 11.8395 4.77876L16.4655 6.25039L13.601 10.1152C13.4687 10.2909 13.4178 10.5026 13.4178 10.6805L13.4178 10.6824L13.4361 15.4832L8.80958 13.9813L8.80964 13.9811L8.79724 13.9775C8.61173 13.9225 8.41096 13.9225 8.22545 13.9775L8.2254 13.9773L8.2131 13.9813L3.58656 15.4832L3.60488 10.6824V10.6805C3.60488 10.5023 3.55382 10.2903 3.42114 10.1144L0.538925 6.25031L5.16451 4.77881C5.3471 4.72351 5.52916 4.60965 5.65726 4.4247L8.49235 0.532112L8.60173 0.685609H8.61477L11.3515 4.43109Z"
                                stroke="#3F3F3F" />
                              <path class="star" data-index="2"
                                d="M29.3515 4.43109L29.3514 4.43114L29.357 4.43851C29.4658 4.58173 29.6321 4.71579 29.8395 4.77876L34.4655 6.25039L31.601 10.1152C31.4687 10.2909 31.4178 10.5026 31.4178 10.6805L31.4178 10.6824L31.4361 15.4832L26.8096 13.9813L26.8096 13.9811L26.7972 13.9775C26.6117 13.9225 26.411 13.9225 26.2255 13.9775L26.2254 13.9773L26.2131 13.9813L21.5866 15.4832L21.6049 10.6824V10.6805C21.6049 10.5023 21.5538 10.2903 21.4211 10.1144L18.5389 6.25031L23.1645 4.77881C23.3471 4.72351 23.5292 4.60965 23.6573 4.4247L26.4924 0.532112L26.6017 0.685609H26.6148L29.3515 4.43109Z"
                                stroke="#3F3F3F" />
                              <path class="star" data-index="3"
                                d="M47.3515 4.43109L47.3514 4.43114L47.357 4.43851C47.4658 4.58173 47.6321 4.71579 47.8395 4.77876L52.4655 6.25039L49.601 10.1152C49.4687 10.2909 49.4178 10.5026 49.4178 10.6805L49.4178 10.6824L49.4361 15.4832L44.8096 13.9813L44.8096 13.9811L44.7972 13.9775C44.6117 13.9225 44.411 13.9225 44.2255 13.9775L44.2254 13.9773L44.2131 13.9813L39.5866 15.4832L39.6049 10.6824V10.6805C39.6049 10.5023 39.5538 10.2903 39.4211 10.1144L36.5389 6.25031L41.1645 4.77881C41.3471 4.72351 41.5292 4.60965 41.6573 4.4247L44.4924 0.532112L44.6017 0.685609H44.6148L47.3515 4.43109Z"
                                stroke="#3F3F3F" />
                              <path class="star" data-index="4"
                                d="M65.3515 4.43109L65.3514 4.43114L65.357 4.43851C65.4658 4.58173 65.6321 4.71579 65.8395 4.77876L70.4655 6.25039L67.601 10.1152C67.4687 10.2909 67.4178 10.5026 67.4178 10.6805L67.4178 10.6824L67.4361 15.4832L62.8096 13.9813L62.8096 13.9811L62.7972 13.9775C62.6117 13.9225 62.411 13.9225 62.2255 13.9775L62.2254 13.9773L62.2131 13.9813L57.5866 15.4832L57.6049 10.6824V10.6805C57.6049 10.5023 57.5538 10.2903 57.4211 10.1144L54.5389 6.25031L59.1645 4.77881C59.3471 4.72351 59.5292 4.60965 59.6573 4.4247L62.4924 0.532112L62.6017 0.685609H62.6148L65.3515 4.43109Z"
                                fill="white" stroke="#3F3F3F" />
                              <path class="star" data-index="5"
                                d="M75.4222 10.6805C75.4222 10.5087 75.3761 10.3011 75.252 10.1262L72.5282 6.2463L76.8778 4.77612C77.0605 4.71726 77.2359 4.5981 77.3565 4.41306L79.9925 0.567665L80.0716 0.685609H80.084L82.6518 4.41942L82.6517 4.41947L82.657 4.42685C82.7589 4.5694 82.9191 4.70924 83.1259 4.77607L87.4758 6.24636L84.7689 10.1268C84.6451 10.3016 84.5991 10.5089 84.5991 10.6805L84.5991 10.6823L84.6163 15.4698L80.3091 13.9842L80.3092 13.984L80.2962 13.9799C80.1111 13.9217 79.9102 13.9217 79.7251 13.9799L79.7251 13.9798L79.7122 13.9842L75.405 15.4698L75.4222 10.6823V10.6805Z"
                                fill="white" stroke="#3F3F3F" />
                            </svg>
                            <p class="rate js-rate"><?php echo $ranking['score']; ?></p>
                          </div>
                        <?php else: ?>
                          <div class="CardDetail_value">
                            <p class="title">申込実績</p>
                            <p class="value js-inview-value">
                              <em><?php echo $ranking['data']['users'] ?></em>件
                            </p>
                          </div>
                        <?php endif; ?>
                        <?php if ($ranking['data']['flagToday']): ?>
                          <p class="CardDetail_tooltip">
                            <em>本日</em>借り入れも◎
                          </p>
                        <?php endif; ?>
                        <table class="CardDetail_main_table">
                          <tbody>
                            <tr>
                              <th>審査時間</th>
                              <td><?php echo $ranking['data']['strExamTime']; ?></td>
                            </tr>
                            <tr>
                              <th>融資時間</th>
                              <td><?php echo $ranking['data']['strLoanTime']; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <ul class="CardDetail_list">
                      <li>
                        <p class="CardDetail_list_title">
                          実質年率
                        </p>
                        <p class="CardDetail_list_text">
                          <?php echo $ranking['data']['minRate']; ?>% ~<?php echo $ranking['data']['maxRate']; ?>%
                        </p>
                      </li>
                      <li>
                        <p class="CardDetail_list_title">
                          収入証明書
                        </p>
                        <p class="CardDetail_list_text">
                          <?php echo $ranking['data']['strConfirmation']; ?>
                        </p>
                      </li>
                      <li>
                        <p class="CardDetail_list_title">
                          提携ATM
                        </p>
                        <div class="CardDetail_list_icons">
                          <?php
                          $atmFlags = explode(',', $ranking['data']['flagAtm']);
                          $atmIcons = [
                            '01' => 'images/atm_seven.png',
                            '02' => 'images/atm_familymart.png',
                            '03' => 'images/atm_lawson.png',
                            '04' => 'images/atm_ministop.png',
                          ];
                          foreach ($atmFlags as $flag) {
                            $flag = trim($flag);
                            if (isset($atmIcons[$flag])) {
                              echo '<img src="' . $atmIcons[$flag] . '" alt="">';
                            }
                          }
                          ?>
                        </div>
                      </li>
                      <li>
                        <p class="CardDetail_list_title">
                          借入限度額
                        </p>
                        <p class="CardDetail_list_text">
                          <?php echo $ranking['data']['strLimitAmount']; ?>
                        </p>
                      </li>
                    </ul>
                    <div class="CardDetail_point">
                      <p class="CardDetail_point_title">
                        おすすめポイント
                      </p>
                      <ul class="CardDetail_point_list">
                        <li class="CardDetail_point_list_item">
                          <?php echo $ranking['data']['point1']; ?>
                        </li>
                        <li class="CardDetail_point_list_item">
                          <?php echo $ranking['data']['point2']; ?>
                        </li>
                        <li class="CardDetail_point_list_item">
                          <?php echo $ranking['data']['point3']; ?>
                        </li>
                      </ul>
                    </div>
                    <div class="Top3_footer">
                      <?php if ($ranking['data']['flagTimer'] === true): ?>
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
                      <?php endif; ?>
                      <a href="<?php echo $ranking['data']['url']; ?>" class="Button">
                        【公式】詳しくはこちら
                      </a>
                    </div>
                  </div>
                </aside>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="contents" data-index="1">
            <div class="header">
              <img src="images/lowrate_cardloan_title_2.svg" alt="30日間無利息で早く借りる！「消費者金融」カードローン3選" class="title">
              <img src="images/lowrate_img_2.svg" alt="以下の条件を満たす方は銀行カードローンもオススメです" class="image">
            </div>
            <div class="body">
              <?php
              $rankings = [
                ['class' => '-gold', 'data' => $bankRanking1stData, 'score' => $bankRanking1stScore],
                ['class' => '-silver', 'data' => $bankRanking2ndData, 'score' => $bankRanking2ndScore],
                ['class' => '-bronze', 'data' => $bankRanking3rdData,  'score' => $bankRanking3rdScore],
              ];

              foreach ($rankings as $ranking) {
              ?>
                <aside class="CardDetail <?php echo $ranking['class']; ?>">
                  <div class="CardDetail_header">
                    <h3 class="CardDetail_title">
                      <?php echo $ranking['data']['serviceName']; ?>
                    </h3>
                  </div>
                  <div class="CardDetail_body">
                    <ul class="Labels">
                      <li class="<?php echo $ranking['data']['flagSecret'] ? '' : 'disabled'; ?>">バレにくい</li>
                      <li class="<?php echo $ranking['data']['flagToday'] ? '' : 'disabled'; ?>">最短融資1h以内</li>
                      <li class="<?php echo $ranking['data']['flagOnline'] ? '' : 'disabled'; ?>">Webで完結</li>
                      <li class="<?php echo $ranking['data']['flagExamSpeed'] ? '' : 'disabled'; ?>">スピード診断あり</li>
                      <li class="<?php echo $ranking['data']['flag30dayFree'] ? '' : 'disabled'; ?>">30日間金利0円</li>
                      <li class="<?php echo $ranking['data']['flag365day'] ? '' : 'disabled'; ?>">土日祝OK</li>
                    </ul>
                    <h4 class="CardDetail_body_title">
                      <?php echo $ranking['data']['mainCopy']; ?>
                    </h4>
                    <div class="CardDetail_main">
                      <a href="<?php echo $ranking['data']['url']; ?>" class="CardDetail_main_thumb">
                        <img src="images/thumb/<?php echo $ranking['data']['banner']; ?>" alt="">
                      </a>
                      <div class="CardDetail_main_texts">
                        <?php if ($GLOBALS['displayStar'] === true): ?>
                          <div class="CardDetail_rating">
                            <svg class="rating" xmlns="http://www.w3.org/2000/svg" width="88" height="16" viewBox="0 0 88 16" fill="none">
                              <path class="star" data-index="1"
                                d="M11.3515 4.43109L11.3514 4.43114L11.357 4.43851C11.4658 4.58173 11.6321 4.71579 11.8395 4.77876L16.4655 6.25039L13.601 10.1152C13.4687 10.2909 13.4178 10.5026 13.4178 10.6805L13.4178 10.6824L13.4361 15.4832L8.80958 13.9813L8.80964 13.9811L8.79724 13.9775C8.61173 13.9225 8.41096 13.9225 8.22545 13.9775L8.2254 13.9773L8.2131 13.9813L3.58656 15.4832L3.60488 10.6824V10.6805C3.60488 10.5023 3.55382 10.2903 3.42114 10.1144L0.538925 6.25031L5.16451 4.77881C5.3471 4.72351 5.52916 4.60965 5.65726 4.4247L8.49235 0.532112L8.60173 0.685609H8.61477L11.3515 4.43109Z"
                                stroke="#3F3F3F" />
                              <path class="star" data-index="2"
                                d="M29.3515 4.43109L29.3514 4.43114L29.357 4.43851C29.4658 4.58173 29.6321 4.71579 29.8395 4.77876L34.4655 6.25039L31.601 10.1152C31.4687 10.2909 31.4178 10.5026 31.4178 10.6805L31.4178 10.6824L31.4361 15.4832L26.8096 13.9813L26.8096 13.9811L26.7972 13.9775C26.6117 13.9225 26.411 13.9225 26.2255 13.9775L26.2254 13.9773L26.2131 13.9813L21.5866 15.4832L21.6049 10.6824V10.6805C21.6049 10.5023 21.5538 10.2903 21.4211 10.1144L18.5389 6.25031L23.1645 4.77881C23.3471 4.72351 23.5292 4.60965 23.6573 4.4247L26.4924 0.532112L26.6017 0.685609H26.6148L29.3515 4.43109Z"
                                stroke="#3F3F3F" />
                              <path class="star" data-index="3"
                                d="M47.3515 4.43109L47.3514 4.43114L47.357 4.43851C47.4658 4.58173 47.6321 4.71579 47.8395 4.77876L52.4655 6.25039L49.601 10.1152C49.4687 10.2909 49.4178 10.5026 49.4178 10.6805L49.4178 10.6824L49.4361 15.4832L44.8096 13.9813L44.8096 13.9811L44.7972 13.9775C44.6117 13.9225 44.411 13.9225 44.2255 13.9775L44.2254 13.9773L44.2131 13.9813L39.5866 15.4832L39.6049 10.6824V10.6805C39.6049 10.5023 39.5538 10.2903 39.4211 10.1144L36.5389 6.25031L41.1645 4.77881C41.3471 4.72351 41.5292 4.60965 41.6573 4.4247L44.4924 0.532112L44.6017 0.685609H44.6148L47.3515 4.43109Z"
                                stroke="#3F3F3F" />
                              <path class="star" data-index="4"
                                d="M65.3515 4.43109L65.3514 4.43114L65.357 4.43851C65.4658 4.58173 65.6321 4.71579 65.8395 4.77876L70.4655 6.25039L67.601 10.1152C67.4687 10.2909 67.4178 10.5026 67.4178 10.6805L67.4178 10.6824L67.4361 15.4832L62.8096 13.9813L62.8096 13.9811L62.7972 13.9775C62.6117 13.9225 62.411 13.9225 62.2255 13.9775L62.2254 13.9773L62.2131 13.9813L57.5866 15.4832L57.6049 10.6824V10.6805C57.6049 10.5023 57.5538 10.2903 57.4211 10.1144L54.5389 6.25031L59.1645 4.77881C59.3471 4.72351 59.5292 4.60965 59.6573 4.4247L62.4924 0.532112L62.6017 0.685609H62.6148L65.3515 4.43109Z"
                                fill="white" stroke="#3F3F3F" />
                              <path class="star" data-index="5"
                                d="M75.4222 10.6805C75.4222 10.5087 75.3761 10.3011 75.252 10.1262L72.5282 6.2463L76.8778 4.77612C77.0605 4.71726 77.2359 4.5981 77.3565 4.41306L79.9925 0.567665L80.0716 0.685609H80.084L82.6518 4.41942L82.6517 4.41947L82.657 4.42685C82.7589 4.5694 82.9191 4.70924 83.1259 4.77607L87.4758 6.24636L84.7689 10.1268C84.6451 10.3016 84.5991 10.5089 84.5991 10.6805L84.5991 10.6823L84.6163 15.4698L80.3091 13.9842L80.3092 13.984L80.2962 13.9799C80.1111 13.9217 79.9102 13.9217 79.7251 13.9799L79.7251 13.9798L79.7122 13.9842L75.405 15.4698L75.4222 10.6823V10.6805Z"
                                fill="white" stroke="#3F3F3F" />
                            </svg>
                            <p class="rate js-rate"><?php echo $ranking['score']; ?></p>
                          </div>
                        <?php else: ?>
                          <div class="CardDetail_value">
                            <p class="title">申込実績</p>
                            <p class="value js-inview-value">
                              <em><?php echo $ranking['data']['users'] ?></em>件
                            </p>
                          </div>
                        <?php endif; ?>
                        <?php if ($ranking['data']['flagToday']): ?>
                          <p class="CardDetail_tooltip">
                            <em>本日</em>借り入れも◎
                          </p>
                        <?php endif; ?>
                        <table class="CardDetail_main_table">
                          <tbody>
                            <tr>
                              <th>審査時間</th>
                              <td><?php echo $ranking['data']['strExamTime']; ?></td>
                            </tr>
                            <tr>
                              <th>融資時間</th>
                              <td><?php echo $ranking['data']['strLoanTime']; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <ul class="CardDetail_list">
                      <li>
                        <p class="CardDetail_list_title">
                          実質年率
                        </p>
                        <p class="CardDetail_list_text">
                          <?php echo $ranking['data']['minRate']; ?>% ~<?php echo $ranking['data']['maxRate']; ?>%
                        </p>
                      </li>
                      <li>
                        <p class="CardDetail_list_title">
                          収入証明書
                        </p>
                        <p class="CardDetail_list_text">
                          <?php echo $ranking['data']['strConfirmation']; ?>
                        </p>
                      </li>
                      <li>
                        <p class="CardDetail_list_title">
                          提携ATM
                        </p>
                        <div class="CardDetail_list_icons">
                          <?php
                          $atmFlags = explode(',', $ranking['data']['flagAtm']);
                          $atmIcons = [
                            '01' => 'images/atm_seven.png',
                            '02' => 'images/atm_familymart.png',
                            '03' => 'images/atm_lawson.png',
                            '04' => 'images/atm_ministop.png',
                          ];
                          foreach ($atmFlags as $flag) {
                            $flag = trim($flag);
                            if (isset($atmIcons[$flag])) {
                              echo '<img src="' . $atmIcons[$flag] . '" alt="">';
                            }
                          }
                          ?>
                        </div>
                      </li>
                      <li>
                        <p class="CardDetail_list_title">
                          借入限度額
                        </p>
                        <p class="CardDetail_list_text">
                          <?php echo $ranking['data']['strLimitAmount']; ?>
                        </p>
                      </li>
                    </ul>
                    <div class="CardDetail_point">
                      <p class="CardDetail_point_title">
                        おすすめポイント
                      </p>
                      <ul class="CardDetail_point_list">
                        <li class="CardDetail_point_list_item">
                          <?php echo $ranking['data']['point1']; ?>
                        </li>
                        <li class="CardDetail_point_list_item">
                          <?php echo $ranking['data']['point2']; ?>
                        </li>
                        <li class="CardDetail_point_list_item">
                          <?php echo $ranking['data']['point3']; ?>
                        </li>
                      </ul>
                    </div>
                    <div class="Top3_footer">
                      <?php if ($ranking['data']['flagTimer'] === true): ?>
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
                      <?php endif; ?>
                      <a href="<?php echo $ranking['data']['url']; ?>" class="Button">
                        【公式】詳しくはこちら
                      </a>
                    </div>
                  </div>
                </aside>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </section>

      <?php require './components/step.php' ?>
      <?php require './components/pickup.php' ?>
      <?php require './components/faq.php' ?>
      <?php require './components/categories.php' ?>
      <?php require './components/search.php' ?>
    </main>

    <?php require './components/attention.php' ?>
    <?php require './components/footer.php' ?>
  </div>

</body>

</html>