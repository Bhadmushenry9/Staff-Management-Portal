<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-bs-toggle="collapse"
                data-bs-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="#" onClick="return false;" class="bars"></a>
            <a class="navbar-brand" href="index.html">
                <!-- <img src="assets/images/Fresh-FM_Nigeria.png" alt="" /> -->
                <span class="logo-name">Staff Portal</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="pull-left">
                <li>
                    <a href="#" onClick="return false;" class="sidemenu-collapse">
                        <i data-feather="menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Full Screen Button -->
                <li class="fullscreen">
                    <a href="javascript:;" class="fullscreen-btn">
                        <i class="fas fa-expand"></i>
                    </a>
                </li>
                <!-- #END# Full Screen Button -->
                <!-- #START# Notifications-->
                <li class="dropdown">
                    <!-- <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
                        role="button">
                        <i class="far fa-bell"></i>
                        <span class="notify"></span>
                        <span class="heartbeat"></span>
                    </a> -->
                    <!-- <ul class="dropdown-menu pullDown">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user1.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Sarah Smith</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user2.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Airi Satou</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 22 mins ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user3.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">John Doe</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user4.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Ashton Cox</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user5.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Cara Stevens</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user6.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Charde Marshall</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user7.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">John Doe</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> Yesterday
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#" onClick="return false;">View All Notifications</a>
                        </li>
                    </ul> -->
                </li>
                <!-- #END# Notifications-->
                <li class="dropdown user_profile">
                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="<?php echo "assets/img/".$admin_profile_img ?>" alt="user" style="height: 2rem; width: 2rem;">
                    </div>
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                                <li>
                                    <a href="profile.php">
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <i class="material-icons">feedback</i>Feedback
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <i class="material-icons">help</i>Help
                                    </a>
                                </li>
                                <li>
                                    <form action="logout.php" method="POST">
                                        <button class="dropdown-item" type="submit" name="logout">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right">
                    <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                        <i class="fas fa-cog"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
