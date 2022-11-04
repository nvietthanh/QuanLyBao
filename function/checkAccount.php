<?php
    function checkUserName($username){
        $err = '';
        if(empty($username)){
            $err = array('err'=>'username', 'msg'=>'Vui lòng nhập tên đăng nhập hoặc email');
        }
        else if(strlen($username) < 6){
            $err = array('err'=>'username', 'msg'=>'Tên đăng nhập hoặc email phải có tối thiểu 6 ký tự');
        }
        else if(preg_match('#\s#', $username)){
            $err = array('err'=>'username', 'msg'=>'Tên đăng nhập hoặc email không được có khoảng trắng');
        }
        else{
            $isCheckEmail = '#(.*)@[a-z]{2,}.com$#';
            if(preg_match($isCheckEmail, $username)){
                $checkEmail = '#[a-zA-Z0-9.]{3,}@[a-z]{3,}.com$#';
                if(!preg_match($checkEmail, $username)){
                    $err = array('err'=>'username', 'msg'=>'Bạn nhập không phải là email');
                }
            }
            else{
                $checkName = '#^([a-zA-Z0-9_]{1,}$)#';
                if(!preg_match($checkName, $username)){
                    $err = array('err'=>'username', 'msg'=>'Tên đăng nhập chỉ chứa các ký tự từ a->z, A->Z hoặc dấu "_"');
                }
            }
        }
        return $err;
    }

    function checkPassword($password){
        $err = '';
        if(empty($password)){
            $err = array('err'=>'password', 'msg'=>'Vui lòng nhập mật khẩu');
        }
        else if(strlen($password) < 8){
            $err = array('err'=>'password', 'msg'=>'Mật khẩu phải có tối thiểu 8 ký tự');
        }
        else if(preg_match('#\s#', $password)){
            $err = array('err'=>'password', 'msg'=>'Mật khẩu không được có khoảng trắng');
        }
        // else if(!preg_match('#^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}#', $password)){
        //     $err = array('err'=>'password', 'msg'=>'Mật khẩu phải chứ 1 ký tự số, 1 ký tự in hoa và 1 ký tự đặc biệt');
        // }
        return $err;
    }

    function checkFullname($fullname){
        $err = '';
        if(empty($fullname)){
            $err = array('err'=>'fullname', 'msg'=>'Vui lòng nhập họ và tên');
        }
        else if(strlen($fullname) < 6){
            $err = array('err'=>'fullname', 'msg'=>'Họ và tên có tối thiểu 10 ký tự');
        }
        return $err;
    }

    function checkBirhday($birthday){
        $err = '';
        if(empty($birthday)){
            $err = array('err'=>'birthday', 'msg'=>'Vui lòng nhập ngày sinh');
        }
        // else{
        //     $checkBirthday = date($birthday);
        //     $err = array('err'=>'birthday', 'msg'=>$checkBirthday);
        // }
        return $err;
    }

    function checkAddress($address){
        $err = '';
        if(empty($address)){
            $err = array('err'=>'address', 'msg'=>'Vui lòng địa chỉ liên hệ');
        }
        return $err;
    }

    function checkPhonenumber($phonenumber){
        $err = '';
        if(empty($phonenumber)){
            $err = array('err'=>'phonenumber', 'msg'=>'Vui lòng số điện thoại liên hệ');
        }
        else if(strlen($phonenumber) != 10){
            $err = array('err'=>'phonenumber', 'msg'=>'Số điện thoại là dãy số gồm 10');
        }
        else if(!preg_match('#[0-9]{10,10}#', $phonenumber)){
            $err = array('err'=>'phonenumber', 'msg'=>'Số điện thoại không đúng định dạng');
        }
        return $err;
    }

    function checkUserNameSignUp($username){
        $err = '';
        if(empty($username)){
            $err = array('err'=>'username', 'msg'=>'Vui lòng nhập tên đăng nhập');
        }
        else if(strlen($username) < 6){
            $err = array('err'=>'username', 'msg'=>'Tên đăng nhập có tối thiểu 6 ký tự');
        }
        else if(preg_match('#\s#', $username)){
            $err = array('err'=>'username', 'msg'=>'Tên đăng nhập không được có khoảng trắng');
        }
        else if(!preg_match('#^([a-zA-Z0-9_]{1,}$)#', $username)){
            $err = array('err'=>'username', 'msg'=>'Tên đăng nhập chỉ chứa các ký tự từ a->z, A->Z hoặc dấu "_"');
        }
        return $err;
    }

    function checkEmail($email){
        $err = '';
        if(empty($email)){
            $err = array('err'=>'email', 'msg'=>'Vui lòng nhập email');
        }
        else if(!preg_match('#[a-zA-Z][a-zA-Z0-9.]{2,}@[a-z]{3,10}.com$#', $email)){
            $err = array('err'=>'email', 'msg'=>'Email bạn nhập không đúng định dạng');
        }
        else if(strlen($email) < 14){
            $err = array('err'=>'email', 'msg'=>'Độ dài của email tối thiểu 14 ký tự');
        }
        return $err;
    }

    function checkId($id){
        $err = '';
        if(empty($id)){
            $err = array('err'=>'id', 'msg'=>'Vui lòng nhập mã tác giả');
        }
        else if(strlen($id) < 6){
            $err = array('err'=>'id', 'msg'=>'Mã tác giả có tối thiểu 6 ký tự');
        }
        return $err;
    }

    function checkConfirmPassword($confirmpassword, $password){
        $err = '';
        if(empty($confirmpassword)){
            $err = array('err'=>'confirmpassword', 'msg'=>'Vui lòng nhập mật khẩu xác nhận');
        }
        else if(strlen($confirmpassword) < 8){
            $err = array('err'=>'confirmpassword', 'msg'=>'Mật khẩu xác nhận phải có tối thiểu 8 ký tự');
        }
        // else if(preg_match('#\s#', $confirmpassword)){
        //     $err = array('err'=>'confirmpassword', 'msg'=>'Mật khẩu không được có khoảng trắng');
        // }
        // else if(!preg_match('#^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,}#', $confirmpassword)){
        //     $err = array('err'=>'confirmpassword', 'msg'=>'Mật khẩu phải chứ 1 ký tự số, 1 ký tự in hoa và 1 ký tự đặc biệt');
        // }
        else if($password != $confirmpassword){
            $err = array('err'=>'confirmpassword', 'msg'=>'Mật khẩu xác nhận không khớp');
        }
        return $err;
    }
?>