<?php
/**
 * Plugin name: API Tecnopolis
 * Plugin URI: http://ginton.onlinewebshop.net
 * Description: Prueba de traer datos de api de tecnopolis con WooCommerce
 * Author: Fran Mellado
 * Author URI: http://ginton.onlinewebshop.net
 * version: 0.1.0
 * License: GPL2 or later.
 */


//Con este plugin salta un error fatal donde se supone que no encuentra ni la url ni el metodo solicitado

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
  'https://staging-o.ammarket.com/wp-json/wc/v3/customers/',
  'ck_1b91f0b63788ceb6da7923046c2e8024b984d3d1',
  'cs_a4049600477052fd58bf4139f503444bc840fd20',
  [
    'version' => 'wc/v3',
  ]
);

$customers=$woocommerce->get('customer');

echo '<pre>';
print_r($customers);
echo '</pre>';
?>