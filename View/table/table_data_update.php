<?php
$db = new DataAccess();

$nomTable = $_GET['table'] . '_' . $_GET['db'];
$stag = $db->selection("desc  $nomTable");
$nomid = "";
$typeid = "";

while ($r = $stag->fetch()) {
    if ($r[3] == "PRI") {
        $nomid = $r[0];
        $typeid = $r[1];
    }
}
$stag = $db->selection("desc  $nomTable");
if ($nomid == "") {
    $r = $stag->fetch();
    $nomid = $r[0];
}
if (isset($_POST['submit'])) {

    $array = array();
    $stag = $db->selection("desc  $nomTable");
    $j = 0;
    while ($row = $stag->fetch()) {
        if ($j == 0)
            array_push($array, $_GET['id']);
        else
            array_push($array, $_POST[$row[0]]);
        $j++;
    }

//    print_r($array);
    $res =  $classMere->update($nomTable, $array, $nomid, $_GET['id']);
?>
    <script>
        window.location = './index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET['db']; ?>&&table=<?php echo $_GET['table']; ?>&&successmsg=1 éte modifier.';
    </script>
<?php


}
?>
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0 p-4">
                    <h4 class="card-title "> Modification une ligne dans table <?php echo $_GET['table']; ?></h4>
                    <div class=" container">
                        <form action="" method="post">
                            <?php
                            $donner = "select * from $nomTable where $nomid=";
                            $donner .= strpos($typeid, "int") ? $_GET['id'] : "'" . $_GET['id'] . "'";
                            $ligne = $db->selection($donner);
                            $valeur = $ligne->fetch();
                            $stag = $db->selection("desc  $nomTable");
                            $i = 0;
                            $contraint = $table->selectContraint($_GET['table'], $_GET['db']);
                            while ($row = $stag->fetch()) {

                                $type = "text";
                                if (strpos($row[1], 'int') !== false) {
                                    $type = "number";
                                } else if (strpos($row[1], 'date') !== false) $type = $row[1];

                                $nom = strtoupper($row[0][0]) . strtolower(substr($row[0], - (strlen($row[0]) - 1)));
                                echo "<label for=''> $nom</label>";
                                if ($row[3] == 'PRI') {
                                    echo "<input class='form-control' type='$type' name='$row[0]' value='$valeur[$i]' disabled >";
                                } else {
                                    if ($contraint[0] == $row[0]) {
                                        $n = $contraint[1] . '_' . $_GET['db'];
                                        $req = $db->selection("select * from $n");
                                        echo '<select  class="form-control" name="' . $row[0] . '" id="">';
                                        while ($row = $req->fetch()) {
                                            if ($valeur[$i] == $row[0])
                                                echo "<option value='$row[0]' selected>$row[0]</option>";
                                            else
                                                echo "<option value='$row[0]'>$row[0]</option>";
                                        }
                                        echo "</select>";
                                        // echo $contraint[0];
                                    } else {
                                        echo "<input class='form-control' type='$type' name='$row[0]' value='$valeur[$i]'>";
                                    }
                                }
                                //echo "<br>";
                                //echo $row[0];
                                $i++;
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