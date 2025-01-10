<?php 

    require_once("./helper/helper.php");
    require_once("./inc/header.php");
?>
    
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Login</h4>
                    <?php 
                        if(isset($_SESSION["errors"])) :
                            foreach($_SESSION["errors"] as $error) : 
                    ?>
                            <div class="alert alert-danger text-center">
                                <?= $error; ?>
                            </div>

                    <?php 
                            endforeach;
                        endif;
                        unset($_SESSION["errors"]); 
                    ?>
                    <form action="./handler/handleLogin.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="text-center">
                            <small>Don't have an account? <a href="./register.php">Sign up</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


















<?php require_once("./inc/footer.php"); ?>