<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


        <!-- Sidebar user panel -->
        <?php if (!empty($_SESSION['user'])){ ?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $_SESSION['user']['photo']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><a href="profile.php?uid=<?php echo $_SESSION['user']['id'] ?>"><?php echo $_SESSION['user']['first_name'] ." ". $_SESSION['user']['middle_name'] ." ". $_SESSION['user']['last_name']; ?></a></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php } ?>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li><a href="index.php"><i class="fa fa-home"></i> <span>Home Page</span></a></li>
            <?php if (!empty($_SESSION['user'])){ ?>
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <?php } ?>
            <li><a href="users.php"><i class="fa fa-users"></i> <span>All Users</span></a></li>

            <?php if (!empty($_SESSION['user'])){ ?>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Profile</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="profile.php?uid=<?php echo $_SESSION['user']['id']; ?>"><i class="fa fa-user"></i> Your Profile</a></li>
                    <li><a href="profile.php?uid=<?php echo $_SESSION['user']['id']; ?>"><i class="fa fa-edit"></i> Your Questions</a></li>
                    <li><a href="profile.php?uid=<?php echo $_SESSION['user']['id']; ?>"><i class="fa fa-edit"></i> Your Answers</a></li>
                </ul>
            </li>
            <?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>