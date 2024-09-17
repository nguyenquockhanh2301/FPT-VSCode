<?php 
    session_start();
    require_once("./functions/user.php");
    if(currentUser() != null){
        header("Location: /");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("html/head.php");?>
<body>
<?php include_once("html/nav.php");?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1>Login</h1>
                    <form action="/post_login.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password"/>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>