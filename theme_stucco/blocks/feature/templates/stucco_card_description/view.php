<?php   defined('C5_EXECUTE') or die("Access Denied."); ?>
<?php
//$title = h($title);
/*
if ($linkURL) {
    $title = '<a href="' . $linkURL . '">' . $title . '</a>';
}
*/
?>
<div class="stucco-card-feature-item">
<?php  if ($linkURL) { ?>
    <a href="<?php  echo $linkURL?>">
<?php  } else {?>
	<span>
<?php  } ?>
    <?php  if ($title) { ?>
        <h4><?php  echo h($title)?></h4>
    <?php  } ?>
    	<div class="icon">
    		<i class="fa fa-<?php  echo $icon?>"></i>
    	</div>
    	<div class="card-body">
		<?php
		if ($paragraph) {
			echo $paragraph;
		}
	    ?>
	    </div>
<?php  if ($linkURL) { ?>
    </a>
<?php  } else {?>
	</span>
<?php  } ?>
</div>