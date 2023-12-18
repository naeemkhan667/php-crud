<?php
use \Common\common;
$search = isset($_REQUEST['search'])? $_REQUEST['search'] : "";

?>
<div id="container">
    <div id="main">
        <?=common::show_message()?>
        <table style="width: 100%; background:gray;">

            <tr style="border: 1px dotted green;">
                <td>
                    <form action="/" style="margin: 0px">
                        <input type="hidden" action="search">
                        <input type="text" name="search" placeholder="Search..." value="<?=$search?>">
                        <input type="submit" value="Search">
                    </form>
                </td>
                <td style="text-align: right;">
                    <form action="/" method="GET" style="margin: 0px">
                        <input type="hidden" name="action" value="add">
                        <input type="submit" value="Add User">
                    </form>
                </td>
            </tr>
        </table>

        <table border="1" style="width: 100%;">
            <tr>
                <td><b>First Name</b></td>
                <td><b>Last Name</b></td>
                <td><b>Actions</b></td>
            </tr>

            <?php


            if (count($users) > 0) {
                foreach ($users  as $user) {
            ?>
                    <tr>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td>
                            <a href="?action=edit&id=<?= $user['id'] ?>">Edit</a> |
                            <a href="?action=delete&id=<?= $user['id'] ?>" onclick='return confirm("<?= $APP_MSG["USER_DELETE_CONFIRM"] ?>")'> Delete</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='3'>No user found</td></tr>";
            }
            ?>

        </table>
    </div>
</div>