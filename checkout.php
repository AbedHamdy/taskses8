<?php require_once("inc/header.php"); ?>
<?php require_once("./helper/helper.php"); ?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php 
                                $products = getData("./storage/cart.json");
                                $total = [];
                                foreach($products as $product) : 
                                    $total [] = $product->price * $product->quantity;
                            ?>
                                <li class="border p-2 my-1">
                                    <?= $product->name; ?> -
                                    <span class="text-success mx-2 mr-auto bold">
                                        <?= $product->quantity; ?> 
                                        x 
                                        <?= $product->price; ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- sum products -->
                    <?php 
                        $sum = array_sum($total);
                    ?>
                    <h3>Total : <?= $sum?></h3>
                </div>
            </div>

            <div class="col-8">
                <form action="./controller/checkContact.php" method="POST" class="form border my-2 p-3">
                    <div class="mb-3">
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
                        <?php if(isset($_SESSION["done"])) : ?>
                            <div class="alert alert-success text-center">
                                <?= $_SESSION["done"]; ?>
                            </div>
                        <?php 
                            endif;
                            unset($_SESSION["done"]);
                        ?>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="note">Notes</label>
                            <input type="text" name="note" id="note" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>