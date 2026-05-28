// スクロールに応じてヘッダーを固定
function initStickyHeader() {
  let lastScrollTop = 0;
  window.addEventListener('scroll', function() {
    const header = document.querySelector('.js-header');
    const mainContent = document.querySelector('.js-main');
    const headerHeight = header.offsetHeight;
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // ビューポートの幅が768px以下の場合のみ実行
    if (window.innerWidth <= 768) {
      if (scrollTop > 32) {
        header.classList.add('is-fixed-sp');
        mainContent.style.marginTop = `${headerHeight}px`;
      } else {
        header.classList.remove('is-fixed-sp');
        mainContent.style.marginTop = '0';
      }
    } else {
      if (scrollTop > headerHeight) {
        header.classList.add('is-fixed');
        mainContent.style.marginTop = `${headerHeight}px`;
      } else {
        header.classList.remove('is-fixed');
        mainContent.style.marginTop = '0';
      }
    }
    header.style.top = scrollTop < lastScrollTop ? '0' : `-${headerHeight}px`;
    lastScrollTop = scrollTop;
  });
}


function initStickyHeader() {
  let lastScrollTop = 0;
  $(window).on('scroll', function () {
    const header = $('.js-header');
    const mainContent = $('.js-main');
    const headerHeight = header.outerHeight();
    const scrollTop = $(this).scrollTop();
    const windowWidth = $(window).width();

    if (scrollTop > headerHeight) {
      header.addClass('is-fixed');
      mainContent.css('margin-top', headerHeight);
    } else {
      header.removeClass('is-fixed');
      mainContent.css('margin-top', 0);
    }
    if (windowWidth <= 768) {
      if (scrollTop <= 10) {
        header.addClass('is-fixed-sp');
      } else {
        header.removeClass('is-fixed-sp');
      }
    }

    header.css('top', scrollTop < lastScrollTop ? '0px' : -headerHeight);
    lastScrollTop = scrollTop;
  });
}


// SPメニュー
function initSpMenu() {
  var burger = document.querySelector('.-btn-burger');
  var header = document.querySelector('.js-header');
  burger.addEventListener('click', function() {
    header.classList.toggle('menu-open');
  });
}

// アコーディオン
function initAccordion(autoClose) {
  const accordionHeaders = document.querySelectorAll('.js-ac-head');
  accordionHeaders.forEach(header => {
    header.addEventListener('click', function() {
      const content = header.nextElementSibling;
      if (autoClose) {
        accordionHeaders.forEach(h => {
          if (h !== header) {
            h.classList.remove('open');
            h.nextElementSibling.style.display = 'none';
          }
        });
      }
      header.classList.toggle('open');
      if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
      } else {
        content.style.display = 'none';
      }
    });
  });
}

// タブ
function initTab() {
  const tabs = [...document.getElementsByClassName('js-tab')];
  tabs.forEach(tab => {
    tab.addEventListener('click', tabSwitch, false);
  });
  function tabSwitch(){
    const activeTab = document.querySelector('.is-active');
    const showTab = document.querySelector('.is-show');
    const index = tabs.indexOf(this);
    if(activeTab) {
      activeTab.classList.remove('is-active');
    }
    if(showTab) {
      showTab.classList.remove('is-show');
    }
    this.classList.add('is-active');
    document.getElementsByClassName('js-tabInner')[index].classList.add('is-show');
  };
}

function initializePageInteractions() {
  initStickyHeader();
  initSpMenu();
  initAccordion(false);
  initTab();
}

// ページが読み込まれた後に関数を実行
document.addEventListener('DOMContentLoaded', function() {
  initializePageInteractions();
});
