<?php
include('../DB/DataAccess.php');
class classeMereTable extends classeMere{

    // ---------- Methode createInsertTable -----------
    protected function CreateInsertTable($tableName, $columns)
    {
        $insert = "INSERT INTO `ClasseTable`( `nom`) VALUES ('$tableName')";
        self::miseajour($insert);

        $query = "CREATE TABLE $tableName (";
        foreach ($columns as $column) {
            $query .= $column . " VARCHAR(255),";
        }
        $query .= "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";
        self::miseajour($query);
        return 0;
    }

    //------------------- RENAME TABLE ---------------------------
    function RenameTable($oldTableName, $newTableName) 
    {
        $query = "ALTER TABLE " . $oldTableName . " RENAME TO " . $newTableName;
        self::miseajour($query);
        return 0;
    }

    //------------------- FOREIGN KEY ---------------------------
    protected function ForeignKey($AlterTableName, $constraintName, $ReferencesTableName, $ForeignKeyName)
    {
        $query = "ALTER TABLE " . $AlterTableName . 
               "ADD CONSTRAINT " . $constraintName . 
               "FOREIGN KEY ($ForeignKeyName) REFERENCES " . $ReferencesTableName . "($ForeignKeyName)";
        self::miseajour($query);
        return 0;
    }

    // ----------- Methode DropDeleteTable  ------------
    protected function DropDeleteTable($tableName,$field,$idValue){
        $this->Delete($tableName,$field,$idValue);
        $query = "DROP TABLE $tableName;";
        self::miseajour($query);
        return 0;
    }
}
?>