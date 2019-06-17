<?php
    $consumerKey ='qvAGTb7BLEKe3GYZDywHyHGr7fA3vJ3W';
    $consumerSecret ='aouAieLaYWiStnGr';

    $headers = ['Content-Type:application/json; charset=utf8'];

    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);

    $result = curl_exec($curl);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);

    $access_token = $result->access_token;
    echo $access_token;

    curl_close($curl);
    $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer ' .$access_token)); 


    $curl_post_data = array(
    //Fill in the request parameters with valid values
    //when on live server change links to match those
    //obtain short code from test codes of dev portal
    'ShortCode' => '601527',
    'ResponseType' => 'Confirmed',
    'ConfirmationURL' => __DIR__.'mpesa\confirmation_url.php',
    'ValidationURL' => __DIR__.'mpesa\validation_url.php'
    );

    $data_string = json_encode($curl_post_data);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    $curl_response = curl_exec($curl);

    echo $curl_response;
?>