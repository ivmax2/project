<?php
    session_start();
    $userName = $_SESSION["F"].$_SESSION["L"];
    $phone = $_SESSION["pn"];//phone
    $city = $_SESSION["ac"];//city
    $town=$_SESSION["at"];
    $address = $_SESSION["ad"];
    $count = $_GET["count"];
    if($count==NULL){
        $count='1';
    }
    $id=$_GET["id"];
    $uid=$_SESSION["id"];
    $conn=require_once("../Ly/config.php");
    $sql = "SELECT * FROM cart WHERE cart_buyer = '$uid'";
    $result = mysqli_query($conn,$sql) or die("Error");
    $data_nums1 = mysqli_num_rows($result); //統計總比數
    $sql = "SELECT * FROM commodity WHERE commodity_id = '$id'"; //修改成你要的 SQL 語法
    $result = mysqli_query($conn,$sql) or die("Error");
    //輸出資料內容
    while ($row = mysqli_fetch_array($result))
    {
        $name=$row[1];
        $picture=$row[5];
        $price=$row[3];
    } 
    
    $money=$price*$count;
?>
<!DOCTYPE html>
<html style="background: #ffffff;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>專題</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/top setting.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-twzipcode@1.7.14/jquery.twzipcode.min.js"></script> 
    <style>
        .city, .town{width: 100%;}
        .f1{float:left;margin-left:5px;margin-right:5px;width:calc(5% - 10px)}
        .f2{float:left;margin-left:5px;margin-right:5px;width:calc(10% - 10px)}
        .f3{float:left;margin-left:5px;margin-right:5px;width:calc(15% - 10px)}
        .f4{float:left;margin-left:5px;margin-right:5px;width:calc(20% - 10px)}
        .f5{float:left;margin-left:5px;margin-right:5px;width:calc(25% - 10px)}
        .f6{float:left;margin-left:5px;margin-right:5px;width:calc(30% - 10px)}
        .f7{float:left;margin-left:5px;margin-right:5px;width:calc(35% - 10px)}
        .f8{float:left;margin-left:5px;margin-right:5px;width:calc(40% - 10px)}
        .f9{float:left;margin-left:5px;margin-right:5px;width:calc(45% - 10px)}
        .f10{float:left;margin-left:5px;margin-right:5px;width:calc(50% - 10px)}
        .f11{float:left;margin-left:5px;margin-right:5px;width:calc(55% - 10px)}
        .f12{float:left;margin-left:5px;margin-right:5px;width:calc(60% - 10px)}
        .f13{float:left;margin-left:5px;margin-right:5px;width:calc(65% - 10px)}
        .f14{float:left;margin-left:5px;margin-right:5px;width:calc(70% - 10px)}
        .f15{float:left;margin-left:5px;margin-right:5px;width:calc(75% - 10px)}
        .f16{float:left;margin-left:5px;margin-right:5px;width:calc(80% - 10px)}
        .f17{float:left;margin-left:5px;margin-right:5px;width:calc(85% - 10px)}
        .f18{float:left;margin-left:5px;margin-right:5px;width:calc(90% - 10px)}
        .f19{float:left;margin-left:5px;margin-right:5px;width:calc(95% - 10px)}
        .f20{float:left;margin-left:5px;margin-right:5px;width:calc(100% - 10px)}
        </style>
</head>

<body id="page-top" style="background: #ffffff;border-color: #ffffff;border-right-color: rgba(133,135,150,0);color: #ffffff;">
    <div id="wrapper" style="border-color: #ffffff;border-right-color: #ffffff;color: #ffffff;">
        <nav class="navbar navbar-light navbar-expand1 bg-white shadow topbar static-top" style="background: #ffffff;border-color: #ffffff;width: 1920px;">
            <div class="container-fluid" style="background: #84ffdb">
                <a class="navbar-brand ms-md-7" href="../Ly/index.php" style="height: 67px;width: 105.px;margin: 4px;font-size: 40px;color: var(--bs-danger);">
                    <img src="../assets/img/New%20Folder/w.jpg" style="width: 45px;height: 55px;vertical-align: text-bottom;" />果時</a>
            <form class="d-none d-sm-inline-block me-auto ms-md-1 my-2 my-md-0 mw-100 navbar-search1" action="../shop/search.php" method="post" id="clear-form">
                <div class="input-group" >
                    <input type="text" class="bg-light form-control border-0 small" placeholder="Search for ..." style="text-align: justify;border-style: dotted;" name="search" required/>
                    <button class="btn btn-primary py-0" type="button">
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
                                <i class="fas fa-bell fa-fw">
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                            <h6 class="dropdown-header">訊息(massage)</h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="me-3">
                                    <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
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
                                if($data_nums1=='0'){

                                }else{
                            ?>
                            <span class="badge bg-danger badge-counter">
                                <?php
                                    echo $data_nums1;
                                ?>
                            </span>
                            <?php
                                }
                            ?>
                            <i class="fas fa-shopping-basket fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                        </div>
                    </div>
                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                </li>
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <span class="d-none d-lg-inline me-2 text-gray-600 small">
                                <?php echo $userName ?>
                            </span>
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
<div style="margin-top: 30px;color: rgba(255,255,255,255);"></div>
<div class="container">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">已選擇的商品</p>
        </div>
        <div class="card-body">
            <div class="ccl1">
                <div class="item_detail2">
                    <?php echo '<img class="prod_img" src="data:image/png;base64,'.base64_encode($picture).'" />';?>
                    <a class="brth" href="#"><?php echo $name ?><br/></a>
                    <a class="brth" href="#">數量：<?php echo $count ?>箱<br/></a>
                    <br/><br/>
                    <a class="brth1">花費：<?php echo $money?>元<br/></a>
                </div>
                <div class="yee1">
                    <p class="text-primary m-0 fw-bold yee" style="text-align: right;">共 <?php echo $money ?> 元(含運費)</p>
                </div>
            </div>
        </div>        
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">寄送資訊設定</p>
            </div>
            <div class="card-body">
                <form action="pur_page.php?id=<?php echo $id;?>&count=<?php echo $count?>&money=<?php echo $money?>" method="post" id="clear-form">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="name">
                                    <strong>姓名</strong>
                                </label>
                                <input type="name" class="form-control" id="name" name="name" value="<?php echo $userName?>" required/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="phone">
                                    <strong>電話</strong>
                                </label>
                                <input type="text" class="form-control" id="phone" name="phone" value="0<?php echo $phone?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="email">
                                    <strong>地址</strong>
                                </label>
                                <div id="zipcode3">
                                    <div class="f3" data-role="county" id="city" name="city"></div>
                                    <div class="f4" data-role="district" id="town" name="town"></div>
                                </div>
                                <input name="newaddress" type="text" class="f13 address form-control form-control-user row mb-3" value="<?php echo $address?>" onkeyup="this.value=this.value.replace(/^\s+|\s+$/g,'')" required/>
                                <script>
                                    $("#zipcode3").twzipcode({
                                        "zipcodeIntoDistrict": true,
                                        "css": ["city form-control form-control-user", "town form-control form-control-user"],
                                        "countyName": "city", // 指定城市 select name 
                                        "districtName": "town", // 指定地區 select name 
                                        "countySel": "<?php echo $city?>", //縣市預設值
                                        "districtSel": "<?php echo $_SESSION["at"]?>"
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" style="margin-right: 5px;">
                        <button class="btn btn1 btn-primary btn-sm" type="submit" style="margin-right: 10px; float:right;width:120px;height:50px;">預定</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/birthday.js"></script>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/theme.js"></script> 
</html>