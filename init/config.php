<?php
    // Include các thư viện
    require_once 'classes/Session.php';
    require_once 'classes/Db.php';
    
    $db = new DB();
    $db->connect();

    // Khởi tạo object Session
    $session = new Session();
    $session->start();
    $username = $session->get();

    // Múi giờ chung
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    $date_current = '';
    $date_current = date("Y-m-d H:i:s");

    $title = 'Tin tức Việt Nam và quốc tế';
    $ac = '';
    $tenac = '';
    
    if(!empty($_GET)){
        $get = $_GET;
        switch(array_keys($get)[0]){
            case 'cd':
                $ac = 'cd';
                $cd = $_GET['cd'];
                $sql = "SELECT Ten_chu_de FROM chu_de WHERE Ma_chu_de = '$cd'";
                $data = $db->fetch_assoc($sql, 1);
                $tenac = $tencd = $data['Ten_chu_de'];
                break;
            case 'id':
                $ac = 'id';
                $id = $_GET['id'];
                break;
            case 'ac':
                $ac = $_GET['ac'];
                if($ac == 'quan_ly_bai_viet'){
                    $ac = 'ql';
                    $tenac = 'Quản lý bài viết';
                }
                break;

        }
    }
?>