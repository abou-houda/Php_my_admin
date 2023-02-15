<?php
include_once "../classes/databaseClass.php";
if (isset($_POST['dbId'])){
    echo (DataBase::UpdateDbName($_POST['dbId'],$_POST['dbNom']));
}