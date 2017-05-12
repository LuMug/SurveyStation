<div class="navbar">
    <div class="navbar-inner">
        <div class="sidebar-pusher">
            <a href="javascript:void(0);" class="waves-effect waves-button push-sidebar">
                <i class="icon-arrow-right"></i>
            </a>
        </div>
        <div class="logo-box">
            <a href="/surveystation/index.php" class="logo-text"><span>Survey Station</span></a>
        </div><!-- Logo Box -->
        <div class="search-button">

        </div>
        <div class="topmenu-outer">
            <div class="top-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="btn-n" class="dropdown-toggle btn-danger" data-toggle="dropdown"><i class="icon-fire"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <span class="user-name">
                              <?php
                                if($_SESSION['email'] != null){
                                  echo "<i class='fa fa-user'></i>";
                                }
                                else{
                                  echo "Login";
                                }
                              ?>
                              <i class="fa fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                          <?php if($_SESSION['email'] != null){ ?>
                            <li><p class="drop-title"><?php echo $_SESSION['email'] ?></p></li>
                            <li class="dropdown-menu-list slimscroll tasks">
                                <ul class="list-unstyled">
                                    <li>
                                        <!--<a href="/surveystation/profile?user='.bin2hex(mcrypt_create_iv(5, MCRYPT_DEV_URANDOM)).'">-->
                                        <a href="/surveystation/profile">
                                            <div class="task-icon badge btn-green-r"><i class="fa fa-user"></i></div>
                                            <p class="task-details">Profilo</p>
                                        </a>
                                    </li>
                                    <?php
                                    $email = $_SESSION["email"];
                                    $getAmm = mysqli_fetch_assoc(mysqli_query($mysql_con, 'SELECT Amministratore from utenti where "'.$email.'" = Email'));
                                    if($getAmm["Amministratore"] == 1){ ?>
                                      <li>
                                          <!--<a href="/surveystation/profile?user='.bin2hex(mcrypt_create_iv(5, MCRYPT_DEV_URANDOM)).'">-->
                                          <a href="/surveystation/admin">
                                              <div class="task-icon badge btn-green-r"><i class="fa fa-cog"></i></div>
                                              <p class="task-details">Gestione Avanzata</p>
                                          </a>
                                      </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="drop-all">
                              <a href="?action=logout" class="text-center">
                                  <div class="task-icon"><i class="fa fa-sign-out"></i></div>
                                  <p class="task-details">Esci</p>
                              </a>
                            </li>
                            <?php }
                            else require "form_user.php";?>
                        </ul>
                    </li>
                </ul><!-- Nav -->
            </div><!-- Top Menu -->
        </div>
    </div>
</div><!-- Navbar -->

<div id="logo" class="displayNo" style="font-size:200px;position:fixed;width:100%;text-align:center;top:40%;">
  <a href="index.php" >SurveyStation </a><br>
  <a href="index.php" class="btn btn-large btn-success">Torna alla home cliccando sulla scritta</a>
</div>
