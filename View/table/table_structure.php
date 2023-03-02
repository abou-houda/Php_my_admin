<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0 p-4">
                    <h4 class="card-title ">  <?php echo strtoupper($_GET['table']); ?> Table Structure</h4>
                    <div class=" container">
                        <?php
                        $structure = $table->TableStructure('kaoutar','tester');
                        $tableInfo = $table->SelectMultiConditions('mytable',['nom','db_nom'],[trim($_GET['table']),trim($_GET['db'])]);
                        $constraint = explode('/',$tableInfo[0]['contraint']);
                        ?>
                        <table id="structureTable" class="table table-borderless table-striped table-hover p-4">
                            <thead>
                            <tr>
                                <th scope="col-4" class="text-center col-3">Nom du champ</th>
                                <th scope="col-4" class="text-center col-2">Type</th>
                                <th scope="col-4" class="text-center col-2">Null</th>
                                <th scope="col-4" class="text-center col-3">Default</th>
                                <th scope="col-4" class="text-center col-4">Extra</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($structure as $element){
                                echo "<tr class='text-center'>";
                                echo '<td ><a  class="text-primary fw-bold">'.$element[0].($element[3]=="PRI"?'<svg style="margin-left: 10px;rotate: 120deg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>':'').(count($constraint)>=2?($constraint[0]==$element[0]?'<svg style="margin-left: 10px;rotate: 120deg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>':''):'').'</a></td>';
                                echo '<td ><a  class="fw-bold">'.$element[1].'</a></td>';
                                echo '<td ><a  class="fw-bold">'.$element[2].'</a></td>';
                                echo '<td ><a  class="fw-bold">'.$element[4].'</a></td>';
                                echo '<td ><a  class="fw-bold">'.$element[5].'</a></td>';
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>