<?php
include_once "../classes/databaseClass.php";
if (isset($_GET['dbId'])) {
    $db = DataBase::GetDbById($_GET['dbId']);
    $nom="";
    $id=$_GET['dbId'];
    while ($row = $db->fetch()){
        $nom=$row[1];
    }
    $db->closeCursor();
    $script = "<script src='../assets/js/dbManagement.js'> 
    </script>
     <script>
        var oldNom='$nom';
        var id='$id';
    modifier(oldNom,id);
</script>
    ";
    $response = '<div class="row">  <div class="col-12">
                  <div  src="" height="500px" class="card card-chart">
                      <div class="card-header ">
                          <div class="row">
                              <div class="col-sm-6 text-left">
                                  <h5 class="card-category">Modifier la base de donnees</h5>

                                 <label>Le nom de Base de données</label>
                                 <input class="form-control" type="text" id="db_name_edit" name="db_name_edit" minlength="2" value="'.$nom.'" required>
                                 <input class="btn btn-primary" type="submit" value="Modifier ! " id="edit-db">
                              </div>

                          </div>
                      </div>
                  </div>
                  <div id="db-error"></div>
              </div>
              </div>
              
      
              ' . $script
    ;

    echo $response;
}
