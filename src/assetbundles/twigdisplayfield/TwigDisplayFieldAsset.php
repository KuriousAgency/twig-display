<?php
/**
 * Twig Display plugin for Craft CMS 3.x
 *
 * Use twig to render what you need.
 *
 * @link      https://webdna.co.uk
 * @copyright Copyright (c) 2020 webdna
 */

namespace webdna\twigdisplay\assetbundles\twigdisplayfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    webdna
 * @package   TwigDisplay
 * @since     1.0.0
 */
class TwigDisplayFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        $this->sourcePath = "@webdna/twigdisplay/assetbundles/twigdisplayfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/TwigDisplayField.js',
        ];

        $this->css = [
            'css/TwigDisplayField.css',
        ];

        parent::init();
    }
}
