<?php
  require_once("./functions/db.php");
    // 1 Get Parameter
        $id = $_GET["id"];
    // 2. connect db
    $sql = "select * from products where category_id=$id";
    $products = select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("html/head.php");?>
<body>
  <?php include_once("html/nav.php");?>
  <main>
    <div class="container">
        <h1>Category</h1>
        <div class="row">
          <?php foreach($products as $item):?>
            <div class="col-3 mb-3 mt-3">
              <div class="card">
                <img src="<?php echo $item["thumbnail"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $item["name"] ?></h5>
                  <p>$<?php echo $item["price"] ?></p>
                  <p class="card-text"><?php echo $item["description"] ?></p>
                  <a href="#" class="btn btn-primary">Detail</a>
                </div>
              </div>
            </div>
          <?php endforeach;?>  
        </div>
    </div>
  </main>  
</body>
</html>