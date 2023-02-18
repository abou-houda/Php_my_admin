<?php
include_once('../DB/DataAccess.php');
include_once ('ClasseMere.php');
class BaseDonneesClasse extends ClasseMere{
    private $nom='DB';

    public function __Construct(){
    }

    //insert new db in our db table
    public function CreateDb($values){
        return $this->Insert($this->nom,$values);
    }

    //delete db from our db table
    public function DropDb($idVal){
        return $this->Delete($this->nom,['nom'],[$idVal]);
    }

    //show all databases
    public function ShowDb(){
        return $this->Select($this->nom);
    }

    //edit database
    public function editDb($values,$value){
        return $this->Update($this->nom,$values,'nom',$value);
    }

    //select a db by its primaryKey nom
    public function SelectByNom($idVal){
        $this->SelectById($this->nom,'nom',$idVal);
    }

    public function getTableCountByDB($dbNom){
        $res = $this::selection("select count(*) from mytable where db_nom = '$dbNom'")->fetchAll();
        return $res[0][0];
    }
}

?>