<div class="row">  <div class="col-12">
        <div  src="" height="500px" class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Créer une base de donnees</h5>

                        <label>Le nom de Base de données</label>
                        <form method="post" action="">
                        <input class="form-control" type="text" id="db_name" name="db_name" minlength="2" required>
                        <input class="btn btn-primary" type="submit" name="add" value="Créer ! " id="creer-db">
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div id="db-error"></div>
    </div>
</div>
<?php
if (isset($_POST['add'])){
    $res = $db->CreateDb([$_POST['db_name']]);
    if ($res == 1){
        $user->updateUser($_SESSION["login"],$_SESSION["password"],$_POST['db_name']);
        ?>
        <script>
            window.location= "./index.php?page=db_info&&section=info&&db="+'<?php echo $_POST['db_name']; ?>'+"&&successmsg=la base de donnees a ete bien ajoute";
        </script> 
        <?php
    }
    else{
        ?>
        <script>
            window.location= "./index.php?page=db_info&&section=info&&db="+'<?php echo $_POST['db_name']; ?>'+"&&errormsg=une base de données avec le meme nom deja existe";
        </script>
        <?php
    }
}
?>