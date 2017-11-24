<?php

require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
$access_token = $_REQUEST['access_token'];
$order_id = $_REQUEST['order_id'];
$trackingcode= $_REQUEST['trackingcode'];
$trackingcompany= $_REQUEST['trackingcompany'];
$products_ids= $_REQUEST['products_ids'];
$products_ids =explode(',',$products_ids);

foreach($products_ids as $key => $products_id){
	$ids_array[] = array('id' => $products_id);
}
echo "hello";
//$new_lineitems = array( array ( 'id' => 255841894414), array ( 'id' => 255841107982));

$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );
try{
	$arguments = array(
		   'fulfillment' => array(
		   'tracking_number' => $trackingcode,
		   'tracking_company' => 'Custom Tracking Company',
		   'tracking_url' => 'http://sendd.co/#/tracking',
		   'notify_customer' => true,
		   //'line_items' =>  $ids_array
		   

"line_items": [
  {
    "fulfillable_quantity": 1,

    "fulfillment_service": "manual",

    "fulfillment_status": null,

    "grams": 0,

    "id": 116917731342,

    "price": "15.78",

    "product_id": 47473983502,

    "quantity": 1,

    "requires_shipping": true,

    "sku": "K-H9B",

    "title": "USB Beetle Humidifie - Aroma Diffuser",

    "variant_id": "255842156558",

    "variant_title": "Blue",

    "vendor": 'Jai Shri Ram',

    "name": "USB Beetle Humidifie - Aroma Diffuser - Blue",

    "shipment_status": "in_transit",

    "variant_inventory_management": "shopify",

    "properties": "[ ]",

    "product_exists": true
  }
]
		)
	);
	$response = $shopify("POST /admin/orders/$order_id/fulfillments.json", $arguments);
	print_r($arguments);
	print_r($orders);
	echo '<br>Response==>';
	print_r($response);
}
catch (shopify\ApiException $e)
{
	# HTTP status code was >= 400 or response contained the key 'errors'
	echo $e;
	print_r($e->getRequest());
	print_r($e->getResponse());
}

?>
