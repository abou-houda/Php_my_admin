<?php
$table->Delete($_GET['table'].'_'.$_GET['db'],[$_GET['pk']],[$_GET['data']]);
?>
<script>
    window.location = './index.php?page=table_data_list&&db=<?php echo $_GET["db"]?>&&table=<?php echo $_GET["table"]?>';
</script>
