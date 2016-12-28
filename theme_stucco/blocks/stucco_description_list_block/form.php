<?php defined("C5_EXECUTE") or die("Access Denied."); ?>

<?php
$fp = FilePermissions::getGlobal();
$tp = new TaskPermission();
?>

<div class="form-group">
    <?php echo $form->label("DefinitionTerm", t("Term")); ?>
    <?php echo (isset($btFieldsRequired) && in_array('DefinitionTerm', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <div id="wysiwyg-ft-DefinitionTerm"><?php echo $DefinitionTerm; ?></div>
    <script type="text/javascript">
        var CCM_EDITOR_SECURITY_TOKEN = "<?php echo Loader::helper('validation/token')->generate('editor')?>";
        $(function () {
            $("#wysiwyg-ft-DefinitionTerm").redactor({
                minHeight: "500",
                "concrete5": {
                    filemanager: <?php echo $fp->canAccessFileManager()?>,
                    sitemap: <?php  echo $tp->canAccessSitemap()?>,
                    lightbox: true
                },
                "plugins": [
                    "fontcolor", "concrete5"
                ]
            });
            $("#wysiwyg-ft-DefinitionTerm").prev().css({opacity: "1"});
        });
    </script>
</div>

<div class="form-group">
    <?php echo $form->label("DefinitionDescription", t("Description")); ?>
    <?php echo (isset($btFieldsRequired) && in_array('DefinitionDescription', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <div id="wysiwyg-ft-DefinitionDescription"><?php echo $DefinitionDescription; ?></div>
    <script type="text/javascript">
        var CCM_EDITOR_SECURITY_TOKEN = "<?php echo Loader::helper('validation/token')->generate('editor')?>";
        $(function () {
            $("#wysiwyg-ft-DefinitionDescription").redactor({
                minHeight: "500",
                "concrete5": {
                    filemanager: <?php echo $fp->canAccessFileManager()?>,
                    sitemap: <?php echo $tp->canAccessSitemap()?>,
                    lightbox: true
                },
                "plugins": [
                    "fontcolor", "concrete5"
                ]
            });
            $("#wysiwyg-ft-DefinitionDescription").prev().css({opacity: "1"});
        });
    </script>
</div>

<div class="form-group">
    <?php echo $form->label("LastBlock", t("Is this a last item of description list group?")); ?>
    <?php echo (isset($btFieldsRequired) && in_array('LastBlock', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php $options = array(
        '' => t('No'),
        '1' => t('Yes')
    ); ?>
    <?php echo $form->select("LastBlock", $options, $LastBlock); ?>
</div>