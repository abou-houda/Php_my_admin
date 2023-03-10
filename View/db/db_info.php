<div class="row">
    <div class="col-12">
        <div class="btn-group btn-group-toggle float-start">
            <label class="btn btn-sm btn-primary btn-simple <?php echo ($_GET['section'] == 'info' ? 'active' : '') ?>">
                <input type="radio" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"><a href="./index.php?page=db_info&&section=info&&db=<?php echo $_GET['db']; ?>" class="<?php echo ($_GET['section'] == 'info' ? 'text-white' : 'text-black') ?>">Bases de données</a></span>
            </label>
            <label class="btn btn-sm btn-primary btn-simple <?php echo ($_GET['section'] == 'parcourir' ? 'active' : '') ?>" id="1">
                <input type="radio" class="d-none" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"><a href="./index.php?page=db_info&&section=parcourir&&db=<?php echo $_GET['db']; ?>" class="<?php echo ($_GET['section'] == 'parcourir' ? 'text-white' : 'text-black') ?>">Parcourir</a></span>
                <span class="d-block d-sm-none">
                    <i class="tim-icons icon-gift-2"></i>
                </span>
            </label>
            <label class="btn btn-sm btn-primary btn-simple <?php echo ($_GET['section'] == 'AddTable' ? 'active' : '') ?>" id="1">
                <input type="radio" class="d-none" name="options">
                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"><a href="./index.php?page=db_info&&section=AddTable&&db=<?php echo $_GET['db']; ?>" class="<?php echo ($_GET['section'] == 'AddTable' ? 'text-white' : 'text-black') ?>">Ajouter Table</a></span>
                <span class="d-block d-sm-none">
                    <i class="tim-icons icon-gift-2"></i>
                </span>
            </label>
        </div>
    </div>
