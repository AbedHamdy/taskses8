<?php require_once("./helper/helper.php"); ?>
<?php require_once('inc/header.php'); ?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <?php 
                    if(isset($_SESSION["error"])) : 
                ?>
                        <div class="alert alert-danger text-center">
                            <?= $_SESSION["error"]; ?>
                        </div>

                <?php 
                    endif;
                    unset($_SESSION["error"]); 
                ?>
                <form action="./controller/check.php" method="POST" id="form1">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $products = getData("./storage/cart.json");
                                $count = 0 ;
                                foreach($products as $product) :
                                    $count++;
                            ?>
                                <tr>
                                    <th scope="row"><?=$count; ?></th>
                                    <td><?= $product->name; ?></td>
                                    <td><?= $product->price; ?></td>
                                    <td>
                                        <input type="number" name="quantity[<?= $product->id ?>]" value="<?= $product->quantity; ?>">
                                    </td>
                                    <td>
                                    <a href="./controller/DeleteInCart.php?id=<?= $product->id; ?>" class="btn btn-danger">
                                        Delete
                                    </a>
                                    </td>
                                </tr>
                            <?php 
                                endforeach; 
                                $_SESSION["number"] = $count;
                            ?>
                            <tr>
                                <td colspan="1"><strong>Total Price</strong></td>
                                <td colspan="3" class="text-center">
                                    <strong>
                                        <?php 
                                            $total = 0;
                                            foreach($products as $product) 
                                            {
                                                $total += $product->price;
                                            }
                                            echo $total . "$";
                                        ?>
                                    </strong>
                                <td>
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </td>
                            </tr>                        
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once("./inc/footer.php"); ?>