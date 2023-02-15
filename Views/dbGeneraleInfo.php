<?php
include_once "../classes/databaseClass.php";
if (isset($_GET['dbId'])){
    $db = DataBase::GetDbById($_GET['dbId']);
    $result = '<div class="row">
            <div class="col-12">
              <div class="btn-group btn-group-toggle float-start" data-toggle="buttons">
                <label class="btn btn-sm btn-primary btn-simple db-generale active" id="0" >
                  <input type="radio" name="options" checked>
                  <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Générale</span>
                  <span class="d-block d-sm-none">
                    <i class="tim-icons icon-single-02"></i>
                  </span>
                </label>
                <label class="btn btn-sm btn-primary btn-simple db-parcourir" id="1">
                <input type="radio" class="d-none" name="options">
                  <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block ">Parcourir</span>
                  <span class="d-block d-sm-none">
                      <i class="tim-icons icon-gift-2"></i>
                  </span>
                </label>
           

              </div>
            </div>
        </div>';
    while ($row = $db->fetch()){
        $result .= '<div class="row">  <div class="col-12">
                  <div  src="" height="500px" class="card card-chart">
                      <div class="card-header ">
                          <div class="row">
                              <i class="col-sm-6 text-left">
                                  <h5 class="card-category">La base de donnees</h5>
                                 <h2 class="card-title" >'.$row[1].'<i class="edit-db" id="'.$row[0].'"> <svg style="cursor: pointer"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg></i><i style="cursor: pointer" class="delete-db" id="'.$row[0].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
  <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
</svg></i></h2>

                              </div>

                          </div>
                      </div>
                   '  //<div class="card-body">
                          //<div class="chart-area">
                          //    <canvas id="chartBig1"></canvas>
                         // </div>
                     /* </div>*/ .'
                  </div>
              </div>
              </div>';
    }
    $db->closeCursor();
    echo $result. "<script src='../assets/js/dbManagement.js'>
    </script>";
}


