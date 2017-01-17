<?php defined('C5_EXECUTE') or die(_("Access Denied."));

$c = Page::getCurrentPage();
if ($tableName) { ?>

<div class="stucco-express-entry-list-header">
    <h2><?php echo $tableName?></h2>

    <?php if ($tableDescription) {  ?>
        <p><?php echo $tableDescription?></p>
    <?php } ?>
</div>

<?php }

if ($entity) { ?>

    <?php if ($enableSearch) { ?>
        <form method="get" action="<?php echo $c->getCollectionLink()?>">
            <div class="form-inline">
                <div class="form-group">
                    <?php echo $form->label('keywords', t('Keyword Search'))?>
                    <?php echo $form->text('keywords')?>
                </div>
                <button type="submit" class="btn btn-primary" name="search"><?php echo t('Search')?></button>
                <?php if (count($tableSearchProperties)) { ?>
                    <a href="#" data-express-entry-list-advanced-search="<?php echo $bID?>"
                       class="ccm-block-express-entry-list-advanced-search"><?php echo t('Advanced Search')?></a>
                <?php } ?>
            </div>

            <?php if (count($tableSearchProperties)) { ?>
                <div data-express-entry-list-advanced-search-fields="<?php echo $bID?>"
                     class="ccm-block-express-entry-list-advanced-search-fields">
                    <input type="hidden" name="advancedSearchDisplayed" value="">
                    <?php foreach($tableSearchProperties as $ak) { ?>
                        <h4><?php echo $ak->getAttributeKeyDisplayName()?></h4>
                        <div>
                        <?php echo $ak->render(new \Concrete\Core\Attribute\Context\BasicSearchContext(), null, true)?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <br/>
        </form>
    <?php }

    $results = $result->getItemListObject()->getResults();

    if (count($results)) { ?>


        <table
            id="ccm-block-express-entry-list-table-<?php echo $bID?>"
            class="table ccm-block-express-entry-list-table <?php if ($tableStriped) { ?><?php } ?>">
            <thead>
            <tr>
            <?php foreach($result->getColumns() as $column) {
                ?>
                <th class="<?php echo $column->getColumnStyleClass()?>"><a href="<?php echo $column->getColumnSortURL()?>"><?php echo $column->getColumnTitle()?></a></th>
            <?php } ?>
            </tr>
            </thead>
            <tbody>
            <?php
            $rowClass = 'ccm-block-express-entry-list-row-a';

            foreach($result->getItems() as $item) { ?>
                <tr class="<?php echo $rowClass?>">
                <?php foreach($item->getColumns() as $column) {
                    if ($controller->linkThisColumn($column)) { ?>
                        <td><a href="<?php echo URL::to($detailPage, 'view_express_entity', $item->getEntry()->getId())?>"><?php echo $column->getColumnValue($item);?></a></td>
                    <?php } else { ?>
                        <td><?php echo $column->getColumnValue($item);?></td>
                    <?php }  ?>
                <?php

                }
                $rowClass = ($rowClass == 'ccm-block-express-entry-list-row-a') ? 'ccm-block-express-entry-list-row-b' : 'ccm-block-express-entry-list-row-a';

                ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <?php if ($pagination) { ?>
            <?php echo $pagination ?>
        <?php } ?>


        <style type="text/css">
            <?php if ($headerBackgroundColor) { ?>
            #ccm-block-express-entry-list-table-<?php echo $bID?> thead th {
                background-color: <?php echo $headerBackgroundColor?>;
            }
            <?php } ?>
            <?php if ($headerTextColor) { ?>
            #ccm-block-express-entry-list-table-<?php echo $bID?> thead th,
            #ccm-block-express-entry-list-table-<?php echo $bID?> thead th a {
                color: <?php echo $headerTextColor?>;
            }
            #ccm-block-express-entry-list-table-<?php echo $bID?> thead th.ccm-results-list-active-sort-asc a:after {
                border-color: transparent transparent <?php echo $headerTextColor?> transparent;
            }
            #ccm-block-express-entry-list-table-<?php echo $bID?> thead th.ccm-results-list-active-sort-desc a:after {
                border-color: <?php echo $headerTextColor?> transparent transparent transparent;
            }
            <?php } ?>
            <?php if ($headerBackgroundColorActiveSort) { ?>
            #ccm-block-express-entry-list-table-<?php echo $bID?> thead th.ccm-results-list-active-sort-asc,
            #ccm-block-express-entry-list-table-<?php echo $bID?> thead th.ccm-results-list-active-sort-desc {
                background-color: <?php echo $headerBackgroundColorActiveSort?>;
            }
            <?php } ?>

            <?php if ($rowBackgroundColorAlternate && $tableStriped) { ?>
            #ccm-block-express-entry-list-table-<?php echo $bID?> > tbody > tr.ccm-block-express-entry-list-row-b td {
                background-color: <?php echo $rowBackgroundColorAlternate?>;
            }
            <?php } ?>

        </style>

    <script type="text/javascript">
        $(function() {
            $.concreteExpressEntryList({
                'bID': '<?php echo $bID?>'
            });
        });
    </script>

    <?php } else { ?>

        <p><?php echo t('No "%s" entries can be found', $entity->getName())?>

    <?php } ?>


<?php } ?>