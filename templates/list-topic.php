<?php
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $sql = "SELECT * FROM bai_viet, phan_loai WHERE bai_viet.ID_phan_loai = phan_loai.ID_phan_loai AND $cd > 50 ORDER BY Ngay_dang DESC, $cd DESC";
    $dataTopic = $db->fetch_assoc($sql, 0);
    $maxPage = ceil(count($dataTopic)/12);
    if($page > $maxPage){
        $page = $maxPage;
    }
    else if($page <= 0){
        $page = 1;
    }
?>
<div id="container">
    <div class="container-left">
        <div class="container-left-wrap">
            <div class="container-title"><?=$tencd?></div>
            <div class="topic-tick">
                <?php
                    $result = array_slice($dataTopic, ($page - 1)*12, 12);
                    if(count($result) > 1){
                        $dataTick = [array_shift($result), array_shift($result)];
                        foreach($dataTick as $index => $value){
                            echo '<div class="topic-tick-item">
                                    <a href="index.php?id=' .$value['ID_bai_viet']. '">
                                        <img src="public/images/view/' .$value['Anh']. '" alt="' .$value['Tieu_de']. '">
                                    </a>
                                    <div class="topic-tick-item-title">
                                        <a href="index.php?id='.$value['ID_bai_viet'].'">
                                            ' .$value['Tieu_de']. '
                                        </a>
                                    </div>
                                    <div class="topic-tick-item-content">' .nl2br($value['Noi_dung']). '</div>
                                    <div>Index: ' . $index. ' - Chủ đề: ' .$cd .' - '. $value[ '' . $cd . '' ]. '</div>
                                </div>';
                        }
                    }
                ?>
            </div>
            <div class="toppic-list">
                <?php
                    foreach($result as $index => $value){
                        echo '<div class="toppic-item">
                            <a href="index.php?id='. $value['ID_bai_viet'] .'">
                                <img src="public/images/view/' .$value['Anh']. '" alt="'. $value['Tieu_de'] .'">
                            </a>
                            <div class="toppic-item-wrap">
                                <a href="index.php?id='. $value['ID_bai_viet'] .'">
                                    <div class="toppic-item-title">'. $value['Tieu_de'] .'</div>
                                </a>
                                <div class="toppic-item-time">'. $value['Ngay_dang'] .'</div>
                                <div class="toppic-item-content">'. nl2br($value['Noi_dung']) .'</div>
                                <div>Index: ' . $index. ' - Chủ đề: ' .$cd .' - '. $value[ '' . $cd . '' ]. '</div>
                            </div>
                        </div>';
                    }
                ?>
            </div>
            <div class="topic-button">
                <?php
                    if($page > 1){
                        echo '<div class="topic-btn-item">
                                <a href="index.php?cd=' .$cd. '&page=' .($page - 1). '">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                            </div>';
                    }
                    $maxMenuPage = ceil($maxPage/4);
                    if($maxMenuPage >= 1){
                        $menuPage = ceil($page/4);
                        for($i = ($menuPage - 1)*4 + 1 ; $i <= ($menuPage - 1)*4 + 4 ; $i++){
                            if($menuPage == $maxMenuPage){
                                $temp = (($menuPage - 1)*4 + 4) - $maxPage;
                                if($i - $temp > 0){
                                    if($i - $temp == $page){
                                        echo '<div class="topic-btn-item active">
                                            <a href="index.php?cd=' .$cd. '&page=' .($i - $temp). '">' .($i - $temp). '</a>
                                        </div>';
                                    }
                                    else{
                                        echo '<div class="topic-btn-item">
                                                <a href="index.php?cd=' .$cd. '&page=' .($i - $temp). '">' .($i - $temp). '</a>
                                            </div>';
                                    }
                                }
                            }
                            else{
                                if($i == $page){
                                    echo '<div class="topic-btn-item active">
                                            <a href="index.php?cd=' .$cd. '&page=' .$i. '">' .$i. '</a>
                                        </div>';
                                }
                                else{
                                    echo '<div class="topic-btn-item">
                                            <a href="index.php?cd=' .$cd. '&page=' .$i. '">' .$i. '</a>
                                        </div>';
                                }
                            }
                        }
                    }
                    if($page < $maxPage){
                        echo '<div class="topic-btn-item">
                                <a href="index.php?cd=' .$cd. '&page=' .($page+1). '">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="container-right">
        <div class="news-last">
            <div class="container-name">TIN MỚI NHẤT</div>
            <div class="news-last-list">
                <?php
                    $sql = "SELECT * FROM bai_viet, phan_loai WHERE bai_viet.ID_phan_loai = phan_loai.ID_phan_loai ORDER BY Ngay_dang DESC";
                    $datLast = $db->fetch_assoc($sql, 0);
                    $result = array_slice($datLast, 0, 12);
                    foreach($result as $index => $value){
                        preg_match('#\d[0-9:]{4,4}#', $value['Ngay_dang'], $hours);
                        preg_match('#[0-9-]{6,12}#', $value['Ngay_dang'], $date);
                        echo '<div class="new-last-item">
                            <div class="new-last-time">' .$hours[0]. '</div>
                            <a href="index.php?id=' .$value['ID_bai_viet']. '">
                                <div class="new-last-content">' .$value['Tieu_de']. '</div>
                            </a>
                        </div>';
                    }
                ?>
                
            </div>
        </div>
        <div class="partner">
            <div class="partner-name">CÁC ĐỐI TÁC</div>
            <div class="partner-list">
                
            </div>
        </div>
        <div class="advertise">
            <div class="advertist-name">QUẢNG CÁO</div>
            <div class="advertises-container">
                <div class="advertises-list">
                    <div class="advertise-item">
                        <a href="index.php?quang_cao_1">
                            <img src="./public/images/quang-cao/qc_1.png" alt="Quảng cáo sữa Vinamilk" class="advertise-image">
                        </a>
                    </div>
                    <div class="advertise-item">
                        <a href="index.php?quang_cao_2">
                            <img src="./public/images/quang-cao/qc_2.png" alt="Quảng cáo sữa Vinamilk" class="advertise-image">
                        </a>
                    </div>
                    <div class="advertise-item">
                        <a href="index.php?quang_cao_3">
                            <img src="./public/images/quang-cao/qc_3.png" alt="Quảng cáo sữa Vinamilk" class="advertise-image">
                        </a>
                    </div>
                    <div class="advertise-item">
                        <a href="index.php?quang_cao_4">
                            <img src="./public/images/quang-cao/qc_4.png" alt="Quảng cáo sữa Vinamilk" class="advertise-image">
                        </a>
                    </div>
                    <div class="advertise-item">
                        <a href="index.php?quang_cao_5">
                            <img src="./public/images/quang-cao/qc_5.png" alt="Quảng cáo sữa Vinamilk" class="advertise-image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>