<section class="Search">
  <div class="SearchExpand js-SearchExpand is-ready">
    <img class="SearchExpand_badge" src="images/top_badge.svg" alt="10秒で診断完了">
    <div class="SearchExpand_wrapper">
      <h3 class="SearchExpand_title"><b>4ステップ</b><small>で</small>あなたに合ったカード<small>を</small>探す</h3>
      <div class="content">
        <div class="SearchExpand_conseal">
          <button class="SearchExpand_start js-search-start">診断スタート</button>
        </div>
        <form action="result.php" method="post" class="search_step_form" id="search_form">
          <div id="step_area">
            <div class="step_count">
              <ul>
                <li class="active">Q1</li>
                <li>Q2</li>
                <li>Q3</li>
                <li>Q4</li>
              </ul>
            </div>
            <div class="step_title"><span>Q1</span> 現在のご年齢は？</div>

            <div class="step_body">
              <div class="step radios_wrap not_last open sp_column3" data-title="現在のご年齢は？">
                <div class="wrapper">
                  <div class="label_wrap"><label><input type="radio" name="age" value="00"
                        form="search_form"><span>指定なし</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="age" value="10"
                        form="search_form"><span>～19歳</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="age" value="20"
                        form="search_form"><span>20代</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="age" value="30"
                        form="search_form"><span>30代</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="age" value="40"
                        form="search_form"><span>40代</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="age" value="50"
                        form="search_form"><span>50代</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="age" value="60"
                        form="search_form"><span>60代</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="age" value="70"
                        form="search_form"><span>70歳〜</span></label></div>
                </div>
              </div>
              <!--Question1-->

              <div class="step radios_wrap not_last column2" data-title="現在のご職業は？">
                <div class="wrapper">
                  <div class="label_wrap"><label><input type="radio" name="work" value="00"
                        form="search_form"><span>指定なし</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="work" value="01"
                        form="search_form"><span>正社員/公務員</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="work" value="02"
                        form="search_form"><span>派遣/契約社員</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="work" value="03"
                        form="search_form"><span>パート/アルバイト</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="work" value="04"
                        form="search_form"><span>自営業/フリーランス</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="work" value="05"
                        form="search_form"><span>学生</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="work" value="06"
                        form="search_form"><span>主婦</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="work" value="07"
                        form="search_form"><span>その他</span></label></div>
                </div>
                <div class="button_wrap">
                  <button type="button" class="prev">戻る</button>
                </div>
              </div>
              <!--Question2-->

              <div class="step radios_wrap not_last column2" data-title="いつまでに借りたいですか？">
                <div class="wrapper">
                  <div class="label_wrap"><label><input type="radio" name="order_time" value="00"
                        form="search_form"><span>指定なし</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="order_time" value="01"
                        form="search_form"><span>今日中に借りたい</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="order_time" value="02"
                        form="search_form"><span>2~3日以内</span></label></div>
                  <div class="label_wrap"><label><input type="radio" name="order_time" value="03"
                        form="search_form"><span>1週間以内</span></label></div>
                </div>
                <div class="button_wrap">
                  <button type="button" class="prev">戻る</button>
                </div>
              </div>
              <!--Question3-->

              <div class="step radios_wrap column2 touch_submit"
                data-title="過去に借入経験のある会社はありますか？<br><small>（ない場合は選択せずに『結果画面へ』をタップ）</small>">
                <div class="wrapper">
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="01"
                        form="search_form"><span>プロミス</span></label>
                  </div>
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="02"
                        form="search_form"><span>アコム</span></label>
                  </div>
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="03"
                        form="search_form"><span>アイフル</span></label>
                  </div>
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="04"
                        form="search_form"><span>SMBCモビット</span></label>
                  </div>
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="05"
                        form="search_form"><span>三菱UFJ銀行</span></label>
                  </div>
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="06"
                        form="search_form"><span>楽天銀行</span></label>
                  </div>
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="07"
                        form="search_form"><span>レイク</span></label>
                  </div>
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="08"
                        form="search_form"><span>三井住友銀行</span></label>
                  </div>
                  <div class="label_wrap"><label><input type="radio" name="occupation" value="09"
                        form="search_form"><span>三井住友カード</span></label>
                  </div>
                </div>
                <div class="button_wrap">
                  <button type="button" class="prev">戻る</button>
                  <button type="submit" class="search_start" form="search_form">結果画面へ</button>
                </div>
              </div>
              <!--Question4-->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>