</div>
<?php
if ($_GET['section'] == "info") {
?>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">la base de données :</h5>
                            <h2 class="card-title"><?php echo $_GET['db']; ?> <span>
                                    <a href="./index.php?page=db_edit&&db=<?php echo $_GET['db']; ?>">
                                        <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg>
                                    </a>
                                    <svg onclick="deleteItem('db','Vous Etes Sur que vous voulez supprimer cette BD?','la base de donnees va etre supprimer avec ses tables et ses colonnes ','&&db='+'<?php echo $_GET['db'] ?>')" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                        <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                    </svg>
                                </span>
                            </h2>

                        </div>
                    </div>
                </div>
                <!--            <div class="card-body">-->
                <!--                <div class="chart-area">-->
                <!--                    <canvas id="chartBig1"></canvas>-->
                <!--                </div>-->
                <!--            </div>-->
            </div>
        </div>
    </div>
<?php
} else if ($_GET['section'] == "AddTable") {
?>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0 p-4">
                        <h4 class="card-title">
                            Nouvelle table
                            <!-- <?php echo $_GET['db']; ?>
                        <?php echo $db->getTableCountByDB($_GET['db']); ?> -->
                        </h4>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col">
                                    <label for="">Nom de table :</label>
                                    <input class="form-control" type="text" name="nom_table">
                                </div>
                                <div class="col">
                                    <label for="">Nombre de colonne(s) :</label>
                                    <input class="form-control" type="number" name="nbrCol" id="nbr">
                                </div>
                                <div class="col">
                                    <br>
                                    <input class="btn btn-primary" onclick="colonne()" value="Exécuter">
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table table-striped
                                    table-hover	
                                    table-borderless
                                    
                                    align-middle">
                                        <thead class="table-primary">

                                            <tr>
                                                <th>Nom</th>
                                                <th>Type</th>
                                                <th>Taille/Valeurs*</th>
                                                <th>Valeur par défaut</th>
                                                <th>Primary</th>
                                                <th>A_I</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider" id="colonne">
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>

                            </div>

                            <input class="btn btn-primary" type="submit" name="add_table" value="Enregistrer">

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function colonne() {
            nbr = document.getElementById("nbr").value

            var div = document.getElementById('colonne')
            content = ""
            for (i = 0; i < nbr; i++) {
                content += '<tr class=""> <td scope="row"> <input class="form-control" type="text" name="nom_colonne[]"></td> <td>\
                <select name="type_colonne[]" id="" class="form-control"> <option value="int" class="text-dark">int</option>\
                <option value="double" class="text-dark">double</option> <option value="VARCHAR" class="text-dark">varchar</option>\
                <option value="date" class="text-dark">date</option></select> </td>\
                <td><input class=" form-control" type="number" name="taille_colonne[]"></td>\
                <td><input class="form-control" type="text" name="default_colonne[]"> </td>\
                <td> <input class="form-control" type="checkbox" name="primary[' + i + ']" ></td>\
                <td><input class="form-control" type="checkbox" name="AT[' + i + ']" > </td></tr>';
            }
            div.innerHTML = content
        }
    </script>

    <?php
    if (isset($_POST['add_table']) && $_POST['nbrCol'] != "" && (int)$_POST['nbrCol'] > 0 ) {

        $res = $table->createInsertTable($_GET['db'], $_POST['nom_table'], $_POST['nom_colonne'], $_POST['type_colonne'], $_POST['taille_colonne'], $_POST['default_colonne'], isset($_POST['primary']) ? $_POST['primary'] : [], isset($_POST['AT']) ? $_POST['AT'] : []);
        if ($res != -1) {
    ?>
            <script>
                window.location = "./index.php?page=db_info&&section=parcourir&&db=" + '<?php echo $_GET['db']; ?>' + "&&successmsg=la table a ete bien ajoute";
            </script>
        <?php
        } else {
        ?>
            <script>
                window.location = "./index.php?page=db_info&&section=parcourir&&db=" + '<?php echo $_GET['db']; ?>' + "&&errormsg=la table déja existe";
            </script>
        <?php
        }
        ?>

    <?php
    }
} else {
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0 p-4">
                        <h4 class="card-title"><?php echo $_GET['db']; ?><span> | <?php echo $db->getTableCountByDB($_GET['db']); ?> Tables</span></h4>

                        <table id="tableBody" class="table cell-border compact stripe hover table-borderless table-striped table-hover p-4">
                            <thead>
                                <tr>
                                    <th scope="col-3" class="text-center col-2">Id</th>
                                    <th scope="col-3" class="text-center col-4">Nom</th>
                                    <th scope="col-3" class="text-center col-2">Lignes</th>
                                    <th scope="col-3" class="text-center col-4">Action</th>
                                </tr>
                            </thead>
                            <tbody id="">
                                <?php
                                $dbTables = $db->SelectById("mytable", 'db_nom', $_GET['db']);
                                while ($row = $dbTables->fetch()) {
                                    echo '<tr class="text-center">';
                                    echo '<td w><a  class="text-primary fw-bold">' . $row[0] . '</a></td>
                                <td >' . $row[1] . '</td>
                                <td >' . $table->selectTableRowCount($_GET['db'], $row[1]) . '</td>
                                <td class="fw-bold"><button class="btn btn-primary m-2 p-2" style="width: 100px"><a href="./index.php?page=table_data_list&&section=parcourir&&db=' . $_GET['db'] . '&&table=' . $row[1] . '" style="color: white;font-weight: bold">Afficher</a></button>';
                                ?>
                                    <button onclick="deleteItem('table','Vous Etes Sur que vous voulez supprimer cette table?','la table va etre supprimer','&&db=<?php echo $_GET['db'] ?>&&table=<?php echo $row[1] ?>')" class="btn btn-secondary  p-2" style="width: 100px">Supprimer</button>
                                    </td>
                                    </tr>
                                <?php
                                }
                                $dbTables->closeCursor();
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
