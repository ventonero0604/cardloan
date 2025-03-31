<?php
// ページタイプを設定
$pageType = 'low';

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
    <main class="Low">
      <section class="Kv">
        <h2>
          <img src="images/kv_low.png" alt="即日融資でバレない人気のカードローンを徹底比較">
        </h2>
      </section>

      <?php require './components/countDown.php' ?>
      <?php require './components/feature.php' ?>
      <?php require './components/explain.php' ?>
      <?php require './components/top3.php' ?>
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