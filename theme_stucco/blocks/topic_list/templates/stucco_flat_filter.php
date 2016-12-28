<?php   defined('C5_EXECUTE') or die("Access Denied."); ?>

<div class="ccm-block-topic-list-flat-filter">
<?php 
$node = $tree->getRootTreeNodeObject();
if (is_object($node)) {
    $node->populateDirectChildrenOnly(); ?>
    <ol class="breadcrumb">
        <li><a href="<?php  echo $view->controller->getTopicLink()?>"
            <?php  if (!$selectedTopicID) { ?>class="ccm-block-topic-list-topic-selected active"<?php  } ?>><?php  echo t('All')?></a></li>

    <?php  foreach($node->getChildNodes() as $child) { ?>
        <li><a href="<?php  echo $view->controller->getTopicLink($child)?>"
                <?php  if (isset($selectedTopicID) && $selectedTopicID == $child->getTreeNodeID()) { ?>
                    class="ccm-block-topic-list-topic-selected active"
                <?php  } ?> ><?php  echo $child->getTreeNodeDisplayName()?></a></li>
    <?php  } ?>
    </ol>
<?php  } ?>
</div>