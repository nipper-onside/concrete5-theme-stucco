<?php  defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
?>

<div class="q-a-container">
<?php  if (count($rows) > 0) : ?>
	<?php  foreach ($rows as $row) : ?>
<dl class="q-a-contents">
	<dt class="q-a-block-links clearfix">
		<div class="bubble-wrapper">
            <div class="bubble question">Q</div>
        </div><?php  echo $row['linkTitle'] ?>
	</dt>
	<dd class="q-a-block-entries clearfix"<?php  if ($c->isEditMode()): ?> style="display: block !important;"<?php  endif; ?>>
		<div class="bubble-wrapper">
            <div class="bubble answer">A</div>
        </div>
		<?php  echo $row['description'] ?>
	</dd>
</dl>
	<?php  endforeach; ?>
<?php  else: ?>
	<div class="ccm-faq-block-links">
		<p><?php  echo t('No Faq Entries Entered.'); ?></p>
	</div>
<?php  endif; ?>
</div>
