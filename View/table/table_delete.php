<?php
$db_name = $_GET['db'];
$table_name = $_GET['table'];
$res = $table->dropDeleteTable($db_name,$table_name);
if ($res == 1){
?>
<script>
    window.location = './index.php?page=db_info&&section=parcourir&&db=<?php echo $db_name ?>&&successmsg=la table a ete Supprimer';
</script>
<?php
}
else{
    ?>
    <script>
        window.location = './index.php?page=db_info&&section=parcourir&&db=<?php echo $db_name ?>&&errormsg=erreur a lhors de suppression svp ressayer dans qq seconds';
    </script>
    <?php
}

