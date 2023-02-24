<?php
$db = new DataAccess();
$nomTable = $_GET['table'] . '_' . $_GET['db'];
$stag = $db->selection("desc  $nomTable");

if (isset($_POST['submit'])) {

    $array = array();
    $values = "(";
    while ($row = $stag->fetch()) {
        if ($row[5] != "auto_increment") {
            array_push($array, $_POST[$row[0]]);
            $values .= $row[0] . ",";
        }
    }
    $values = substr($values, 0, strlen($values) - 1) . ")";
    $res =  $classMere->Insert($nomTable, $array, $values);
    if ($res == 1) {
?>
        <script>
            window.location = './index.php?page=table_data_list&&db=<?php echo $_GET['db'] ?>&&table=<?php echo $_GET['table'] ?>&&successmsg=1 ligne insérée.';
        </script>
    <?php
    } else {
    ?>
        <script>
            window.location = './index.php?page=table_data_list&&db=<?php echo $_GET['db'] ?>&&table=<?php echo $_GET['table'] ?>&&errormsg=erreur a lhors de insertion svp ressayer dans qq seconds';
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
                            <?php
                            $contraint = $table->selectContraint($_GET['table'], $_GET['db']);
                            while ($row = $stag->fetch()) {
                                $type = "text";
                                if (strpos($row[1], 'int') !== false) {
                                    $type = "number";
                                } else if (strpos($row[1], 'date') !== false)   $type = $row[1];
                                // echo $row[1];
                                // echo $row[2];
                                // echo $row[3];

                                if ($row[5] != "auto_increment") {
                                    $type = trim($type);
                                    $nom = strtoupper($row[0][0]) . strtolower(substr($row[0], - (strlen($row[0]) - 1)));

                                    if ($contraint[0] == $row[0]) {
                                        $n = $contraint[1] . '_' . $_GET['db'];
                                        $req = $db->selection("select * from $n");
                                        echo "<label for=''>  $nom</label>";
                                        echo '<select  class="form-control" name="' . $row[0] . '" id="">';
                                        while ($row = $req->fetch()) {
                                            echo "<option value='$row[0]'>$row[0]</option>";
                                        }
                                        echo "</select>";
                                        // echo $contraint[0];
                                    } else {
                                        echo "<label for=''>  $nom</label>
                                        <input class='form-control' type='$type' name='$row[0]'>";
                                    }
                                }
                                echo "<br>";
                            }

                            ?>
                            <input class='btn btn-primary' type='submit' name='submit' value="Exécuter">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>