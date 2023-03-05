<?php
include_once '../../DB/DataAccess.php';
$query = "insert into ".$_GET['table']."_".$_GET['db']." values(";

$data = json_decode($_GET['data']);

    for ($i = 0 ; $i<count($data);$i++){
        for ($j = 0 ; $j<count($data[$i]);$j++){
            $query .= "'".$data[$i][$j]."'";
            if($j == count($data[$i])-1) $query.= ')' ;
            else $query.= ',';
        }
        if($i == count($data)-1) $query.= ';' ;
        else $query.= ',(';
    }
try {
    $res = DataAccess::miseajour($query);
    echo $res;
}
catch (Exception $ex){
    ?>
    <script>
        window.location='./index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET["db"]?>&&table=<?php echo $_GET["table"]?>&&errormsg=Erreur dans votre xsl file checker les primary key  !';
    </script>
    <?php
}