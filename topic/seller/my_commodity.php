<?php 
    session_start();
    $userName = $_SESSION["F"].$_SESSION["L"];//姓名
    $uid=$_SESSION["id"];
    $conn=require_once("../Ly/config.php");
    $sql1 = "SELECT * FROM cart WHERE cart_buyer = '$uid'";
    $result1 = mysqli_query($conn,$sql1) or die("Error");
    $data_nums = mysqli_num_rows($result1); //統計總比數
    $sql = "SELECT * FROM commodity WHERE commodity_seller_id = '$uid'"; //修改成你要的 SQL 語法
    $result = mysqli_query($conn,$sql) or die("Error");
    $row=mysqli_fetch_array($result);
    $_SESSION['status']=$row[7];
    if($_SESSION['status']==='yes'){
        $shelf='checked';
    }else{
        $shelf='check';
    }
    $sql2 = "SELECT type_name FROM fruit_type WHERE type_id = '$row[6]'"; //修改成你要的 SQL 語法
    $result2 = mysqli_query($conn,$sql2) or die("Error");
    $row2=mysqli_fetch_array($result2);
?>
<!DOCTYPE html>
<html style="background: #ffffff;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>我的水果</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/setting.css">
    <link rel="stylesheet" href="../assets/css/top setting.css">
    <link rel="stylesheet" href="../assets/css/seller.css">
    <link rel="stylesheet" href="../assets/css/my.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" data-semver="1.9.1" data-require="jquery@*"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/birthday.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/theme.js"></script>
    <style> 
        article { 
            width:50%; 
            float:right; 
            padding:10px; 
            float:right; 
        } 
        aside { 
            float:left; 
            width:40%; 
            float:left; 
            background-color:white;
            padding:5px;  
            margin:10px; 
            height:100px; 
        }
        </style> 
</head>

<header style="color: rgba(132,255,219,0);border-color: rgba(132,255,219,0);background: rgb(255, 255, 255);">
    <div id="wrapper" style="border-color: #ffffff;border-right-color: #ffffff;color: #ffffff;">
        <nav class="navbar navbar-light navbar-expand1 bg-white shadow mb-4 topbar static-top" style="background: #84ffdb;border-color: #84ffdb;width: 1920px;">
            <div class="container-fluid" style="background:#84ffdb">
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
</header>
<body style="background-color: #ffffff;">
    <aside style="width:15%;height:100vh;background-color: white;border-style: solid;border-color: black;border-width: 5px;"> <!--左邊測欄位-->
        <div id="order">
            <div id="訂單管理">
                訂單管理
                <ul>    
                    <li>
                        <div id="已成立訂單">
                            <a href="Incomplete_orders.php">未成立訂單</a>
                        </div>
                    </li>
                    <li>
                        <div id="未完成訂單">
                            <a href="established_orders.php">已成立訂單</a>
                        </div>
                    </li>
                    <li>
                        <div id="未完成訂單">
                            <a href="order_completed.php">已完成訂單</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="commodity">
            <div id="商品管理">
                <br>
                商品管理
                <ul>    
                    <li>
                        <div id="我的商品">
                            <a>我的商品</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>    
    </aside>
    <article>
        <div id="first_page" style="background-color: #ffffff;">我的商品</div>
    </article>
    <div style="color: rgba(133,135,150,0);margin: 40px;"></div>
    <div class="sw">
        <div style="float:left;">
            上架：
        </div>
        <div class="switch">
            <input class="switch-checkbox" id="switchID1" type="checkbox" name="switch-checkbox" <?php echo $shelf?>>
            <label class="switch-label" for="switchID1">
                <span class="switch-txt" turnOn="開" turnOff="關"></span>
                <span class="switch-Round-btn"></span>
            </label>
        </div>
    </div>
    </br>
    <div class="container">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">商品照片</p>
            </div>
            <div class="card-body">
                <div class="ccl1">
                    <div style="height: auto;border: 0px solid #000;border-radius: 0px;font-size: 20px;">
                        <?php
                            if($_SESSION["imageId"] == NULL){
                                echo '<img id="showImg" class="photo10" src="../assets/img/New%20Folder/300.png"/>';
                            }else{
                                echo '<img id="showImg" class="photo10" src="data:image/png;base64,'.base64_encode($row[5]).'" />';
                            }
                        ?>
                    </div>
                    <form action="my_photo.php" method="post" enctype="multipart/form-data" style="float:right ">
                        <input type="file" class="photo" name="photo" onchange="selectImgFile(this.files)" accept=".jpg, .jpeg, .png">
                        <button class="btn btn-primary btn-sm" type="submit">更改照片</button>
                    </form>
                </div>
            </div>        
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">商品設定</p>
                </div>
                <div class="card-body">
                    <form action="my_set.php" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">
                                        <strong>水果種類</strong>
                                    </label>
                                    <select required class="form-control form-control-user" name="type">
                                        <option value="<?php echo $row[6]?>" selected hidden><?php echo $row2[0]?></option> 
                                        <option value="1" >釋迦</option>
                                        <option value="2" >奇異果</option>
                                        <option value="3" >西瓜</option>
                                        <option value="4" >蘋果</option>
                                        <option value="5" >香蕉</option>
                                        <option value="6" >芭樂</option>
                                        <option value="7" >柳丁</option>
                                        <option value="8" >火龍果</option>
                            </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">
                                        <strong>商品名稱</strong>
                                    </label>
                                    <input type="text" class="form-control" name="name"value="<?php echo $row[1]?>" required/>
                                </div>
                            </div>
                            <div class="col">
                                <div class=" mb-3">
                                    <label class="form-label">
                                        <strong>價格(一箱)</strong>
                                    </label>
                                    <input type="text" class="form-control" name="price" value="<?php echo $row[3]?>" onkeyup="value=value.replace(/^(0+)|[^\d]+/g,'')" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">
                                        <strong>介紹</strong>
                                    </label>
                                    <textarea class="form-control" style="height:500px;" name="introduce" required><?php echo $row[4]?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3" style="margin-right: 5px;">
                            <button class="btn btn1 btn-primary btn-sm" type="submit" style="margin-right: 10px; float:right;width:120px;height:50px;">儲存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    //上下架(my_commodity.php)
    $(function(){
        $('#switchID1').change(function(){
            $.post("my_shelf.php?status=<?php echo $_SESSION['status'];?>",{},function(){});
        });
    });
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
</html>