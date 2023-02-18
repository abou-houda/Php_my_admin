<?php
include_once ('ClasseMere.php');
class User extends ClasseMere
{
    private $id;
    private $login;
    private $password;
    private $dbs;

    public function __construct($id,$login,$password,$dbs){
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->dbs = $dbs;
    }

    static function getUser($login,$password){
        $users = DataAccess::selection("select * from users");
        while ($row = $users->fetch()){
            if ($row[1] == $login && $row[2] == $password){
                return new User($row[0],$login,$password,$row[3]);
            }
        }
        $users->closeCursor();
        return null;
    }

    public function getDataBases(){
        if ($this->dbs == "all"){
            $userDbs = array();
            $dbs = self::Select("db");
            while ($row = $dbs->fetch()){
                $userDbs[] = $row[0];
            }
            $dbs->closeCursor();
            return $userDbs;
        }
        else{
           return $userDbs = explode('**',$this->dbs);
        }
    }

    public function updateUser($login,$password,$db){
        return $this->Update('users',[$this->id,$login,$password,($db != '' ? $this->dbs.'**'.$db : $this->dbs)],'id',$this->id);
    }
}