<?php  defined('C5_EXECUTE') or die("Access Denied.");
if (!function_exists('compat_is_version_8')) {
    function compat_is_version_8() {
        return interface_exists('\Concrete\Core\Export\ExportableInterface');
    }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php  echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php  echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php  echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php  echo Localization::activeLanguage()?>"> <!--<![endif]-->
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <?php Loader::element('header_required', array('pageTitle' => $pageTitle));?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php  echo $view->getThemePath()?>/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php  echo $view->getThemePath()?>/css/bootstrap.css">
        <?php echo $html->css($view->getStylesheet('main.less'))?>

        <script src="<?php echo $view->getThemePath()?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body class="<?php echo $c->getCollectionHandle(); ?><?php if ( !compat_is_version_8() ): ?><?php $u = new User(); if (Config::get('concrete.user.profiles_enabled') && $u->isRegistered()) { echo ' add-account-menu'; } ?><?php endif; ?>">
    	<div class="<?php echo $c->getPageWrapperClass()?>">
        <!--[if lt IE 8]>
            <p class="browserupgrade"><?php echo t('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.')?></p>
        <![endif]-->

        <a class="skip-link screen-reader-text<?php if (User::isLoggedIn()) { echo ' login'; } ?>" href="#main-content"><?php echo t('Skip to content') ?></a>