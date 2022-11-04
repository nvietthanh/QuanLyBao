<?php
    class Session {
        // Hàm bắt đầu lưu session
        public function start() {
            session_start();
        }

        // Hàm gửi dữ liệu
        public function send($username) {
            $_SESSION['username'] = $username;
        }

        public function remove($username){
            unset($_SESSION['username']);
        }

        // Hàm lấy dữ liệu
        public function get() {
            // Nếu có tồn tại session đang lưu
            if (isset($_SESSION['username']))
            {
                // Gán $username với session
                $username = $_SESSION['username'];
            }
            // Ngược lại không tồn tại session
            else
            {
                $username = '';
            }
            return $username;
        }

        // Hàm xoá session
        public function destroy() {
            session_destroy();
        }
    }
?>