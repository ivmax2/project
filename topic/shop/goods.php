<?php 
    session_start();
    $userName = $_SESSION["F"].$_SESSION["L"];
    $uid=$_SESSION["id"];
    $id=$_GET["id"];
    $conn=require_once("../Ly/config.php");
    $sql1 = "SELECT * FROM cart WHERE cart_buyer = '$uid'";
    $result1 = mysqli_query($conn,$sql1) or die("Error");
    $data_nums1 = mysqli_num_rows($result1); //統計總比數
    $sql = "SELECT * FROM commodity WHERE commodity_id  = '$id'";
    $result = mysqli_query($conn,$sql) or die("Error");
    $row = mysqli_fetch_array($result);
    $sql2 = "SELECT * FROM user_information WHERE user_id  = '$row[2]'";
    $result2 = mysqli_query($conn,$sql2) or die("Error");
    $row2 = mysqli_fetch_array($result2);
    $count=1;
?>
<!DOCTYPE html>
<html style="background: #ffffff;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>水果介紹</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/top setting.css">
    <link rel="stylesheet" href="../assets/css/goods.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/birthday.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script>
        function adder(){
	        var count=document.getElementById("countnum").innerHTML;
            if(count<10){
	        count=parseInt(count)+1;
	        document.getElementById("countnum").innerHTML=count;
            $("#my").val(count);
            }
        }
        function minuser(){
	        var count=document.getElementById("countnum").innerHTML;
	        if(count<=1){
		        count=1;
	        }else{
		        count=parseInt(count)-1;
	        }	
	        document.getElementById("countnum").innerHTML=count;
            $("#my").val(count);
        }

    </script>
</head>

<body id="page-top" style="background: #ffffff;border-color: #ffffff;border-right-color: rgba(133,135,150,0);color: #ffffff;">
    <div id="wrapper" style="border-color: #ffffff;border-right-color: #ffffff;color: #ffffff;">
        <nav class="navbar navbar-light navbar-expand1 bg-white shadow topbar static-top" style="background: #ffffff;border-color: #ffffff;width: 1920px;">
            <div class="container-fluid" style="background: #84ffdb">
                <a class="navbar-brand ms-md-7" href="../Ly/index.php" style="height: 67px;width: 105.px;margin: 4px;font-size: 40px;color: var(--bs-danger);">
                    <img src="../assets/img/New%20Folder/w.jpg" style="width: 45px;height: 55px;vertical-align: text-bottom;" />果時</a>
                    <form class="d-none d-sm-inline-block me-auto ms-md-1 my-2 my-md-0 mw-100 navbar-search1" action="search.php" method="post" id="clear-form" >
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
</body>
<body>
    <form action="goods_input.php?id=<?php echo $id;?>" method="post">
        <div class="title">
            <h1 style="color: black;text-align: center;margin: 20px;"><?php echo $row[1];?></h1>
        </div>
        <div class="flex-container">
            <div class="commodity" id="photo" >
                <div>
                    <?php echo '<img class="photo" src="data:image/png;base64,'.base64_encode($row[5]).'" />';?>
                </div><!--圖片內容-->
            </div><!-- 左邊 圖片框架-->
            <div class="read" id="" >
                <div style="color: rgba(133,135,150,0);margin: 30px;"></div>
                <div class="yyy" id="">
                    <div class="price" id="">
                        價格(一箱)： <h3 class="money">$<?php echo $row[3];?></h3>
                    </div>
                    <div style="color: rgba(133,135,150,0);margin: 40px;"></div>
                    <div class="uuu" id="">
                        賣家資訊
                        <ul>    
                            <li>
                                <div id="name">
                                    姓名：<?php echo $row2[3].$row2[2];?>
                                </div>
                            </li>
                            <li>
                                <div id="phone">
                                    電話：0<?php echo $row2[8];?>
                                </div>
                            </li>
                            <li>
                                <div id="address">
                                    地址：<?php echo $row2[9].$row2[10].$row2[12];?>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div style="color: rgba(133,135,150,0);margin: 40px;"></div>
                    <div class="zzz" id="">
                        箱數(最多10箱)：
                    </div>
                    <ul class="counter" name="count">
                        <li id="minus">
                            <input type="button" onclick="minuser()" value="-"/>
                        </li>
                        <li id="countnum">1</li>
                        <li id="plus">
                            <input type="button" onclick="adder()" value="+"/>
                        </li>
                    </ul>
                </div>
                <div style="color: rgba(133,135,150,0);margin: 100px;"></div> 
                <div class="buy">
                    <input type="submit" value="加入購物車" name="0"/>
                    <input type="submit" value="預定" name="0"/>
                    <input type="hidden" id="my" name="c">
                </div>
            </div>
        </div>
        <div style="color: rgba(133,135,150,0);margin: 40px;"></div> 
        <div class="flex-container">
            <div class="introduce">商品介紹</div>
        </div>
        <div style="color: rgba(133,135,150,0);margin: 20px;"></div> 
        <div class="flex-container2">
            <div class="introduce2">
                <pre><?php echo $row[4];?></pre>
            </div>
        </div>
    </form>
</body>

</html>