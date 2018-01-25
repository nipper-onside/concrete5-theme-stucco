<?php
namespace Concrete\Package\ThemeStucco;

use Package;
use BlockType;
use SinglePage;
use PageTheme;
use BlockTypeSet;
use Loader;
use Page;
use PageType;
use FileImporter;
use Concrete\Core\Page\PageList;
use Concrete\Core\File\FileList;
use Concrete\Core\Page\Stack\StackList;

use \Concrete\Core\Tree\Type\Topic;
use \Concrete\Core\Attribute\Key\CollectionKey as CollectionAttributeKey;
use \Concrete\Core\Backup\ContentImporter;

defined('C5_EXECUTE') or die(_("Access Denied."));

if (!function_exists('compat_is_version_8')) {
    function compat_is_version_8() {
        return interface_exists('\Concrete\Core\Export\ExportableInterface');
    }
}

class Controller extends Package
{

	protected $pkgHandle = 'theme_stucco';
	protected $appVersionRequired = '5.7.5';
	protected $pkgVersion = '2.1.4';
	protected $pkgAllowsFullContentSwap = true;

	public function getPackageDescription()
	{
    	return t("A simple style business theme based on the Bootstrap framework.");
	}

	public function getPackageName()
	{
    	return t("Stucco");
	}

    public function swapContent($options)
    {
        if ($this->validateClearSiteContents($options)) {
            \Core::make('cache/request')->disable();

            $pl = new PageList();
            $pages = $pl->getResults();
            foreach ($pages as $c) {
                $c->delete();
            }

            $fl = new FileList();
            $files = $fl->getResults();
            foreach ($files as $f) {
                $f->delete();
            }

            // clear stacks
            $sl = new StackList();
            foreach ($sl->get() as $c) {
                $c->delete();
            }

            $home = Page::getByID(HOME_CID);
            $blocks = $home->getBlocks();
            foreach ($blocks as $b) {
                $b->deleteBlock();
            }

            $pageTypes = PageType::getList();
            foreach ($pageTypes as $ct) {
                $ct->delete();
            }

            // now we add in any files that this package has
            if (is_dir($this->getPackagePath() . '/content_files')) {
                $ch = new ContentImporter();
                $computeThumbnails = true;
                if ($this->contentProvidesFileThumbnails()) {
                    $computeThumbnails = false;
                }
                $ch->importFiles($this->getPackagePath() . '/content_files', $computeThumbnails);
            }

            // now we parse the content.xml if it exists.

            $ci = new ContentImporter();
			$ci->importContentFile($this->getPackagePath() . '/content_7.xml');

            \Core::make('cache/request')->enable();
        }
    }

	public function install()
	{
    	$pkg = parent::install();
    	BlockTypeSet::add("theme_stucco","Stucco", $pkg);
        BlockType::installBlockTypeFromPackage('stucco_anchor_block', $pkg);
        BlockType::installBlockTypeFromPackage('stucco_description_list_block', $pkg);
        BlockType::installBlockTypeFromPackage('stucco_heading', $pkg);
		PageTheme::add('stucco', $pkg);

		if ( compat_is_version_8() ) {
			$em = \ORM::entityManager();
			$small = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'small']);

		}
		else {
			$small = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('small');
		}
		if (!is_object($small)) {
			if ( compat_is_version_8() ) {
			    $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
			}
			else {
			    $type = new \Concrete\Core\File\Image\Thumbnail\Type\Type();
			}
			$type->setName('Small');
			$type->setHandle('small');
			$type->setWidth(740);
			$type->save();
		}
		if ( compat_is_version_8() ) {
			$em = \ORM::entityManager();
			$medium = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'medium']);

		}
		else {
			$medium = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('medium');
		}
		if (!is_object($medium)) {
			if ( compat_is_version_8() ) {
			    $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
			}
			else {
			    $type = new \Concrete\Core\File\Image\Thumbnail\Type\Type();
			}
			$type->setName('Medium');
			$type->setHandle('medium');
			$type->setWidth(940);
			$type->save();
		}
		if ( compat_is_version_8() ) {
			$em = \ORM::entityManager();
			$large = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'large']);

		}
		else {
			$large = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('large');
		}
		if (!is_object($large)) {
			if ( compat_is_version_8() ) {
			    $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
			}
			else {
			    $type = new \Concrete\Core\File\Image\Thumbnail\Type\Type();
			}
			$type->setName('Large');
			$type->setHandle('large');
			$type->setWidth(1140);
			$type->save();
		}
	}

}
?>