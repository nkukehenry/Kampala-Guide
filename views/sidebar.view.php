<nav id="navigation" class="navigation-sidebar bg-primary">
        <div class="navigation-header">
        <a href="<?php echo SITE_URL ?>"><img src="../assets/images/wbdashboard.png" style="max-width: 130px;"></a>
    </div>

    <!--Navigation Profile area-->
    <div class="navigation-profile">
        <img class="profile-img rounded-circle" src="../assets/images/avatar.png" alt="profile image">
        <h4 class="name" style="text-transform: uppercase; font-size: 15px;"><?php echo $_SESSION['username'] ?></h4>
        <span class="designation">Administrator</span>
        <a id="show-user-menu" class="circle-white-btn profile-setting"><i class="fa fa-star star-color"></i></a>

    </div>

    <!--Navigation Menu Links-->
    <div class="navigation-menu">

        <ul class="menu-items custom-scroll mCustomScrollbar _mCS_1"><div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-location"></i></span>
                    <span class="title">Places</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">
                    <li>
                        <a href="../controller/places.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title">Places</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controller/categories.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controller/types.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title">Types</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-document-new"></i></span>
                    <span class="title">News</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">
                    <li>
                        <a href="../controller/news.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title">Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controller/newscategory.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:void(0);" class="have-submenu">
                    <span class="icon-thumbnail"><i class="dripicons-tags"></i></span>
                    <span class="title">Offers</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">
                    <li>
                        <a href="../controller/offers.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title">Offers</span>
                        </a>
                    </li>
                    <li>
                        <a href="../controller/offers_categories.php">
                            <span class="icon-thumbnail"><i class="dripicons-minus"></i></span>
                            <span class="title">Categories</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../controller/orders.php">
                    <span class="icon-thumbnail"><i class="dripicons-cart"></i></span>
                    <span class="title">Orders</span>
                </a>
            </li>
            <li>
                <a href="../controller/earnings.php">
                    <span class="icon-thumbnail"><i class="dripicons-wallet"></i></span>
                    <span class="title">Earnings</span>
                </a>
            </li>
            <li>
                <a href="../controller/translation.php">
                    <span class="icon-thumbnail"><i class="dripicons-flag"></i></span>
                    <span class="title">Translation</span>
                </a>
            </li>
            <li>
                <a href="../controller/managers.php">
                    <span class="icon-thumbnail"><i class="dripicons-user"></i></span>
                    <span class="title">Managers</span>
                </a>
            </li>
        </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 90px; max-height: 203.172px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></ul>
    </div>
</nav>