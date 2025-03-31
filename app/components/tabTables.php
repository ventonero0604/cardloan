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
          ['isNo1' => true, 'data' => $ranking1stData],
          ['isNo1' => false, 'data' => $ranking2ndData],
          ['isNo1' => false, 'data' => $ranking3rdData],
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
          ['isNo1' => true, 'data' => $ranking1stData],
          ['isNo1' => false, 'data' => $ranking2ndData],
          ['isNo1' => false, 'data' => $ranking3rdData],
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
          ['isNo1' => true, 'data' => $ranking1stData],
          ['isNo1' => false, 'data' => $ranking2ndData],
          ['isNo1' => false, 'data' => $ranking3rdData],
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