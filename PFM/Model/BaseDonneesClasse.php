<?php
class BaseDonneesClasse extends ClasseMere{

    public function CreateDb($nameDb){
        $this->Insert('DB',$nameDb);
    }

    public function DropDb($nameDb){
        $this->Delete('DB',$nameDb);
    }
    public function ShowDb(){
        return $this->Select('Db');
    }
    public function SelectByNom($nom){
        return DataAccess::selection("SELECT * FROM Db WHERE nom=$nom");
    }

}
?>