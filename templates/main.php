<?php
    $sql = "SELECT * FROM bai_viet, phan_loai WHERE bai_viet.ID_phan_loai = phan_loai.ID_phan_loai ORDER BY Ngay_dang DESC";
    $dataLast = $db->fetch_assoc($sql, 0);
?>
<div id="container">
    <div class="container-left">
        <div class="new-tick">
            <div class="container-name">TIN NỔI BẬT</div>
            <a href="index.php?id=<?=$dataLast[0]['ID_bai_viet']?>" class="new-tick-img">
                <img src="./public/images/view/<?=$dataLast[0]['Anh']?>" alt="<?=$dataLast[0]['Tieu_de']?>">
            </a>
            <div class="new-tick-wrap">
                <a href="index.php?id=<?=$dataLast[0]['ID_bai_viet']?>">
                    <div class="new-tick-title"><?=$dataLast[0]['Tieu_de']?></div>
                </a>
                <div class="new-tick-time"><?=$dataLast[0]['Ngay_dang']?></div>
            </div>
        </div>
        <div class="new-tick">
            <div class="container-name">TIN ĐỌC NHIỀU NHẤT</div>
            <a href="index.php?id=<?=$dataLast[20]['ID_bai_viet']?>" class="new-tick-img">
                <img src="./public/images/view/<?=$dataLast[20]['Anh']?>" alt="<?=$dataLast[20]['Tieu_de']?>">
            </a>
            <div class="new-tick-wrap">
                <a href="index.php?id=<?=$dataLast[20]['ID_bai_viet']?>">
                    <div class="new-tick-title"><?=$dataLast[20]['Tieu_de']?></div>
                </a>
                <div class="new-tick-time"><?=$dataLast[21]['Ngay_dang']?></div>
            </div>
        </div>
        <div class="news-list">
            <?php
                $sql = "SELECT * FROM bai_viet ORDER BY Ngay_dang DESC";
                $data = $db->fetch_assoc($sql, 0);
                $list = array();
                $i = 0;
                while($i < 7){
                    $index = rand(1, 20);
                    if(!array_search($index, $list)){
                        array_push($list, $index);
                        $i++;
                    }
                }
                foreach($list as $index => $value){
                    echo '<div class="new-item">
                            <a href="index.php?id=' .$data[$value]['ID_bai_viet']. '">
                                <img src="./public/images/view/' .$data[$value]['Anh']. '" alt="" class="new-item-image">
                            </a>
                            <div class="new-item-wrap">
                                <a href="index.php?id=' .$data[$value]['ID_bai_viet']. '">
                                    <div class="new-item-content">' .$data[$value]['Tieu_de']. '</div>
                                </a>
                                <div class="new-item-time">' .$data[$value]['Ngay_dang']. '</div>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>
    <div class="container-right">
        <div class="news-last">
            <div class="container-name">TIN MỚI NHẤT</div>
            <div class="news-last-list">
                <?php
                    $result = array_slice($dataLast, 0, 12);
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