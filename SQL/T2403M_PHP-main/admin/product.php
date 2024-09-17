<?php 
    session_start();
    require_once("./../functions/user.php");
    
    if(!is_admin()){
        header("Location: /404notfound.php");
        die();
    }
    require_once("./../functions/db.php");
    $products = select("select p.*,c.name as category_name from products p 
                    left join categories c on p.category_id=c.id");
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("./../html/head.php");?>
<body>
    <main>
        <div class="row">
        <?php include_once("./../html/admin_aside.php");?>
            <article class="col">
                <h1>Products Listing</h1>
                <a href="/admin/create_product.php" class="btn btn-primary mb-3">Add a new product</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Category</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach($products as $item):?>
                            <tr>
                                <td><?php echo $item["id"];?></td>
                                <td><img src="<?php echo $item["thumbnail"];?>" width="80"/></td>
                                <td><?php echo $item["name"];?></td>
                                <td><?php echo $item["price"];?></td>
                                <td><?php echo $item["qty"];?></td>
                                <td><?php echo $item["category_name"];?></td> 
                                <td><a href="#?id=<?php echo $item["id"];?>">Edit</a></td>
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