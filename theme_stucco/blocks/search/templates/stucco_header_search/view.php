<?php  defined('C5_EXECUTE') or die('Access Denied.');

if (isset($error)) {
    ?><?php  echo $error?><br/><br/><?php 
}

if (!isset($query) || !is_string($query)) {
    $query = '';
}

?>
<div class="search-container" role="search">
<form action="<?php  echo $view->url($resultTargetURL)?>" method="get" class="ccm-search-block-form">
<div class="search-inner clearfix">
<?php  if (isset($title) && ($title !== '')): ?>
	<h3><?php  echo h($title)?></h3>
<?php  endif; ?>

<?php  if ($query === ''): ?>
	<input name="search_paths[]" type="hidden" value="<?php  echo htmlentities($baseSearchPath, ENT_COMPAT, APP_CHARSET) ?>" />
<?php  elseif (isset($_REQUEST['search_paths']) && is_array($_REQUEST['search_paths'])): ?>
	<?php  foreach ($_REQUEST['search_paths'] as $search_path): ?>
        <input name="search_paths[]" type="hidden" value="<?php  echo htmlentities($search_path, ENT_COMPAT, APP_CHARSET) ?>" />
	<?php  endforeach; ?>
<?php  endif; ?>
    <input name="query" type="text" value="<?php  echo htmlentities($query, ENT_COMPAT, APP_CHARSET)?>" class="search-input" />
<?php  if (isset($buttonText) && ($buttonText !== '')): ?>
	<div class="search-btn-inner clearfix">
		<input name="submit" type="submit" value="<?php  echo h($buttonText)?>" class="search-submit" /><i class="fa fa-search"></i>
	</div>
<?php  endif; ?>
</div>
<?php  if (isset($do_search) && $do_search): ?>
	<?php  if (count($results) == 0): ?>
	<h4 style="margin-top:32px"><?php  echo t('There were no results found. Please try another keyword or phrase.')?></h4>
	<?php  else: ?>
	<?php  $tt = Core::make('helper/text'); ?>
	<?php  endif; ?>
	<div id="searchResults">
	<?php  foreach ($results as $r): ?>
	<?php  $currentPageBody = $this->controller->highlightedExtendedMarkup($r->getPageIndexContent(), $query); ?>
		<div class="searchResult">
			<h3><a href="<?php  echo $r->getCollectionLink()?>"><?php  echo $r->getCollectionName()?></a></h3>
			<p>
				<?php  if ($r->getCollectionDescription()): ?>
				<?php  echo $this->controller->highlightedMarkup($tt->shortText($r->getCollectionDescription()), $query); ?>
				<br/>
				<?php  endif; ?>
				<?php  echo $currentPageBody; ?>
				<a href="<?php  echo $r->getCollectionLink()?>" class="pageLink"><?php  echo $this->controller->highlightedMarkup($r->getCollectionLink(), $query)?></a>
			</p>
		</div>

	</div>
		<?php  $pages = $pagination->getCurrentPageResults();
            if ($pagination->getTotalPages() > 1 && $pagination->haveToPaginate()) {
                $showPagination = true;
                echo $pagination->renderDefaultView();
            }
		?>
	<?php  endforeach; ?>
<?php  endif ?>

</form></div><?php 
