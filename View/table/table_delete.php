<?php
$db_name = $_GET['db'];
$table_name = $_GET['table'];
$table->dropDeleteTable($db_name,$table_name);
?>
<script>
    window.location = './index.php?page=db_info&&section=parcourir&&db=<?php echo $db_name ?>';
</script>
