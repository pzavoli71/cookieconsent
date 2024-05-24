<?php

/**
 * @package   yii2-datecontrol
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @version   1.9.9
 */

namespace pzavoli71\cookieconsent;


/**
 * Asset bundle for the [[DateControl]] widget.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class CookieConsentAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/pzavoli71/cookieconsent/src/assets';
    public $depends = ['yii\web\JqueryAsset'];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        if (YII_DEBUG) {
            $this->js[] = 'js/cookiecontrol.js';
            //$this->css[] = 'redactor.css';
        } else {
            //$this->js[] = 'redactor.js';
            //$this->css[] = 'redactor.css';
        }
    }
}