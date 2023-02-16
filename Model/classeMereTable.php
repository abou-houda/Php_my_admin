<?php
include('../DB/DataAccess.php');
class classeMereTable extends classeMere{

    // ---------- Methode createTable -----------
    protected function create($table, $fields)
    {
        $string = '';
        for ($i = 0; $i < count($fields); $i++) 
        {
            $string .= implode(' ', $fields[$i]);
            if ($i !== count($fields) - 1) 
            {
                $string .= ',';
            }
        }
        $query = "CREATE TABLE $table ($string);";
        self::miseajour($query);
        return 0;
    }

    // ----------- Methode DropTable ------------
    protected function dropTable($tableName){
        $query = "DROP TABLE $tableName;";
        self::miseajour($query);
        return 0;
    }
}
?>