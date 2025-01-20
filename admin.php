<?php 
    require_once("./inc/header.php");
    require_once("./helper/helper.php");
?> 

    <a href="./addproducts.php" class="btn btn-primary position-absolute" style="top: 100px; right: 30px;">Add Product</a>
    <?php 
        $details = getData("./storage/userOrder.json");
        // echo "<pre>";
        // print_r($details);
        // echo "</pre>";
        // die;
        
        $numberOrder = 1;
        foreach($details as $order) :
    ?>
        <div class="container my-5">
            <h2 class="mb-4"><?php echo "Order " .$numberOrder++; ?></h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Note</th>
                        <th>Product Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $order->name; ?></td>
                        <td><?= $order->email; ?></td>
                        <td><?= $order->address; ?></td>
                        <td><?= $order->phone; ?></td>
                        <td><?= $order->note; ?></td>
                        <td>
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $numberProduct = 1;
                                        foreach($order->products as $product) : 
                                         
                                    ?>
                                            <tr>
                                                <td><?= $numberProduct++; ?></td>
                                                <td><?= $product->name; ?></td>
                                                <td><?= $product->price; ?></td>
                                                <td><?= $product->quantity; ?></td>
                                            </tr>
                                            
                                            
                                    <?php endforeach; ?>
                                    <!-- <tr>
                                        <td>2</td>
                                        <td>Product B</td>
                                        <td>$20</td>
                                        <td>1</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>
















<?php require_once("./inc/footer.php"); ?>