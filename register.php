<?php 
    require_once("./inc/header.php");
    require_once("./helper/helper.php");
?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Register</h4>
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
                    <form action="./handler/handleRegister.php" method="POST">
                        <!-- Name -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your first name">
                            </div>
                            <div class="col-md-6">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter your last name">
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                        </div>
                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="" disabled selected>Select your gender</option>
                                <option value="male" >Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once("./inc/footer.php"); ?>