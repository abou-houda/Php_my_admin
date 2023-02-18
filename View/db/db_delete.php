<?php
$db_nom = $_GET['db'];
$res = $db->DropDb($db_nom);
if ($res == 1 ){
    $tablesName = $db->SelectById("mytable",'db_nom',$db_nom);
    while ($row = $tablesName->fetch()){
        $table->DropTable($row[2].'_'.$db_nom);
    }
    $tablesName->closeCursor();
?>
<script>
    window.location = "./index.php?successmsg=la base de donnees a ete Supprimer";
</script>
<?php
}
else{
    ?>
    <script>
        window.location = "./index.php?errormsg=erreur a l'hors de suppression svp ressayer dans qq seconds";
    </script>
    <?php
}


