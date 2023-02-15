<?php
include_once "../classes/databaseClass.php";
if (isset($_POST['dbNom'])){
    echo (DataBase::CreateDb($_POST['dbNom'],2));
}