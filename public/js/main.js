var indexSlider = 0
var sliderContainer = document.querySelector('.advertises-list')
var sliderImage = document.querySelectorAll('.advertise-item')
var sliderLength = sliderImage.length

setInterval(()=>{
    if(indexSlider < sliderLength - 1){
        indexSlider++
        sliderContainer.style.transform = `translateX(${indexSlider * (-sliderImage[0].offsetWidth) - 1}px)`
    }
    else if(indexSlider == sliderLength - 1){
        indexSlider = 0
        sliderContainer.style.transform = `translateX(0)`
    }
}, 2000)

var navbar = document.querySelector('.navbar')
var sticky = navbar.offsetTop
window.onscroll = function(){
    if(document.querySelector('.navbar-menu').classList.contains('navbar-menu-open')){
        document.querySelector('.navbar-menu').classList.toggle('navbar-menu-open')
    }
    if (window.pageYOffset >= sticky){
        navbar.classList.add("navbar-sticky")
    }
    else {
        navbar.classList.remove("navbar-sticky");
    }
}

document.querySelector('.navbar-open-menu').onclick = function(){
    let height = navbar.getBoundingClientRect().bottom
    document.querySelector('.navbar-menu').style.top = height + 'px';
    document.querySelector('.navbar-menu-list').style.maxHeight = `calc(100% - ${height}px - 78px)`
    document.querySelector('.navbar-menu').classList.toggle('navbar-menu-open')
}

var hiddenPassword = document.querySelectorAll('.hidden-password')
hiddenPassword.forEach((item)=>{
    item.onclick = function(){
        let parentElement = item.parentElement
        this.classList.toggle('active')
        if(this.classList.contains('active')){
            parentElement.querySelector('input').type = 'text'
            this.querySelector('i').classList.toggle('fa-lock')
            this.querySelector('i').classList.toggle('fa-unlock')
        }
        else{
            parentElement.querySelector('input').type = 'password'
            this.querySelector('i').classList.toggle('fa-lock')
            this.querySelector('i').classList.toggle('fa-unlock')
        }
    }
})

var btnMagagePost = document.querySelector('.btn-manage-post')
if(btnMagagePost){
    btnMagagePost.onclick = function(){
        window.location.href = 'index.php?ac=quan_ly_bai_viet'
    }
}

function createMsg(msg){
    return `
                <div class="msg-form">
                    <div class="msg-content">${msg}</div>
                    <div class="loading-success">
                        <ul class="loading-icon">
                            <li class="loading-column" id="1"></li>
                            <li class="loading-column"></li>
                            <li class="loading-column"></li>
                            <li class="loading-column"></li>
                            <li class="loading-column"></li>
                            <li class="loading-column" id="6"></li>
                        </ul>
                    </div>
                </div>
            </div>`
}
