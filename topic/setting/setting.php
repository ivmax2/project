<?php 
    session_start();
    $userName = $_SESSION["F"].$_SESSION["L"];
    $userFN = $_SESSION["F"];//姓名
    $userLN = $_SESSION["L"];
    $email = $_SESSION["e"];//email
    $password = $_SESSION["pw"];//password
    $phone = $_SESSION["pn"];//phone
    $city = $_SESSION["ac"];//city
    $address = $_SESSION["ad"];
    $id = $_SESSION["id"];
    $seller=$_SESSION["seller"];
    $uid=$_SESSION["id"];
    $conn=require_once("../Ly/config.php");
    $sql = "SELECT * FROM cart WHERE cart_buyer = '$uid'";
    $result = mysqli_query($conn,$sql) or die("Error");
    $data_nums = mysqli_num_rows($result); //統計總比數
    if($seller === "true"){
        $yesno = "是";
    }
    else{
        $yesno = "否";
    }
?>
<!DOCTYPE html>
<html style="background: #ffffff;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>設定</title>
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

<body style="color: rgba(132,255,219,0);border-color: rgba(132,255,219,0);background: rgb(255, 255, 255);">
    <div id="wrapper" style="border-color: #ffffff;border-right-color: #ffffff;color: #ffffff;">
        <nav class="navbar navbar-light navbar-expand1 bg-white shadow mb-4 topbar static-top" style="background: #84ffdb;border-color: #84ffdb;width: 1920px;">
            <div class="container-fluid " style="background:#84ffdb">
                <a class="navbar-brand ms-md-7" href="../Ly/index.php" style="height: 67px;width: 105.px;margin: 4px;font-size: 40px;color: var(--bs-danger);">
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
                            <a class="dropdown-item" href="setting.php">
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
<div id="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3" style="object-fit: contain">
                    <div class="card-body text-center shadow ">
                        <?php
                            if($_SESSION["imageId"] == NULL){
                                echo '<img id="showImg" class="rounded-circle mb-3 mt-4" src="../assets/img/New%20Folder/images.jpg"/>';
                            }else{
                                echo '<img id="showImg" style="width:220px; height:230px;" class="rounded-circle mb-3 mt-4 img-profile" src="data:image/png;base64,'.base64_encode($_SESSION["imageId"]).'" />';
                            }
                        ?>
                        <div class="mb-3">
                            <form action="setting_photo.php" method="post" enctype="multipart/form-data">
                                <input type="file" class="photo" name="photo" onchange="selectImgFile(this.files)" accept=".jpg, .jpeg, .png"> 
                                <button class="btn btn-primary btn-sm" type="submit">更改照片</button>
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary fw-bold mb-0">是否為賣家:<?php echo $yesno ?></h6>
                                <?php
                                    if($_SESSION["seller"] === "false"){
                                        $yesno = "否";
                                        $sell = "成為賣家";
                                    ?>
                                    <button  class="btn btn-primary btn-sm" style="float:right;" onclick="window.location.href='setting_seller.php'"><?php echo $sell ?></button>
                                <?php
                                    }
                                    else if($_SESSION["seller"] === "true"){
                                        $yesno = "是";
                                        $sell = "賣家頁面";
                                    ?>
                                    <button class="btn btn-primary btn-sm" style="float:right;" onclick="window.location.href='../seller/Incomplete_orders.php'"><?php echo $sell ?></button>
                                <?php        
                                    }
                                    else{
                                        $yesno = "否";
                                        $sell = "申請中";
                                    ?>
                                    <button  disabled="disabled" class="btn btn-primary btn-sm" style="float:right;"><?php echo $sell ?></button>
                                <?php
                                    }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">密碼設定</p>
                                </div>
                                <div class="card-body">
                                    <form action="setting_password.php" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="password">
                                                        <strong>密碼</strong>
                                                    </label>
                                                    <input class="form-control" type="password" id="newpassword" placeholder="請輸入新密碼" name="newpassword" required/>
                                                    <br>
                                                    <input class="form-control" type="password" id="rnpassword" placeholder="確認密碼" onkeyup="validate()" required/>
                                                    <span id="tishi"></span>
                                                    <br>
                                                    <input type="checkbox" onclick="ShowPwd()"><h7 style="color:#696969;">顯示密碼</h7>
                                                    <script>
                                                        function ShowPwd() {
                                                            var x = document.getElementById("newpassword");
                                                            if (x.type === "password") {x.type = "text";}
                                                            else {x.type = "password";}}
                                                    </script>
                                                    <script>
                                                    function validate() {
                                                        var pwd1 = document.getElementById("newpassword").value;
                                                        var pwd2 = document.getElementById("rnpassword").value;
                                                        if(pwd1 == pwd2){                        
                                                            document.getElementById("buttons").disabled = false;
                                                            document.getElementById("tishi").innerHTML="<font color='red'></font>"}
                                                        else {
                                                            document.getElementById("tishi").innerHTML="<font color='red'>兩次密碼不相同</font>";
                                                        }
                                                    }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button id="buttons" class="btn btn-primary btn-sm" type="submit">保存設定</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">寄送資訊設定</p>
                                </div>
                                <div class="card-body">
                                    <form action="setting_send.php" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">
                                                        <strong>姓</strong>
                                                    </label>
                                                    <input type="text" class="form-control"  placeholder="<?php echo $userFN?>" name="newFN" onkeyup="this.value=this.value.replace(/^\s+|\s+$/g,'')"/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">
                                                        <strong>名</strong>
                                                    </label>
                                                    <input type="text" class="form-control"  placeholder="<?php echo $userLN?>" name="newLN" onkeyup="this.value=this.value.replace(/^\s+|\s+$/g,'')"/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="phone">
                                                        <strong>電話</strong>
                                                    </label>
                                                    <input type="text" class="form-control" id="user_phone_number" placeholder="0<?php echo $phone?>" name="newphone" onkeyup="checkPhone()"/>
                                                    <span id="uidt"></span>
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
                                                        <div class="f3" data-role="county" id="city"></div>
                                                        <div class="f4" data-role="district" id="town"></div>
                                                    </div>
                                                    <input name="newaddress" type="text" class="f13 address form-control form-control-user row mb-3" placeholder="<?php echo $address?>" onkeyup="this.value=this.value.replace(/^\s+|\s+$/g,'')"/>
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
                                        <div class="mb-3">
                                            <button class="btn btn-primary btn-sm" type="submit">保存設定</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/birthday.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script>
        function selectImgFile(files) {
            if(!files.length) {
                return false;
            }
            let file   = files[0];
            let reader = new FileReader();
            reader.onload = function () {
                document.getElementById('showImg').src = this.result;
            };
            reader.readAsDataURL(file);
        }
    </script>
</body>

</html>