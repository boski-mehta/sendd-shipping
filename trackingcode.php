<?php

$request = new HttpRequest();
$request->setUrl('https://jai-shri-ram-2.myshopify.com/admin/orders/49731829774/fulfillments.json');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'charset' => 'utf-8',
  'content-length' => '0',
  'x-shopify-access-token' => 'd0602c4458b74f9f8a9aff98d27d98a8',
  'content-type' => 'application/json'
));

$request->setBody('{"fulfillment":{
	"tracking_number":705673212,
	"tracking_company":"Custom Tracking Company",
	"tracking_url":"http:\\/\\/sendd.co\\/#\\/tracking",
	"notify_customer":true,
	"line_items":[
		{"id":116917731342}
		]
	
}
}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
