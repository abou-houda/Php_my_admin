<?php
include('../DB/DataAccess.php');
class BaseDonneesClasse extends ClasseMere{
    private $nom='DB';
    
    public function CreateDb($values){
        $this->Insert($this->nom,$values);
    }

    public function DropDb($idVal){
        $this->Delete($this->nom,'nom',$idVal);
    }
    public function ShowDb(){
        return $this->Select($this->nom);
    }
    public function SelectByNom($idVal){
        $this->SelectById($this->nom,'nom',$idVal);
    }
}

?>