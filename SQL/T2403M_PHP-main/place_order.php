<?php 
session_start();
require_once("./functions/db.php");
require_once("./functions/cart.php");
require_once("./functions/paypal.php");
$customer_name = $_POST["customer_name"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$shipping_address = $_POST["shipping_address"];
$payment_method = $_POST["payment_method"];

$items = getCartItems();
if(count($items) == 0){
    header("Location: cart.php");
    die();
}
$grand_total = 0;
foreach($items as $item){
    $grand_total += $item["price"] * $item["buy_qty"];
}
$now= date("Y-m-d H:i:s");
$sql = "insert into orders(
                created_at,
                grand_total,
                paid,
                payment_method,
                shipping_address,
                customer_name,
                email,
                telephone
                ) VALUES(
                    '$now',
                    $grand_total,
                    0,
                    '$payment_method',
                    '$shipping_address',
                    '$customer_name',
                    '$email',
                    '$telephone'
                )";
$order_id = insert($sql);
if($order_id != null){
    foreach($items as $item){
        $product_id = $item["id"];
        $buy_qty = $item["buy_qty"];
        $price = $item["price"];
        $sql = "insert into order_items(order_id,product_id,buy_qty,price)
             VALUES($order_id,$product_id, $buy_qty,$price);";
        insert($sql);   
        $sql_update = "update products set qty=qty-$buy_qty where id=$product_id;";
        update($sql_update);  
    }
    $_SESSION["cart"] = null;
    // send email to customer
    $from_email = "quockhanh.nguyen2301@gmail.com";
    $headers = "From: $from_email";
    $subject = "Thông tin đơn hàng #$order_id";
    $message = file_get_contents("/mail/order_template.php");
    mail($email, $subject,$message,$headers);


    if($payment_method == "PAYPAL"){
        // thoong tin tài khoản paypal
        $client_id = "AYGCUxQ6g9idO3Pb2x_RUxEJtEObZTEf_eOOBvtapsgA35A3EynJZukE72ssnTsH7thJrS4Zb9HgIAnI";
        $client_secret = "AYGCUxQ6g9idO3Pb2x_RUxEJtEObZTEf_eOOBvtapsgA35A3EynJZukE72ssnTsH7thJrS4Zb9HgIAnI";

        // url nhận kết quả
        $success_url = "http://localhost:80/success_paypal.php?order_id=$order_id";
        $fail_url = "http://localhost:80/fail_paypal.php?order_id=$order_id";

        // kiểm tra tài khoản paypal và lấy access token
        $access_token = get_access_token($client_id,$client_secret);
        // nếu access ok thì tạo thanh toán
        $payment = create_payment($access_token,$success_url,$fail_url,$grand_total);
        // chuyển khách hàng sang trang thanh toán của paypal
        header("Location: ". $payment['links']['1']['href']);
        die();
    }

    header("Location: /thankyou.php");
    die();
}
header("Location: /checkout.php");