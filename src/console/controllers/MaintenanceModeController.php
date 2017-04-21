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

/**
 * Control whether the website(s) are in maintenance mode
 *
 * The first line of this class docblock is displayed as the description
 * of the Console Command in ./craft help
 *
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is plugin/controller-name/action-name
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft maintenancemode/maintenance-mode
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft maintenancemode/maintenance-mode/do-something
 *
 * @author    Venveo
 * @package   MaintenanceMode
 * @since     1.0.0
 */
class MaintenanceModeController extends Controller
{
    /**
     * Handle maintenancemode/maintenance-mode/enable console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionEnable()
    {
        if (Craft::$app->getIsSystemOn()) return true;
        $info = Craft::$app->getInfo();
        $info->on = true;
        Craft::$app->saveInfo($info);

        return true;
    }

    public function actionDisable()
    {
        if (!Craft::$app->getIsSystemOn()) return true;
        $info = Craft::$app->getInfo();
        $info->on = true;
        Craft::$app->saveInfo($info);

        return true;
    }
}
