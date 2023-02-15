<?php
$script="<script src='../assets/js/dbManagement.js'></script>
<script>ajouter();</script>";
$response = '<div class="row">  <div class="col-12">
                  <div  src="" height="500px" class="card card-chart">
                      <div class="card-header ">
                          <div class="row">
                              <div class="col-sm-6 text-left">
                                  <h5 class="card-category">Créer une base de donnees</h5>
                            
                                 <label>Le nom de Base de données</label>
                                 <input class="form-control" type="text" id="db_name" name="db_name" minlength="2" required>
                                 <input class="btn btn-primary" type="submit" value="Créer ! " id="creer-db">
                              </div>

                          </div>
                      </div>
                  </div>
                  <div id="db-error"></div>
              </div>
              </div>
              
      
              '.$script;

echo $response;
