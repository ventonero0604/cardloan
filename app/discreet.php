<?php
// ページタイプを設定
$pageType = 'discreet';

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
    <main class="Discreet">
      <section class="Kv">
        <h2>
          <img src="images/kv_descreet.png" alt="職場、家族にバレない 在籍確認なしで借りられる厳選カードローン3選">
        </h2>
      </section>

      <?php require './components/countDown.php' ?>

      <section class="Discreet_info">
        <h3 class="heading">
          <img src="images/discreet_text_1.svg" alt="バレずにお金を借りる2つのポイント">
        </h3>
        <ul>
          <li>
            <p class="title">
              <em>郵送物の送付なし</em>にできるか？
            </p>
            <p class="text">
              契約書類などが自宅に届いた際に家族にバレる可能性があります。
            </p>
          </li>
          <li>
            <p class="title">
              <em>在籍確認の電話なし</em>にできる？
            </p>
            <p class="text">
              契約書類などが自宅に届いた際に家族にバレる可能性があります。
            </p>
          </li>
        </ul>
        <div class="footer">
          <img src="images/discreet_text_2.svg" alt="上記2点を満たすカードローンなら周りにバレる心配なし！">
        </div>
      </section>

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