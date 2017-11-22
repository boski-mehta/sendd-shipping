<?php

require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
$access_token=$_REQUEST['access_token'];
 $order_id= $_REQUEST['order_id'];
 $trackingcode= $_REQUEST['trackingcode'];
 $trackingcompany= $_REQUEST['trackingcompany'];
  $products_ids= $_REQUEST['products_ids'];
 print_r($products_ids);
    $products_ids =explode(',',$products_ids,0);
foreach($products_ids as $products_ids){
    $products_ids['id']=$products_ids;
    }
//$products_ids = json_encode($products_ids);
$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );
try{
	//$arguments= array( "fulfillment" => array("tracking_number" => $trackingcode,"tracking_company"=> "Custom Tracking Company","tracking_url"=>"http://sendd.co/#/tracking"));
	$arguments= array( "fulfillment" => array("tracking_number" => $trackingcode,"tracking_company"=> "Custom Tracking Company","tracking_url"=>"http://sendd.co/#/tracking"),"line_items" => array($products_ids));			
 $orders = $shopify('POST /admin/orders/'.$order_id.'/fulfillments.json',$arguments);
 
	print_r($orders);
}
catch (shopify\ApiException $e)
{
	# HTTP status code was >= 400 or response contained the key 'errors'
	echo $e;
	print_r($e->getRequest());
	print_r($e->getResponse());
}

?>
