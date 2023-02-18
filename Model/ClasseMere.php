<?php
include_once ('../DB/DataAccess.php');
class ClasseMere extends DataAccess{

    //insert into table x
    public function Insert($table,$fields)
    {
        $string = "";
        for ($i = 0; $i < count($fields); $i++){

            if(is_string($fields[$i])) $string .="'".$fields[$i]."'";
            elseif ($fields[$i] == null) $string .= 'Null';
            else  $string .=$fields[$i];

            if ($i !== count($fields) - 1) $string .= ',';
        }
        $query = "INSERT INTO $table VALUES($string);";
        return self::miseajour($query);
    }

    //select from table x
    public function Select($table){
        return DataAccess::selection("SELECT * FROM $table");
    }

    //select from table x by primaryKey
    public function SelectById($table,$id,$idValue){
        $query = "SELECT * FROM $table WHERE $id='$idValue'";
        return DataAccess::selection($query);
    }

    //update table x
    public function Update($table,$values,$key,$value){

        $data = DataAccess::selection("DESC $table")->fetchAll();
        $string='';
            for($i=0;$i<count($data);$i++) {
                $string .= $data[$i][0].'='."'".$values[$i]."'";

                if($i< count($data)- 1) $string .=',';
            }
            $query="UPDATE $table SET $string WHERE $key='$value'";
            return self::miseajour($query);
    }

    //delete from table x
    public function Delete($table,$fields,$Values){
        $query = "DELETE FROM $table WHERE ";
        for ($i = 0 ;$i<count($fields);$i++){
            $query .= $fields[$i]."="."'".$Values[$i]."'";
            if ($i !== count($fields)-1) $query .= " AND ";
            else $query .= ";";
        }
        return self::miseajour($query);
    }

    public function TableFeilds($table){
        $query = "DESC $table";
        $data = DataAccess::selection($query)->fetchAll();
        $fields  = array();
        for($i=0;$i<count($data);$i++) {
            $fields[] = $data[$i][0];
        }
        return $fields;
    }
}
?>