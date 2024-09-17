<?php 
    session_start();
    require_once("./functions/cart.php");
    $items = getCartItems();
    $grand_total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<?php include("html/head.php");?>
<body>
<?php include("html/nav.php");?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Shopping cart</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $index=>$item):?>
                            <?php $grand_total +=   $item["price"] * $item["buy_qty"];?>
                            <tr>
                                <th scope="row"><?php echo $index + 1; ?></th>
                                <td><img src="<?php echo $item["thumbnail"];?>" width="80"/></td>
                                <td><?php echo $item["name"];?></td>
                                <td><?php echo $item["buy_qty"];?></td>
                                <td><?php echo $item["price"];?></td>
                                <td><?php echo $item["price"] * $item["buy_qty"];?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h2>Summary</h2>
                <h3>Grand total: <?php echo $grand_total;?></h3>
                <a href="/checkout.php" class="btn btn-outline-danger">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</main>
</body>
</html>