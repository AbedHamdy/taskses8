<?php 

    require_once("./helper/helper.php");
    require_once("./inc/header.php");
    
    $users = getData("./storage/users.json");

    if (isset($_SESSION['errors'])) : 
        foreach ($_SESSION['errors'] as $error) : 
?>
        <div class="alert alert-danger text-center"><?= $error; ?></div>
        <?php 
            endforeach;
            endif;
            unset($_SESSION["errors"]); 
        ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Users List</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (!empty($users)) : 
                    foreach ($users as $user) : 
            ?>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= "$user->fname $user->lname"; ?></td>
                        <td><?= $user->email; ?></td>
                        <td>
                            <form action="./controller/status.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $user->id; ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Change Status</button>
                            </form>
                        </td>
                    </tr>
            <?php 
                    endforeach; 
                endif; 
            ?>
        </tbody>
    </table>
</div>

<?php require_once("./inc/footer.php"); ?>