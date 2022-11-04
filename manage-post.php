<?php
    include_once 'init/config.php';
    function ramdomID(){
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $size = strlen($chars);
        $string = '';
        for( $i = 1; $i <= 32; $i++ ) {
            $string .= $chars[rand(0, $size - 1 )];
            if($i == 8 || $i == 12 || $i == 16 || $i == 20){
                $string .= '-';
            }
        }
        return $string;
    }
    $ac = (isset($_GET['ac'])) ? $_GET['ac'] : '';
    if(empty($ac)){
        header('Location: index.php');
    }
    else{
        if($ac == 'add'){
            if(empty($_POST)){
                header('Location: index.php');
            }
            $id_tac_gia = $_POST['idtacgia'];
            $tieu_de = $_POST['tieude'];
            $noi_dung = $_POST['noidung'];
            $ngay_dang = $date_current;
            $phan_loai = (array)json_decode($_POST['phanloai']);
            $keypl = array_keys($phan_loai);
            $valuepl = array_values($phan_loai);

            $sql_id = "SELECT ID_tai_khoan_dang FROM tai_khoan_dang WHERE ID_tac_gia = '$id_tac_gia'";
            $id_tai_khoan_dang = $db->fetch_assoc($sql_id, 1)['ID_tai_khoan_dang'];
            do{
                $id_pl = ramdomID();
                $sql_check = "SELECT * FROM phan_loai WHERE ID_phan_loai = '$id_pl'";
                $row = $db->num_rows($sql_check);
            }
            while($row != 0);

            $sql_phanloai = "INSERT INTO phan_loai VALUE('$id_pl', ";
            for($i = 0 ; $i < count($keypl) ; $i++){
                if($i == count($keypl) - 1){
                    $sql_phanloai = $sql_phanloai.'"'.$valuepl[$i] .'")';
                }
                else{
                    $sql_phanloai = $sql_phanloai.'"'.$valuepl[$i] .'", ';
                }
            }
            $db->query($sql_phanloai);

            do{
                $id_bv = ramdomID();
                $sql_check = "SELECT * FROM bai_viet WHERE ID_bai_viet = '$id_bv'";
                $row = $db->num_rows($sql_check);
            }
            while($row != 0);
                        
            $file_path = $id_bv. '.png';
            $target_dir = "public/images/view/";
            $target_file = $target_dir . $file_path;
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            }

            $sql_baiviet = "INSERT INTO bai_viet VALUES('$id_bv','$id_pl','$id_tai_khoan_dang','$tieu_de','$noi_dung','$file_path','$ngay_dang')";
            $db->query($sql_baiviet);
            echo "Thành công ID bài viết : " .$id_bv;
        }
        else if($ac == 'edit'){
            if(empty($_POST)){
                header('Location: index.php');
            }
            $id = $_POST['id'];
            $tieu_de = $_POST['tieude'];
            $noi_dung = $_POST['noidung'];
            $ngay_dang = $date_current;
            $phan_loai = (array)json_decode($_POST['phanloai']);
            $keypl = array_keys($phan_loai);
            $valuepl = array_values($phan_loai);
            $sql_phanloai = "UPDATE phan_loai INNER JOIN bai_viet ON bai_viet.ID_phan_loai = phan_loai.ID_phan_loai SET ";
            for($i = 0 ; $i < count($keypl) ; $i++){
                if($i == count($keypl) - 1){
                    $sql_phanloai = $sql_phanloai.'Phan_loai.'.$keypl[$i].' = "'.$valuepl[$i] .'"';
                }
                else{
                    $sql_phanloai = $sql_phanloai.'Phan_loai.'.$keypl[$i].' = "'.$valuepl[$i] .'", ';
                }
            }
            $sql_phanloai = $sql_phanloai . "WHERE bai_viet.ID_bai_viet = '$id'";
            $db->query($sql_phanloai);

            if(!empty($_FILES["file"]["name"])) {
                $target_dir = "public/images/view/";
                $file_path = $_POST['id'] . '.png';
                $target_file = $target_dir . $file_path;
                $check = getimagesize($_FILES["file"]["tmp_name"]);

                if($check !== false) {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                }
                echo "Có sửa ảnh";
                $sql_baiviet = "UPDATE bai_viet SET Tieu_de = '$tieu_de', Anh = '$file_path', Noi_dung = '$noi_dung', Ngay_dang = '$ngay_dang' WHERE ID_bai_viet = '$id'";
            }
            else{
                echo "Không sửa ảnh";
                $sql_baiviet = "UPDATE bai_viet SET Tieu_de = '$tieu_de', Noi_dung = '$noi_dung', Ngay_dang = '$ngay_dang' WHERE ID_bai_viet = '$id'";
            }
            $db->query($sql_baiviet);
        }
        else if($ac == 'delete'){
            if(empty($_POST['idPost'])){
                header('Location: index.php');
            }
            $data = $_POST['idPost'];
            foreach($data as $index => $value){
                $sql = "DELETE phan_loai, bai_viet FROM phan_loai INNER JOIN bai_viet ON phan_loai.ID_phan_loai = bai_viet.ID_phan_loai WHERE ID_bai_viet = '$value'";
                $db->query($sql);
            }
        }
    }
?>