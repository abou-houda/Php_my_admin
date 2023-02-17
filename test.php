<form method="post" action="test.php">
<?php
include_once "Model/classeMereTable.php";
include_once "Model/classeTable.php";
if (isset($_POST['submit'])){
//    echo (print_r($_POST['name']));
//    echo "<br>";
//    echo (print_r($_POST['number']));
//    echo "<br>";
//    echo (print_r($_POST['test']));
//    echo ($_POST['test'][3]);
//    echo "<br>";
//    echo (print_r($_POST['select']));
//    if ($_POST['number'][1]== ''){
//        echo "<br>null";
//    }

    $objet = new Table();
    $res = $objet->createInsertTable("test","kaoutar",$_POST['name'],$_POST['type'],$_POST['length'],$_POST['default'],$_POST['primary'],$_POST['auto']);
    echo $res;
}
$objet = new Table();
$objet->addForeignKey("test",'kaoutar','fk150','khadija','khadija_id','id');
//$objet =new classeMereTable();
//$objet->RenameTable("test","kaoutar","khadija");
for ($i =0 ; $i<4 ;$i++){
    echo ('<tr><td><input type = "text" name = "name[]"></td>
<td><select name="type[]">
<option>INT</option>
<option>VARCHAR</option>
<option>TEXT</option>
</select></td>
<td><input type = "number" name="length[]"></td>
<td><input type = "texte" name = "default[]"><td>
<input type="checkbox" name="primary['.$i.']">primary</td>
<td><input type="checkbox" name="auto['.$i.']">auto increment</td>

</tr><br>');
}

?>
    <input type="submit" value="submit" name="submit">
</form>
