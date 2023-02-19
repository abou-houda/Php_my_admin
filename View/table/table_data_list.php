<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0 p-4">
                    <h4 class="card-title"><?php echo $_GET['table']; ?><span> | Enregistrement</span></h4>

                    <table id="datalisttable" class="table table-borderless table-striped table-hover p-4">
    <thead>
    <tr>
        <?php
        $table_fields = $db->TableFeilds($_GET['table'].'_'.$_GET['db']);
        $pk = $table_fields[0];
        foreach ($table_fields as $field){
            echo ('<th scope="col-4" class="text-center col-'.round(8/count($table_fields)+1).'">'.$field.'</th>');
        }
        ?>
        <th scope="col-4" class="text-center col-4">Action</th>
    </tr>
    </thead>
    <tbody>
<?php
$table_data = $db->Select($_GET['table'].'_'.$_GET['db']);
while ($row1 = $table_data->fetch()){
    echo '<tr class="text-center">';
    echo '<td ><a  class="text-primary fw-bold">'.$row1[0].'</a></td>';
    for($i=1;$i<count($table_fields);$i++){
        echo '  <td >'.$row1[$i].'</td>';
    }
    ?>
    <td ><button class="btn btn-primary m-2 p-2" style="width: 100px"><a href="" style="color: white;font-weight: bold">Modifier</a></button>
        <button onclick="deleteItem('table_data','Vous Etes Sur que vous voulez supprimer cette Enregistrement?','l\'enregistrement va etre supprimer','&&db=<?php echo $_GET['db'] ?>&&table=<?php echo $_GET['table'] ?>&&pk=<?php echo $pk?>&&data=<?php echo $row1[0]?>')"
                class="btn btn-secondary  p-2" style="width: 100px">Supprimer</button></td>
    </tr>

    <?php

}
$table_data->closeCursor();
?>

    </tbody>
</table>
                </div>

            </div>
        </div>
    </div>
</div>



