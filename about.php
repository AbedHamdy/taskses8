<?php require_once('inc/header.php'); ?>
<?php require_once("./helper/helper.php") ?>

<!-- Section-->
<div class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <?php $description = getData("./storage/descriptionAbout.json"); ?>
                <?php 
                    foreach($description as $desc) : 
                        if(isset($desc->head)) :
                ?>
                            <div class="border p-4 text-center my-5">
                                <h2><?= $desc->head ;?></h2>
                                <p><?= $desc->description?></p>
                            </div>
                        <?php endif; ?>
                <?php endforeach; ?>
                <div class="border p-4 my-5">
                    <h2 class="text-center">Our Goals</h2>
                    <?php 
                        $description = getData("./storage/descriptionAbout.json");
                        foreach($description as $desc) : 
                            if(!isset($desc->head)) : 
                    ?>
                            <h6 class="border p-3 my-2"><?= $desc->description ?></h6>    
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('inc/footer.php'); ?>