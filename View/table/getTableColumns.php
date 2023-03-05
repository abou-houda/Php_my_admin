<?php
include_once '../../DB/DataAccess.php';
$query = "DESC ".$_GET['table']."_".$_GET['db'];
$data = DataAccess::selection($query)->fetchAll();
$fields  = array();
for($i=0;$i<count($data);$i++) {
    $fields[] = $data[$i][0];
}

echo json_encode($fields);