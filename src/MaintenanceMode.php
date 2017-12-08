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
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
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
            $this->controllerNamespace = 'venveo\maintenancemode\console\controllers';
        }
    }
}
