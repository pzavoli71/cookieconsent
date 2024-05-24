<?php

/**
 * @package   yii2-datecontrol
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2022
 * @version   1.9.9
 */

namespace pzavoli71\cookieconsent\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * ParseController class manages the actions for date conversion via ajax from display to save.
 */
class CookieController extends Controller
{
    /**
     * Salva il cookie di sessione
     *
     * @return array JSON encoded HTML output
     */
    public function actionSave()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $req = Yii::$app->request;
        $post = $req->post();
        if (!isset($post['displayDate'])) {
            return ['status' => 'error', 'output' => 'No display date found'];
        }
        return ['status' => 'success', 'output' => $value];
    }
}