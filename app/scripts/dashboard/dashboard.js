(function($) {
  'use strict';

  /******** Notification ********/
  noty({
   theme: 'app-noty',
    text: '',
    type: 'success',
    timeout: 10000,
    layout: 'topRight',
    closeWith: ['button', 'click'],
    animation: {
      open: 'animated fadeInDown', // Animate.css class names
      close: 'animated fadeOutUp', // Animate.css class names
    }
  });
})(jQuery);
