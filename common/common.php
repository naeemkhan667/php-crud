<?php
namespace Common;
class common {
    public static function redirect($url){
        header("Location: $url");
    }
    public static function show_message(){
        $message = "";
        if(isset($_SESSION["message"])) {
            $message = $_SESSION["message"];
        }
        
        unset($_SESSION["message"]);
        if($message){
            return "<div style='background: #BEBEBE; padding: 5px;'> " . $message . "</div>";
        }
        return "";
        

    }
    public static function set_message($msg){
        $_SESSION["message"] = $msg;
    }
    public static function redirect_with_message($url, $msg = ''){
        $_SESSION["message"] = $msg;
        header("Location: $url");
    }
}
?>