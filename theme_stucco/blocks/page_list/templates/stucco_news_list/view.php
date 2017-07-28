<?php
defined('C5_EXECUTE') or die("Access Denied.");
$th = Core::make('helper/text');
$c = Page::getCurrentPage();
$dh = Core::make('helper/date'); /* @var $dh \Concrete\Core\Localization\Service\Date */
?>

<?php  if ( $c->isEditMode() && $controller->isBlockEmpty()) { ?>
    <div class="ccm-edit-mode-disabled-item"><?php  echo t('Empty Page List Block.')?></div>
<?php  } else { ?>

<div class="ccm-block-page-list-wrapper">

    <?php  if ($pageListTitle): ?>
        <div class="ccm-block-page-list-header">
            <h5><?php  echo h($pageListTitle)?></h5>
        </div>
    <?php  endif; ?>

    <?php  if ($rssUrl): ?>
        <a href="<?php  echo $rssUrl ?>" target="_blank" class="ccm-block-page-list-rss-feed"><i class="fa fa-rss"></i></a>
    <?php  endif; ?>

    <ul class="ccm-block-page-list-pages news-list">

<?php  if (count($pages) > 0): ?>
    <?php  foreach ($pages as $page):

		// Prepare data for each page being listed...
        $buttonClasses = 'ccm-block-page-list-read-more';
        $entryClasses = 'ccm-block-page-list-page-entry';
		$title = $th->entities($page->getCollectionName());
		$url = $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;
		$description = $page->getCollectionDescription();
		$description = $controller->truncateSummaries ? $th->wordSafeShortText($description, $controller->truncateChars) : $description;
		$description = $th->entities($description);
        $thumbnail = false;
        if ($displayThumbnail) {
            $thumbnail = $page->getAttribute('thumbnail');
        }
        $includeEntryText = false;
        if ($includeName || $includeDescription || $useButtonForLink) {
            $includeEntryText = true;
        }
        if (is_object($thumbnail) && $includeEntryText) {
            $entryClasses = 'ccm-block-page-list-page-entry-horizontal';
        }

        //$date = $dh->formatDateTime($page->getCollectionDatePublic(), true);
		//$date = $dh->date('Y年m月d日',strtotime($page->getCollectionDatePublic()));
		$date = $dh->date( t('F d, Y'),strtotime($page->getCollectionDatePublic()));
		$pubTime = strtotime($page->getCollectionDatePublic());
		$new = ((time() - $pubTime) < (60 * 60 * 24 * 7)) ? '<span class="new">New</span>' : '';
?>

		<li class="<?php  echo $entryClasses?>">
			<dl class="clearfix">
				<dt><?php  echo $date ?></dt>
				<dd class="clearfix">
					<div class="news-list-title clearfix">
						<p><a href="<?php  echo $url ?>" target="<?php  echo $target ?>"><?php  echo $title ?></a><?php  echo $new ?></p>
					</div>
					<?php  if ($includeDescription): ?>
                    <div class="ccm-block-page-list-description">
                        <?php  echo $description ?>
                    </div>
                <?php  endif; ?>
				</dd>
			</dl>
        </li>

	<?php  endforeach; ?>
<?php  else: ?>
		<li><p><?php  echo t('No announcements to this news.')?></p></li>
<?php  endif; ?>
    </ul>

    <?php  if (count($pages) == 0): ?>
        <div class="ccm-block-page-list-no-pages"><?php  echo h($noResultsMessage)?></div>
    <?php  endif;?>

</div><!-- end .ccm-block-page-list -->


<?php  if ($showPagination): ?>
    <?php //echo $pagination;?>
    <?php
    $pagination = $list->getPagination();
    if ($pagination->getTotalPages() > 1) {
        $options = array(
            'prev_message' => t('Previous'),
            'next_message' => t('Next'),
            'css_container_class' => 'st-pagination pagination',
        );
        echo $pagination->renderDefaultView($options);
    }
    ?>

<?php  endif; ?>

<?php  } ?>