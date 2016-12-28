<?php  defined('C5_EXECUTE') or die("Access Denied.");

$navItems = $controller->getNavItems(true); // Ignore exclude from nav
$c = Page::getCurrentPage();

if (count($navItems) > 0) {

    echo '<nav role="navigation" aria-label="breadcrumb">'; //opens the top-level menu
    echo '<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="bread-crumbs clearfix">';

    foreach ($navItems as $num => $ni) {
    	$num++;
        if ($ni->isCurrent) {
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem" class="active"><a itemprop="item" href="' . $ni->url . '" target="' . $ni->target . '"><span itemprop="name">' . $ni->name . '</span></a><meta itemprop="position" content="' .$num. '" /></li>';
        } else {
            echo '<li itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . $ni->url . '" target="' . $ni->target . '"><span itemprop="name">' . $ni->name . '</span></a><meta itemprop="position" content="' .$num. '" /></li>';
        }
    }

    echo '</ol>';
    echo '</nav>'; //closes the top-level menu

} else if (is_object($c) && $c->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item"><?php  echo t('Empty Auto-Nav Block.')?></div>
<?php  }