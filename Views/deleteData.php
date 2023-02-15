<?php
include_once "../classes/tableClass.php";

if (isset($_GET['rowid'])) {
    Table::deleteData($_GET['rowid']);
    header("location:insertData.php");
}
