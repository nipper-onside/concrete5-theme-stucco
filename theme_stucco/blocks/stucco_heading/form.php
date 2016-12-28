<?php   defined("C5_EXECUTE") or die("Access Denied."); ?>

<div class="form-group">
    <?php   echo $form->label("headingWords", t("Heading Text")); ?>
    <?php   echo isset($btFieldsRequired) && in_array('headingWords', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php   echo $form->text("headingWords", $headingWords, array (
  'maxlength' => '255',
  'placeholder' => NULL,
)); ?>
</div>

<div class="form-group">
    <?php   echo $form->label("headingType", t("Formatting")); ?>
    <?php   echo (isset($btFieldsRequired) && in_array('headingType', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php   $options = array(
        '' => t('-- None --'),
        'h1' => t('H1'),
        'h2' => t('H2'),
        'h3' => t('H3'),
        'h4' => t('H4'),
        'h5' => t('H5'),
        'h6' => t('H6'),
    ); ?>
    <?php   echo $form->select("headingType", $options, $headingType); ?>
</div>

<div class="form-group">
    <?php   echo $form->label("decorationType", t("Style Option")); ?>
    <?php   echo (isset($btFieldsRequired) && in_array('decorationType', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php   $options = array(
        '' => t('-- None --'),
        'left-border' => t('Left Border'),
        'double-line' => t('Double Lines'),
        'under-line' => t('Under Line'),
        'dot-under-line' => t('Dotted Under Line')
    ); ?>
    <?php   echo $form->select("decorationType", $options, $decorationType); ?>
</div>