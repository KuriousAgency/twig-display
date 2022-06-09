<?php
/**
 * Twig Display plugin for Craft CMS 3.x
 *
 * Use twig to render what you need.
 *
 * @link      https://kurious.agency
 * @copyright Copyright (c) 2020 Kurious Agency
 */

namespace webdna\twigdisplay\fields;

use webdna\twigdisplay\TwigDisplay;
use webdna\twigdisplay\assetbundles\twigdisplayfield\TwigDisplayFieldAsset;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\helpers\Db;
use yii\db\Schema;
use craft\helpers\Json;

/**
 * @author    Kurious Agency
 * @package   TwigDisplay
 * @since     1.0.0
 */
class TwigDisplayField extends Field
{
	// Public Properties
	// =========================================================================

	/**
	 * @var string
	 */
	public $data = "";

	// Static Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public static function displayName(): string
	{
		return Craft::t("twig-display", "Twig Display");
	}

	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		$rules = parent::rules();
		$rules = array_merge($rules, [["data", "string"]]);
		return $rules;
	}

	/**
	 * @inheritdoc
	 */
	public function getContentColumnType(): string
	{
		return Schema::TYPE_TEXT;
	}

	/**
	 * @inheritdoc
	 */
	public function normalizeValue($value, ElementInterface $element = null)
	{
		return $value;
	}

	/**
	 * @inheritdoc
	 */
	public function serializeValue($value, ElementInterface $element = null)
	{
		return parent::serializeValue($value, $element);
	}

	/**
	 * @inheritdoc
	 */
	public function getSettingsHtml()
	{
		// Render the settings template
		return Craft::$app
			->getView()
			->renderTemplate(
				"twig-display/_components/fields/TwigDisplayField_settings",
				[
					"field" => $this,
				]
			);
	}

	/**
	 * @inheritdoc
	 */
	public function getInputHtml(
		$value,
		ElementInterface $element = null
	): string {
		return Craft::$app
			->getView()
			->renderString($this->data, [
				"value" => $value,
				"element" => $element,
			]);
	}
}
