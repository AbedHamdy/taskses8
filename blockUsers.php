<?php 

    require_once("./inc/header.php");
    require_once("./helper/helper.php");

?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">List of blocked users</h1>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $users = getData("./storage/users.json");
                    if (!empty($users)) : 
                        $checkNum = 0;
                        foreach ($users as $user) : 
                            if(isset($user->status)) :
                                $checkNum ++;
                ?>
                            <tr>
                                <td><?= "$user->fname $user->lname"; ?></td>
                                <td>
                                    <?= $user->status; ?>
                                </td>
                            </tr>
                <?php 
                            endif;
                        endforeach;
                    endif;
                    if($checkNum == 0) :
                ?>
                        <tr>
                            <td colspan="2" class="text-center">No blocked users</td>
                        </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>








<?php require_once("./inc/footer.php"); ?>