<?php
$res = $table->Delete($_GET['table'].'_'.$_GET['db'],[$_GET['pk']],[$_GET['data']]);
if ($res == 1){
?>
<script>
    window.location = './index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET["db"]?>&&table=<?php echo $_GET["table"]?>&&successmsg=lenregistrement a ete Supprimer';
</script>
<?php
}
else{
    ?>
    <script>
        window.location = './index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET["db"]?>&&table=<?php echo $_GET["table"]?>&&errormsg=erreur a lhors de suppression svp ressayer dans qq seconds';
    </script>
    <?php
}

