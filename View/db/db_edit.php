<?php
include_once ('../Model/classeTable.php');
$dbname = "";
if (isset($_POST['edit'])){
    $dbname = $_POST['new'];
    $tableObject = new Table();
    $res = $db->editDb([$_POST['new']],$_POST['old']);
    if ($res == 1){
        $tables = $db->Select("mytable");
        while ($row = $tables->fetch()){
            $tableObject->RenameTable($_POST['old'],$_POST['new'],$row[1],$row[1]);
        }
        $tables->closeCursor();
        ?>
        <script>
            window.location= "./index.php?page=db_info&&section=info&&db="+'<?php echo $dbname; ?>'+"&&successmsg=la base de donnees a ete bien modifier";
        </script>
        <?php
    }
    else{
        ?>
        <script>
            window.location= "./index.php?page=db_info&&section=info&&db="+'<?php echo $dbname; ?>'+"&&errormsg=une base de données avec le meme nom deja existe";
        </script>
        <?php
    }

}
else{
    $dbname = $_GET['db'];
}
?>

<div class="row">  <div class="col-12">
        <div  src="" height="500px" class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Modifier la base de donnees</h5>
                        <form method="post" action="" >
                        <label>Le nom de Base de données</label>
                        <input class="form-control" type="text" id="db_name_edit" name="new" minlength="2" value="<?php echo $dbname ;?>" required>
                            <input class="form-control" type="text" id="db_name_edit" name="old" minlength="2" style="display: none" value="<?php echo $dbname ;?>">
                            <input class="btn btn-primary" type="submit" value="Modifier ! " name="edit" id="edit-db">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>