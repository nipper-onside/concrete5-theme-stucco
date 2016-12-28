<?php 
namespace Concrete\Package\ThemeStucco\Block\StuccoHeading;
defined("C5_EXECUTE") or die("Access Denied.");
use Concrete\Core\Block\BlockController;
use Core;
use Loader;

class Controller extends BlockController
{
    public $helpers = array (
  0 => 'form',
);
    public $btFieldsRequired = array (
);
    protected $btExportFileColumns = array (
);
    protected $btTable = 'btStuccoHeading';
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
        return t("Displays a heading with style options.");
    }

    public function getBlockTypeName()
    {
        return t("Advanced Heading");
    }

    public function getSearchableContent()
    {
        $content = array();
        $content[] = $this->headingWords;
        return implode(" ", $content);
    }

    public function add()
    {
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    public function edit()
    {
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    public function validate($args)
    {
        $e = Loader::helper("validation/error");
        if (in_array("headingWords", $this->btFieldsRequired) && trim($args["headingWords"]) == "") {
            $e->add(t("The %s field is required.", t('Heading Text')));
        }
        if(in_array("headingType",$this->btFieldsRequired)){
            if(!in_array($args["headingType"], array("h1", "h2", "h3", "h4", "h5", "h6"))){
                $e->add(t("The %s field has an invalid value.", t('Formatting')));
            }
        }
        if(in_array("decorationType",$this->btFieldsRequired)){
            if(!in_array($args["decorationType"], array("left-border", "double-line", "under-line", "dot-under-line"))){
                $e->add(t("The %s field has an invalid value.", t('Style Option')));
            }
        }
        return $e;
    }


}