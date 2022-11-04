<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/icon/css/all.css">
    <link rel="stylesheet" href="public/css/bass.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <link rel="shortcut icon" href="public/images/logo/logo.jpg" type="images/x-icon">
    <script src="public/js/jquery-3.6.0.min.js"></script>
    <title><?= empty($tenac) ? $title : $tenac . ' - ' . $title;?></title>
</head>
<body>
<?php
    // echo $date_current . '</br>';
    // print_r($_SESSION);
?>
    <div id="app">
        <div id="app-container">
            <div id="header">
                <div class="header-wrap">
                    <div class="header-logo">
                        <a href="index.php">
                            <img src="./public/images/view/avatar.png" alt="Logo website báo mới">
                        </a>
                    </div>
                    <div class="header-input">
                        <input type="text" name="timkiem" placeholder="Nội dung tìm kiếm">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="header-login">
                        <?php
                            if(empty($username)){
                                echo '<div class="header-login-wrap">
                                        <div class="header-login-open">
                                            <i class="fa-solid fa-user"></i>
                                            <span>Đăng nhập</span>
                                        </div>
                                        <div class="header-signup-open">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <span>Đăng ký</span>
                                        </div>
                                    </div>';
                            }
                            else{
                                $sql = "SELECT Ten_tac_gia FROM tac_gia, tai_khoan_dang WHERE tac_gia.ID_tac_gia = tai_khoan_dang.ID_tac_gia AND Ten_hien_thi = '$username'";
                                $result = $db->fetch_assoc($sql, 1);
                                $hoten = $result['Ten_tac_gia'];
                        ?>
                        <div class="header-infor">
                            <div class="header-infor-name">
                                <span>Chào, <b><?=$hoten?></b></span>
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                            <div class="header-infor-menu">
                                <div class="btn-manage-infor">
                                    <i class="fa-solid fa-user"></i>
                                    <span>Quản lý thông tin</span>
                                </div>
                                <div class="btn-manage-post">
                                    <i class="fa-solid fa-list"></i>
                                    <span>Quản lý bài viết</span>
                                </div>
                                <div class="btn-logout">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span>Đăng xuất</span>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="navbar">
                    <div class="navbar-container">
                        <div class="navbar-open-menu">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <div class="navbar-wrap">
                            <div class="navbar-news">
                                <div class="navbar-content">
                                    <a href="index.php?ac=nong"">Nóng</a>
                                </div>
                                <div class="navbar-content">
                                    <a href="index.php?ac=chu_de"">Chủ đề</a>
                                </div>
                                <div class="navbar-content">
                                    <a href="index.php?ac=moi_nhat"">Mới nhất</a>
                                </div>
                            </div>
                            <div class="navbar-hagtag">
                                <div class="navbar-hagtag-content">
                                    <a href="index.php?hagtag=kham_pha_the_gioi"># Khám phá thế giới</a>
                                </div>
                                <div class="navbar-hagtag-content">
                                    <a href="index.php?hagtag=kham_pha_viet_nam"># Khám phá Việt Nam</a>
                                </div>
                                <div class="navbar-hagtag-content">
                                    <a href="index.php?hagtag=the_thao"># Thể thao</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-menu">
                            <div class="navbar-menu-content">
                                <i class="fa-solid fa-caret-down"></i>
                                <span>CHỦ ĐỀ</span>
                            </div>
                            <ul class="navbar-menu-list">
                                <?php
                                    $sql = "SELECT * FROM chu_de";
                                    $topic = $db->fetch_assoc($sql, 0);
                                    foreach($topic as $index => $value){
                                        echo '<li class="navbar-menu-item">
                                                <a href="index.php?cd=' .$value['Ma_chu_de']. '">' .$value['Ten_chu_de']. '</a>
                                            </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            