//=======================================================
//   left menu
//=======================================================
// html load

// 왼쪽메뉴 
fetch("./_left_menu.html")
    .then((response) => response.text())
    .then((htmlData) => {
        $(".sidebar").prepend(htmlData);
    })
    .catch((error) => {
        console.log(error);
    });

// 탑바 로드
fetch("./_top_bar.html")
    .then((response) => response.text())
    .then((html) => {
        if(!$('.content').hasClass('logout')){
            $(".content").prepend(html);
            leftMenuHandle()
            topbarHandle()
        }
    })
    .catch((error) => {
        console.log(error);
    });

// 탑바 로드 - 로그인 안했을때
fetch("./_top_bar_logout.html")
    .then((response) => response.text())
    .then((html) => {
        if($('.content').hasClass('logout')){
            $(".content").prepend(html);
            leftMenuHandle()
            topbarHandle()
        }
    })
    .catch((error) => {
        console.log(error);
    });

// 푸터 로드
fetch("./_footer.html")
    .then((response) => response.text())
    .then((html) => {
        $(".container_wrap").append(html);

    })
    .catch((error) => {
        console.log(error);
    });

// 우측영역 추가
fetch("./_right_area.html")
    .then((response) => response.text())
    .then((html) => {
        $(".content").prepend(html);

        $(document).on('click','.all_view_btn',function(){
            $(this).prev().toggleClass('open')
            $(this).toggleClass('open');
        })

        rightAreaHandle();
    })
    .catch((error) => {
        console.log(error);
    });


const leftMenuHandle = () => {
    // fold
    function toggleSideNav() {
        const sideNav = document.querySelector(".side-nav");
        sideNav.classList.toggle("fold");
        if(window.innerWidth < 1200 && window.innerWidth > 640){
            $(".side-nav-bg").fadeToggle(200);
        }

        const content = document.querySelector(".content");
        content.classList.toggle("fold");

        // fold 클래스 변경 체크 함수 호출
        checkFold();
    }

    const foldBtn = document.querySelector(".fold_btn");
    const sideBg = document.querySelector(".side-nav-bg");
    foldBtn.addEventListener("click", toggleSideNav);
    sideBg.addEventListener("click", toggleSideNav);


    // fold 클래스 체크 함수
    function checkFold() {
        const sideMenus = document.querySelectorAll(".side-menu");
        const sideNav = document.querySelector(".side-nav");

        if (sideNav.classList.contains("fold")) {
            sideMenus.forEach((menu) => {
                if (menu._tippy != undefined) {
                    menu._tippy.enable();
                }
            });
        } else {
            sideMenus.forEach((menu) => {
                if (menu._tippy != undefined) {
                    menu._tippy.disable();
                }
            });
        }
    }

    // 페이지 로드 시 fold 클래스 변경 체크 함수 호출
    checkFold();

    // 메뉴클릭시 2depth 
    $(".menu_wrap > .menu_list").on("click",function(){
        $(this).toggleClass('open');
        $(this).parent().toggleClass('open');
        $(this).next(".menu_depth").slideToggle();
    })

    $(".color_theme button").on("click",function(){
        const theme = $(this).data("theme");
        $(this).addClass("active").siblings().removeClass("active");
        if(theme == "dark"){
            $("html").addClass("dark")
        }else{
            $("html").removeClass("dark")
        }
    })

}

const rightAreaHandle = ()=>{
    $('.right-area .chat_area .send_lang button').on('click',function(){
        
    })
}

