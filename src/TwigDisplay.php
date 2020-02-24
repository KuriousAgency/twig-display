<?php
/**
 * Twig Display plugin for Craft CMS 3.x
 *
 * Use twig to render what you need.
 *
 * @link      https://kurious.agency
 * @copyright Copyright (c) 2020 Kurious Agency
 */

namespace kuriousagency\twigdisplay;

use kuriousagency\twigdisplay\fields\TwigDisplayField as TwigDisplayFieldField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class TwigDisplay
 *
 * @author    Kurious Agency
 * @package   TwigDisplay
 * @since     1.0.0
 *
 */
class TwigDisplay extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var TwigDisplay
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = TwigDisplayFieldField::class;
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'twig-display',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
