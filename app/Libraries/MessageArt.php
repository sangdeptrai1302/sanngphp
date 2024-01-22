<?php
namespace App\Libraries;


class MessageArt{
    public static function set_flash($name,$msg){
        $_SESSION['$name']=$msg;
    }
}