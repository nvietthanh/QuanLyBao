            <div id="footer">
                <div class="footer-container">
                    <div class="footer-left">
                        <a href="index.php">
                            <img src="./public/images/view/avatar.png" alt="">
                        </a>
                        <div><b>Giấy phép xuất bản số 110/GP - BTTTT cấp ngày 24.3.2020</b></div>
                        <div>© 2003-2022 Bản quyền thuộc về Báo Thanh Niên. Cấm sao chép dưới mọi hình thức nếu không có sự chấp thuận bằng văn bản. Phát triển bởi ePi Technologies, JSC.</div>
                    </div>
                    <div class="footer-right">
                        <div class="footer-right-wrap">
                            <a href="index.php?ac=chinh_sach_bao_mat">Đặt báo</a>
                            <a href="index.php?ac=chinh_sach_bao_mat">Quảng cáo</a>
                            <a href="index.php?ac=chinh_sach_bao_mat">Tòa soạn</a>
                            <a href="index.php?ac=chinh_sach_bao_mat">Chính sách bảo mật</a>
                        </div>
                        <div>Tổng biên tập: <b>Nguyễn Ngọc Toàn</b></div>
                        <div>Phó tổng biên tập: <b>Hải Thành</b></div>
                        <div>Phó tổng biên tập: <b>Đặng Thị Phương Thảo</b></div>
                        <div>Phó tổng biên tập: <b>Lâm Hiếu Dũng</b></div>
                        <div>Ủy viên Ban biên tập - Tổng Thư ký tòa soạn: <b>Trần Việt Hưng</b></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal">
            <?php
                if(empty($username)){
            ?>
                <div class="modal-login">
                    <div class="login-form">
                        <div class="form-content">Thành viên đăng nhập</div>
                        <div class="form-description">Hãy đăng nhập thành viên để trải nghiệm đầy đủ các tiện ích trên website</div>
                        <form>
                            <div class="form-wrap">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" name="username" placeholder="Tên đăng nhập hoặc email">
                            </div>
                            <div class="form-wrap">
                                <i class="fa-solid fa-key"></i>
                                <input type="password" name="password" placeholder="Mật khẩu">
                                <div class="hidden-password">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-submit-wrap">
                                <input type="reset" value="Thiết lập lại" name="reset">
                                <input type="submit" value="Đăng nhập" name="submit" class="form-submit" onclick="return loginSubmit()">
                            </div>
                        </form>
                        <button class="form-close" onclick="formClose()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-signup">
                    <div class="signup-form">
                        <div class="form-content">Đăng ký thành viên</div>
                        <form>
                            <div class="form-wrap">
                                <label class="form-wrap-name" for="fullname">Họ và tên</label>
                                <input type="text" name="fullname" id="fullname" placeholder="Nhập họ và tên đầy đủ">
                            </div>
                            <div class="form-wrap">
                                <label class="form-wrap-name" for="birthday">Ngày sinh</label>
                                <input type="date" name="birthday" id="birthday">
                            </div>
                            <div class="form-wrap">
                                <label class="form-wrap-name" for="male">Giới tính</label>
                                <div class="form-wrap-male">
                                    <div class="form-male-wrap">
                                        <input type="radio" name="gender" id="male" value="Nam" checked>
                                        <label for="male">Nam</label>
                                    </div>
                                    <div class="form-male-wrap">
                                        <input type="radio" name="gender" id="female" value="Nữ">
                                        <label for="female">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wrap">
                                <label class="form-wrap-name" for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address"  placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-wrap">
                                <div class="form-wrap-2">
                                    <label class="form-wrap-name" for="username">Tên đăng nhập</label>
                                    <input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập">
                                </div>
                                <div class="form-wrap-2">
                                    <label class="form-wrap-name" for="phonenumber">Số điện thoại</label>
                                    <input type="text" name="phonenumber" id="phonenumber" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-wrap required">
                                <label class="form-wrap-name" for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Nhập email">
                            </div>
                            <div class="form-wrap required">
                                <label class="form-wrap-name" for="id">Mã tác giả</label>
                                <input type="text" name="id" id="id" placeholder="Nhập mã tác giả">
                            </div>
                            <div class="form-wrap required">
                                <label class="form-wrap-name" for="password">Mật khẩu</label>
                                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                                <div class="hidden-password">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-wrap required">
                                <label class="form-wrap-name" for="confirmpassword">Xác nhận lại</label>
                                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Nhập lại mật khẩu">
                                <div class="hidden-password">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-wrap-confirm">
                                <input type="checkbox" name="confirm" id="confirm">
                                <label for="confirm">Tôi đồng ý với <a href="index.php?ac=quy_dinh_thanh_vien"> Quy định đăng ký thành viên</a></label>
                            </div>
                            <div class="form-submit-wrap">
                                <input type="reset" value="Thiết lập lại" name="reset">
                                <input type="submit" value="Đăng ký thành viên" name="submit" class="form-submit" onclick="return signupSubmit()">
                            </div>
                        </form>
                        <button class="form-close" onclick="formClose()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            <?php
                }
                else{
            ?>
                <div class="modal-logout">
                    <div class="logout-form">
                        <div class="form-content">Xác nhận đăng xuất tài khoản khỏi website</div>
                        <div class="form">
                            <div class="logout-submit-wrap">
                                <button onclick="formClose()">Huỷ</button>
                                <input type="submit" value="Xác nhận" name="confirm" onclick="logoutSubmit()">
                            </div>
                        </div>
                        <button class="form-close" onclick="formClose()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-edit-post"></div>
                <div class="modal-add-post"></div>
                <div class="modal-delete-post">
                    <div class="delete-form">
                        <div class="form-content">Bạn có muốn xóa các bài viết vừa chọn không?</div>
                        <div class="form">
                            <div class="logout-submit-wrap">
                                <button onclick="formClose()">Huỷ</button>
                                <input type="submit" value="Xác nhận" name="confirm" onclick="deleteSubmit()">
                            </div>
                        </div>
                        <button class="form-close" onclick="formClose()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <script>
                    function createAddPost(){
                        return `<div class="add-form">
                                    <div class="edit-form-container">
                                        <form>
                                            <div class="form-content">TẠO BÀI VIẾT MỚI</div>
                                            <div class="edit-form-wrap">
                                                <label for="tieude" class="edit-form-name">Tiêu đề : </label>
                                                <textarea name="tieude" id="tieude" cols="100" rows="1"></textarea>
                                            </div>
                                            <div class="edit-form-wrap">
                                                <div class="edit-form-name">Hình ảnh : </div>
                                                <img src="" alt="">
                                                <input type="file" name="file" accept="image/*" id="file" onchange="changeHandler(event)">
                                            </div>
                                            <div class="edit-form-main">
                                                <label for="noidung" class="edit-form-name">Nội dung : </label>
                                                <div class="edit-form-content">
                                                    <textarea name="noidung" id="noidung" cols="120" rows="14"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="form-submit-wrap">
                                            <button onclick="return formClose()">Huỷ</button>
                                            <input type="submit" name="submit" class="form-submit" value="Xác nhận" onclick="return addSubmit()">
                                        </div>
                                    </div>
                                    <button class="form-close" onclick="formClose()">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>`
                    }
                    function createEditPost(id, image, title, content){
                        return `<div class="edit-form">
                                    <div class="edit-form-container">
                                        <form>
                                            <div class="form-content">CHỈNH SỬA BÀI VIẾT</div>
                                            <div class="edit-form-wrap">
                                                <div class="edit-form-name">Mã bài viết : </div>
                                                <input type="text" name="id" value="${id}" disabled>
                                            </div>
                                            <div class="edit-form-wrap">
                                                <label for="tieude" class="edit-form-name">Tiêu đề : </label>
                                                <textarea name="tieude" id="tieude" cols="100" rows="1">${title}</textarea>
                                            </div>
                                            <div class="edit-form-wrap">
                                                <div class="edit-form-name">Hình ảnh : </div>
                                                <img src="${image}" alt="${title}">
                                                <input type="file" name="file" accept="image/*" id="file" onchange="changeHandler(event)">
                                            </div>
                                            <div class="edit-form-main">
                                                <label for="noidung" class="edit-form-name">Nội dung : </label>
                                                <div class="edit-form-content">
                                                    <textarea name="noidung" id="noidung" cols="120" rows="12">${content}</textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="form-submit-wrap">
                                            <button onclick="return formClose()">Huỷ</button>
                                            <input type="submit" value="Xác nhận" name="submit" class="form-submit" onclick="editSubmit()">
                                        </div>
                                    </div>
                                    <button class="form-close" onclick="formClose()">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>`
                    }
                    function editPost(){
                        let postItem = document.querySelectorAll('.table-list-post input[type=checkbox]:checked')
                        if(postItem.length == 1){
                            let id = postItem[0].parentElement.nextElementSibling
                            let title = id.nextElementSibling
                            let image = title.nextElementSibling
                            let link = image.querySelector('img').src
                            let path = link.slice(link.search('public'), link.length)
                            let content = image.nextElementSibling

                            document.querySelector('body').classList.add('modal-open')
                            document.querySelector('.modal-edit-post').classList.add('form-open')
                            document.querySelector('.modal-edit-post').innerHTML = createEditPost(id.textContent, path, title.textContent, content.textContent)
                        }
                        else if(postItem.length == 0){
                            alert('Vui lòng chọn bài viết muốn sửa')
                        }
                        else{
                            alert('Vui lòng chỉ chọn 1 bài viết để sửa')
                        }
                    }
                    function editSubmit(){
                        if(confirm("Bạn có muốn sửa bài viết này không")){
                            let noidung = document.querySelector('.edit-form textarea[name=noidung]').value
                            let postItem = document.querySelectorAll('.table-list-post input[type=checkbox]:checked')
                            for(let item of postItem){
                                item.checked = false
                            }
                            document.querySelector('.edit-form-wrap input[name=id]').disabled = false
                            document.querySelector('body').classList.add('msg-open')
                            document.querySelector('.msg-container').classList.add('form-open')
                            document.querySelector('.msg-container').innerHTML = createMsg('Đang tiến hành cập nhật bài viết')
                            $.ajax({
                                url: "http://127.0.0.1:5000/classify",
                                type: "POST",
                                data: {
                                    noidung
                                },
                                dataType: "json",
                                success: (res) => {
                                    console.log(res)
                                    let formData = new FormData(document.querySelector('.edit-form form'));
                                    formData.append('phanloai', JSON.stringify(res))
                                    $.ajax({
                                        url: "manage-post.php?ac=edit",
                                        type: "POST",
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        dataType: "text",
                                        success: (res) => {
                                            console.log(res)
                                            window.location.reload()
                                        }
                                    })
                                }
                            })          
                        }
                    }
                    function changeHandler(evt) {
                        try {
                            var myImg = document.querySelector('.edit-form-wrap img');
                            myImg.src = URL.createObjectURL(evt.target.files[0]);
                            myImg.onload = function() {
                                URL.revokeObjectURL(myImg.src)
                            }
                        }
                        catch(err){}
                    }
                    function addPost(){
                        document.querySelector('body').classList.add('modal-open')
                        document.querySelector('.modal-add-post').classList.add('form-open')
                        document.querySelector('.modal-add-post').innerHTML = createAddPost()
                    }
                    function addSubmit(key){
                        let tieude = document.querySelector('.add-form textarea[name=tieude]').value
                        let hinhanh = document.querySelector('.add-form .edit-form-wrap input[type=file]').value
                        let noidung = document.querySelector('.add-form textarea[name=noidung]').value
                        if(tieude.length == 0){
                            alert("Bạn chưa nhập dữ liệu cho tiêu đề")
                        }
                        else if(hinhanh.length == 0){
                            alert("Bạn chưa nhập dữ liệu hình ảnh")
                        }
                        else if(noidung.length == 0){
                            alert("Bạn chưa nhập nội dung")
                        }
                        else{
                            document.querySelector('body').classList.add('msg-open')
                            document.querySelector('.msg-container').classList.add('form-open')
                            document.querySelector('.msg-container').innerHTML = createMsg('Đang tiến hành thêm bài viết')
                            $.ajax({
                                url: "http://127.0.0.1:5000/classify",
                                type: "POST",
                                data: {
                                    noidung
                                },
                                dataType: "json",
                                success: (res) => {
                                    console.log(res)
                                    let formData = new FormData(document.querySelector('.add-form form'));
                                    formData.append('idtacgia', document.querySelector('.user-infor .user-infor-id').textContent)
                                    formData.append('phanloai', JSON.stringify(res))
                                    $.ajax({
                                        url: "manage-post.php?ac=add",
                                        type: "POST",
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        dataType: "text",
                                        success: (res) => {
                                            window.location.reload()
                                        }
                                    })
                                }
                            })
                        }

                    }
                    function deletePost(){
                        let postItem = document.querySelectorAll('.table-list-post input[type=checkbox]:checked')
                        if(postItem.length == 0){
                            alert("Bạn chưa chọn bài viết nào, vui lòng thử lại")
                        }
                        else{
                            document.querySelector('body').classList.add('modal-open')
                            document.querySelector('.modal-delete-post').classList.add('form-open')
                        }
                    }
                    function deleteSubmit(){
                        let postItem = document.querySelectorAll('.table-list-post input[type=checkbox]:checked')
                        if(postItem.length == 0){
                            alert("Bạn chưa chọn bài viết nào, vui lòng thử lại")
                        }
                        else{
                            document.querySelector('body').classList.add('msg-open')
                            document.querySelector('.msg-container').classList.add('form-open')
                            document.querySelector('.msg-container').innerHTML = createMsg('Đang tiến hành xóa bài viết')
                            let idPost = []
                            postItem.forEach(function(item){
                                idPost.push(item.parentElement.nextElementSibling.textContent)
                            })
                            setTimeout(() => {
                                $.ajax({
                                    url : "manage-post.php?ac=delete",
                                    type : "post",
                                    dataType:"text",
                                    data : {
                                        idPost
                                    },
                                    success : function (result){
                                        if(result.length == 0){
                                            window.location.reload()
                                        }
                                    }
                                })
                            }, 1000);
                        }
                    }
                </script>
            <?php
                }
            ?>
        </div>
        <div id="msg">
            <div class="msg-container"></div>
        </div>
    </div>
    <script src="public/js/main.js"></script>
    <script src="public/js/account.js"></script>
</body>
</html>