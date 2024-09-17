<?php 
// cập nhật trạng thái đã trả tiền paid => 1
require_once("./functions/db.php");
$order_id = $_GET["order_id"];
$sql = "update orders set paid=1 where id=$order_id";
update($sql);
// chuyển về trang thankyou
header("Location: /thankyou.php?order_id=$order_id");