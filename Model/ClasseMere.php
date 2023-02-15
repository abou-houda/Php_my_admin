<?php
include('../DB/DataAccess.php');
class ClasseMere extends DataAccess{
    public function Insert($table,$fields)
    {
        $string = '';
        for ($i = 0; $i < count($fields); $i++){

            if(is_string($fields[$i])) $string .="'".$fields[$i]."'";
            else  $string .=$fields[$i];

            if ($i !== count($fields) - 1) $string .= ',';
        }
        $query = "INSERT INTO $table VALUES($string);";
        self::miseajour($query);
        return 0; 
    }
    public function Select($table){
        return DataAccess::selection("SELECT * FROM $table");
    }
    public function SelectById($table,$id,$idValue){
        return DataAccess::selection("SELECT * FROM $table WHERE $id=$idValue");
    }
    public function Update($table,$values,$id){

        $data = DataAccess::selection("DESC $table")->fetchAll();
        $string='';
            for($i=1;$i<count($data);$i++) {     
                $string .= $data[$i][0].'='."'".$values[$i-1]."'";

                if($i< count($data)- 1) $string .=',';
            }
            $query="UPDATE $table SET $string WHERE id=$id";
            self::miseajour($query);
            return 0;
    }
    public function Delete($table,$field,$idValue){
        $query = "DELETE FROM $table WHERE $field=$idValue;";
        self::miseajour($query);
        return 0; 
    }
}
?>