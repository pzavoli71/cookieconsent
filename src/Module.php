<?php

/**
 * @package   yii2-datecontrol
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @version   1.9.9
 */

namespace pzavoli71\cookieconsent;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Module as YiiModule;
use yii\helpers\FormatConverter;

/**
 * Date control module for Yii Framework 2.0. This module is necessary to configure and use the [[DateControl]] widget
 * in your application.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class Module extends YiiModule
{
    public $TextConsent = [];
    public $LinkPolicy = '';

    /**
     * @var string current module name.
     */
    const MODULE = 'cookieconsent';
 
     /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->initSettings();
    }

    /**
     * Initializes module settings.
     */
    public function initSettings()
    {
        $varparams = $GLOBALS['config'];
        $this->TextConsent = $varparams['modules']['cookieconsent']['TextConsent'];
        $this->LinkPolicy = $varparams['modules']['cookieconsent']['linkpolicy'];
    }    
    public static function addCookieConsent() {
        $cookies = Yii::$app->request->cookies;
        if (! isset($_COOKIE['cookieconsent'])) {
            echo( CookieDialog::widget());
        }
    }
    /**
     * Parse and return format understood by PHP DateTime.
     *
     * @param string $format the date format pattern in ICU or PHP format.
     * @param string $type the date control format type ([[FORMAT_DATE]], [[FORMAT_DATETIME]], or [[FORMAT_TIME]]).
     *
     * @return string
     * @throws InvalidConfigException
     */
    public static function parseFormat($format, $type)
    {
        if (strncmp($format, 'php:', 4) === 0) {
            return Lib::substr($format, 4);
        } elseif ($format != '') {
            return FormatConverter::convertDateIcuToPhp($format, $type);
        } else {
            throw new InvalidConfigException("Error parsing '{$type}' format.");
        }
    }

}