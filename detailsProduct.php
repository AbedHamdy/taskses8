<?php 

    require_once("./helper/helper.php");
    require_once("./inc/header.php");

    $details = getData("./storage/userOrder.json");
?>

<div class="container my-5">
    <h2 class="mb-4">Order Details</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Price per Unit</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($details as $items) :
                    foreach($items->products as $product) :
            ?>
                <!-- Example Row -->
                    <tr>
                        <td><?= $items->name; ?></td>
                        <td><?= $product->name; ?></td>
                        <td><?= $product->price; ?></td>
                        <td><?= $product->quantity; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php require_once("./inc/footer.php"); ?>