<?php
class Fw_User extends Fw_Session{
    public static $info;
    public static function setId($id){
        self::set('Fw_User_id', $id);
    }
     
    public static function getId(){
        return self::get('Fw_User_id');
    }
     
    public static function setInfo($info){
        self::set('Fw_User_info', $info);
    }
     
    public static function getInfo(){
        return self::get('Fw_User_info');
    }
     
    public static function logged(){
        if(self::get('Fw_User_id') !== null)
            return true;
        return false;
    }
     
    public static function logout(){
        self::delete('Fw_User_id');
        self::delete('Fw_User_info');
        if(self::get('Fw_User_id') !== null)
            return false;
        return true;
    }
}