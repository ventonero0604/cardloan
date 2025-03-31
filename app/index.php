<?php
// ページタイプを設定
$pageType = 'top';

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
    <main class="Top">
      <section class="Kv">
        <!-- <h2>
          <img src="images/kv_top.png" alt="即日融資でバレない 人気のカードローンを徹底比較">
        </h2> -->
        <h2 class="Kv_top_movie">
          <video class="movie" src="images/kv_top_movie.mp4" autoplay muted loop></video>
        </h2>
      </section>

      <?php require './components/countDown.php' ?>
      <?php require './components/search.php' ?>
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