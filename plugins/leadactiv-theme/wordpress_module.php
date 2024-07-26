<?php
/**
 * Plugin Name:     [LeadActiv] Thème
 * Plugin URI:      https://www.genesii.fr
 * Description:     Plugin utilisé par le thème pour gérer les options et gabarits de page sur lmesure
 * Author:          Genesii
 * Author URI:      https://www.genesii.fr
 * Text Domain:     genesii
 * Domain Path:     /translations
 * Version:         0.0.1
 */

$path = plugin_dir_path(__FILE__);

require_once($path . 'vendor/autoload.php');

use Genesii\Kernel\Plugin;

new Plugin($path);