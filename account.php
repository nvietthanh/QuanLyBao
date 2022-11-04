<?php
    require_once 'function/checkAccount.php';
    require_once 'init/config.php';

    $ac = isset($_GET['ac']) ? $_GET['ac'] : '';
    if(empty($ac)){
        header('Location: index.php');
    }
    else{
        if($ac == 'logout'){
            $session->destroy();
        }
        else{
            $result = $_POST;
            if(empty($result)){
                header('Location: index.php');
            }
            else{
                if($ac == 'login'){
                    if($username){
                        header('Location: index.php');
                    }
                    else{
                        $username = $result['username'];
                        $password = $result['password'];
                        $err = checkUserName($username);
                        if(empty($err)){
                            $err = checkPassword($password);
                        }
                        if(empty($err)){
                            $checkEmail = '#[a-zA-Z0-9.]{2,}@[a-z]{2,}.com$#';
                            if(preg_match($checkEmail, $username)){
                                $sql_check_user = "SELECT Email, Ten_hien_thi FROM tai_khoan_dang WHERE Email = '$username' AND Mat_khau = '$password'";
                                $data = $db->fetch_assoc($sql_check_user, 1);
                                if (!$db->num_rows($sql_check_user)){
                                    $err = array('err'=>'account', 'msg'=>'Tên đăng nhập hoặc mật khẩu không chính xác. Có thể bạn đã khai báo sai Tên đăng nhập hoặc Mật khẩu truy cập');
                                }
                                else{
                                    $_SESSION['username'] = $data['Ten_hien_thi'];
                                } 
                            }
                            else{
                                $sql_check_user = "SELECT Ten_hien_thi FROM tai_khoan_dang WHERE Ten_hien_thi = '$username' AND Mat_khau = '$password'";
                                
                                if (!$db->num_rows($sql_check_user)){
                                    $err = array('err'=>'account', 'msg'=>'Tên đăng nhập hoặc mật khẩu không chính xác. Có thể bạn đã khai báo sai Tên đăng nhập hoặc Mật khẩu truy cập');
                                }
                                else{
                                    $_SESSION['username'] = $username;
                                }
                            }
                        }
                        echo json_encode($err);
                    }
                }
                else if($ac == 'signup'){
                    $fullname = $_POST['fullname'];
                    $birthday = $_POST['birthday'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    $username = $_POST['username'];
                    $phonenumber = $_POST['phonenumber'];
                    $email = $_POST['email'];
                    $id = $_POST['id'];
                    $password = $_POST['password'];
                    $confirmpassword = $_POST['confirmpassword'];
                    $confirm = $_POST['confirm'];
                    $err = '';
                    $err = checkFullname($fullname);
                    if(empty($err)){
                        $err = checkBirhday($birthday);
                    }
                    if(empty($err)){
                        $err = checkAddress($address);
                    }
                    if(empty($err)){
                        $err = checkUserNameSignUp($username);
                    }
                    if(empty($err)){
                        $err = checkPhonenumber($phonenumber);
                    }
                    if(empty($err)){
                        $err = checkEmail($email);
                    }
                    if(empty($err)){
                        $err = checkId($id);
                    }
                    if(empty($err)){
                        $err = checkPassword($password);
                    }
                    if(empty($err)){
                        $err = checkConfirmPassword($confirmpassword, $password);
                    }
                    if(empty($err)){
                        if($confirm == 'false'){
                            $err = array('err'=>'confirm', 'msg'=>'Vui lòng xác nhận thông tin đăng ký');
                        }
                    }
                    if(empty($err)){
                        $sql_check_user = "SELECT Ten_hien_thi FROM tai_khoan_dang WHERE Ten_hien_thi = '$username'";
                        $sql_check_phone = "SELECT SDT FROM tac_gia WHERE SDT = '$phonenumber'";
                        $sql_check_email = "SELECT Email FROM tai_khoan_dang WHERE Email = '$email'";
                        $sql_check_author = "SELECT Ma_tac_gia FROM tac_gia WHERE Ma_tac_gia = '$id'";
                        $gioitinh = ($gender=="Nam") ? 0 : 1;

                        if ($db->num_rows($sql_check_user)){
                            $err = array('err'=>'username', 'msg'=>'Rất tiếc, tên đăng nhập ' .$username. ' đã tồn tại. Vui lòng nhập tên tài khoản khác');
                        }
                        else if($db->num_rows($sql_check_phone)){
                            $err = array('err'=>'phonenumber', 'msg'=>'Rất tiếc, tài khoản số điện thoại ' .$phonenumber. ' đã đăng ký tài khoản. Vui lòng nhập số điện thoại khác');
                        }
                        else if($db->num_rows($sql_check_email)){
                            $err = array('err'=>'email', 'msg'=>'Rất tiếc, tài khoản email ' .$email. ' đã đăng ký tài khoản. Vui lòng nhập email khác');
                        }
                        else if($db->num_rows($sql_check_author)){
                            $err = array('err'=>'id', 'msg'=>'Rất tiếc, đã tồn tại mã tác giả ' .$id. '');
                        }
                        else{
                            $sql_tacgia = "INSERT INTO tac_gia VALUES ('', '$id', '$fullname', '$gioitinh', $phonenumber, '$birthday', '$address')";
                            $sql_taikhoan = "INSERT INTO tai_khoan_dang VALUES ('', '$email', '$password', '$username', '')";
                            if(!$db->query($sql_tacgia) || !$db->query($sql_taikhoan)){
                                $err = array('err'=>'sql', 'msg'=>'Có lỗi trong quá trình đăng ký vui lòng thử lại sau');
                            }
                            else{
                                $session->send($username);
                            }
                        }
                    }
                    echo json_encode($err);
                }
            }
        }
    }
?>