<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<aside class="sidebar">
<?php 
	$c = Page::getCurrentPage();
	$cp = new Permissions($c);
	if ($cp->canViewPageVersions()) {
		$stack = Stack::getByID($stID);
	} else {
		$stack = Stack::getByID($stID, 'ACTIVE');
	}
	if (is_object($stack)) {
		$ax = Area::get($stack, STACKS_AREA_NAME);
		$axp = new Permissions($ax);
		if ($axp->canRead()) {
            $ax->disableControls();
			$ax->display($stack);
		}
	}
?>
</aside>