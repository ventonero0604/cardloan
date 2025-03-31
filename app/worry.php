<?php
// ページタイプを設定
$pageType = 'worry';

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
    <main class="Worry">
      <section class="Kv">
        <h2>
          <img src="images/kv_worry.png" alt="実際に借りられた人が選んでいる 審査が不安…な方は必見 厳選カードローン3選">
        </h2>
      </section>

      <?php require './components/countDown.php' ?>

      <div class="Worry_wrapper">
        <section class="Worry_info">
          <h3 class="heading">
            <img src="images/worry_info_title.svg" alt="バレずにお金を借りる2つのポイント">
          </h3>
          <ul>
            <li>
              <img class="point" src="images/worry_info_point_1.svg" alt="POINT1">
              <figure class="image">
                <img src="images/worry_info_img_1.png" alt="">
              </figure>
              <div class="texts">
                <p class="title">
                  申込み金額は<em>少額から</em>
                </p>
                <p class="text">
                  後から追加融資も可能なので、<em>まずは必要最小限の金額</em>で申し込みましょう。
                </p>
              </div>
            </li>
            <li>
              <img class="point" src="images/worry_info_point_2.svg" alt="POINT2">
              <figure class="image">
                <img src="images/worry_info_img_2.png" alt="">
              </figure>
              <div class="texts">
                <p class="title">
                  複数<em>同時に申し込まない</em>
                </p>
                <p class="text">
                  <em>同時期に複数カードローン</em>に申し込むと<em>審査に通過しにくくなる</em>傾向があります。
                </p>
              </div>
            </li>
            <li>
              <img class="point" src="images/worry_info_point_3.svg" alt="POINT3">
              <figure class="image">
                <img src="images/worry_info_img_3.png" alt="">
              </figure>
              <div class="texts">
                <p class="title">
                  <em>新規申込み</em>の<br>
                  カードローンを選ぶ
                </p>
                <p class="text">
                  審査は各社が独自で行っています。申込み経験がある方は、<em>過去に申し込んだことがないカードローン</em>を選びましょう。
                </p>
              </div>
            </li>
          </ul>
        </section>
      </div>

      <?php require './components/feature.php' ?>
      <?php require './components/explain.php' ?>
      <?php require './components/top3.php' ?>
      <?php require './components/step.php' ?>
      <?php require './components/pickup.php' ?>
      <?php require './components/faq.php' ?>
      <?php require './components/categories.php' ?>
    </main>

    <?php require './components/attention.php' ?>
    <?php require './components/footer.php' ?>
  </div>

</body>

</html>