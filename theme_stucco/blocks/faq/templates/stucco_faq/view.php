<?php  defined('C5_EXECUTE') or die("Access Denied.");
$linkCount = 1;
$faqEntryCount = 1; ?>
<div class="stucco-faq-container">
    <?php  if (count($rows) > 0) { ?>
        <div class="stucco-faq-block-links">
            <?php  foreach ($rows as $row) { ?>
                <a href="#anchor-<?php  echo $bID . $linkCount ?>"><?php  echo $row['linkTitle'] ?></a>
                <?php  $linkCount++;
            } ?>
        </div>
        <div class="stucco-faq-block-entries">
            <?php  foreach ($rows as $row) { ?>
                <div id="anchor-<?php  echo $bID . $faqEntryCount ?>" class="faq-entry-content">
                    <h3><?php  echo $row['title'] ?></h3>
                    <?php  echo $row['description'] ?>
                </div>
                <?php  $faqEntryCount++;
            } ?>
        </div>
    <?php  } else { ?>
        <div class="stucco-faq-block-links">
            <p><?php  echo t('No Faq Entries Entered.'); ?></p>
        </div>
    <?php  } ?>
</div>
