<?php
namespace Concrete\Package\ThemeStucco\Theme\Stucco;

class PageTheme extends \Concrete\Core\Page\Theme\Theme {

	public function registerAssets() {
        //$this->providesAsset('javascript', 'bootstrap/*');
		$this->providesAsset('css', 'bootstrap/*');
		$this->providesAsset('css', 'blocks/form');
		$this->providesAsset('css', 'core/frontend/*');
		$this->requireAsset('css', 'font-awesome');
		$this->requireAsset('javascript', 'jquery');
		$this->requireAsset('javascript', 'bootstrap/tooltip');
		$this->requireAsset('css', 'bootstrap/tooltip');
		$this->requireAsset('javascript', 'picturefill');
	}

    protected $pThemeGridFrameworkHandle = 'bootstrap3';

    public function getThemeBlockClasses()
    {
		return array(
            'content' => array(
                'block-sidebar-wrapped',
                'block-sidebar-padded',
                'anchor-link-inline',
                'stucco-header-navi'
            ),
            'image' => array(
                'image-border',
                'image-right-tilt',
                'image-circle',
                'image-centering'
            ),
            'feature' => array(
            	'feature-home-page',
            	'narrow-card'
            ),
            'page_list' => array(
                'recent-blog-entry',
                'blog-entry-list',
                'page-list-with-buttons',
                'block-sidebar-wrapped'
            ),
            'autonav' => array(
                'flex-left',
                'flex-center',
                'flex-right',
                'flex-justify'
            ),
            'next_previous' => array(
            	'block-sidebar-wrapped'
            ),
            'share_this_page' => array(
            	'block-sidebar-wrapped'
            ),
            'date_navigation' => array(
            	'block-sidebar-padded'
            ),
            'topic_list' => array(
            	'block-sidebar-wrapped'
            ),
            'testimonial' => array(
            	'testimonial-bio'
            ),
            'search' => array(
            	'block-sidebar-wrapped'
            ),
            'faq' => array(
            	'all-answer-expanding',
            	'first-answer-expanding'
            ),
            'stucco_description_list_block' => array(
            	'description-table'
            ),
            'stucco_heading' => array(
            	'heading-centering',
            	'heading-right'
            ),
            'manual_nav' => array(
            	'header-list-top',
            	'stucco-header-navi'
            )
        );
    }

    public function getThemeAreaClasses()
    {
        return array(
            'Page Footer' => array('area-content-accent')
        );
    }

    public function getThemeDefaultBlockTemplates()
    {
/*
        return array(
            'image' => 'some_special_image_template'
        );
*/

    }

    public function getThemeResponsiveImageMap()
    {
        return array(
            'large' => '900px',
            'medium' => '768px',
            'small' => '0'
        );
    }

    public function getThemeEditorClasses()
    {
        return array(
            array(
            	'title' => t('Title Thin'),
            	'menuClass' => 'title-thin',
            	'spanClass' => 'title-thin'
            ),
            array(
            	'title' => t('Title Bold'),
            	'menuClass' => 'title-bold',
            	'spanClass' => 'title-bold'
            ),
            array(
            	'title' => t('Title Caps'),
            	'menuClass' => 'title-caps',
            	'spanClass' => 'title-caps'
            ),
            array(
            	'title' => t('Headline'),
            	'menuClass' => '',
            	'spanClass' => 'title-headline'
            ),
            array(
            	'title' => t('Subhead'),
            	'menuClass' => '',
            	'spanClass' => 'title-subhead'
            ),
            array(
            	'title' => t('Image Caption'),
            	'menuClass' => 'image-caption',
            	'spanClass' => 'image-caption'
            ),
            array(
            	'title' => t('Standard Button'),
				'menuClass' => '',
				'spanClass' => 'btn btn-default'
			),
            array(
            	'title' => t('Success Button'),
            	'menuClass' => '',
            	'spanClass' => 'btn btn-success'
            ),
            array(
            	'title' => t('Primary Button'),
            	'menuClass' => '',
            	'spanClass' => 'btn btn-primary'
            ),
            array(
            	'title' => t('Link Mark'),
            	'menuClass' => 'link-mark',
            	'spanClass' => 'link-mark'
            )

        );
    }

}
