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
	
	/* $arguments ={
		  "fulfillment":{
			"tracking_number":$trackingcode,
			"tracking_company":"Custom Tracking Company",
			"tracking_url":"http:\/\/sendd.co\/#\/tracking",
			"notify_customer":true,
			"line_items": [
			  {
				"id": 123027456014
			  }
			]
		  }
		}; */
	 $arguments = array(
		   'fulfillment' => array(
			   'tracking_number' => 705673212,
			   'tracking_company' => 'Custom Tracking Company',
			   'tracking_url' => 'http://sendd.co/#/tracking',
			   'notify_customer' => true,
			   //'line_items' =>  $ids_array
			   "line_items"=> array(
					array(
						"id"=> 123036893198,
					)
				)
			)
		); 
		$arguments = json_encode($arguments);
	$response = $shopify("POST /admin/orders/$order_id/fulfillments.json", $arguments);
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
