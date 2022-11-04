<?php
    include_once 'init/config.php';
    
    include_once 'includes/header.php';

    if($ac == 'cd'){
        include_once 'templates/list-topic.php';
    }
    else if($ac == 'id'){
        include_once 'templates/view-post.php';
    }
    else if($ac == 'ql'){
        if(empty($username)){
            echo '<script>alert("Vui lòng đăng nhập để thực hiện chức năng");window.location.href = "index.php"</script>';
        }
        else{
            include_once 'templates/manage-post.php';
        }
    }
    else{
        include_once 'templates/main.php';
    }

    include_once 'includes/footer.php';
?>