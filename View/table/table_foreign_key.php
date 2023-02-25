<?php
$db = new DataAccess();
//$table->selectContraint("stagiaire", "test2");
if (isset($_POST['submit'])) {
    $contraintName = "FK_" . $_GET['table'] . "_" . $_POST['colmytable'];
    $nomtabl =  $_GET['table'] . "_" . $_GET['db'];
    //echo $contraintName;
    $res = $table->ForeignKey($_GET['db'], $_GET['table'], $nomtabl, $contraintName, $_POST['nomtable'] . "_" . $_GET['db'], $_POST['colmytable'], $_POST['colAutretable']);
    if ($res == 1) {
?>
        <script>
            window.location = './index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET['db'] ?>&&table=<?php echo $_GET['table'] ?>&&successmsg=la création de la clé étrangère éte sucsses';
        </script>
    <?php
    } else {
    ?>
        <script>
            window.location = './index.php?page=table_data_list&&section=foreignkey&&db=<?php echo $_GET['db'] ?>&&table=<?php echo $_GET['table'] ?>&&errormsg= lors de la création de la clé étrangère sur code (vérifier le type des données)';
        </script>
<?php
    }
}
?>
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0 p-4">
                    <h4 class="card-title "> Insérer une nouvelle ligne dans table <?php echo $_GET['table']; ?></h4>
                    <div class=" container">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <label for="">Colonne :</label>
                                    <select name="colmytable" id="" class="form-control">
                                        <?php
                                        $nomtbl = $_GET['table'] . "_" . $_GET['db'];
                                        $r = $db->selection("desc $nomtbl");

                                        while ($row = $r->fetch()) {

                                            echo "<option value='$row[0]'>$row[0]</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Nom table:</label>
                                    <select name="nomtable" id="nomtable" class="form-control">
                                        <option value=""></option>
                                        <?php
                                        $tables = $table->SelectById("mytable", "db_nom", $_GET['db']);
                                        while ($row1 = $tables->fetch()) {
                                            $nomt = $row1[1];
                                            if ($row1[1] != $_GET['table'])
                                                echo "<option value='$nomt'>$row1[1]</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col">
                                    <label for=""> Colonne:</label>
                                    <select name="colAutretable" id="col" class="form-control"> </select>
                                </div>
                            </div>
                            <input class='btn btn-primary' type='submit' name='submit' value="Exécuter">
                        </form>

                        <script>
                            $(document).ready(function() {
                                $("#nomtable").change(function() {
                                    var nomtable = $("#nomtable").val() + "_";
                                    nom = <?php echo "'" . $_GET['db'] . "'" ?>;
                                    nomtable += nom
                                    console.log(nomtable)
                                    $.ajax({
                                        url: 'table/colonne.php',
                                        method: 'post',
                                        data: 'nomtable=' + nomtable
                                    }).done(function(response) {
                                        colonne = JSON.parse(response);
                                        $("#col").html("");
                                        //  $("#cne").append(' <option value="" selected disabled>Code National</option>')
                                        for (let i = 0; i < colonne.length; i++) {
                                            if (colonne[i].Key == "PRI")
                                                $("#col").append("<option vlaue='" + colonne[i].Field + "'>" + colonne[i].Field + "</option>")
                                        }
                                    })
                                })
                            })
                        </script>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>