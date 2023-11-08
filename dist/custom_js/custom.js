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
        }
        leftMenuHandle()
        topbarHandle()

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


const leftMenuHandle = () => {
    // fold
    function toggleSideNav() {
        const sideNav = document.querySelector(".side-nav");
        sideNav.classList.toggle("fold");

        const content = document.querySelector(".content");
        content.classList.toggle("fold");

        // fold 클래스 변경 체크 함수 호출
        checkFold();
    }

    const foldBtn = document.querySelector(".fold_btn");
    foldBtn.addEventListener("click", toggleSideNav);

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

function topbarHandle(){
    $(".top-bar .profile_btn").on('mouseenter',function(){
        $(this).find(".profile_box").addClass('open');
    })
    $(".top-bar .profile_btn").on('mouseleave',function(){
        $(this).find(".profile_box").removeClass('open');
    })
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
