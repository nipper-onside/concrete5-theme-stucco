<?php
namespace Concrete\Package\ThemeStucco\Block\StuccoDescriptionListBlock;
defined("C5_EXECUTE") or die("Access Denied.");
use Concrete\Core\Block\BlockController;
use Core;
use Loader;
use \File;
use Page;
use URL;
use \Concrete\Core\Editor\Snippet;
use Sunra\PhpSimple\HtmlDomParser;
use \Concrete\Core\Editor\LinkAbstractor;

class Controller extends BlockController
{
    public $helpers = array (
  0 => 'form',
);
    public $btFieldsRequired = array (
);
    protected $btExportFileColumns = array (
);
    protected $btTable = 'btStuccoDefinitionListBlock';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = 0;
    protected $btDefaultSet = 'theme_stucco';

    public function getBlockTypeDescription()
    {
        return t("Add a description list.");
    }

    public function getBlockTypeName()
    {
        return t("Description List");
    }

    public function getSearchableContent()
    {
        $content = array();
        $content[] = $this->DefinitionTerm;
        $content[] = $this->DefinitionDescription;
        return implode(" ", $content);
    }

    public function view()
    {
        $db = \Database::get();
        $this->set('DefinitionTerm', LinkAbstractor::translateFrom($this->DefinitionTerm));
        $this->set('DefinitionDescription', LinkAbstractor::translateFrom($this->DefinitionDescription));
    }

    public function add()
    {
        $this->requireAsset('redactor');
        $this->requireAsset('core/file-manager');
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    public function edit()
    {
        $db = \Database::get();
        $this->requireAsset('redactor');
        $this->requireAsset('core/file-manager');
        $this->set('DefinitionTerm', LinkAbstractor::translateFromEditMode($this->DefinitionTerm));
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    public function save($args)
    {
        $db = \Database::get();
        $args['DefinitionTerm'] = LinkAbstractor::translateTo($args['wysiwyg-ft-DefinitionTerm']);
        $args['DefinitionDescription'] = LinkAbstractor::translateTo($args['wysiwyg-ft-DefinitionDescription']);
        parent::save($args);
    }

    public function validate($args)
    {
        $e = Loader::helper("validation/error");
        if(in_array("DefinitionTerm",$this->btFieldsRequired) && trim($args["wysiwyg-ft-DefinitionTerm"]) == ""){
            $e->add(t("The %s field is required.", t('Term')));
        }
        if(in_array("DefinitionDescription",$this->btFieldsRequired) && trim($args["wysiwyg-ft-DefinitionDescription"]) == ""){
            $e->add(t("The %s field is required.", t('Description')));
        }
        if(in_array("LastBlock",$this->btFieldsRequired)){
            if(!in_array($args["LastBlock"], array("1"))){
                $e->add(t("The %s field has an invalid value.", t('Last Item')));
            }
        }
        return $e;
    }


}