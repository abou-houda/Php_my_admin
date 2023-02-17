<?php
include_once('./DB/DataAccess.php');
class BaseDonneesClasse extends ClasseMere{
    private $nom='DB';

    public function __Construct(){}

    //insert new db in our db table
    public function CreateDb($values){
        $this->Insert($this->nom,$values);
    }

    //delete db from our db table
    public function DropDb($idVal){
        $this->Delete($this->nom,'nom',$idVal);
    }

    //show all databases
    public function ShowDb(){
        return $this->Select($this->nom);
    }

    //select a db by its primaryKey nom
    public function SelectByNom($idVal){
        $this->SelectById($this->nom,'nom',$idVal);
    }
}

?>