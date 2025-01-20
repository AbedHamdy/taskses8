<?php require_once ("inc/header.php"); ?>


<div class="container my-5">
    <h2 class="text-center mb-4">Add Product</h2>
    <form action="./controller/CRUD.php" method="POST" enctype="multipart/form-data"> 
        <?php 
            if(isset($_SESSION["errors"])) :
                foreach($_SESSION["errors"] as $error) : 
        ?>
                    <div class="alert alert-danger text-center">
                        <?= $error;?>
                    </div>
        <?php 
                endforeach;
            endif;
            unset($_SESSION["errors"]);
        ?>
        <!-- input image -->
        <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="productImage" name="image" accept="image/*" placeholder="Enter product image">
        </div>
        <!-- input name -->
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="name" placeholder="Enter product name">
        </div>
        <!-- input category -->
        <div class="mb-3">
            <label for="productCategory" class="form-label">Category</label>
            <select class="form-select" id="productCategory" name="category">
                <option value="" disabled selected>Select a category</option>
                <option value="Cars">Cars</option>
                <option value="Phones">Phones</option>
            </select>
        </div>
        <!-- input price -->
        <div class="mb-3">
            <label for="productPrice" class="form-label">Product Price</label>
            <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter product price">
        </div>
        <!-- input sale -->
        <div class="mb-3">
            <label for="productSale" class="form-label">Sale Percentage</label>
            <input type="number" class="form-control" id="productSale" name="sale" placeholder="Enter percentage">
        </div>
        <!-- submit -->
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

<?php require_once("./inc/footer.php"); ?>


