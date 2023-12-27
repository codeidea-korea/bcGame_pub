//=======================================================
//   left menu
//=======================================================
// html load

// 왼쪽메뉴 
fetch("/bcGame/_left_menu.html")
    .then((response) => response.text())
    .then((htmlData) => {
        if(!$('.content').hasClass('trading')){
            $(".sidebar").prepend(htmlData);
        }
    })
    .catch((error) => {
        console.log(error);
    });

// 탑바 로드
fetch("/bcGame/_top_bar.html")
    .then((response) => response.text())
    .then((html) => {
       
        if(!$('.content').hasClass('logout')){
            $(".content").prepend(html);
        }
         // 슬롯 슬라이드
         var swiper = new Swiper(".casino_recom .slide_box", {
            slidesPerView: 2.2,
            spaceBetween: 10,
            navigation: {
                nextEl: ".casino_recom .swiper-next",
                prevEl: ".casino_recom .swiper-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                815:{
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                990:{
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
                1100:{
                    slidesPerView: 6,
                    spaceBetween: 10,
                },
                1335:{
                    slidesPerView: 7,
                    spaceBetween: 10,
                    slidesPerGroup: 7,
                }
            }
        });
    })
    .catch((error) => {
        console.log(error);
    });

// 탑바 로드 - 로그인 안했을때
fetch("/bcGame/_top_bar_logout.html")
    .then((response) => response.text())
    .then((html) => {
        if($('.content').hasClass('logout')){
            $(".content").prepend(html);
        }
    })
    .catch((error) => {
        console.log(error);
    });

// 모달 로드
fetch("/bcGame/_modal.html")
    .then((response) => response.text())
    .then((html) => {
        $(".content").prepend(html);
    })
    .catch((error) => {
        console.log(error);
    });

// 푸터 로드
fetch("/bcGame/_footer.html")
    .then((response) => response.text())
    .then((html) => {
        $(".content").append(html);

    })
    .catch((error) => {
        console.log(error);
    });

// 우측영역 추가
fetch("/bcGame/_right_area.html")
    .then((response) => response.text())
    .then((html) => {
        $(".content").prepend(html);

        $(document).on('click','.all_view_btn',function(){
            $(this).prev().toggleClass('open')
            $(this).toggleClass('open');
        })

        rightAreaHandle();
        leftMenuHandle()
        topbarHandle()
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
    // 채팅 하단 언어 선택
    $('.right-area .chat_area .send_lang button').on('click',function(){
        $(this).toggleClass('on');
        $(this).next('ul').toggleClass('on');
    })
    $('.right-area .chat_area .send_lang ul li').on('click',function(){
        $(this).addClass('on').siblings().removeClass('on');
        $(this).parent().prev('button').find('span').text($(this).text());
        $(this).parent().removeClass('on');
        $(this).parent().prev('button').removeClass('on');
    })
    $('body').on('click',function(e){
        if(e.target.offsetParent){
            if(!e.target.offsetParent.classList.contains('send_lang')){
                $('.send_lang button').removeClass('on');
                $('.send_lang ul').removeClass('on');
            }
        }
    })

    // 좋아요 눌렀을떄
    $('.like-dom').on('click',function(){
        $(this).find('svg').addClass('fill-red').removeClass('fill-place')
    })

    // 이모지 클릭
    $('.right-area .emoji_btn').on('click',function(){
        fetch("/bcGame/_emoji_box.html")
            .then((response) => response.text())
            .then((html) => {
                $(".right-area .chat_bottom .gif_wrap > div").remove();
                $(".right-area .chat_bottom .emoji_wrap").append(html);
                $(".right-area .chat_bottom .emoji_wrap").removeClass('hidden')
                $(".right-area .chat_bottom .send-input input").focus();

                $('.emoji-box-wrap .bot-nav .emoji-icon').on('click',function(){
                    var liN = $(this).index();
                    $(this).addClass('active').siblings().removeClass('active')
                    $('.emoji-box-wrap .emoji-box > div').eq(liN).addClass('active').siblings().removeClass('active')
                });

                $('.emoji-box-wrap .emoji-box .emoji').on('click',function(){
                    $(".right-area .chat_bottom .emoji_wrap > div").remove();
                    $(".right-area .chat_bottom .emoji_wrap").addClass('hidden');

                    const input = $(".right-area .chat_bottom .send-input input").val();
                    $(".right-area .chat_bottom .send-input input").val(input + $(this).text())
                    $(".right-area .chat_bottom .send-input input").focus();
                })

            })
            .catch((error) => {
                console.log(error);
            });
    })
    // gif 클릭
    $('.right-area .gif_btn').on('click',function(){
        fetch("/bcGame/_gif_box.html")
            .then((response) => response.text())
            .then((html) => {
                $(".right-area .chat_bottom .emoji_wrap > div").remove();
                $(".right-area .chat_bottom .gif_wrap").append(html);
                $(".right-area .chat_bottom .gif_wrap").removeClass('hidden')
                $(".right-area .chat_bottom .send-input input").focus();


                $('.gift-box-wrap .gift-item').on('click',function(){
                    $(".right-area .chat_bottom .gif_wrap > div").remove();
                    $(".right-area .chat_bottom .gif_wrap").addClass('hidden');

                    $(".right-area .chat_bottom .send-input input").focus();
                })

            })
            .catch((error) => {
                console.log(error);
            });
    })

    // input 클릭시 이모지, gif 닫기
    $('.right-area .chat_bottom .send-input input').on('click',function(){
        $(".right-area .chat_bottom .emoji_wrap > div").remove();
        $(".right-area .chat_bottom .gif_wrap > div").remove();
    })

    // 랭킹아이콘 클릭시
    $('.right-area .rank_btn , .right-area .ranking_close').on('click',function(){
        $('.ranking_wrap').toggleClass('hidden')
    })

}


const topbarHandle = ()=>{
    // search 추가
    $('.top-bar .casino_search input').on('focus',function(){
        $('.top-bar .casino_search_area').addClass('on')
        $('.top-bar .casino_search_box_bg').addClass('on')
        $('.top-bar .casino_search .close_btn').addClass('on')
        
    })
    $('.top-bar .casino_search_box_bg,.top-bar .casino_search .close_btn').on('click',function(){
        $('.top-bar .casino_search_area').removeClass('on')
        $('.top-bar .casino_search_box_bg').removeClass('on')
        $('.top-bar .casino_search .close_btn').removeClass('on')
    })

    // 모바일 Search
    $('.casino_main .casino_search input').on('focus',function(){
        $('.mo_casino_search_area').addClass('on')
        $('.mo_casino_search_area .close_btn').addClass('on')
        $('.mo_casino_search_area .casino_search input').focus();
        
    })
    $('.mo_casino_search_area .close_btn').on('click',function(){
        $('.mo_casino_search_area').removeClass('on')
        $('.mo_casino_search_area .close_btn').removeClass('on')
    })

    // 모바일 퀵메뉴
    $('.mo_quick_menu li.more').on('click',function(){
        $(this).toggleClass('active').siblings().removeClass('active')
        $('.mo_menu_list').toggleClass('on')
        $('.mo_top_menu').toggleClass('active')
        $('body').toggleClass('overflow-hidden')

        if(!$(this).hasClass('active')){
            $(this).siblings('.home').addClass('active')
        }

        $('.mo_profile_list').removeClass('on')
    })

    $('.mo_quick_menu li.profile').on('click',function(){
        $(this).toggleClass('active').siblings().removeClass('active')
        $('.mo_profile_list').toggleClass('on')
        $('body').toggleClass('overflow-hidden')

        if(!$(this).hasClass('active')){
            $(this).siblings('.home').addClass('active')
        }

        $('.mo_menu_list').removeClass('on')
        $('.mo_top_menu').removeClass('active')
    })



    // 화폐
    const walletList = document.querySelectorAll('.wallet_list > div')
    const walletHandle = (e)=>{
        const parentNode = e.currentTarget.parentElement.parentElement;
        parentNode.querySelectorAll('.wallet_list > div').forEach((item)=>{
            item.classList.remove('active')
        })
        e.currentTarget.classList.add('active');

        const img = e.currentTarget.querySelector('img').src
        let text = ""
        if(parentNode.dataset.type == 'name'){
            text = e.currentTarget.querySelector('p:first-of-type b').innerText
        }else{
            text = e.currentTarget.querySelector('p.text-right strong').innerText
        }
        const text2 = e.currentTarget.querySelector('p.text-right span').innerText

        const button = document.querySelectorAll(`.${parentNode.dataset.btn}`)
        button.forEach((item)=>{
            item.querySelector('img').src = img
            item.querySelector('span').innerText = text2
            item.querySelector('strong').innerText = text
        })

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

    // custom select
    $('.custom_select > button').on('click',function(){
        $(this).parent().toggleClass('on')
    })
    $('.custom_select ul li').on('click',function(){
        const parent = $(this).parents('.custom_select'); 

        if($(this).hasClass('noclick')){
            parent.find('button span').text('사용자 정의')
            $(this).addClass('on').siblings().removeClass('on')
            return false;
        }

        if(parent.data('select') != "count" && parent.data('select') != "add" ){
            parent.removeClass('on')
            parent.find('button span').text($(this).text())
            $(this).addClass('on').siblings().removeClass('on')
        }

    });

    $('.custom_select[data-select="count"] ul input').on('change',function(){
        const parent = $(this).parents('.custom_select'); 

        if(parent.data('select') == "count"){
            let count = 0
            parent.find('li input').each((index,item)=>{
                if($(item).prop('checked')){count++}
            })
            if(count == 0){
                parent.find('button span.count').text('모든 제공업체')
            }else{
                parent.find('button span.count').text(count)
            }
        }
    })

    $('.custom_select[data-select="add"] ul input').on('change',function(){
        const parent = $(this).parents('.custom_select'); 

        if(parent.data('select') == "add"){
            let count = []
            parent.find('li input').each((index,item)=>{
                if($(item).prop('checked')){count.push($(item).val())}
            })
            parent.find('button span.add_name').text(count.join('/'))
        }
    })

    $('.custom_select[data-select="count"] .select_reset').on('click',function(){
        const parent = $(this).parents('.custom_select'); 
        parent.find('button span.count').text('모든 제공업체')
        parent.find('li input').each((index,item)=>{
            $(item).prop('checked',false)
        })
        
    })

    document.addEventListener('click',(e)=>{
        const select = document.querySelector('.custom_select.on')
        const datapicker = document.querySelector('.litepicker')

        if(datapicker){
            if(datapicker.style.display == "block"){
                return false
            }
        }
        if(select && !select.contains(e.target)){
            select.classList.remove('on')
        }
    })

    // custom select
    $('.custom_select2 > button').on('click',function(){
        $(this).parent().toggleClass('on')
    })
    $('.custom_select2 ul li').on('click',function(){
        $(this).parents('.custom_select2').removeClass('on')
        $(this).parents('.custom_select2').find('button .name').html($(this).find('.name').html())
        $(this).addClass('on').siblings().removeClass('on')
    })
    document.addEventListener('click',(e)=>{
        const select = document.querySelector('.custom_select2.on')
        if(select && !select.contains(e.target)){
            select.classList.remove('on')
        }
    })

    // 금액단위 버튼 클릭시 on off
    $('.cash_btn_box .cash_btn').on('click',function(){
        $(this).addClass('on').siblings().removeClass('on');
    })

    // 스핀
    $('.spin_box .spin_btn button').on('click',function(){
        const color = ['rgb(101, 49, 32)','rgb(235, 145, 6)','rgb(105, 14, 224)']
        const text = ['브론즈','골드','다이아몬드'];
        const level = ['레벨 0 이상','레벨 22 이상','레벨 70 이상']
        const btnN = $(this).index();

        $(this).addClass('active').siblings().removeClass('active')
        $('.spin_box .spin_info').css('background-color',color[btnN])
        $('.spin_box .tag-img').css('color',color[btnN])
        $('.spin_box .tag-img').text(text[btnN])
        $('.spin_box .tag-img + b').text(level[btnN])

        $('.spin_wrap > div').eq(btnN).addClass('active').siblings().removeClass('active')
    })

    // 슬롯 슬라이드
    var swiper = new Swiper(".spin_bonus-body .spin_bonus_wrap", {
        direction: "vertical",
        slidesPerView: 16,
        autoplay:{
            delay: 200,
            disableOnInteraction: false,
        },
    });


    setInterval(()=>{
        $('.spin_box .spin_area .spin-light').toggleClass('active')
    },500)



    //=======================================================
    //   아코디언박스 - 커스텀
    //=======================================================
    $('.accordian_item .title').on('click',function(){
        $(this).parent().toggleClass('on')
        $(this).parent().siblings().removeClass('on')

        $(this).next('.summary').slideToggle();
        $(this).parent().siblings().find('.summary').slideUp();
    })

   


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
        $('.top-bar .chat_btn use').attr('xlink:href','/bcGame/dist/custom_img/symbol-defs.svg#icon_Chat')

        rightOpen_item = "";
    }else{
        content.classList.add('right_open')
        right.classList.add('open')
        $(`.right-area .${target}`).show().siblings().hide();
    
        if(target == "chat_area"){
            $('.top-bar .chat_btn use').attr('xlink:href','/bcGame/dist/custom_img/symbol-defs.svg#icon_CloseChat')
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
    $('body').removeClass('overflow-hidden')
}
window.addEventListener("resize",resizeHandle)


//=======================================================
//   채팅
//=======================================================
// 채팅 input 텍스트 추가
const chatInput = (text)=>{
    $('.right-area .send-input input').val(text);
    $('.right-area .send-input input').focus()
    if(text == "/"){
        $('.right-area .chat_bottom .tag_area').removeClass('hidden')
    }else{
        $('.right-area .chat_bottom .tag_area').addClass('hidden')
    }
    if(text.includes(' ')){
        $('.right-area .chat_bottom .mention_area').addClass('hidden')
    }
}
const chatInputChange = (e)=>{
    const Regex = /^\//; 
    const Regex2 = /^\@/; 
    if(!e.value.includes(' ')){
        if(Regex.test(e.value)){
            $('.right-area .chat_bottom .tag_area').removeClass('hidden')
        }else{
            $('.right-area .chat_bottom .tag_area').addClass('hidden')
        }

        if(Regex2.test(e.value)){
            $('.right-area .chat_bottom .mention_area').removeClass('hidden')
        }else{
            $('.right-area .chat_bottom .mention_area').addClass('hidden')
        }
    }
}


//=======================================================
//   로그인 / 회원가입
//=======================================================
// 모달 내부 탭
const ModalTab = (modal,text)=>{
    const modalTabWrap = document.querySelectorAll(`#${modal} .modal-tab-wrap > div`)
    modalTabWrap.forEach((item)=>{
        item.classList.add('hidden')
    })
    document.querySelector(`#${modal} .modal-tab-wrap .${text}`).classList.remove('hidden')
}
// 모달 내부 탭 - nav-tab
const ModalNav = (modal,item)=>{
    const clickTab = document.querySelector(`#${modal} #${item} button`)
    clickTab.click();
}


//=======================================================
//   로그인 / 회원가입
//=======================================================
// 비밀번호 보기
const passwordView = (e)=>{
    const svg = e.querySelector('svg use')
    if(e.classList.contains('on')){
        e.classList.remove('on')
        e.previousElementSibling.setAttribute('type','password')
        svg.setAttribute('xlink:href','/bcGame/dist/custom_img/symbol-defs.svg#icon_View')
    }else{
        e.classList.add('on')
        e.previousElementSibling.setAttribute('type','text')
        svg.setAttribute('xlink:href','/bcGame/dist/custom_img/symbol-defs.svg#icon_Hide')
    }
}
const joinPhoneHandle = (text)=>{
    const joinPhoneBox = document.querySelector('.join_phone_box')
    if(text == 'hide'){
        joinPhoneBox.classList.remove('show')
    }else{
        if(joinPhoneBox.classList.contains('show')){
            joinPhoneBox.classList.remove('show')
        }else{
            joinPhoneBox.classList.add('show')
        }
    }
}
document.addEventListener('click',(e)=>{
    const joinPhone = document.querySelector('.join_phone_wrap')
    if(joinPhone && !joinPhone.contains(e.target)){
        joinPhoneHandle('hide')
    }
})
const joinPhoneClick = (e)=>{
    const joinPhoneBtn = document.querySelector('.join_phone_btn > span')
    joinPhoneBtn.innerText = e.querySelector('p:last-of-type').innerText
    joinPhoneHandle('hide');
    const joinPhone = document.querySelectorAll('.join_phone_box .overflow-y-auto > div')
    joinPhone.forEach((item)=>{item.classList.remove('active')})
    e.classList.add('active')
}
const promotionHandle = (e)=>{
    const inputbox = e.nextElementSibling;
    if(e.classList.contains('on')){
        e.classList.remove('on')
        inputbox.classList.add('hidden')
    }else{
        e.classList.add('on')
        inputbox.classList.remove('hidden')
    }
}


//=======================================================
//   vip 모달
//=======================================================
// vip 레벨 시스템 
const vipLevelHandle = (e)=>{
    if(!e.classList.contains('on')){
        e.classList.add('on')
        e.nextElementSibling.classList.add('open')
    }else{
        e.classList.remove('on')
        e.nextElementSibling.classList.remove('open')
    }
}


//=======================================================
//   알림 제어
//=======================================================
const viewAlert = (id)=>{
    const alertBox = document.querySelector(`#${id}`)
    alertBox.classList.add('show')
    
    setTimeout(()=>{
        alertBox.classList.remove('show')
    },3000)
}


//=======================================================
//   모달 내부 컨텐츠 이동
//=======================================================
const modalInHandle = (modal,content)=>{
    const modalWrap = document.querySelector(`#${modal}`)
    const modalcont = modalWrap.querySelector('.modal-content');
    const cont = modalWrap.querySelector(`.${content}`)

    if(!cont.classList.contains('open')){
        modalcont.classList.add('on')
        cont.classList.add('open')
        if(content == "profile_medal_detail" || content == "profile_medal_master"){
            modalWrap.querySelector('.profile_medal').classList.add('on')
        }
        if(content == "deposit_pot-body"){
            modalWrap.querySelector('.modal-dialog').classList.remove("modal-lg")
        }
        if(content == "rain_lock-body"){
            modalWrap.querySelector('.modal-dialog').classList.add("modal-xl")
        }
        if(content == "rain_detail-body"){
            modalWrap.querySelector('.modal-dialog').classList.remove("modal-xl")
        }
        if(content == "bcd_bonus_recode"){
            modalWrap.querySelector('.modal-dialog').classList.remove("modal-lg")
        }
    }else{
        modalcont.classList.remove('on')
        cont.classList.remove('open')
        if(content == "profile_medal_detail" || content == "profile_medal_master"){
            modalWrap.querySelector('.profile_medal').classList.remove('on')
        }
        if(content == "deposit_pot-body"){
            modalWrap.querySelector('.modal-dialog').classList.add("modal-lg")
        }
        if(content == "rain_lock-body"){
            modalWrap.querySelector('.modal-dialog').classList.remove("modal-xl")
        }
        if(content == "rain_detail-body"){
            modalWrap.querySelector('.modal-dialog').classList.add("modal-xl")
        }
        if(content == "bcd_bonus_recode"){
            modalWrap.querySelector('.modal-dialog').classList.add("modal-lg")
        }
    }
}

