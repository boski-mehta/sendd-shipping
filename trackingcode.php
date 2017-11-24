<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://jai-shri-ram-2.myshopify.com/admin/orders/49735925774/fulfillments.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"fulfillment\":{\n\t\"tracking_number\":705673212,\n\t\"tracking_company\":\"Custom Tracking Company\",\n\t\"tracking_url\":\"http:\\/\\/sendd.co\\/#\\/tracking\",\n\t\"notify_customer\":true,\n\t\"line_items\":[\n\t\t{\"id\":123036925966}\n\t\t]\n\t\n}\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "charset: utf-8",
    "content-length: 0",
    "content-type: application/json",
    "x-shopify-access-token: d0602c4458b74f9f8a9aff98d27d98a8"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
