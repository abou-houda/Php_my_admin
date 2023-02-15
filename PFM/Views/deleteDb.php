<?php
include_once "../classes/databaseClass.php";
if (isset($_GET['dbId'])){
    echo (DataBase::DropDb($_GET['dbId']));
}