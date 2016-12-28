$(function() {
    $('.ccm-block-feature-item-hover-wrapper').tooltip();
    $('.ccm-block-feature-item-hover-wrapper').on('shown.bs.tooltip', function () {
        $('.tooltip').addClass('animated bounceInDown');
    }).on('hide.bs.tooltip', function () {
        $('.tooltip').removeClass('animated bounceInDown');
    });
});
