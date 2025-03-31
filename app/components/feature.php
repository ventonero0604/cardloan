<section class="Feature">
  <?php if ($GLOBALS['displayTabTables'] !== true): ?>
    <h3 class="Feature_title">
      <img class="discreet" src="images/feature_no1_title.svg" alt="みんなが選んだのはコレ バレずに借りられる人気No1！">
      <img class="worry" src="images/feature_worry_title.svg" alt="みんなが選んだのはコレ 審査が不安な方に人気No1！">
      <img class="proof" src="images/feature_proof_title.svg" alt="みんなが選んだのはコレ 収入証明書なしで借入OK人気No1！">
      <img class="instant" src="images/feature_instant_title.svg" alt="みんなが選んだのはコレ 即日融資できる人気No1！">
      <img class="low" src="images/feature_low_title.svg" alt="みんなが選んだのはコレ 少額借りたい人気No1！">
    </h3>
  <?php else: ?>
    <h3 class="Feature_title">
      <img class="discreet" src="images/feature_selection_title.svg" alt="みんなが選んだのはコレ バレずに借りられる人気3選">
      <img class="worry" src="images/feature_selection_worry_title.svg" alt="みんなが選んだのはコレ 審査が不安な方に人気N3選">
      <img class="proof" src="images/feature_selection_proof_title.svg" alt="みんなが選んだのはコレ 収入証明書なしで借入OK人気3選">
      <img class="instant" src="images/feature_selection_instant_title.svg" alt="みんなが選んだのはコレ 即日融資できる人気3選">
      <img class="low" src="images/feature_low_selection_title.svg" alt="みんなが選んだのはコレ 少額借りたい人気3選">
    </h3>
  <?php endif; ?>

  <?php if ($GLOBALS['displayTabTables'] !== true): ?>
    <?php require __DIR__ . '/featureContents.php'; ?>
  <?php else: ?>
    <?php require __DIR__ . '/tabTables.php'; ?>
  <?php endif; ?>


  <?php if ($GLOBALS['displayTabTables'] !== true): ?>
    <small>※当サイト内の申込数集計による</small>
  <?php endif; ?>
</section>