<?php 
    require_once("./inc/header.php");
    require_once("./helper/helper.php");
    require_once("./inc/dorpdown.php");
?> 

    <a href="./addproducts.php" class="btn btn-primary position-absolute" style="top: 100px; right: 30px;">Add Product</a>

    <?php 

        $numberCars = numberItem("./storage/cars.json");
        // echo $numberCars;
        $numbersPhones = numberItem("./storage/phones.json");
        // echo $numbersPhones;
        $usersData = json_decode(file_get_contents("./storage/users.json"));
        
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Product Statistics</h2>
        
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Product Type</th>
                    <th>Number of Items</th>
                </tr>
            </thead>
                <tr>
                    <td>Cars</td>
                    <td><?= $numberCars; ?></td>
                </tr>
                <tr>
                    <td>Phones</td>
                    <td><?= $numbersPhones; ?></td>
                </tr>
                <?php 
                    $users = 0;
                    $usersBlock = 0;
                    foreach($usersData as $user)
                    {
                        if(isset($user->status))
                        {
                            $usersBlock++;
                        }
                        else
                        {
                            $users++;
                        }
                    }
                        
                ?>
                    <tr>
                        <td>Users</td>
                        <td><?= $users; ?></td>
                    </tr>
                <tr>
                    <td>Blocked Users</td>
                    <td><?= $usersBlock; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
















<?php require_once("./inc/footer.php"); ?>