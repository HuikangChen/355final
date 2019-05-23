<?php
// Include PayPalPro PHP library
require_once './PaypalPro.class.php';

    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);   
    // Display error if failed to connect
    if ($db->connect_errno) {
        printf("Connect failed: %s\n", $db->connect_error);
        exit();
    }
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Buyer information
        $name = $_POST['name_on_card'];
        $nameArr = explode(' ', $name);
        $firstName = !empty($nameArr[0])?$nameArr[0]:'';
        $lastName = !empty($nameArr[1])?$nameArr[1]:'';
        $city = 'Charleston';
        $zipcode = '25301';
        $countryCode = 'US';
        
        // Card details
        $creditCardNumber = trim(str_replace(" ","",$_POST['card_number']));
        $creditCardType = $_POST['card_type'];
        $expMonth = $_POST['expiry_month'];
        $expYear = $_POST['expiry_year'];
        $cvv = $_POST['cvv'];
        
        // Create an instance of PaypalPro class
        $paypal = new PaypalPro();
        
        // Payment details
        $paypalParams = array(
            'paymentAction' => 'Sale',
            'itemName' => $itemName,
            'itemNumber' => $itemNumber,
            'amount' => $payableAmount,
            'currencyCode' => $currency,
            'creditCardType' => $creditCardType,
            'creditCardNumber' => $creditCardNumber,
            'expMonth' => $expMonth,
            'expYear' => $expYear,
            'cvv' => $cvv,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'city' => $city,
            'zip'	=> $zipcode,
            'countryCode' => $countryCode,
        );
        $response = $paypal->paypalCall($paypalParams);
        $paymentStatus = strtoupper($response["ACK"]);
        if($paymentStatus == "SUCCESS"){
            // Transaction info
            $transactionID = $response['TRANSACTIONID'];
            $paidAmount = $response['AMT'];
            
            // Insert tansaction data into the database
            $sql = "INSERT INTO orders(name,card_num,card_exp_month,card_exp_year,card_cvc,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$name."','".$creditCardNumber."','".$expMonth."','".$expYear."','".$cvv."','".$itemName."','".$itemNumber."','".$payableAmount."','".$currency."','".$paidAmount."','".$currency."','".$transactionID."','".$paymentStatus."',NOW(),NOW())";
            $insert = $db->query($sql);
            $last_insert_id = $db->insert_id;
            
            $data['status'] = 1;
            $data['orderID'] = $last_insert_id;
        }else{
            $data['status'] = 0;
        }

        // Transaction status
        echo json_encode($data);
    }
    
