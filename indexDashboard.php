<!DOCTYPE html>
<?php
include_once "objects/pageInfo.php";
include_once "config/config.php";
$cnf = new Config();
$rootPath = $cnf->path;



session_start();
$_SESSION["lang"] = "TH";

?>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NRRU Service Online</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css"> -->

  <!-- <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css"> -->

  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/jquery-confirm.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .main_1-footer {
      background-color: white;

    }

    .wrapper_1 {
      /* -webkit-transition: -webkit-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
  -moz-transition: -moz-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
  -o-transition: -o-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
  transition: transform 0.3s ease-in-out, margin 0.3s ease-in-out;
  margin-left: 0px;
  z-index: 820; */
      /* background-color: #ffff; */
      /* 
      background: rgb(0, 10, 36);
      background: linear-gradient(0deg, rgba(0, 10, 36, 1) 0%, rgba(6, 94, 231, 1) 0%, rgba(154, 0, 255, 1) 100%); */

      background: rgb(0, 10, 36);
      background: linear-gradient(167deg, rgba(0, 10, 36, 1) 0%, rgba(0, 10, 36, 1) 34%, rgba(100, 6, 231, 1) 76%);
    }
  </style>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="js/jquery-1.12.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="js/canvasjs.min.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="js/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="js/component.js"></script>

</head>




<body class="hold-transition skin-purple sidebar-mini" style="padding:no-padding">
  <div class="wrapper">
    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-mini" style="font-size: 25px ;"><b>NSO</b></span>
        <span class="logo-lg" style="font-size: 25px ;"><b>NRRU Service</b></span>
      </a>
      <nav class="navbar navbar-static-top" style="background: #6406e7">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
              <ul class="dropdown-menu">
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <div class="pull-left">
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="dropdown notifications-menu">
              <ul class="dropdown-menu">
                <li class="footer"><a href="#"></a></li>
              </ul>
            </li>
            <li class="dropdown tasks-menu">
              <ul class="dropdown-menu">
                <li class="header"></li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer">
                  <a href="#"></a>
                </li>
              </ul>
            </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" onclick='initialize()' data-toggle="dropdown">
              </a>
              <ul class="dropdown-menu">
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown user user-menu">
              <a href="#" id="lnkLogout" class="dropdown-toggle btn btn-warning" data-toggle="dropdown">
                <img src="dist/img/Logout.png" class="user-image" alt="User Image">
                <span class="hidden-xs">Sign In</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="dvMain" class="wrapper_1 ">
      
    </div>

    <footer class="main_1-footer">
      <strong>Copyright &copy; 2020 <a href="#">NRRU</a>.</strong> All rights reserved.
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="control-sidebar-home-tab">
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:;">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>
              </a>
            </li>
          </ul>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:;">
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>
            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>
              <p>
                Some information about this general settings option
              </p>
            </div>
          </form>
        </div>
      </div>
    </aside>
    <div class="control-sidebar-bg"></div>
    <div class="control-sidebar-bg"></div>










    <script>
      $("#lnkLogout").click(function() {
        login();

      });


      function initialize() {
        $("#dvMain").load("<?= $rootPath ?>/Dashboard/mainDashBoard2.php");

      }


      $(window).load(function() {
        initialize();



      });
    </script>
  </div>
</body>

</html>