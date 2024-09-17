<?php 
  session_start();  
    require_once("./../functions/user.php");
    if(!is_admin()){
        header("Location: /404notfound.php");
        die();
    }
    require_once("./../functions/order.php");
    $id = $_GET["id"];
    $info = order_detail($id);
    $order = $info["order"];
    $items = $info["items"];
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("./../html/head.php");?>
<body>
<main>
    <div class="row">
    <?php include_once("./../html/admin_aside.php");?>
    <article class="col">
        <h1><?php  echo $order["customer_name"];?></h1>
        <h2><?php  echo $order["telephone"];?></h2>
        <h2><?php  echo $order["shipping_address"];?></h2>
        <h3><?php  echo $order["payment_method"];?></h3>
        <h3><?php  echo $order["paid"];?></h3>
        <h3><?php  echo $order["grand_total"];?></h3>
        <h3><?php  echo status_label($order["status"]);?></h3>
        <table class="table">
            <thead>
                <th>Thumb</th>
                <th>Product</th>
                <th>Price</th>
                <th>Buy Qty</th>
                <th>Total</th>
            </thead>
            <tbody>
                <?php foreach($items as $item):?>
                    <tr>
                        <td><img src="<?php echo $item["thumbnail"] ?>" width="50"/></td>
                        <td><?php echo $item["name"] ?></td>
                        <td><?php echo $item["price"] ?></td>
                        <td><?php echo $item["buy_qty"] ?></td>
                        <td><?php echo $item["buy_qty"] * $item["price"]; ?></td>
                    </tr>
                <?php endforeach;?>    
            </tbody>
        </table>
        <div>
            <?php if($order["status"] == PENDING):?>
            <a onclick="return confirm('Change status to Confirm?')" href="#"class="btn btn-primary">Confirm</a>
            <?php endif;?>
            <?php if($order["status"] == CONFIRM):?>
            <a  onclick="return confirm('Change status to Confirm?')" href="#"class="btn btn-secondary">Shipping</a>
            <?php endif;?>
            <?php if($order["status"] == SHIPPING):?>
            <a href="#"class="btn btn-info">Shipped</a>
            <?php endif;?>
            <?php if($order["status"] == SHIPPED):?>
            <a href="#"class="btn btn-success">Complete</a>
            <?php endif;?>
            <?php if($order["status"] == PENDING || $order["status"] == CONFIRM):?>
            <a  data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" class="btn btn-danger">Cancel</a>
            <?php endif;?>
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea name="note" class="form-control" placeholder="Note"></textarea>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-danger">Cancel order</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </article>
    </div>
</main>
</body>
</html>