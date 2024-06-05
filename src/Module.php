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
    public $controllerNamespace = 'pzavoli71\cookieconsent\controllers';
    
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
        //$varparams = $GLOBALS['config'];
        //$this->TextConsent = $varparams['modules']['cookieconsent']['TextConsent'];
        //$this->LinkPolicy = $varparams['modules']['cookieconsent']['LinkPolicy'];
    }    
    public static function addCookieConsent() {
        $cookies = Yii::$app->request->cookies;
        $req = Yii::$app->request->userIP;
        if (\Yii::$app->crawlerdetect->isCrawler()) {
            return;
        }
        if (! isset($_COOKIE['cookieconsent'])) {
            // Creo il UUID da associare a questo contesto
            $uuid = Module::getGUID();
            echo( CookieDialog::widget(['uuid'=>$uuid]));
        }
    }
    
    static function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }
        else {
            mt_srand((int) ((double)microtime()*10000));//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
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