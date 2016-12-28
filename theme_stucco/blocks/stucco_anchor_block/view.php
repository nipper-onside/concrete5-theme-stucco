<?php   defined("C5_EXECUTE") or die("Access Denied.");
	$id = $controller->getIdentifier();
?>

<?php
    $c = Page::getCurrentPage();
    if ($c->isEditMode()) :?>
		<p style="margin: 0; padding: 2px 10px; border: solid 3px #ccc; background-color: #eee; text-align: center;"><?php  echo t('This is an anchor point (ID: anchor-%s)', $id) ?></p>
<?php  endif;?>
    <div id="anchor-<?php  echo h($id); ?>" class="anchor-sec"></div>
