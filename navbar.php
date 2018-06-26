<header class="main-header">
    <a href="index.php" class="logo">
        <span class="logo-mini"><img src="logo.ico" height="50px" alt="logo"></span>
        <span class="logo-lg"><img src="logo.ico" height="50px" alt="logo"><b>Amar</b>Proshno</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


                <?php if (empty($_SESSION['user'])){ ?>
                    <li class="dropdown user user-menu">
                        <a href="login.php" class="dropdown-toggle">
                            <i class="fa fa-sign-in fa-lg"></i>
                            <span class="hidden-xs">Sign In</span>
                        </a>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="register.php" class="dropdown-toggle">
                            <i class="fa fa-desktop fa-lg"></i>
                            <span class="hidden-xs">Sign up</span>
                        </a>
                    </li>
                <?php } ?>



            <?php if (!empty($_SESSION['user'])){ ?>

                <li class="dropdown user user-menu">
                    <a href="dashboard.php" class="dropdown-toggle">
                        <i class="fa fa-edit fa-lg"></i>
                        <span class="hidden-xs">Ask a Question</span>
                    </a>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo $_SESSION['user']['photo']; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            <?php echo $_SESSION['user']['first_name'] ." ". $_SESSION['user']['middle_name'] ." ". $_SESSION['user']['last_name']; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo $_SESSION['user']['photo']; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $_SESSION['user']['first_name'] ." ". $_SESSION['user']['middle_name'] ." ". $_SESSION['user']['last_name']; ?> - <?php echo $_SESSION['user']['hobby']; ?>

                                <small>Member since
                                    <?php echo $_SESSION['user']['created_at']; ?>
                                </small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="profile.php?uid=<?php echo $_SESSION['user']['id']; ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="views/auth/logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="views/auth/logout.php" class="dropdown-toggle">
                        <i class="fa fa-sign-out fa-lg"></i>
                        <span class="hidden-xs">Sign Out</span>
                    </a>
                </li>
                <?php } ?>

            </ul>



        </div>
    </nav>
</header>