<?php require_once('inc/header.php'); ?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="./controller/contact.php" class="form border my-2 p-3" method="POST">
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
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="7"></textarea>
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