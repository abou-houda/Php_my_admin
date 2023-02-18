<?php
    include_once( "../DB/DataAccess.php");
    include_once( "classeMereTable.php");
    class Table extends classeMereTable{

        public function __Construct(){}

        //---------- methode creation Insertion ---------
        public function createInsertTable($dbNom, $tableName, $fieldsName, $fieldsType, $fieldsLength,
                                          $fieldsDefault, $fieldIsPrimary, $fieldIsAutoIncr)
        {
            $res = $this->CreateTable($dbNom, $tableName, $fieldsName, $fieldsType, $fieldsLength,
                $fieldsDefault, $fieldIsPrimary, $fieldIsAutoIncr);
            if ($res == 0){
                return  $this->Insert("mytable",[null,$tableName,$dbNom,'']);
            }
            return -1;
        }

        //---------- methode drop suppression ---------
        public function dropDeleteTable($dbNom, $tableName)
        {
            $res = $this->DropTable($tableName.'_'.$dbNom);
            if ($res == 0){
                return $this->Delete("mytable",["nom","db_nom"],[$tableName,$dbNom]);
            }
            return -1;
        }

        //---------- methode update Modification ---------
        public function updateTableNom($dbName1,$dbName2,$oldName,$newName)
        {
            $res = $this->RenameTable($dbName1,$dbName2,$oldName,$newName);
            if ($res == 0){
                $select = $this->SelectById("mytable","nom",$oldName)->fetchAll();
                return $this->Update("mytable",[$newName,$dbName2,$select[0]['contraint']],"nom",$oldName);
            }
            return -1;
        }

        //---------- methode add foreign key ----------------

        public function addForeignKey($dbName,$tableName,$constraintName,$tableReferencesName,$fkName,$references){
            $res = $this->ForeignKey($tableName.'_'.$dbName,$constraintName,
                $tableReferencesName.'_'.$dbName,$fkName,$references);
            if ($res ==0){
                return $this->Update("mytable",[$tableName,$dbName,$fkName.'/'.$tableReferencesName.'/'.$references],"nom",$tableName);
            }
            return -1;
        }

        public function selectTableRowCount($dbName,$tableName){
            $res = $this::selection("select count(*) from ".($tableName.'_'.$dbName))->fetchAll();
            return $res[0][0];
        }
    }
?>