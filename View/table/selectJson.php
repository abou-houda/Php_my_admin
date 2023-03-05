<?php
include_once '../../DB/DataAccess.php';
$query = "select * from ".$_GET['table']."_".$_GET['db'];
$data1 = DataAccess::selection($query)->fetchAll();
$query = "DESC ".$_GET['table']."_".$_GET['db'];
$data = DataAccess::selection($query)->fetchAll();
$element = [];
$result = [];
$fields  = array();
for($i=0;$i<count($data);$i++) {
    $fields[] = $data[$i][0];
}


for ($j=0 ; $j<count($data1);$j++) {


    for ($i = 0; $i < count($fields);$i++) {
        $element[$fields[$i]] = $data1[$j][$i];
    }

    array_push($result,$element);
}
echo json_encode($result);