<?php
/**
 * Maintenance Mode plugin for Craft CMS 3.x
 *
 * Programmatically disable the website through command line
 *
 * @link      https://venveo.com
 * @copyright Copyright (c) 2017 Venveo
 */

namespace venveo\maintenancemode\console\controllers;

use venveo\maintenancemode\MaintenanceMode;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;
use yii\web\ServerErrorHttpException;

class MaintenanceModeController extends Controller
{
    public function actionEnable()
    {
        try {
            $info = Craft::$app->getInfo();
        } catch ( ServerErrorHttpException $e ) {
            exit('Failed to get app info');
        }
        $info->on = false;
        Craft::$app->saveInfo($info);

        return 0;
    }

    public function actionDisable()
    {
        try {
            $info = Craft::$app->getInfo();
        } catch ( ServerErrorHttpException $e ) {
            exit('Failed to get app info');
        }
        $info->on = true;
        Craft::$app->saveInfo($info);

        return 0;
    }
}
