(function($) {

  'use strict';

  var init = function() {
    initSort();
    initLog();
  };


  function initSort() {
    var $filters    = $('[data-filter]'),
        $categories = $('[data-category]');

    $filters.on('click', function() {
      var $this = $(this),
          $filter = $this.data('filter');

      $filters.removeClass('btn--active');
      $this.addClass('btn--active');

      if ($filter === 'all') {
        $categories.removeClass('products__item--hidden');
      } else {
        $categories.addClass('products__item--hidden');
        $categories.filter('[data-category *= "' + $filter + '"]').removeClass('products__item--hidden');
      };
    });
  };

  function initLog() {
    console.log('lafrutticola');
  };

  init();

})(jQuery);
