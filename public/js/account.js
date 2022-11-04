
function msgSuccess(content, msg){
    return `<div class="loading-success">
                <div class="loading-content">${content}</div>
                <div class="loading-msg-wrap">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="loading-msg">${msg}</div>
                    <ul class="loading-icon">
                        <li class="loading-column" id="1"></li>
                        <li class="loading-column"></li>
                        <li class="loading-column"></li>
                        <li class="loading-column"></li>
                        <li class="loading-column"></li>
                        <li class="loading-column" id="6"></li>
                    </ul>
                </div>
            </div>`
}

var headerLogin = $('.header-login-open')
headerLogin.click(function(){
    $('body').addClass('modal-open')
    $('.modal-login').addClass('form-open')
})

function loginSubmit(){
    let loginForm = $('.login-form')
    let usernameInput = $('.login-form input[name=username]')
    let passwordInput = $('.login-form input[name=password]')
    let username = usernameInput.val()
    let password = passwordInput.val()
    $.ajax({
        url : "account.php?ac=login",
        type : "post",
        dataType: "json",
        data : {
            username, password
        },
        success : (result)=>{
            if(result.length == 0){
                loginForm.html(msgSuccess('Đăng nhập thành viên', 'Đăng nhập thành công'))
                setTimeout(()=>{
                    window.location.reload()
                }, 2000)
            }
            else{
                if(result['err'] == 'account'){
                    let loginDescription = $('.login-form .form-description')
                    loginDescription.html('<i class="fa-solid fa-circle-xmark"></i>' + result['msg'])
                    loginDescription.addClass('has-error')
                }
                else{
                    let hasError = $('form .has-error')
                    if(hasError.length != 0){
                        $('.login-form .form-message').remove()
                        hasError.removeClass('has-error')
                    }
                    let parentElement
                    if(result['err'] == 'username'){
                        parentElement = usernameInput.parent()
                    }
                    else if(result['err'] == 'password'){
                        parentElement = passwordInput.parent()
                    }
                    console.log(result)
                    parentElement.addClass('has-error')
                    let msg = document.createElement('div')
                    msg.classList.add('form-message')
                    msg.innerHTML = `<div class="form-message-content">${result['msg']}</div>`
                    parentElement.append(msg)
                }
            }
        }
    })
    return false
}

$('.modal-login').click(()=>{
    let formMessage = $('.login-form .form-message')
    if(formMessage.length != 0){
        $('form .has-error').removeClass('has-error')
        formMessage.remove()
    }
})

function formClose(){
    let formInput = $('#modal input')
    for(var item of formInput){
        if(item.type != "reset" && item.type != "submit"){
            if(item.type == "checkbox"){
                item.checked = false
            }
            else{
                item.value = ""
            }
        }
    }
    $('body').removeClass('modal-open')
    $('.form-open').removeClass('form-open')
    return false
}



var headerSignup = $('.header-signup-open')
headerSignup.click(function(){
    $('body').addClass('modal-open')
    $('.modal-signup').addClass('form-open')
})

function signupSubmit(){
    let signupForm = $('.signup-form')
    let fullnameInput = $('.signup-form input[name=fullname]')
    let birthdayInput = $('.signup-form input[name=birthday]')
    let genderInput = $('.signup-form input[name=gender]:checked')
    let addressInput = $('.signup-form input[name=address]')
    let usernameInput = $('.signup-form input[name=username]')
    let phonenumberInput = $('.signup-form input[name=phonenumber]')
    let emailInput = $('.signup-form input[name=email]')
    let idInput = $('.signup-form input[name=id]')
    let passwordInput = $('.signup-form input[name=password]')
    let confirmpasswordInput = $('.signup-form input[name=confirmpassword]')
    let confirmInput = $('.signup-form input[name=confirm]')
    // lấy value của các input
    let fullname = fullnameInput.val()
    let birthday = birthdayInput.val()
    let gender = genderInput.val()
    let address = addressInput.val()
    let username = usernameInput.val()
    let phonenumber = phonenumberInput.val()
    let email = emailInput.val()
    let id = idInput.val()
    let password = passwordInput.val()
    let confirmpassword = confirmpasswordInput.val()
    let confirm = confirmInput.prop('checked')
    //console.log(fullname,birthday, gender, address, username, phonenumber, email, id, password, confirmpassword, confirm)
    $.ajax({
        url : "account.php?ac=signup",
        type : "post",
        dataType:"json",
        data : {
            fullname, birthday, gender, address, username, phonenumber, email, id, password, confirmpassword, confirm
        },
        success : function (result){
            if(result.length == 0){
                signupForm.html(msgSuccess('Đăng ký thành viên' ,'Đăng ký thành công, tiến hành đăng nhập'))
                setTimeout(()=>{
                    window.location.reload()
                }, 2000)
            }
            else{
                let hasError = $('form .has-error')
                if(hasError.length != 0){
                    $('.login-form .form-message').remove()
                    hasError.removeClass('has-error')
                }
                let parentElement
                if(result['err'] == 'fullname'){
                    parentElement = fullnameInput.parent()
                }
                else if(result['err'] == 'birthday'){
                    parentElement = birthdayInput.parent()
                }
                else if(result['err'] == 'gender'){
                    parentElement = genderInput.parent()
                }
                else if(result['err'] == 'address'){
                    parentElement = addressInput.parent()
                }
                else if(result['err'] == 'username'){
                    parentElement = usernameInput.parent()
                }
                else if(result['err'] == 'phonenumber'){
                    parentElement = phonenumberInput.parent()
                }
                else if(result['err'] == 'email'){
                    parentElement = emailInput.parent()
                }
                else if(result['err'] == 'id'){
                    parentElement = idInput.parent()
                }
                else if(result['err'] == 'password'){
                    parentElement = passwordInput.parent()
                }
                else if(result['err'] == 'confirmpassword'){
                    parentElement = confirmpasswordInput.parent()
                }
                else if(result['err'] == 'confirm'){
                    parentElement = confirmInput.parent()
                }
                parentElement.addClass('has-error')
                let msg = document.createElement('div')
                msg.classList.add('form-message')
                msg.innerHTML = `<div class="form-message-content">${result['msg']}</div>`
                parentElement.append(msg)
            }
        }
    })
    return false
}

$('.modal-signup').click(()=>{
    let formMessage = $('.signup-form .form-message')
    if(formMessage){
        let hasError = $('form .has-error')
        if(hasError.length != 0){
            hasError.removeClass('has-error')
        }
        formMessage.remove()
    }
})

$('.btn-logout').click(function(){
    $('body').addClass('modal-open')
    $('.modal-logout').addClass('form-open')
})

function logoutSubmit(){
    $.ajax({
        url : "account.php?ac=logout",
        type : "post",
        dataType : "text",
        success : function (){
            let logoutForm = $('.logout-form')
            logoutForm.html(msgSuccess('Đăng xuất tài khoản' ,'Đăng xuất tài khoản thành công'))
            setTimeout(() => {
                window.location.reload()
            }, 2000);
        }
    })
}