<html>
    <head><title>Hobber</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    
</head>
<body>
<table style="width:100%; height:50px;">
    <tr><td>
        <h1>PHP, PDO with Namespace</h1>
    </td></tr>
</table>

<?php
    session_start();
    include_once('models/user.php');
    include_once('database/database.php');
    include_once('config/config.php');
    include_once('common/common.php');

    use \Models\user;
    use \Database\database;
    use \Common\common;
    use Config\config;

    $db = new database();
    $user = new user($db->get_connection());
    $APP_MSG = config::$app_messages;

    $action = '';
    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];
    }
    
    switch($action){
        case 'add':
            include_once('views/add_user.php');
            break;

        case 'create':
            echo 
            $message = ($user->create()) ? $APP_MSG['USER_SAVE_SUCCESS'] : $APP_MSG['USER_SAVE_ERROR'];
            common::redirect_with_message('/', $message);
            break;

        case 'edit':
            $user_data = $user->edit_user();
            include_once('views/add_user.php');
            break;
        
        case 'update':
            $message = $user->update_user() ? $APP_MSG['USER_UPDATE_SUCCESS'] : $APP_MSG['USER_UPDATE_ERROR'];
            common::redirect_with_message('/', $message);
            break;

        case 'delete':
            $message = $user->delete_user() ? $APP_MSG['USER_DELETE_SUCCESS'] : $APP_MSG['USER_DELETE_ERROR'];
            common::redirect_with_message('/', $message);
            break;
        
        default:
            $users = $user->get_users();
            include_once('views/list_user.php');
    }
?>

</body>
</html>