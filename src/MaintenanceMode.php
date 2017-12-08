<?php
/**
 * Maintenance Mode plugin for Craft CMS 3.x
 *
 * Programmatically disable the website through command line
 *
 * @link      https://venveo.com
 * @copyright Copyright (c) 2017 Venveo
 */

namespace venveo\maintenancemode;


use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\console\Application as ConsoleApplication;

use yii\base\Event;


/**
 *
 *
 * @author    Venveo
 * @package   MaintenanceMode
 * @since     1.0.0
 *
 */
class MaintenanceMode extends Plugin
{
    public static $plugin;

    // Public Methods
    // =========================================================================
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Add in our console commands
        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'venveo\\maintenancemode\\console\\controllers';
        }
    }
}
