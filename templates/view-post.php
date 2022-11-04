<?php
    $sqlPost = "SELECT * FROM bai_viet WHERE ID_bai_viet = '$id'";
    $sqlAuthor = "SELECT Ten_tac_gia FROM tac_gia, tai_khoan_dang, bai_viet WHERE tac_gia.ID_tac_gia = tai_khoan_dang.ID_tac_gia AND tai_khoan_dang.ID_tai_khoan_dang = bai_viet.ID_tai_khoan_dang AND bai_viet.ID_bai_viet = '$id'";
    $sqlTopic = "SELECT * FROM bai_viet, phan_loai WHERE bai_viet.ID_phan_loai = phan_loai.ID_phan_loai AND bai_viet.ID_bai_viet = '$id'";
    
    $dataPost = $db->fetch_assoc($sqlPost, 1);
    $dataAuthor = $db->fetch_assoc($sqlAuthor, 1);
    $dataTopic = $db->fetch_assoc($sqlTopic, 1);

    $listTopic = array_slice($dataTopic, 7, count($dataTopic));
    $topicMax = array();
    foreach($listTopic as $index => $value){
        if(count($topicMax) == 0){
            $topicMax = array($index=>$value);
        }
        else{
            if(array_values($topicMax)[0] < $value){
                $topicMax = array($index=>$value);
            }
        }
    }
    $key = array_keys($topicMax)[0];
    $sql = "SELECT * FROM chu_de WHERE Ma_chu_de = '$key'";
    $topic = $db->fetch_assoc($sql, 1);
    $maTieuDe = $topic['Ma_chu_de'];
    $tenTieuDe = $topic['Ten_chu_de'];
?>
<div id="container">
    <div class="container-left">
        <div class="post-container">
            <div class="post-title"><?=$dataPost['Tieu_de']?></div>
            <div class="post-wrap">
                <div class="post-topic">
                    <a href="index.php?cd=<?=$maTieuDe?>"><?=$tenTieuDe?></a>
                </div>
                <div class="post-author"><?=$dataAuthor['Ten_tac_gia']?></div>
                <div class="post-time"><?=$dataPost['Ngay_dang']?></div>
            </div>
            <div class="post-img">
                <img src="public/images/view/<?=$dataPost['Anh']?>" alt="<?=$dataPost['Tieu_de']?>">
                <div class="post-img-name"><?=$dataPost['Tieu_de']?></div>
            </div>
            <div class="post-content">&emsp;&emsp;<?=preg_replace('#\n#i', '<br><p class="space-column"></p>&emsp;&emsp;', $dataPost['Noi_dung'])?></div>
        </div>
    </div>
    <div class="container-right">
        <div class="news-last">
            <div class="container-name">ĐỌC TIẾP</div>
            <div class="news-last-list">
                <?php
                    $sql = "SELECT * FROM bai_viet, phan_loai WHERE bai_viet.ID_phan_loai = phan_loai.ID_phan_loai AND $maTieuDe > 80 ORDER BY Ngay_dang ASC";
                    $data = $db->fetch_assoc($sql, 0);
                    $dataNext = array_slice($data, 0, 5);

                    foreach($dataNext as $index => $value){
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