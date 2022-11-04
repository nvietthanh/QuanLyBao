<?php
    $sql = "SELECT * FROM tac_gia INNER JOIN tai_khoan_dang ON tac_gia.ID_tac_gia = tai_khoan_dang.ID_tac_gia WHERE Ten_hien_thi = '$username'";
    $data = $db->fetch_assoc($sql, 1);
?>
<link rel="stylesheet" href="public/css/manage-post.css">
<div id="container">
    <div class="container-user-post">
        <div class="user-infor">
            <div class="user-infor-modify">Thông tin chi tiết tác giả:</div>
            <div class="user-infor-main">
                <div class="user-infor-wrap">
                    <div class="user-infor-name">Mã tác giả: </div>
                    <div class="user-infor-id"><?=$data['ID_tac_gia']?></div>
                </div>
                <div class="user-infor-wrap">
                    <div class="user-infor-name">Họ tên: </div>
                    <div class="user-infor-content"><?=$data['Ten_tac_gia']?></div>
                </div>
                <div class="user-infor-wrap">
                    <div class="user-infor-name">Giới tính: </div>
                    <div class="user-infor-content"><?=($data['Gioi_tinh'] == 0) ? 'Nam' : 'Nữ'?></div>
                </div>
                <div class="user-infor-wrap">
                    <div class="user-infor-name">Ngày sinh: </div>
                    <div class="user-infor-content"><?=$data['Nam_sinh']?></div>
                </div>
                <div class="user-infor-wrap">
                    <div class="user-infor-name">Email: </div>
                    <div class="user-infor-content"><?=$data['Email']?></div>
                </div>
                <div class="user-infor-wrap">
                    <div class="user-infor-name">Địa chỉ: </div>
                    <div class="user-infor-content"><?=$data['Dia_chi']?></div>
                </div>
            </div>
        </div>
        <div class="table-list-post">
        <?php
            $sqlPost = "SELECT * FROM bai_viet INNER JOIN tai_khoan_dang ON bai_viet.ID_tai_khoan_dang = tai_khoan_dang.ID_tai_khoan_dang WHERE Ten_hien_thi = '$username' ORDER BY Ngay_dang DESC";
            if($db->num_rows($sqlPost) == 0){
                echo '<div class="table-no-post">
                        Bạn chưa có bài viết nào, vui lòng<span class="table-add-post" onclick="addPost()"> kích vào đây </span>để tạo bài viết mới
                    </div>';
            }
            else{
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $data = $db->fetch_assoc($sqlPost, 0);
                $maxPage = ceil(count($data)/4);
                //echo '<br>'. $page . ' - ' .count($data). ' - ' . $maxPage;
                if($page > $maxPage){
                    $page = $maxPage;
                }
        ?>
        <div class="table-list-name">Đây là danh sách bài viết mà bạn đã đăng lên hệ thống :</div>
        <table>
            <a href=""></a>
            <thead>
                <tr>
                    <td></td>
                    <td style="width: 5%;">ID bài viết</td>
                    <td style="width: 20%;">Tiêu đề</td>
                    <td style="width: 18%;">Ảnh tiêu đề</td>
                    <td style="width: 47%;">Nội dung</td>
                    <td style="width: 10%;">Ngày đăng</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = array_slice($data, ($page - 1)*4, 4);
                    foreach($result as $index => $value){
                        echo '<tr>
                                <td><input type="checkbox"></td>
                                <td><a href="index.php?id=' .$value['ID_bai_viet']. '">' .$value['ID_bai_viet']. '</a></td>
                                <td>' .$value['Tieu_de']. '</td>
                                <td><img src="public/images/view/' .$value['Anh']. '" alt="' .$value['Tieu_de']. '"></td>
                                <td>' .nl2br($value['Noi_dung']). '</td>
                                <td>' .$value['Ngay_dang']. '</td>
                            </tr>';
                    }
                ?>
            </tbody>
        </table>
        <div class="topic-button">
            <?php
                if($page > 1){
                    echo '<div class="topic-btn-item">
                            <a href="index.php?ac=quan_ly_bai_viet&page=' .($page - 1). '">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>';
                }
                $maxMenuPage = ceil($maxPage/5);
                if($maxMenuPage > 1){
                    $menuPage = ceil($page/5);
                    for($i = ($menuPage - 1)*5 + 1 ; $i <= ($menuPage - 1)*5 + 5 ; $i++){
                        if($menuPage == $maxMenuPage){
                            $temp = (($menuPage - 1)*5 + 5) - $maxPage;
                            if($i - $temp > 0){
                                if($i - $temp == $page){
                                    echo '<div class="topic-btn-item active">
                                        <a href="index.php?ac=quan_ly_bai_viet&page=' .($i - $temp). '">' .($i - $temp). '</a>
                                    </div>';
                                }
                                else{
                                    echo '<div class="topic-btn-item">
                                        <a href="index.php?ac=quan_ly_bai_viet&page=' .($i - $temp). '">' .($i - $temp). '</a>
                                    </div>';
                                }
                            }
                        }
                        else{
                            if($i == $page){
                                echo '<div class="topic-btn-item active">
                                        <a href="index.php?ac=quan_ly_bai_viet&page=' .$i. '">' .$i. '</a>
                                    </div>';
                            }
                            else{
                                echo '<div class="topic-btn-item">
                                        <a href="index.php?ac=quan_ly_bai_viet&page=' .$i. '">' .$i. '</a>
                                    </div>';
                            }
                        }
                    }
                }
                if($page < $maxPage){
                    echo '<div class="topic-btn-item">
                            <a href="index.php?ac=quan_ly_bai_viet&page=' .($page + 1). '">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>';
                }
            ?>
        </div>
        <div class="btn-post-menu">
            <button class="btn-menu-item" onclick="addPost()">Thêm bài</button>
            <button class="btn-menu-item" onclick="editPost()">Sửa bài</button>
            <button class="btn-menu-item" onclick="deletePost()">Xóa bài</button>
        </div>
        <?php
            }
        ?>
        </div>
    </div>
</div>