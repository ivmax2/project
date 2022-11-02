<?php 
    session_start();
    $userName = $_SESSION["F"].$_SESSION["L"];
    $uid=$_SESSION["id"];
    $conn=require_once("../Ly/config.php");
    $sql = "SELECT * FROM cart WHERE cart_buyer = '$uid'";
    $result = mysqli_query($conn,$sql) or die("Error");
    $data_nums = mysqli_num_rows($result); //統計總比數
?>
<!DOCTYPE html>
<html style="background:#ffffff;border-color: #ffffff;color: #ffffff;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>首頁</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/top setting.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/birthday.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/theme.js"></script>
</head>

<body style="color: rgba(132,255,219,0);border-color: rgba(132,255,219,0);background: rgb(255, 255, 255);">
    <div id="wrapper" style="border-color: #ffffff;border-right-color: #ffffff;color: #ffffff;">
        <nav class="navbar navbar-light navbar-expand1 bg-white shadow mb-4 topbar static-top" style="background: #84ffdb;border-color: #84ffdb;width: 1920px;">
            <div class="container-fluid " style="background:#84ffdb">
                <a class="navbar-brand ms-md-7" href="index.php" style="height: 67px;width: 105.px;margin: 4px;font-size: 40px;color: var(--bs-danger);">
                    <img src="../assets/img/New%20Folder/w.jpg" style="width: 45px;height: 55px;vertical-align: text-bottom;" />果時
                </a>
                <form class="d-none d-sm-inline-block me-auto ms-md-1 my-2 my-md-0 mw-100 navbar-search1" action="../shop/search.php" method="post" id="clear-form">
                    <div class="input-group" >
                        <input type="text" class="bg-light form-control border-0 small" placeholder="Search for ..." style="text-align: justify;border-style: dotted;" name="search" required/>
                        <button class="btn btn-primary py-0" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav flex-nowrap ms-auto" style="margin-right: 100px;width: auto;margin-top: -4px;">
                    <li class="nav-item dropdown d-sm-none no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="me-auto navbar-search w-100">
                                <div class="input-group1">
                                    <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary py-0" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                <span class="badge bg-danger badge-counter"></span>
                                <i class="fas fa-bell fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                <h6 class="dropdown-header">訊息(massage)</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-primary icon-circle">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="small text-gray-500">December 12, 2019</span>
                                        <p>A new monthly report is ready to download!</p>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-success icon-circle">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="small text-gray-500">December 7, 2019</span>
                                        <p>$290.29 has been deposited into your account!</p>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="me-3">
                                        <div class="bg-warning icon-circle">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="small text-gray-500">December 2, 2019</span>
                                        <p>Spending Alert: We&#39;ve noticed unusually high spending for your account.</p>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" href="../cart/cart.php">
                            <?php 
                                if($data_nums=='0'){

                                }else{
                                ?>
                                <span class="badge bg-danger badge-counter">
                                    <?php
                                        echo $data_nums;
                                    ?>
                                </span>
                                <?php
                                    }
                                ?>
                                <i class="fas fa-shopping-basket fa-fw"></i>
                            </a>
                        </div>
                    </li>
                    <div class="d-none d-sm-block topbar-divider"></div>
                    <li class="nav-item dropdown no-arrow">
                        <div class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $userName ?></span>
                                <?php
                                    if($_SESSION["imageId"] == NULL){
                                        echo '<img class="border rounded-circle img-profile" src="../assets/img/New%20Folder/images.jpg"/>';
                                    }else{
                                        echo '<img class="border rounded-circle img-profile" src="data:image/png;base64,'.base64_encode($_SESSION["imageId"]).'" />';
                                    }
                                ?>
                            </a>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                <a class="dropdown-item" href="../setting/setting.php">
                                    <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../assets/php/Logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>Logout
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="ccle">
    <div><a class="brth" href="../shop/釋迦.php?id=1">釋迦<br/></a><a href="../shop/釋迦.php?id=1" style="width: auto;"><img width="100px" src="../assets/img/fruit/釋迦.jpg"/><br/></a></div>
    <div><a class="brth" href="../shop/釋迦.php?id=2">奇異果</a><br/><a href="../shop/釋迦.php?id=2" style="width: auto;"><img width="90px" src="../assets/img/fruit/奇異果.jpg"/><br/></a></div>
    <div><a class="brth" href="../shop/釋迦.php?id=3">西瓜</a><br/><a href="../shop/釋迦.php?id=3" style="width: auto;"><img width="100px" src="../assets/img/fruit/西瓜.jpg"/><br/></a></div>
    <div><a class="brth" href="../shop/釋迦.php?id=4">蘋果</a><br/><a href="../shop/釋迦.php?id=4" style="width: auto;"><img width="100px" src="../assets/img/fruit/蘋果.jpg"/><br/></a></div>
</div>
<div class="ccl">
    <div><a class="brth" href="../shop/釋迦.php?id=5">香蕉</a><br/><a href="../shop/釋迦.php?id=5" style="width: auto;"><img width="100px" src="../assets/img/fruit/香蕉.jpg"/><br/></a></div>
    <div><a class="brth" href="../shop/釋迦.php?id=6">芭樂</a><br/><a href="../shop/釋迦.php?id=6" style="width: auto;"><img width="100px" src="../assets/img/fruit/芭樂.jpg"/><br/></a></div>
    <div><a class="brth" href="../shop/釋迦.php?id=7">柳丁</a><br/><a href="../shop/釋迦.php?id=7" style="width: auto;"><img width="100px" src="../assets/img/fruit/柳丁.jpg"/><br/></a></div>
    <div><a class="brth" href="../shop/釋迦.php?id=8">火龍果</a><br/><a href="../shop/釋迦.php?id=8" style="width: auto;"><img width="100px" src="../assets/img/fruit/火龍果.jpg"/><br/></a></div>
</div>
</body>
</html>