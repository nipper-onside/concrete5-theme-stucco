$(function() {
    $('.ccm-block-feature-item-hover-wrapper').tooltip();
    $('.ccm-block-feature-item-hover-wrapper').on('shown.bs.tooltip', function () {
        $('.tooltip').addClass('animated bounceInDown');
        $(this).find('.ccm-block-feature-item-hover-icon').addClass('hover');
    }).on('hide.bs.tooltip', function () {
        $('.tooltip').removeClass('animated bounceInDown');
         $('.ccm-block-feature-item-hover-icon').removeClass('hover');
    });
});
