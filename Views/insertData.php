<?php
include_once "../classes/tableClass.php";

$table = new Table(1, "db1", 1);
//$table->insertData([1, "jj", "kjdg"]);
$a =  $table->ArrayColonne();

if (isset($_POST['submit'])) {
    $array = array();

    for ($i = 0; $i < count($a); $i++) {
        $col = $_POST[$a[$i]];
        array_push($array, $col);
    }
    $table->insertData($array);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <?php $table->createForme(); ?>
        <input type="submit" value="Exécute" name="submit" class="btn btn-fill btn-primary">

    </form>
    <a href="deleteData.php?rowid=1">Delete data</a>
</body>

</html>