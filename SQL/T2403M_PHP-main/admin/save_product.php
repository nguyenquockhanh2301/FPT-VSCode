<?php 
$thumbnail = null;
// upload file
if($_FILES["thumbnail"]){
    $file_name = time().basename($_FILES["thumbnail"]["name"]);
    $target_file = "../uploads/".$file_name;
    $extends  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $allow_exts = ["png","gif","jpg","jpeg"];
    if(in_array($extends,$allow_exts)){
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"],$target_file);
        $thumbnail = "'/uploads/".$file_name."'";
    }
}
// sử dụng biến $thumbnail để lưu link ảnh vào db
$sql = "insert into product(name,price,qty,thumbnail,description,category_id)
            values(..... )";