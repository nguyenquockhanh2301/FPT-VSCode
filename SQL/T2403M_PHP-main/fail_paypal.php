<?php 
$order_id = $_GET["order_id"];
header("Location: /thankyou.php?order_id=$order_id");
