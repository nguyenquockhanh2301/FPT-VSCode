<?php 
    session_start();
    require_once("./../functions/user.php");
    
    if(!is_admin()){
        header("Location: /404notfound.php");
        die();
    }
    require_once("./../functions/db.php");
    $cats = select("select * from categories");
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("./../html/head.php");?>
<body>
    <main>
        <div class="row">
        <?php include_once("./../html/admin_aside.php");?>
            <article class="col">
                <h1>Create new product</h1>
                <form action="#" method="post">
                    <div class="mb-3">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input name="price" type="number" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Qty</label>
                        <input name="qty" type="number" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Thumbnail</label>
                        <input name="thumbnail" type="file" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description"class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id"class="form-control">
                            <?php foreach($cats as $item):?>
                                <option value="<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></option>
                            <?php endforeach; ?>    
                        </select>
                       
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </article>
        </div>
    </main>
</body>
</html>