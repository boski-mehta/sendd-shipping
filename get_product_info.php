<?php
require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
$access_token=$_REQUEST['access_token'];
$product_id=$_REQUEST['product_id'];
$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );
try
{
	      
			$product = $shopify('GET /admin/products/'.$product_id.'.json');
			if($product){
        		echo $product['image']['src'];
      			}
      }
catch (shopify\ApiException $e)
{
	# HTTP status code was >= 400 or response contained the key 'errors'
	echo $e;
	print_r($e->getRequest());
	print_r($e->getResponse());
}
?>
