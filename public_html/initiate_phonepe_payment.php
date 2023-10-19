<?php
header('Content-Type: application/json');
session_start();
// include('config/dbconfig.php');
require 'config/dbconfig.php';

// Function to initiate the PhonePe payment
function initiatePhonePePayment($formData){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    // Process the form data
    $name = $formData['name'];
    $email = $formData['email'];
    $phone = $formData['phone'];
    $pincode = $formData['pincode'];
    $address = $formData['address'];
    $total_price = $formData['total_price'];
    $tracking_no = "TrackingNo" . rand(1111, 9999) . substr($phone, 2);
    $payment_mode = "PhonePe";
    $merchantTransactionId = 'YK' . substr(uniqid(), 0, 33); // Ensure a maximum length of 35 characters
    
    $query = "SELECT c.id as cid,c.prod_id,c.prod_qty,p.id as pid,p.name,p.image,p.selling_price 
              FROM carts c,products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC";
    $query_run = mysqli_query($con, $query);

    $totalPrice = 0;
    foreach ($query_run as $citem) {
        $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
    }

    // Prepare the insert query using prepared statements
    $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, pincode, total_price, payment_mode, payment_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $insert_query);

    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssssssss", $tracking_no, $userId, $name, $email, $phone, $address, $pincode, $totalPrice,$payment_mode, $merchantTransactionId );
    $insert_query_run = mysqli_stmt_execute($stmt);
    $order_id = mysqli_insert_id($con);

    if ($order_id > 0) {
        
        foreach ($query_run as $citem) {
            $prod_id = $citem['prod_id'];
            $prod_qty = $citem['prod_qty'];
            $price = $citem['selling_price'];

            $insert_items_query = "INSERT INTO order_items (order_id,prod_id,qty,price) 
                                  VALUES ('$order_id','$prod_id','$prod_qty','$price')";
            $insert_items_query_run = mysqli_query($con, $insert_items_query);

            $product_query = "SELECT * FROM products WHERE id='$prod_id' LIMIT 1";
            $product_query_run = mysqli_query($con, $product_query);

            $productData = mysqli_fetch_array($product_query_run);
            $current_qty = $productData['qty'];

            $new_qty = $current_qty - $prod_qty;

            $updateQty_query = "UPDATE products SET qty='$new_qty' WHERE id='$prod_id'";
            $updateQty_query_run = mysqli_query($con, $updateQty_query);
        }
        // Clear the cart for the user
        $deleteCartQuery = "DELETE FROM carts WHERE user_id='$userId'";
        $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);
        $responseData = fnCallPhonePayInit($merchantTransactionId, $totalPrice, $phone);
        echo json_encode($responseData);
        exit;
    }else{
        exit("Something Went Wrong! Please Try Again..!!");
    }

}

function fnCallPhonePayInit($merchantTransactionId, $amount, $phone){

    $merchantId = 'YAASIKAAONLINE';
    $saltKey = 'd9f8350e-5d6c-4fdb-bcf3-f923dc93043c';
    $saltIndex = 1;
    $userId = $_SESSION['auth_user']['user_id'];

    $redirectUrl = 'https://yaasikaaenterprises.com/paysuccess.php'; // Replace with the URL to handle the payment response
    $callbackUrl = 'https://yaasikaaenterprises.com/paysuccess.php'; 

    // PhonePe API request data
    $data = array(
        'merchantId' => $merchantId,
        'merchantTransactionId' => $merchantTransactionId,
        'merchantUserId' => $userId,
        'amount' => $amount*100,
        'redirectUrl' => $redirectUrl,
        'redirectMode' => 'POST',
        'callbackUrl' => $callbackUrl,
        'mobileNumber' => $phone,
        'paymentInstrument' => array(
            'type' => 'PAY_PAGE',
        ),
    );

    $encode = base64_encode(json_encode($data));
    $string = $encode . '/pg/v1/pay' . $saltKey;
    $sha256 = hash('sha256', $string);
    $finalXHeader = $sha256 . '###' . $saltIndex;

    // Make the PhonePe API request using cURL
    $ch = curl_init('https://api.phonepe.com/apis/hermes/pg/v1/pay');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-VERIFY: ' . $finalXHeader,
    ));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('request' => $encode)));

    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        //   echo "cURL Error #:" . $err;
        // header('Location: paymentfailed.php?cURLError='.$err);
        return false;
    } else {
        $responseData = json_decode($response, true);
        $url = $responseData['data']['instrumentResponse']['redirectInfo']['url'];
        return $url;
        // header('Location: '.$url);
    }
}

// Call the function with the form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = $_POST;
    initiatePhonePePayment($_POST);
} else {
    // If the request method is not POST, return an error response
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'message' => 'Invalid request method.'));
}
