<?php
    include( "../DB/DataAccess.php");
    class Table extends classeMereTable{
        private $id;
        private $nom;
        private $DBnom;
        private $contrainte;

        function __construct($id, $nom, $DBnom, $contrainte)
        {
            $this->id=$id;
            $this->nom=$nom;
            $this->DBnom=$DBnom;
            $this->contrainte=$contrainte;
        }

        //------- methode selection --------
        public function SelectTable($nomtable){
            $this->Select($nomtable);
        }

        //---------- methode creation Insertion ---------
        protected function createTable($columns)  
        {
            $this->CreateInsertTable($this->nom,$columns);  // from classeMereTable
        }

        //---------- methode suppression ---------
        protected function deleteTable($fields)
        {
            $this->DropDeleteTable($this->nom, $fields, $this->id);
        }

        //---------- methode Modification ---------
        protected function updateTable($newTableName, $constraintName, $ReferencesTableName,  $ForeignKeyName)
        {
            $this->RenameTable($this->nom, $newTableName); // from ClasseMereTable
            $this->ForeignKey($this->nom, $constraintName, $ReferencesTableName,  $ForeignKeyName); // from ClasseMereTable
        }
         
       
    }
?>