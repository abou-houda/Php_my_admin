<div class="row">  <div class="col-12">
        <div  src="" height="500px" class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">Créer une base de donnees</h5>

                        <label>Le nom de Base de données</label>
                            <input  class="form-control" type="file" id="input"  name="File"  >
                            <input class="btn btn-primary" id="button" type="button" name="import" value="Importer ! ">
                    </div>

                </div>
            </div>
        </div>
        <div id="db-error"></div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>

        <script>
            let selectedFile;
            document.getElementById('input').addEventListener("change", (event) => {
                selectedFile = event.target.files[0];
            })
            document.getElementById('button').addEventListener("click", () => {
             if(selectedFile) {
            let fileReader = new FileReader();
            fileReader.readAsBinaryString (selectedFile);
            fileReader.onload = (event) =>{
                let data = event.target.result;
                let workbook = XLSX.read(data,{type:'binary'});
                let alphabet = ["A","B","C","D","E","F","J","H","I","G","K","L","M","N","O","P","Q","R","S","T","W","X","Y","Z"];
                workbook.SheetNames.forEach(sheet => {
                    $.ajax({
                        url: 'table/getTableColumns.php?db=<?php echo $_GET['db']; ?>&&table=<?php echo $_GET['table']; ?>',
                        success: function (data) {
                            data = JSON.parse(data);
                            let rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheet]);
                            var allData = [];
                            for (let i=0 ; i<rowObject.length;i++){
                                var values = [];
                                for (let j=0 ; j<data.length;j++){
                                    values.push(rowObject[i][data[j]])
                                }
                                allData.push(values);
                            }
                            var result = JSON.stringify(allData);
                            $.ajax({
                                url: 'table/import.php?db=<?php echo $_GET['db']; ?>&&table=<?php echo $_GET['table']; ?>&&data='+result,
                                success: function (data) {
                                    if (parseInt(data) && parseInt(data) >0){
                                            window.location='./index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET["db"]?>&&table=<?php echo $_GET["table"]?>&&successmsg= data uploaded successfully !';
                                    }
                                    else {
                                        window.location='./index.php?page=table_data_list&&section=parcourir&&db=<?php echo $_GET["db"]?>&&table=<?php echo $_GET["table"]?>&&errormsg=Erreur dans votre xsl fichier checker la structure de fichier et les primary key  !';
                                    }
                                },
                                error: function (er) {
                                    console.log(er);

                                }

                            })
                        },
                        error: function (er) {
                            console.log(er);

                        }

                    })



                })
            }
    }
});
        </script>

