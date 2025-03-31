<?php
// ページタイプを設定
$pageType = 'proof';

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
    <main class="Proof">
      <section class="Kv">
        <h2>
          <img src="images/kv_proof.png" alt="収入額50万円未満の場合 収入証明書なし 身分証のみでお金借りたいならこの3社">
        </h2>
      </section>

      <?php require './components/countDown.php' ?>

      <div class="Proof_wrapper">
        <section class="Proof_info">
          <h3 class="heading">
            <img src="images/proof_title.svg" alt="バレずにお金を借りる2つのポイント">
          </h3>
          <div class="info">
            <img src="images/proof_info_1.svg" alt="利用限度額が50万円未満/他社と合わせた借入総額が100万円未満">
            <img src="images/proof_info_2.svg" alt="c身分証明書の例">
          </div>
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