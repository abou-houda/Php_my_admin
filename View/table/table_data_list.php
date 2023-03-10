
<div class="row">
    <div class="col-12">
        <div class="btn-group btn-group-toggle float-start">
            <label class="btn btn-sm btn-primary btn-simple <?php echo ($_GET['section'] == 'parcourir' ? 'active' : '') ?>" id="1">
                <input type="radio" class="d-none" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"><a class="<?php echo ($_GET['section'] == 'parcourir' ? 'text-white' : 'text-black') ?>" href="./index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET['db']; ?>&&table=<?php echo $_GET['table']; ?>" class="<?php echo ($_GET['section'] == 'parcourir' ? 'text-white' : 'text-black') ?>">Parcourir</a></span>
                <span class="d-block d-sm-none">
                    <i class="tim-icons icon-gift-2"></i>
                </span>
            </label>
            <label class="btn btn-sm btn-primary btn-simple  <?php echo ($_GET['section'] == 'structure' ? 'active' : '') ?>">
                <input type="radio" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block" ><a class="<?php echo ($_GET['section'] == 'structure' ? 'text-white' : 'text-black') ?>" href="./index.php?page=table_data_list&&section=structure&&db=<?php echo $_GET['db']; ?>&&table=<?php echo $_GET['table']?>"   class="text-white">Structure</a></span>
            </label>
            <label class="btn btn-sm btn-primary btn-simple  <?php echo ($_GET['section'] == 'ajouter' ? 'active' : '') ?>">
                <input type="radio" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block" ><a class="<?php echo ($_GET['section'] == 'ajouter' ? 'text-white' : 'text-black') ?>" href="./index.php?page=table_data_list&&section=ajouter&&db=<?php echo $_GET['db']; ?>&&table=<?php echo $_GET['table']?>"   class="text-white">Insérer</a></span>
            </label>
            <label class="btn btn-sm btn-primary btn-simple  <?php echo ($_GET['section'] == 'foreignkey' ? 'active' : '') ?>">
                <input type="radio" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block" ><a class="<?php echo ($_GET['section'] == 'foreignkey' ? 'text-white' : 'text-black') ?>" href="./index.php?page=table_data_list&&section=foreignkey&&db=<?php echo $_GET['db'] ?> &&table=<?php echo $_GET['table']; ?>"   class="text-white">Ajouter Foreign key</a></span>
            </label>
            <label id="export_label" class="btn btn-sm btn-primary btn-simple  ">
                <input type="radio" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block" ><a id="export" style="color: #bf30ee">  Exporter</a></span>
            </label>
            <label  class="btn btn-sm btn-primary btn-simple  <?php echo ($_GET['section'] == 'import' ? 'active' : '') ?>">
                <input type="radio" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block" ><a class="<?php echo ($_GET['section'] == 'import' ? 'text-white' : 'text-black') ?>" href="./index.php?page=table_data_list&&section=import&&db=<?php echo $_GET['db'] ?> &&table=<?php echo $_GET['table']; ?>"   class="text-white">Importer</a></span>
            </label>
        </div>

    </div>
</div>
<?php
if ($_GET['section'] == "parcourir"){
    ?>
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
                                <td ><button class="btn btn-primary m-2 p-2" style="width: 100px"><a href="./index.php?page=table_data_update&&db=<?php echo $_GET['db'] ?>&&table=<?php echo $_GET['table'] ?>&&id=<?php echo $row1[0]?>" style="color: white;font-weight: bold">Modifier</a></button>
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
<?php
}
elseif ($_GET['section']=='foreignkey'){
    include_once 'table_foreign_key.php';
}
elseif ($_GET['section']=='structure'){
    include_once 'table_structure.php';
}
//elseif ($_GET['section']=='export'){
//    include_once 'table_export.php';
//
//}
elseif ($_GET['section']=='import'){
    include_once 'table_import.php';
}
else{
    include_once 'table_add_data.php';
}
?>

<script>
    $('#export').click(function (){
        $('label').removeClass('active');
        $('label a').removeClass('text-white');
        $('label a').css('color','');
        $('label a').addClass('text-black');
        $('#export_label').addClass('active');

                $.ajax({
                    url: 'table/selectJson.php?db=<?php echo $_GET['db']; ?>&&table=<?php echo $_GET['table']; ?>',
                    success: function (data) {
                        console.log(data);
                        const EXCEL_TYPE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=UTF-8';
                        const EXCEL_EXTENSION = '.xlsx';
                        const worksheet = XLSX.utils.json_to_sheet(JSON.parse(data));
                        const workbook = {
                            Sheets : {
                                'data' : worksheet
                            },
                            SheetNames : ['data']
                        };
                        const excelBuffer = XLSX.write(workbook,{bookType : 'xlsx',type : 'array'});
                        const sheet = new Blob([excelBuffer], {type:EXCEL_TYPE,});
                        saveAs(sheet,"test"+'_export_'+new Date().getTime()+EXCEL_EXTENSION);
                        setTimeout(function (){
                            window.location='./index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET["db"]?>&&table=<?php echo $_GET["table"]?>&&successmsg=la table a ete bien exporter !';

                        },1000);
                    },
                    error: function (er) {
                        console.log(er);
                        window.location='./index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET["db"]?>&&table=<?php echo $_GET["table"]?>&&errormsg=erreur a lhors de lexportation  !';

                    }

                })
    })
</script>




