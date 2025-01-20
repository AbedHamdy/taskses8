<?php 
    require_once ('inc/header.php'); 
    require_once("./helper/helper.php");
?>

    <?php require_once("./inc/dorpdown..php"); ?>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-col s-md-3 row-cols-xl-4 justify-content-center">
                <?php 
                    $products = getData("./storage/products.json") ;
                    $IDs = [];
                    foreach ($products as $product)
                    {
                        $IDs[] = getIdForItem( $product ) ;
                    }

                    $randomId = [];
                    for($i = 0 ; $i < 12 ; $i++)
                    {
                        $id = getRandomData($IDs);
                        if(in_array($id, $randomId))
                        {
                            $i--;
                            continue;
                        }
                        $randomId[] = $id;
                    }
                    foreach($randomId as $value) :
                        foreach($products as $product) :
                            if($product->id == $value) :
                ?>
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <!-- Product image-->
                                        <img class="card-img-top" src="./storage/image/<?= $product->image ?>" alt="Product Image" />
                                        <!-- Product details-->
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h5 class="fw-bolder">
                                                    <?= $product->name; ?>
                                                </h5>
                                                <!-- Product price-->
                                                <?php if($product->sale > 0) : ?> 
                                                        <span class="text-muted text-decoration-line-through"><?=$product->price ?>$</span>
                                                        <?= $product->sale; ?>$
                                                    <?php else: ?>
                                                        <?= $product->price; ?>$
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center">
                                                <form action="./controller/AddInCart.php" method="POST">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="id" value="<?= $product->id; ?>">
                                                    <button type="submit" class="btn btn-outline-dark mt-auto">
                                                        Add to cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php require_once ('inc/footer.php'); ?>