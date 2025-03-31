<ul class="Labels">
  <?php if ($GLOBALS['ranking1stData']['flagSecret']): ?>
    <li>バレにくい</li>
  <?php endif; ?>
  <?php if ($GLOBALS['ranking1stData']['flagToday']): ?>
    <li>最短融資1h以内</li>
  <?php endif; ?>
  <?php if ($GLOBALS['ranking1stData']['flagOnline']): ?>
    <li>Webで完結</li>
  <?php endif; ?>
  <?php if ($GLOBALS['ranking1stData']['flagExamSpeed']): ?>
    <li>スピード診断あり</li>
  <?php endif; ?>
  <?php if ($GLOBALS['ranking1stData']['flag30dayFree']): ?>
    <li>30日間金利0円</li>
  <?php endif; ?>
  <?php if ($GLOBALS['ranking1stData']['flag365day']): ?>
    <li>土日祝OK</li>
  <?php endif; ?>
</ul>