const topbarHandle = ()=>{
    // 화폐
    const walletList = document.querySelectorAll('.wallet_list > div')
    const walletHandle = (e)=>{
        const parentNode = e.currentTarget.parentElement.parentElement;
        parentNode.querySelectorAll('.wallet_list > div').forEach((item)=>{
            item.classList.remove('active')
        })
        e.currentTarget.classList.add('active');

        const img = e.currentTarget.querySelector('img').src
        const text = e.currentTarget.querySelector('p.text-right strong').innerText
        const text2 = e.currentTarget.querySelector('p.text-right span').innerText

        const button = document.querySelector(`.${parentNode.dataset.btn}`)
        button.querySelector('img').src = img
        button.querySelector('strong').innerText = text
        button.querySelector('span').innerText = text2

        setTimeout(function () {
            var el = document.querySelector(".walletDropdown");
            var dropdown = tailwind.Dropdown.getOrCreateInstance(el);
            dropdown.hide();
        }, 10); 
    }

    walletList.forEach((item)=>{
        item.addEventListener("click",walletHandle)
    })

    // 법정화폐보기 버튼 
    const legalBtn = document.querySelector('.legal_check');
    const legalHandle = (e)=>{
        const walletWrap = document.querySelector('.walletDropdown')
        const walletBtn = document.querySelector('.wallet_top_btn')
        if(e.target.checked){
            walletWrap.classList.remove('nolegal')
            walletBtn.classList.remove('nolegal')
        }else{
            walletWrap.classList.add('nolegal')
            walletBtn.classList.add('nolegal')
        }
    }
    legalBtn.addEventListener("change",legalHandle)

    // 작게보기 버튼
    const smallBtn = document.querySelector(".small_check")
    const smallHandle = (e)=>{
        const list = document.querySelectorAll('.walletDropdown .wallet_list > div')
        const tit = document.querySelectorAll('.walletDropdown .wallet_tit')
        if(e.target.checked){
            list.forEach((item)=>{
                if(!item.classList.contains('isItem')){
                    item.classList.add("hidden")
                }
            })
            tit.forEach((item)=>{ item.classList.add("hidden")})
        }else{
            list.forEach((item)=>{
                if(!item.classList.contains('isItem')){
                    item.classList.remove("hidden")
                }
            })
            tit.forEach((item)=>{ item.classList.remove("hidden")})
        }
    }
    smallBtn.addEventListener("change",smallHandle)
}

const sendFocus = ()=>{
    const sendBox = document.querySelector('.chat_area .send-input')
    sendBox.classList.add('focus-on')
}
const sendFocusout = ()=>{
    const sendBox = document.querySelector('.chat_area .send-input')
    sendBox.classList.remove('focus-on')
}

//=======================================================
//   우측바 제어
//=======================================================
let rightOpen_item = "";
const rightOpen = (target)=>{
    const content = document.querySelector('.content');
    const right = document.querySelector('.right-area')

    if(target == "close" || target == rightOpen_item){
        // 닫기버튼 or 같은버튼을 두번 눌렀을때,
        content.classList.remove('right_open')
        right.classList.remove('open')
        $('.top-bar .chat_btn use').attr('xlink:href','./dist/custom_img/symbol-defs.svg#icon_Chat')

        rightOpen_item = "";
    }else{
        content.classList.add('right_open')
        right.classList.add('open')
        $(`.right-area .${target}`).show().siblings().hide();
    
        if(target == "chat_area"){
            $('.top-bar .chat_btn use').attr('xlink:href','./dist/custom_img/symbol-defs.svg#icon_CloseChat')
        }
        rightOpen_item = target;
    }

}

//=======================================================
//   공통 - 모달
//=======================================================
const modalOpen = (modal) => {
    const deleteModal = document.getElementById(modal);
    deleteModal.classList.add("show", "overflow-y-auto");
    deleteModal.style.marginTop = "0px";
    deleteModal.style.marginLeft = "0px";
    deleteModal.style.paddingLeft = "0px";
    deleteModal.style.zIndex = "10000";
};

//=======================================================
//   페이지 로딩
//=======================================================
// 페이지 로딩이 시작될 때 실행할 함수
function showLoadingSvg() {
    const loadingContainer = document.getElementById("loadingContainer");
    loadingContainer.style.display = "flex";
}

// 페이지 로딩이 완료된 후 실행할 함수
function hideLoadingSvg() {
    const loadingContainer = document.getElementById("loadingContainer");
    loadingContainer.style.display = "none";
}

// 페이지 로딩 시작 시 showLoadingSvg() 함수 호출
window.addEventListener("load", function () {
    showLoadingSvg(); // 로딩 시작 시 바로 SVG 표시

    // 3초 후에 hideLoadingSvg() 함수 호출
    setTimeout(hideLoadingSvg, 500); // 3초(3000ms)로 설정
});


//=======================================================
//   윈도우 resize
//=======================================================
const resizeHandle = ()=>{
    if(window.innerWidth > 1200){
        $(".side-nav-bg").fadeOut(200);
    }else{
        const side = document.querySelector('.side-nav')
        if(!side.classList.contains('fold')){
            $(".side-nav-bg").fadeIn(200);
        }else{
            $(".side-nav-bg").fadeOut(200);
        }
    }
}
window.addEventListener("resize",resizeHandle)
