<?php
include_once ('./DB/DataAccess.php');
include_once ('classeMere.php');
class classeMereTable extends classeMere{

    //create table
    public function CreateTable($dbNom, $tableName, $fieldsName, $fieldsType, $fieldsLength,
                                         $fieldsDefault, $fieldIsPrimary, $fieldIsAutoIncr)
    {
        $query = "CREATE TABLE ".$tableName."_".$dbNom." (";
        for ($i = 0 ; $i < count($fieldsName) ; $i++){
            $field = $fieldsName[$i] . ($fieldsLength[$i] != '' ? (' '.$fieldsType[$i].'('.$fieldsLength[$i].')') :
                    ($fieldsType[$i] == "VARCHAR" ? (' VARCHAR(250)') : (' '.$fieldsType[$i]))) .
                ($fieldsDefault[$i] != '' ? (isset($fieldIsAutoIncr[$i]) ? (' DEFAULT '.$fieldsDefault[$i]) : '') : ' NOT NULL') .
                (isset($fieldIsAutoIncr[$i]) ? ' AUTO_INCREMENT' : '').
                (isset($fieldIsPrimary[$i]) ? (' PRIMARY KEY') : '') . ($i != count($fieldsName)-1 ? ',' : ');');

            $query .= $field;
        }
        return self::miseajour($query);
//        $insert = "INSERT INTO `ClasseTable`( `nom`) VALUES ('$tableName')";
//        self::miseajour($insert);
//
//        $query = "CREATE TABLE $tableName (";
//        foreach ($columns as $column) {
//            $query .= $column . " VARCHAR(255),";
//        }
//        $query .= "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";
//        self::miseajour($query);
//        return 0;
    }

    //rename table
    public function RenameTable($dbNom, $oldTableName, $newTableName)
    {
        $query = "ALTER TABLE " . $oldTableName."_".$dbNom . " RENAME TO " . $newTableName."_".$dbNom;
        return self::miseajour($query);
    }

    //------------------- FOREIGN KEY ---------------------------
    protected function ForeignKey($AlterTableName, $constraintName, $ReferencesTableName, $ForeignKeyName,$references)
    {
        $query = "ALTER TABLE " . $AlterTableName . 
               " ADD CONSTRAINT " . $constraintName .
               " FOREIGN KEY ($ForeignKeyName) REFERENCES " . $ReferencesTableName . "($references) ON DELETE CASCADE ON UPDATE CASCADE";
        echo $query;
        return self::miseajour($query);
    }

    // ----------- Methode DropTable  ------------
    protected function DropTable($tableName){
        $query = "DROP TABLE $tableName;";
        return self::miseajour($query);
    }
}
?>