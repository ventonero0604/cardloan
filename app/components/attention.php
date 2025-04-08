<section class="Attention">
  <?php
  $rankings = [
    $ranking1stData ?? null,
    $ranking2ndData ?? null,
    $ranking3rdData ?? null,
    $bankRanking1stData ?? null,
    $bankRanking2ndData ?? null,
    $bankRanking3rdData ?? null
  ];

  foreach ($rankings as $ranking) {
    if ($ranking) {
      echo '<p>';
      echo '■' . htmlspecialchars((string)$ranking['serviceName'], ENT_QUOTES, 'UTF-8') . '<br>';
      echo htmlspecialchars_decode(getNoteAll($ranking), ENT_QUOTES);
      echo '</p>';
    }
  }
  ?>
  <p>
    ＜当ページランキングについて＞<br>
    当サイトで選定した『即日融資が可能なカードローン』を当ページからのアクセス数に基づき掲載しております。（当サイト調べ）<br><br>
    ＜当サイトについて＞<br>
    Yカードローンガイドでは、アフィリエイトプログラムを利用し、広告収益を得て運営しております。<br>
    ※委託元：アコム、プロミス、アイフル、モビット、レイク、三井住友銀行、埼玉りそな銀行、北陽銀行<br><br>
    ＜利用者数について＞<br>
    調査目的：各カードローン及びキャッシングサービスのアクセス数により選ばれているサービスを紹介するため<br>
    調査対象：国内からの当サイトアクセス<br>
    集計期間：過去30日間 ※2021/12/23より定期的に集計<br>
    調査方法：当サイト掲載サービスのホームページへのアクセス数を算出<br>
    備考：同IPアドレス、同一企業（人物）と類推されるユーザーからのアクセスについては集計対象外<br>
    調査主体者：mycardloan-guide.com→調査結果
  </p>
</section>