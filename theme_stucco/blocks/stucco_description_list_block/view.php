<?php defined("C5_EXECUTE") or die("Access Denied.");
$class = array();

// If this block is a last item of defenition list group
if ($LastBlock) {
    $class[] = 'last';
}
?>

<dl class="<?php echo implode(" ", $class) ?>">
    <dt><?php echo $DefinitionTerm; ?></dt>
<?php if (isset($DefinitionDescription) && trim($DefinitionDescription) != ""){ ?>
    <dd><?php echo $DefinitionDescription; ?></dd>
<?php } ?>

</dl>