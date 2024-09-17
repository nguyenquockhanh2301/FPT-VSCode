<?php 
  session_start();
  require_once("./functions/db.php");
  $sql = "select * from products";
  $products = select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("html/head.php");?>
<body>
  <?php include_once("html/nav.php");?>
  <main>
    <div class="container">
        <div class="row">
          <?php foreach($products as $item):?>
            <div class="col-3 mb-3 mt-3">
              <div class="card">
                <img src="<?php echo $item["thumbnail"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $item["name"] ?></h5>
                  <p>$<?php echo $item["price"] ?></p>
                  <p class="card-text"><?php echo $item["description"] ?></p>
                  <a href="/product.php?id=<?php echo $item["id"];?>" class="btn btn-primary">Detail</a>
                </div>
              </div>
            </div>
          <?php endforeach;?>  
        </div>
    </div>
  </main>
</body>
</html>