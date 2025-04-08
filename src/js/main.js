import $ from 'jquery';

$(function () {
  /* 
    グローバルメニュー
  */
  document.querySelector('.js-trigger').addEventListener('click', function () {
    this.classList.toggle('is-open');
    const el = document.querySelector('.js-navi');
    el.classList.toggle('is-open');
    document.body.classList.toggle('is-fixed');
  });

  if ($('.CountDownItem').length) {
    function updateCountdown() {
      var now = new Date();
      var target = new Date();
      target.setHours(21, 0, 0, 0); // 21:00をターゲット時間に設定

      if (now >= target) {
        target.setDate(target.getDate() + 1); // 21:00を過ぎた場合、翌日の21:00をターゲットに設定
      }

      var diff = target - now;

      if (diff <= 0) {
        $('.CountDown').hide(); // 残り時間が0になったら非表示
        // 本日借り入れも◎の吹き出しも非表示
        if ($('.CardDetail_tooltip').length) {
          $('.CardDetail_tooltip').hide();
        }
      } else {
        var hours = Math.floor(diff / (1000 * 60 * 60));
        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((diff % (1000 * 60)) / 1000);

        $('.hour').text(hours);
        $('.minute').text(minutes);
        $('.second').text(seconds);
      }
    }

    function checkMidnight() {
      var now = new Date();
      if (now.getHours() === 0 && now.getMinutes() === 0 && now.getSeconds() === 0) {
        $('.CountDown').show(); // 0:00に再び表示開始
        updateCountdown(); // カウントダウンを再開
      }
    }

    setInterval(updateCountdown, 1000); // 1秒ごとにカウントダウンを更新
    setInterval(checkMidnight, 1000); // 1秒ごとに0:00をチェック
  }

  /* 
    カードを探す
  */
  if ($('.js-SearchExpand').length) {
    $('.js-search-start').on('click', function () {
      $('.SearchExpand_conseal').hide();
      $('.SearchExpand .content').height('auto');
    });

    var count_ul = $('#step_area .step_count ul');
    if (count_ul.length > 0) {
      var li = [];
      for (let i = 1; i <= $('#step_area .step_body .step').length; i++) {
        li.push('<li' + (i === 1 ? ' class="active"' : '') + '>Q' + i + '</li>');
      }
      count_ul[0].innerHTML = li.join('');
    }
    var first_step = $('#step_area .step_body .step').eq(0);
    var index = $('#step_area .step_body .step').index(first_step);

    countSet(index);
    titleSet(index + 1, first_step.data('title'));

    // 単一選択ラベルクリック
    $(document).on('click', '#step_area .step_body .step.radios_wrap.not_last label', function (e) {
      var step = $(this).closest('.step');
      var next_step = step.next('.step');
      var index = $('#step_area .step_body .step').index(next_step);

      countSet(index);
      titleSet(index + 1, next_step.data('title'));

      step.removeClass('open');
      next_step.addClass('open');
    });

    // 戻るボタンクリック
    $(document).on('click', '#step_area .step_body .step button.prev', function (e) {
      var step = $(this).closest('.step');
      var prev_step = step.prev('.step');
      var index = $('#step_area .step_body .step').index(prev_step);

      countSet(index);
      titleSet(index + 1, prev_step.data('title'));

      step.removeClass('open');
      prev_step.addClass('open');
    });

    // 次へボタンクリック
    $(document).on('click', '#step_area .step_body .step button.next', function (e) {
      var step = $(this).closest('.step');
      var next_step = step.next('.step');
      var index = $('#step_area .step_body .step').index(next_step);

      countSet(index);
      titleSet(index + 1, next_step.data('title'));

      step.removeClass('open');
      next_step.addClass('open');
    });

    function titleSet(i, String) {
      $('#step_area .step_title')[0].innerHTML = '<span>Q' + i + '</span>' + String;
    }

    function countSet(index) {
      for (let i = 0; i <= index; i++) {
        if (!$('#step_area .step_count ul li').eq(i).hasClass('active'))
          $('#step_area .step_count ul li').removeClass('active');
        $('#step_area .step_count ul li').eq(i).addClass('active');
      }
    }
  }

  /* 
    アコーディオン
  */
  $('.js-accordion').on('click', function () {
    $(this).next().slideToggle();
    $(this).toggleClass('active');
  });

  /* 
     比較表の星をfillする
  */
  if ($('.js-rate').length) {
    function setRatings() {
      $('.js-rate').each(function () {
        const rateElement = $(this);
        const rating = parseFloat(rateElement.text().trim());
        const svgElement = rateElement.prev('.rating'); // .js-rateの次にある.ratingを取得

        if (svgElement.length) {
          const stars = svgElement.find('.star');
          stars.each(function () {
            const index = parseInt($(this).attr('data-index'), 10);
            if (index <= Math.floor(rating)) {
              $(this).addClass('filled'); // 完全に塗りつぶす
              $(this).css('fill', 'var(--gold, #FFEA05)');
            } else if (index === Math.ceil(rating)) {
              const fraction = rating % 1;
              $(this).css('fill', `url(#partial-fill-${index}-${Math.random()})`);
              createPartialFill($(this)[0], fraction, index);
            } else {
              $(this).removeClass('filled');
              $(this).css('fill', 'white'); // 塗りつぶさない部分を白に
            }
          });
        }
      });
    }

    function createPartialFill(star, fraction, index) {
      const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
      const linearGradient = document.createElementNS(
        'http://www.w3.org/2000/svg',
        'linearGradient'
      );
      const gradientId = `partial-fill-${index}-${Math.random()}`;
      linearGradient.setAttribute('id', gradientId);
      linearGradient.setAttribute('x1', '0%');
      linearGradient.setAttribute('y1', '0%');
      linearGradient.setAttribute('x2', '100%');
      linearGradient.setAttribute('y2', '0%');

      const stop1 = document.createElementNS('http://www.w3.org/2000/svg', 'stop');
      stop1.setAttribute('offset', `${fraction * 100}%`);
      stop1.setAttribute('style', 'stop-color:var(--gold, #FFEA05);stop-opacity:1');

      const stop2 = document.createElementNS('http://www.w3.org/2000/svg', 'stop');
      stop2.setAttribute('offset', `${fraction * 100}%`);
      stop2.setAttribute('style', 'stop-color:white;stop-opacity:1');

      linearGradient.appendChild(stop1);
      linearGradient.appendChild(stop2);
      defs.appendChild(linearGradient);
      star.parentNode.insertBefore(defs, star);

      // Apply the gradient
      star.style.fill = `url(#${gradientId})`;
    }

    // DOMが完全に読み込まれた後にすべての評価を設定
    setRatings();
  }

  /* 
    3選のタブ切り替え
  */
  if ($('.TabTables_tab').length) {
    $('.TabTables_tab').on('click', function () {
      const index = $(this).index();
      const parentTabTables = $(this).closest('.TabTables');

      // タブのアクティブ状態を切り替え
      parentTabTables.find('.TabTables_tab').removeClass('is-active');
      $(this).addClass('is-active');

      // 対応するテーブルをfadeInで表示し、それ以外を非表示にする
      parentTabTables.find('.TabTable').hide();
      parentTabTables.find(`.TabTable[data-table="${index}"]`).fadeIn();
    });

    // 初期状態で最初のテーブルをfadeInで表示
    $('.TabTables').each(function () {
      $(this).find('.TabTable').hide();
      $(this).find('.TabTable[data-table="0"]').fadeIn();
    });
  }

  /* 
    数字のカウントアップ
  */
  if ($('.js-inview-value').length) {
    function countUp(element, start, end, duration) {
      let current = start;
      const increment = (end - start) / (duration / 16); // 16msごとに更新 (約60fps)
      const interval = setInterval(() => {
        current += increment;
        if (current >= end) {
          current = end;
          clearInterval(interval);
        }
        element.text(Math.floor(current).toLocaleString());
      }, 16);
    }

    function checkInView() {
      $('.js-inview-value').each(function () {
        const element = $(this).find('em');
        const targetValue = parseInt(element.text().replace(/,/g, ''), 10);
        const offsetTop = $(this).offset().top;
        const scrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();

        if (scrollTop + windowHeight > offsetTop && !$(this).hasClass('counted')) {
          $(this).addClass('counted');
          countUp(element, 0, targetValue, 500); // 0.5秒間でカウントアップ
          setTimeout(() => {
            element.animate({ fontSize: '22px' }, 200).animate({ fontSize: '20px' }, 200); // カウントアップ後に文字サイズを20%大きくして元に戻す
          }, 500); // countUpのdurationと同じ時間を待つ
        }
      });
    }

    // 初回チェック
    checkInView();

    // スクロールイベントでチェック
    $(window).on('scroll', checkInView);
  }

  /* 
    低金利ページタブ切り替え
  */
  if ($('.wrapper .tab li').length) {
    $('.wrapper .tab li').on('click', function () {
      const index = $(this).index();

      // タブのアクティブ状態を切り替え
      $('.wrapper .tab li').removeClass('is-active');
      $(this).addClass('is-active');

      // 対応するコンテンツを表示し、それ以外を非表示にする
      $('.wrapper .contents').hide();
      $(`.wrapper .contents[data-index="${index}"]`).fadeIn();
    });

    // 初期状態で最初のコンテンツを表示
    $('.wrapper .contents').hide();
    $('.wrapper .contents[data-index="0"]').fadeIn();
  }
});
