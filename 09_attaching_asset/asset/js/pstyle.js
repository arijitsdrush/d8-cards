(function ($, Drupal) {
    Drupal.behaviors.asset = {
        attach: function (context, settings) {
            $('#block-bartik-powered span').html('Powered By Drupal Community');
        }
    };
})(jQuery, Drupal);