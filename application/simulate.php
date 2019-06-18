<?php
$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer eJ3FWVSoxy1uP6L03u4Gwf3GGJVs')); //setting custom header


  $curl_post_data = array(
          //Fill in the request parameters with valid values
         'ShortCode' => '601527',
         'CommandID' => 'CustomerPayBillOnline',
         'Amount' => '20',
         'Msisdn' => '254708374149',
         'BillRefNumber' => 'Simulate1'
  );

  $data_string = json_encode($curl_post_data);

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

  $curl_response = curl_exec($curl);
  print_r($curl_response);

  echo $curl_response;
?>