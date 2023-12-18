<?php
namespace Config;
class config {
    public static $host = 'localhost';
    public static $db_name = 'hobber';
    public static $username = 'root';
    public static $password = '';

    public static $app_messages = [
        'USER_SAVE_SUCCESS' => "User created successfully!",
        'USER_SAVE_ERROR' => "Error while creating user",
        'USER_DELETE_SUCCESS' => "User deleted successfully!",
        'USER_DELETE_ERROR' => "Error while deleting user",
        'USER_UPDATE_SUCCESS' => "User updated successfully!",
        'USER_UPDATE_ERROR' => "Error while updating user",
        'USER_DELETE_CONFIRM' => "Are you sure, you want to delete?"
    ];
}
?>