<?php

/**
 * @package   yii2-datecontrol
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @version   1.9.9
 */

namespace pzavoli71\cookieconsent;

use Exception;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @author Paride Zavoli <paride.zavoli71@gmail.com>
 */
class CookieDialog extends Widget
{
  
    public $uuid;
    /**
     * @var string any custom widget class to use. Will only be used if [[autoWidget]] is set to `false`.
     */
    public $widgetClass;

    /**
     * @var array the configuration options for the widget which will be parsed only in one of the following cases:
     *
     * - when [[autoWidget]] is `true` and this corresponds to widget settings for `DatePicker`, `TimePicker`, or
     *   `DateTimePicker` based on the [[$type]] setting, OR
     * - when [[autoWidget]] is `false` and [[widgetClass]] is set and this allows to set the configuration options for
     *   the particular widget class.
     */
    public $widgetOptions = [];

    /**
     * @var array the HTML attributes for the display input. This property is applicable and parsed only if
     * [[autoWidget]] is `false` and [[widgetClass]] is empty or not set. For a widget, the [[widgetOptions]] must be
     * used to configure the widget settings.
     */
    public $options = [];
    /**
     * @inheritdoc
     */
    public $pluginName = 'datecontrol';
    /**
     * @var Module the `datecontrol` module instance.
     */
    protected $_module;
    /**
     * @var array the parsed widget class settings for each type (defaults from the module setting if not set).
     */
    protected $_widgetSettings = [];

    /**
     * Fetches the locale settings file.
     *
     * @param string $lang the locale/language ISO code.
     *
     * @return string the locale file name.
     */
    protected static function getLocaleFile($lang)
    {
        $s = DIRECTORY_SEPARATOR;
        $file = __DIR__ . "{$s}locales{$s}{$lang}{$s}dateSettings.php";
        if (!file_exists($file)) {
            $langShort = Config::getLang($lang);
            $file = __DIR__ . "{$s}locales{$s}{$langShort}{$s}dateSettings.php";
        }
        return $file;
    }

    /**
     * Parses locale data and returns an english format.
     *
     * @param string $source the date source pattern.
     * @param string $format the date format.
     * @param array|string $settings the locale/language date settings.
     *
     * @return string the converted date source to english.
     */
    protected static function parseLocale($source, $format, $settings = [])
    {
        if (empty($settings)) {
            return $source;
        }
        foreach (self::$_enSettings as $key => $value) {
            if (!empty($settings[$key]) && static::checkFormatKey($format, $key)) {
                $source = Lib::str_ireplace($settings[$key], $value, $source);
            }
        }
        return $source;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerAssets();
        return $this->getView()->render("@vendor/pzavoli71/cookieconsent/src/widget/CookieDialogWidget",['uuid'=>$this->uuid]);
        //parent::run();
    }

    /**
     * Whether a widget is used to render the display.
     *
     * @return boolean
     */
    protected function isWidget()
    {
        return ($this->autoWidget || !empty($this->widgetClass));
    }

    /**
     * Generates the display input.
     *
     * @return string
     * @throws Exception
     */
    protected function getDisplayInput()
    {
    }


    /**
     * Translate a date pattern based on type.
     *
     * @param string $string input date string.
     * @param string $type the type of date pattern as set in [[$_enSettings]].
     *
     * @return string the translated string.
     */
    protected function translate($string, $type)
    {
        if (empty($this->pluginOptions['dateSettings'][$type])) {
            return $string;
        }
        return Lib::str_ireplace(self::$_enSettings[$type], $this->pluginOptions['dateSettings'][$type], $string);
    }

    /**
     * Sets the locale using the locales configuration settings.
     */
    protected function setLocale()
    {
        if (!$this->_doTranslate || !empty($this->pluginOptions['dateSettings'])) {
            return;
        }
        $file = static::getLocaleFile($this->language);
        if (file_exists($file)) {
            /** @noinspection PhpIncludeInspection */
            $this->pluginOptions['dateSettings'] = require($file);
        }
    }

    /**
     * Registers assets for the [[DateControl]] widget.
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        CookieConsentAsset::register($view);
    }
}
