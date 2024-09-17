<?php 
    require_once("./../functions/order.php");
    if(!is_admin()){
        header("Location: /404notfound.php");
        
    }
    $orders = order_list();
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("./../html/head.php");?>
<body>
    <main>
        <div class="row">
        <?php include_once("./../html/admin_aside.php");?>
            <article class="col">
                <h1>Orders Listing</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Telephone</th>
                        <th>Grand total</th>
                        <th>Created At</th>
                        <th>Payment</th>
                        <th>Paid</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $item):?>
                            <tr>
                                <td><?php echo $item["id"];?></td>
                                <td><?php echo $item["customer_name"];?></td>
                                <td><?php echo $item["telephone"];?></td>
                                <td><?php echo $item["grand_total"];?></td>
                                <td><?php echo $item["created_at"];?></td>
                                <td><?php echo $item["payment_method"];?></td>
                                <td>
                                    <?php if($item["paid"]): ?>
                                        <span class="text-success">Paid</span>
                                    <?php else: ?>
                                        <span class="text-danger">UnPaid</span> 
                                    <?php endif;?>
                                </td>
                                <td><?php echo status_label($item["status"]);?></td>
                                <td><a href="/admin/order_detail.php?id=<?php echo $item["id"];?>">Detail</a></td>
                            </tr>
                        <?php endforeach;?>    
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
                </nav>
            </article>
        </div>
    </main>
</body>
</html>