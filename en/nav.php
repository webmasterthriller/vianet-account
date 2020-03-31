<?php
  if(empty($_SESSION['user'])){
    header('Location: ../en');
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
            <a class="navbar-brand" href="compte.php"><strong><i>Account ('.$_SESSION['user'].')</i></strong></a>
          </div>
              <!-- Top Menu Items -->
              <ul class="nav navbar-right top-nav">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                      <ul class="dropdown-menu message-dropdown">';
                      include_once '../php/bd.php';
                      $sql = "SELECT * From compte,message Where compte.numCompte='".$_SESSION['user']."' AND compte.client=message.client ORDER BY dateReception DESC, heureReception ASC";
                      $select = $baseDeDonne ->prepare($sql); /*préparation de la requete*/
                      $select->execute();
                      $table = array();
                      while($donne = $select->fetch()){
                        $table[] = $donne;
                      }
                      if (empty($table)) {
                        echo' <li class="message-footer">
                                <a href="message.php">No message</a>
                              </li>
                          </ul>
                        </li>';
                      }else{
                        foreach($table as $ligne){
                          $portion=substr($ligne['message'], 0,20);
                          echo'
                            <li class="message-preview">
                                <a href="message.php">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading"><strong>'.$ligne['expediteur'].'</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> '.$ligne['dateReception'].' à '.$ligne['heureReception'].'</p>
                                            <p>'.$portion.'...'.'</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                          ';
                        }
                        echo' <li class="message-footer">
                                <a href="message.php">View all messages</a>
                              </li>
                            </ul>
                        </li>';
                      }
                      $sql = "SELECT * From compte,client Where compte.numCompte='".$_SESSION['user']."' AND client.idClient=compte.client " ;
                      $select = $baseDeDonne ->prepare($sql); /*préparation de la requete*/
                      $select->execute();
                      $table = array();
                      while($donne = $select->fetch()){
                        $table[] = $donne;
                      }
                      foreach ($table as $ligne){
                  echo' 

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>'.$ligne['nom'].' '.$ligne['prenom'].'<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="profil.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                          </li>
                          <li>
                              <a href="message.php"><i class="fa fa-fw fa-envelope"></i>Messages</a>
                          </li>
                          <li class="divider"></li>
                          <li>
                              <a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Sign Out</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
  	     '; }
?>