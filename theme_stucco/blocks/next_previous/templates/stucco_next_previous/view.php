<?php
defined('C5_EXECUTE') or die("Access Denied.");

if (!$previousLinkURL && !$nextLinkURL && !$parentLabel) {
    return false;
}
?>

<div class="st-next-previous-wrapper">
	<div class="st-previous-container">
    <?php
    if ($previousLinkURL && $previousLabel) {
        ?>
        <div class="st-next-previous-header">
            <h5><?php echo $previousLabel ?></h5>
        </div>
        <?php
    }

    if ($previousLinkText) {
        ?>
        <p class="st-next-previous-previous-link">
            <?php echo $previousLinkURL ? '<a href="' . $previousLinkURL . '">' . $previousLinkText . '</a>' : '' ?>
        </p>
        <?php
    } ?>
	</div>

	<?php
    if ($parentLabel) {
    ?>
    <div class="st-top-container">
        <p class="st-next-previous-parent-link">
            <?php echo $parentLinkURL ? '<a href="' . $parentLinkURL . '">' . $parentLabel . '</a>' : '' ?>
        </p>
    </div>
    <?php
    }
    ?>

	<div class="st-next-container">
	<?php
    if ($nextLinkURL && $nextLabel) {
        ?>
        <div class="st-next-previous-header">
            <h5><?php echo $nextLabel ?></h5>
        </div>
        <?php
    }

    if ($nextLinkText) {
        ?>
        <p class="st-next-previous-next-link">
            <?php echo $nextLinkURL ? '<a href="' . $nextLinkURL . '">' . $nextLinkText . '</a>' : '' ?>
        </p>
        <?php
    }

    ?>
	</div>
</div>
