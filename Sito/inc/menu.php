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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bell"></i><span class="badge badge-danger pull-right">3</span></a>
                        <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                            <li><p class="drop-title">You have 3 pending tasks!</p></li>
                            <li class="dropdown-menu-list slimscroll tasks">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-success"><i class="fa fa-user"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">1m</span>
                                            <p class="task-details">New user registered</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-primary"><i class="fa fa-refresh"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">24m</span>
                                            <p class="task-details">3 Charts refreshed</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-danger"><i class="fa fa-phone"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">24m</span>
                                            <p class="task-details">2 Missed calls</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                        </ul>
                    </li>
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
                        <ul class="dropdown-menu dropdown-list dropdown-form-login" role="menu" style="overflow:hidden;">
                          <?php
                            if($_SESSION['email'] != null){
                              echo '
                                <div class="row">
                                  <div class="col-lg-12">
                                  '.$_SESSION['email'].'
                                  </div>
                                </div>
                                <div class="row">
                                  <a class="btn btn-primary m-t-xs m-b-xs" href="/surveystation/profile?user='.bin2hex(mcrypt_create_iv(5, MCRYPT_DEV_URANDOM)).'">Profilo</a>
                                </div>
                                <div class="row">
                                  <a class="btn btn-primary m-t-xs m-b-xs" href="?action=logout">Esci</a>
                                </div>
                              ';
                            }
                            else{
                              require 'form_user.php';
                            }
                          ?>
                        </ul>
                    </li>
                </ul><!-- Nav -->
            </div><!-- Top Menu -->
        </div>
    </div>
</div><!-- Navbar -->

<div id="logo" class="displayNo" style="font-size:200px;position:fixed;width:100%;text-align:center;top:40%;">
  <a href="index.php" >SurveyStation </a>
  <a href="index.php" class="btn btn-large btn-success">Torna alla home</a>
</div>
