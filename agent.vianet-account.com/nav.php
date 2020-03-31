<?php
  if(empty($_SESSION['user'])){
    header('Location: ../');
    exit();
  }
?>
<?php
  echo '
    <!--Navigation-->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="compte.php"><strong><i>Compte ('.$_SESSION['user'].')</i></strong></a>
          </div>
        <!-- Top Menu Items -->
          <ul class="nav navbar-right top-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off">Déconnexion</i></a>
                  </li>
                </ul>
              </li>
          </ul>
        </nav>
      ';
?>
