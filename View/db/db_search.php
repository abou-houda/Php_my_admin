

<?php
$search=$_POST['chercher'];
if(in_array($search,$userdb)){
    ?>
    <script>
        window.location= "./index.php?page=db_info&&section=info&&db="+'<?php echo $_POST['chercher']; ?>';
    </script>
    <?php
    }
    else {
      $result = preg_grep('/^'.$_POST['chercher'].'/', $userdb);
      if(!empty($result)){
      ?>
      <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">la base de données :</h5>
                            <?php foreach($result as $value){?>
                                <h2 class="card-title"><a class="card-title" href="./index.php?page=db_info&&section=info&&db=<?php echo $value; ?>"><?php echo $value; ?><span>
                                    <a href="./index.php?page=db_edit&&db=<?php echo $value; ?>">
                                        <svg style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg>
                                    </a>
                                    <svg onclick="deleteItem('db','Vous Etes Sur que vous voulez supprimer cette BD?','la base de donnees va etre supprimer avec ses tables et ses colonnes ','&&db='+'<?php echo $value ?>')" style="cursor: pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                        <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                    </svg>
                                </span>
                            </h2><hr/>
                                <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }else{?>
        <div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h5 class="card-category">New Php My Admin</h5>
                        <h3 class="card-title">asucune base do données trouvée !</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        }
    }