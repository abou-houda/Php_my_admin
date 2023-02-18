<?php
$db_nom = $_GET['db'];
$db->DropDb($db_nom);
$tablesName = $db->SelectById("mytable",'db_nom',$db_nom);
while ($row = $tablesName->fetch()){
    $table->DropTable($row[2].'_'.$db_nom);
}
$tablesName->closeCursor();
?>
<script>
    window.location = "./index.php";
</script>
