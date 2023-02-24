  <?php
    include_once('../../DB/DataAccess.php');
    $db = new DataAccess();
    $nompri = "";
    if (isset($_POST["nomtable"])) {
        $nomtable = $_POST["nomtable"];
        $req = $db->selection("desc  $nomtable");
        echo json_encode($req->fetchAll(PDO::FETCH_ASSOC));

        // while ($row = $req->fetch()) {
        //     if ($row[3] == 'PRI') {
        //         $nompri = $row[0];
        //     }
        // }
        // echo $nompri;
    }


    ?>