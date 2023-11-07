//=======================================================
//   left menu
//=======================================================
// html load

// 왼쪽메뉴 
fetch("./_left_menu.html")
    .then((response) => response.text())
    .then((htmlData) => {
        const left = document.querySelector(".sidebar");
        left.innerHTML = htmlData;
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

    })
    .catch((error) => {
        console.log(error);
    });


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
