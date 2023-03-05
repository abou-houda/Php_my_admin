<?php
session_start();
if (!isset($_SESSION["login"])) {
?>
  <script>
    window.location = "login.php";
  </script>
<?php
}
include_once('../Model/BaseDonneesClasse.php');
include_once('../Model/ClasseMere.php');
include_once('../Model/ClasseTable.php');
include_once('../Model/User.php');
if (!isset($_SESSION['mode'])) {
  $_SESSION['mode'] = "dark";
}
$mode = $_SESSION['mode'];
$class = (($mode != 'dark') ? 'white-content' : '');
$db = new BaseDonneesClasse();
$table = new Table();
$dbs = $db->ShowDb();
$user = User::getUser($_SESSION["login"], $_SESSION["password"]);
$userdb = $user->getDataBases();
$classMere = new ClasseMere();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    phpMyAdmin
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">


  <script src="jquery-3.6.0.js"></script>
  <style>
    div.dataTables_filter>label>input {
      background-color: #c221a9;
      color: #c221a9;
      font-weight: bold;
    }

    div.dataTables_filter select {
      background-color: #c221a9;
      color: #c221a9;
      font-weight: bold;
    }
  </style>

</head>

<body class="<?php echo $class ?>">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="./index.php" class="simple-text logo-mini">
            Base
          </a>
          <a href="./index.php" class="simple-text logo-normal">
            de données
          </a>
        </div>
        <ul class="nav">
          <li>
            <a href="index.php?page=db_new">
              <i class="tim-icons icon-align-center"></i>
              <p>Nouvelle base de données</p>
            </a>
          </li>
          <li>
            <ul>
              <ul>
                <?php
                while ($row = $dbs->fetch()) {
                  if (in_array($row[0], $userdb)) {
                    $tables = $table->SelectById("mytable", "db_nom", $row[0]);
                    echo '<li>
                  <div class="row " >
                    <div class="col-4">
                      <p><a style="text-decoration: none;color: white;font-weight: bold" href="index.php?page=db_info&&section=info&&db=' . $row[0] . '">' . $row[0] . '</a></p>
                    </div>
                    <div class="col-4">
                      <div class="dropdown">
                        <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                          <span class=""> + </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">';
                    while ($row1 = $tables->fetch()) {
                      echo '<a class="dropdown-item" href="./index.php?page=table_data_list&&section=parcourir&&db=' . $row[0] . '&&table=' . $row1[1] . '">' . $row1[1] . '</a>';
                    }
                    echo '<a class="dropdown-item" href="index.php?page=db_info&&section=AddTable&&db=' . $row[0] . '">ajouter table</a>';
                    '
                        </div>
                      </div>
                    </div>
                  </div>

                </li>';
                  }
                }
                $dbs->closeCursor();
                ?>

              </ul>
            </ul>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="./index.php">phpMyAdmin</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link"><a href="#" class="nav-item dropdown-item">Mike John responded to your email</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">You have 5 more tasks</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Your friend Michael is in town</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another notification</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Another one</a></li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item"><?php echo $_SESSION['login']; ?></a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link"><a href="logging/logout.php" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <form action="" method="post">
                <input type="text" name="chercher" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                <button class="close" data-dismiss="modal" aria-label="Close">
                  <i class="tim-icons icon-simple-remove"></i>
                </button>
                <input class="btn btn-primary" value="Chercher" type="submit" name="chercher_btn">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
        <?php
        if (isset($_GET['successmsg'])) {
          echo ' <div class="col-sm-12">
        <div style="margin-left: -10px" class="alert fade alert-simple alert-primary alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
          <button type="button" class="close font__size-18" data-dismiss="alert">
									<span aria-hidden="true"><a>
                    <i class="fa fa-times greencross" style="margin-top: 10px"></i>
                    </a></span>
									<span class="sr-only" >Close</span> 
								</button>
          <i class="start-icon far fa-check-circle faa-tada animated" ></i>
          <strong class="font__weight-semibold">Success ! </strong> ' . $_GET["successmsg"] . '
        </div>
      </div>
';
        }
        if (isset($_GET['errormsg'])) {
          echo ' <div class="col-sm-12">
        <div style="margin-left: -10px" class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
          <button type="button" class="close font__size-18" data-dismiss="alert">
									<span aria-hidden="true">
										<i class="fa fa-times danger " style="margin-top: 10px"></i>
									</span>
									<span class="sr-only">Close</span>
								</button>
          <i class="start-icon far fa-times-circle faa-pulse animated"></i>
          <strong class="font__weight-semibold">Erreur</strong> ' . $_GET["errormsg"] . '
        </div>
      </div>
';
        }
        if(isset($_POST['chercher_btn']) && !empty($_POST['chercher'])){
          include_once('../View/db/db_search.php');
        }else
        if (!isset($_GET['page'])) {
          include_once('welcome.php');
          
        }else {
          $path = explode('_', $_GET['page']);
          include_once('' . $path[0] . '/' . $_GET['page'] . '.php');
          
        }
        ?>
      </div>
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> PHPMYADMIN made with <i class="tim-icons icon-heart-2"></i> by
            <a href="javascript:void(0)" target="_blank">khadija,kaoutar,zienb,houda</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="Mode badge light-badge mr-2"></span>
          <span class="Mode badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
        <li>
          <div class="p-3"></div>
        </li>

      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../assets/js/modals.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

  <!-- Black Dashboard DEMO methods, don't include it in your project! -->

  <script>
    $(document).ready(function() {

      $('#tableBody').DataTable();
      $('#datalisttable').DataTable();
      $('#structureTable').DataTable();

      $('.Mode').click(function() {
        window.location = 'Mode/changeMode.php';
      })


      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>

  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>

</body>

</html>