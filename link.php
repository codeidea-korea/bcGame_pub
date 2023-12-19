<?php include_once('lib/common.lib.php'); ?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="utf-8">
	<title>BC.GAME</title>
	<meta http-equiv="imagetoolbar" content="no">
	<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<link href="https://design01.codeidea.io/link_style.css" rel="stylesheet">
	<link rel="stylesheet" href="./dist/css/app.css" />
	<link rel="stylesheet" href="./dist/custom_css/custom.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<style>
		.ex_table th{
			border-bottom-width:1px;	
			border-right-width:1px;
		}
		.ex_table th:last-child{
			border-right-width:0px;
		}
	</style>
</head>

<body>
<?php include_once('./_svg_reset.php'); ?>

<div class="publishing-help">
	<span class="label not">작업중</span>
	<span class="label popup">팝업</span>
	<span class="label change">수정</span>
	<span class="label add">최근 추가</span>
	<!-- <a href="./css/iconfont/intaefont/" target="_blank" class="icon">아이콘 모음</a> -->
</div>

<?php
function txtRecord($dir)
{
	if (is_dir($dir)) {
		$handle  = opendir($dir);
		$files = array();
		while (false !== ($filename = readdir($handle))) {
			if ($filename == "." || $filename == "..") continue;
			if (is_file($dir . "/" . $filename)) {
				$files[] = $filename;
			}
		}
		closedir($handle);
		rsort($files);
		if (count($files) > 0) {
			echo '<div class="_record rsort">';
			echo '<ul>';
			foreach ($files as $f) {
				$name = '수정 ' . preg_replace("/[^0-9]*/s", "", $f);
				echo '<li><a href="' . $dir . $f . '" target="_black">' . $name . '</a></li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	}
}
echo txtRecord('./@record/');
?>

<div id="publishingContainer">

	<ul class="page-link" style="width:100%;margin-bottom:-50px">
		<li class="" data-label="공통">
			<ul>
				<li data-label="페이지">
					<ul>
						<li><a href="/bcGame/index.html" target="_blank" class="">로그인 했을때</a></li>
						<li><a href="/bcGame/index_logout.html" target="_blank" class="">로그인 안했을때</a></li>
					</ul>
				</li>
				<li class="mt20" data-label="모달">
					<ul>
						<li>
							<button class="pop-modal" data-tw-toggle="modal" data-tw-target="#login_join_modal" onclick="ModalTab('login_join_modal','login_box')">로그인 모달</button>
							<button class="pop-modal" data-tw-toggle="modal" data-tw-target="#login_join_modal" onclick="ModalTab('login_join_modal','join_box')">회원가입 모달</button>
							<button class="pop-modal" data-tw-toggle="modal" data-tw-target="#login_join_modal" onclick="ModalTab('login_join_modal','password_reset')">비밀번호 찾기 모달</button>
						</li>
						<li>
							<button class="pop-modal" data-tw-toggle="modal" data-tw-target="#lang_currency_modal" onclick="ModalNav('lang_currency_modal','lang-tab-1')">언어선택 모달</button>
							<button class="pop-modal" data-tw-toggle="modal" data-tw-target="#lang_currency_modal" onclick="ModalNav('lang_currency_modal','lang-tab-2')">화폐선택 모달</button>
						</li>
						<li>
							<button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_vip-modal">VIP 클럽 모달</button>
							<button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_vip_level-modal">VIP 클럽 - 레벨시스템 모달</button>
							<button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_reward-modal">추천 그리고 보상 모달</button>
						</li>
                        <li>
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_info-modal" onclick="modalInHandle('profile_info-modal','basic')">유저 정보 모달</button>
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_info_secret-modal">유저 정보 모달 - 시크릿 모드</button>
                        </li>
                        <li>
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#currency_setting-modal">화폐 설정 모달</button>
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#deposit-modal">입금 모달</button>
                        </li>
                        <li>
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#chat_info-modal">채팅 규칙 모달</button>
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#chat_rain-modal">레인 모달</button>
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#chat_coin-modal">코인드롭 모달</button>
                        </li>
					</ul>
				</li>
                <li class="mt20" data-label="알림">
                    <ul>
                        <li><button class="pop-modal" onclick="viewAlert('copy_alert')">복사 확인 알림</button></li>
                    </ul>
                </li>
			</ul>
		</li>

		<li class="mt20" data-label="메인">
			<ul>
				<li>
                    <a href="/bcGame/index.html" target="_blank" class="">메인 - 로그인시</a>
                    <ul>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#racing_lank-modal">최신베팅&레이스 > 롤링대회 > 내역 모달</button></li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#rolling_info-modal">롤링안내 모달</button></li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#betslip-modal">벳슬립 모달</button></li>
                    </ul>
                </li>
				<li><a href="/bcGame/index_logout.html" target="_blank" class="">메인 - 로그아웃시</a></li>
			</ul>
		</li>

        <li class="mt20" data-label="보너스">
            <ul>
				<li>
                    <a href="/bcGame/bonus.html" target="_blank" class="">보너스 - 로그인시</a>
                    <ul>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#bonus_info-modal">보너스 정보 모달</button></li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#bonus_deposit-modal">입금 보너스 모달</button></li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#bonus_roll-modal" onclick="rollHandle()">롤 모달</button></li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#bonus_bcd-modal">BCD 레이크백 모달</button></li>
                    </ul>
                </li>
				<li><a href="/bcGame/bonus_logout.html" target="_blank" class="">보너스 - 로그아웃시</a></li>
            </ul>
        </li>
        <li class="mt20" data-label="퀘스트">
            <ul>
                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#left_quest-modal">퀘스트</button></li>
            </ul>
        </li>
        <li class="mt20" data-label="스핀">
            <ul>
                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#left_spin-modal">스핀</button></li>
            </ul>
        </li>

        <li class="mt20" data-label="카지노">
			<ul>
				<li>
                    <a href="/bcGame/casino/index.html" target="_blank" class="">메인</a>
                    <ul>
                        <li>
                            <a href="/bcGame/casino/detail.html" target="_blank" class="">카지노 상세 페이지</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#detail_share-modal">게임 공유하기 모달</button></li>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#house_edge-modal">하우스엣지 모달</button></li>
                                <li><button class="pop-modal draggable_modal_open">실시간 통계 모달</button></li>
                            </ul>
                        </li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#racing_lank-modal">최신베팅&레이스 > 롤링대회 > 내역 모달</button></li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#rolling_info-modal">롤링안내 모달</button></li>
                    </ul>
                </li>
				<li><a href="/bcGame/casino/picks_for_you.html" target="_blank" class="">당신을 위해 선택</a></li>
				<li><a href="/bcGame/casino/favorite.html" target="_blank" class="">가장 좋아하는</a></li>
				<li><a href="/bcGame/casino/recent.html" target="_blank" class="">최근</a></li>
				<li>
                    <a href="/bcGame/casino/index.html?casino-8-tab" target="_blank" class="">BC 브랜드</a>
                    <ul>
                        <li>
                            <a href="/bcGame/casino/bc_detail.html" target="_blank" class="">상세 페이지</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#detail_share-modal">게임 공유하기 모달</button></li>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#house_edge-modal">하우스엣지 모달</button></li>
                                <li><button class="pop-modal draggable_modal_open">실시간 통계 모달</button></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="/bcGame/casino/slots.html" target="_blank" class="">슬롯</a></li>
				<li><a href="/bcGame/casino/live.html" target="_blank" class="">라이브 카지노</a></li>
				<li><a href="/bcGame/casino/hot.html" target="_blank" class="">Hot</a></li>
				<li><a href="/bcGame/casino/new.html" target="_blank" class="">New 출시</a></li>
				<li><a href="/bcGame/casino/feature_buy.html" target="_blank" class="">보너스 바이</a></li>
				<li><a href="/bcGame/casino/blackjack.html" target="_blank" class="">Blackjack</a></li>
				<li><a href="/bcGame/casino/table_game.html" target="_blank" class="">테이블 게임</a></li>
			</ul>
		</li>

        <li class="mt20" data-label="레이싱">
            <ul>
				<li><a href="/bcGame/racing.html" target="_blank" class="">레이싱</a></li>
				<li><a href="/bcGame/racing_detail.html" target="_blank" class="">레이싱 - 상세 </a></li>
            </ul>
        </li>

        <li class="mt20" data-label="거래">
            <ul>
				<li><a href="/bcGame/trading.html" target="_blank" class="">거래</a></li>
            </ul>
        </li>
        <li class="mt20" data-label="선물 거래">
            <ul>
				<li><a href="/bcGame/trading_contract.html" target="_blank" class="">선물 거래</a></li>
            </ul>
        </li>

        <li class="mt20" data-label="빙고">
            <ul>
				<li><a href="/bcGame/bingolist.html" target="_blank" class="">빙고</a></li>
            </ul>
        </li>


        <li class="mt20" data-label="BC 독점">
            <ul>
				<li><a href="/bcGame/bc_contest.html" target="_blank" class="">데일리 콘테스트</a></li>
				<li>
                    <a href="/bcGame/bc_promotion.html" target="_blank" class="">프로모션</a>
                    <ul>
                        <li><a href="/bcGame/bc_promotion_detail.html" target="_blank" class="">프로모션 - 상세</a></li>
                    </ul>
                </li>
                <li><a href="/bcGame/bc_weekly-raffle.html" target="_blank" class="">주간 추첨</a></li>
            </ul>
        </li>
        .
        <li class="mt20" data-label="제휴">
            <ul>
				<li>
                    <a href="/bcGame/affiliate_logout.html" target="_blank" class="">제휴 - 로그아웃시</a>
                    <ul>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#referral_info-modal">레퍼럴 이용약관 모달</button></li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#referral_rule-modal">레퍼럴 보상 규칙 모달</button></li>
                        <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#commission_info-modal">커미션 보상 규칙 모달</button></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="mt20" data-label="공정성">
            <ul>
				<li><a href="/bcGame/provably_fair.html" target="_blank" class="">공정성</a></li>
            </ul>
        </li>

        <li class="mt20" data-label="스폰서쉽">
			<ul>
				<li><a href="/bcGame/sponsorship_afa.html" target="_blank" class="">AFA</a></li>
				<li><a href="/bcGame/sponsorship_cloud9.html" target="_blank" class="">Cloud9</a></li>
				<li><a href="/bcGame/sponsorship_dl.html" target="_blank" class="">데이비드 루이즈</a></li>
				<li><a href="/bcGame/sponsorship_suniel.html" target="_blank" class="">수니엘 셰티</a></li>
			</ul>
		</li>

        <li class="mt20" data-label="프로필">
			<ul>
				<li>
                    <a href="/bcGame/global_setting.html" target="_blank" class="">글로벌 세팅</a>
                    <ul>
                        <li>
                            <a href="/bcGame/global_setting.html?account" target="_blank" class="">계정 정보</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_edit-modal">프로필 정보 편집 모달</button></li>
                                <li><button class="pop-modal" onclick="viewAlert('noname_alert')">사용불가 이름 알림</button></li>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_phone-modal">전화번호 추가</button></li>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#phone_message-modal">인증코드 모달</button></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/bcGame/global_setting.html?security" target="_blank" class="">보안</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#password_change-modal">비밀번호 변경 모달</button></li>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#fa2_active-modal">2FA 활성화 모달</button></li>
                            </ul>
                        </li>
                        <li><a href="/bcGame/global_setting.html?preferences" target="_blank" class="">선호 사항</a></li>
                        <li><a href="/bcGame/global_setting.html?kyc" target="_blank" class="">개인신분인증</a></li>
                    </ul>
                </li>
                <li><a href="/bcGame/global_setting_mo.html" target="_blank" class="">글로벌 세팅 - 모바일</a></li>
                <li>
                    <a href="/bcGame/wallet.html" target="_blank" class="">지갑</a>
                    <ul>
                        <li>
                            <a href="/bcGame/wallet.html?wallet" target="_blank" class="">잔고현황</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#jb_info-modal">JB 안내 모달</button></li>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#bcd_info-modal">BCD 안내 모달</button></li>
                            </ul>
                        </li>
                        <li><a href="/bcGame/wallet.html?deposit" target="_blank" class="">입금</a></li>
                        <li>
                            <a href="/bcGame/wallet.html?withdrawal" target="_blank" class="">출금</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#rollover-modal">롤오버 개요 모달</button></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/bcGame/wallet.html?buycrypto" target="_blank" class="">가상화폐 구매하기</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#asset_portfolio-modal">자산 포트폴리오 모달</button></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/bcGame/wallet.html?swap" target="_blank" class="">BC 스왑</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#asset_portfolio-modal">자산 포트폴리오 모달</button></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/bcGame/wallet.html?vault" target="_blank" class="">볼트프로</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#vault_rule-modal">보안규정 모달</button></li>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#vault_deposit-modal">볼트프로 입금 모달</button></li>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#asset_portfolio2-modal">자산 포트폴리오 모달2</button></li>
                            </ul>
                        </li>
                        <li><a href="/bcGame/wallet.html?nfts" target="_blank" class="">NFTs</a></li>
                        <li><a href="/bcGame/wallet.html?transaction" target="_blank" class="">거래</a></li>
                        <li>
                            <a href="/bcGame/wallet.html?roll" target="_blank" class="">롤오버 개요</a>
                            <ul>
                                <li><button class="pop-modal" data-tw-toggle="modal" data-tw-target="#rollover_detail-modal">롤오버 디테일 모달</button></li>
                            </ul>
                        </li>
                    </ul>
                </li>
			</ul>
		</li>
	</ul>
</div>

<!-- 공통 알림 영역 : S -->

<!-- 복사 확인 알림 -->
<div class="alert copy_alert bg-back mb-2 border-none" id="copy_alert">
    <div class="flex justify-between ">
        <p>복사되었습니다</p>
        <div class="loading_svg">
            <svg viewBox="25 25 50 50">
                <circle cx="50" cy="50" r="20" fill="none" stroke-width="8" pathLength="1" stroke-dashoffset="0px" stroke-dasharray="0.6186666666666667px 1px"></circle>
            </svg>
        </div>
    </div>
</div>

<!-- 사용불가 이름 알림 -->
<div class="alert bg-back mb-2 border-none" id="noname_alert">
    <div class="flex justify-between ">
        <p>이 이름은 사용할 수 없습니다. 다른 이름을 선택하십시오.</p>
        <div class="loading_svg">
            <svg viewBox="25 25 50 50">
                <circle cx="50" cy="50" r="20" fill="none" stroke-width="8" pathLength="1" stroke-dashoffset="0px" stroke-dasharray="0.6186666666666667px 1px"></circle>
            </svg>
        </div>
    </div>
</div>


<!-- 공통 알림 영역 : E -->


<!-- 공통 모달 영역 : S -->
<!-- 로그인 / 가입하기 -->
<div id="login_join_modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog login_modal modal-2lg h-full sm:h-auto">
        <div class="modal-content h-full sm:h-auto">
            <div class="modal-body flex flex-wrap content-start relative h-full sm:h-auto">
                <button class="absolute z-10 right-4 top-4 basic-hover" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                <div class="login-left relative overflow-hidden w-full sm:w-1/2 h-60 sm:h-full">
                    <img class="opacity-0" src="./dist/custom_img/login_bg.webp" alt="">
                    <div class="absolute left-0 bottom-4 sm:top-[59%] w-full text-right sm:text-center px-4">
                        <p class="text-xl text-tit font-bold">환영합니다 <b class="text-primary">BC.GAME</b></p>
                        <p class="mt-2">지금 게임 여정을 시작하세요!</p>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 relative p-8 flex flex-col">
                    <div class="login-wrap modal-tab-wrap">
                        <div class="login_box mb-2">
                            <h3 class="text-tit text-base font-bold">로그인</h3>
                            <input type="text" class="form-control form-control-rounded bg-back2 mt-2" placeholder="이메일 / 전화번호">
                            <div class="relative mt-2">
                                <input type="password" class="form-control form-control-rounded bg-back2" placeholder="로그인 비밀번호">
                                <button class="absolute right-3 top-[14px] basic-hover" onclick="passwordView(this)"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_View"></use></svg></button>
                            </div>
                            <div class="text-right">
                                <button class="hover:underline mt-3 text-right text-tit" onclick="ModalTab('login_join_modal','password_reset')">비밀번호를 잊으셨나요?</button>
                            </div>
                            <button class="btn btn-green block w-full h-11 mt-5 rounded font-extrabold">로그인</button>
                            <div class="mt-3">
                                BC.GAME에 처음이신가요?
                                <button class="text-primary text-base font-extrabold" onclick="ModalTab('login_join_modal','join_box')">계정 생성</button>
                            </div>
                        </div>

                        <!-- 회원가입 -->
                        <div class="join_box hidden mb-2">
                            <h3 class="text-tit text-base font-bold">가입하기</h3>
                            <ul class="nav nav-link-tabs w-full" role="tablist">
                                <li id="join-tab-1" class="nav-item w-1/2" role="presentation">
                                   <button class="nav-link w-full py-2 h-14 text-base active" data-tw-toggle="pill" data-tw-target="#join-con-1" type="button" role="tab" aria-controls="join-con-1" aria-selected="true" >이메일</button> 
                               </li>
                               <li id="join-tab-2" class="nav-item w-1/2" role="presentation">
                                   <button class="nav-link w-full py-2 h-14 text-base" data-tw-toggle="pill" data-tw-target="#join-con-2" type="button" role="tab" aria-controls="join-con-2" aria-selected="false" >전화번호</button> 
                               </li>
                           </ul> 
                           <div class="tab-content"> 
                                <div id="join-con-1" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="join-tab-1">
                                    <input type="text" class="form-control form-control-rounded bg-back2 mt-2" placeholder="이메일">
                                </div>
                                <div id="join-con-2" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="join-tab-2">
                                    <div class="relative mt-2 join_phone_wrap">
                                        <input type="text" class="form-control form-control-rounded bg-back2 pl-16" placeholder="전화번호" onclick="joinPhoneHandle('hide')">
                                        <p class="absolute left-0 top-0 w-14 h-full flex items-center justify-center cursor-pointer join_phone_btn" onclick="joinPhoneHandle()"><span class="text-xs text-tit">+82</span><svg class="w-3 h-3 ml-1 fill-basic rotate-90"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></p>
                                        <div class="join_phone_box bg-stand">
                                            <div class="relative border-b border-solid border-slate-300">
                                                <svg class="absolute left-0 top-3 w-4 h-4 mx-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Search"></use></svg>
                                                <input type="text" class="form-control form-control-rounded pl-12">
                                            </div>
                                            <div class="overflow-y-auto scrollbar h-60 p-1 cursor-pointer">
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)"> 
                                                    <p>Andorra</p>
                                                    <p>+376</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>United Arab Emirates (‫الإمارات العربية المتحدة‬‎)</p>
                                                    <p>+971</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Antigua and Barbuda</p>
                                                    <p>+1268</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Anguilla</p>
                                                    <p>+1264</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Angola</p>
                                                    <p>+244</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Antarctica</p>
                                                    <p>+672</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Australia</p>
                                                    <p>+61</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Aruba</p>
                                                    <p>+297</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Barbados</p>
                                                    <p>+1246</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Bolibia</p>
                                                    <p>+591</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Belize</p>
                                                    <p>+501</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                                    <p>Canada</p>
                                                    <p>+1</p>
                                                </div>
                                                <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200 active" onclick="joinPhoneClick(this)">
                                                    <p>South Korea (대한민국)</p>
                                                    <p>+82</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="relative mt-2">
                                <input type="password" class="form-control form-control-rounded bg-back2" placeholder="로그인 비밀번호">
                                <button class="absolute right-3 top-[14px] basic-hover" onclick="passwordView(this)"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_View"></use></svg></button>
                            </div>
                            <div class="mt-3">
                                <button class="flex items-center gap-1 promotion_btn on" onclick="promotionHandle(this)">추천/프로모션 코드 입력 <svg class="w-3 h-3 ml-1 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                                <input type="text" class="form-control form-control-rounded bg-back2 mt-2" value="viplucky" disabled>
                            </div>
                            <div class="flex items-center gap-1 mt-3">
                                <input id="join_agree_1" class="form-check-input w-3.5 h-3.5 rounded" type="checkbox" value=""> 
                                <label class="form-check-label text-xs" for="join_agree_1">나는 <b class="text-tit">사용자계약</b>에 동의하며 18세 이상임을 확인합니다</label>
                            </div>
                            <div class="flex items-center gap-1 mt-1">
                                <input id="join_agree_2" class="form-check-input w-3.5 h-3.5" type="checkbox" value=""> 
                                <label class="form-check-label text-xs" for="join_agree_2">BC.GAME의 마케팅 프로모션 수신에 동의합니다.</label>
                            </div>
                            <button class="btn btn-green block w-full h-11 mt-5 rounded font-extrabold">가입하기</button>
                            <div class="mt-3">
                                이미 계정이 있으신가요?
                                <button class="text-primary text-base font-extrabold" onclick="ModalTab('login_join_modal','login_box')">로그인</button>
                            </div>
                        </div>

                        <!-- 비밀번호 리셋 -->
                        <div class="password_reset hidden mb-2">
                            <h3 class="text-tit text-base font-bold">비밀번호 리셋</h3>
                            <input type="text" class="form-control form-control-rounded bg-back2 mt-2" placeholder="이메일 / 전화번호">
                            <button class="btn btn-green block w-full h-11 mt-5 rounded font-extrabold">비밀번호 리셋</button>
                            <div class="mt-3">
                                이미 계정이 있으신가요?
                                <button class="text-primary text-base font-extrabold" onclick="ModalTab('login_join_modal','login_box')">로그인</button>
                            </div>
                        </div>
                    </div>
                    <div class="bottom_box mt-auto">
                        <div class="tit flex gap-2 items-center">
                            <div class="flex-1 border-b border-solid border-slate-600"></div>
                            <span class="text-xs">로 바로 로그인하기</span>
                            <div class="flex-1 border-b border-solid border-slate-600"></div>
                        </div>
                        <div class="flex justify-between mt-3">
                            <button class="border border-solid border-slate-300 dark:border-slate-500 w-10 h-10 rounded hover:bg-slate-300"><svg class="w-4 h-4 fill-title mx-auto" width="12" height="12" viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg"><path d="M6.8619 3.38909C6.37169 2.93243 5.70412 2.67872 5.02615 2.68886C3.77446 2.68886 2.72093 3.50068 2.33502 4.60677L0.749573 3.40937C1.56315 1.83647 3.21119 0.841974 5.02615 0.841974C6.21523 0.831834 7.36257 1.25803 8.22834 2.04957L6.8619 3.38909Z"></path><path d="M2.3347 6.39258C2.13649 5.81418 2.13665 5.18503 2.33485 4.60658L0.749407 3.40918C0.0713866 4.72837 0.0712314 6.28098 0.749252 7.59003C1.56283 9.16293 3.21103 10.1574 5.02598 10.1574C6.3159 10.1574 7.39831 9.74346 8.19046 9.03657L8.19682 9.04135C9.10425 8.21928 9.62582 7.02188 9.62582 5.61133C9.62582 5.29678 9.59451 4.97204 9.54236 4.66763H5.02588V6.46376H7.61271C7.5084 7.04221 7.1643 7.54952 6.65329 7.87426C6.22567 8.15839 5.67265 8.32053 5.02598 8.32053C3.7743 8.32053 2.72076 7.49867 2.33485 6.40272L0.751787 7.58806L2.3347 6.39258Z"></path></svg></button>
                            <button class="border border-solid border-slate-300 dark:border-slate-500 w-10 h-10 rounded hover:bg-slate-300"><svg class="w-4 h-4 fill-title mx-auto" width="12" height="12" viewBox="0 0 10 9" xmlns="http://www.w3.org/2000/svg"><path d="M0.631267 4.23359L8.94963 0.522088C9.26472 0.381636 9.63257 0.52552 9.77174 0.843552C9.82141 0.956236 9.83693 1.08093 9.81624 1.20277L8.70026 7.90193C8.63145 8.31346 8.24549 8.59114 7.83779 8.52187C7.7219 8.50206 7.6117 8.45479 7.51702 8.38397L4.70353 6.27916C4.42674 6.07231 4.36827 5.6781 4.57367 5.39854C4.59695 5.36641 4.62386 5.33651 4.65335 5.30942L7.47408 2.69548C7.49943 2.67187 7.50098 2.6322 7.4777 2.6064C7.45752 2.58436 7.42441 2.57962 7.39854 2.59569L3.11829 5.27286C2.96256 5.36984 2.77269 5.39345 2.59885 5.33677L0.655584 4.70362C0.52417 4.66082 0.452255 4.51881 0.49468 4.38657C0.51641 4.31856 0.566078 4.2625 0.631267 4.23354V4.23359Z"></path></svg></button>
                            <button class="border border-solid border-slate-300 dark:border-slate-500 w-10 h-10 rounded hover:bg-slate-300"><svg class="w-4 h-4 fill-title mx-auto" width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.614979 0.00163379C0.625651 -0.00178505 0.637657 0.000226031 0.646994 0.00706371L0.745707 0.0805353L4.39007 1.43949C4.3914 1.43661 4.39273 1.43386 4.39474 1.43125C4.4014 1.42173 4.41208 1.4161 4.42408 1.4161H7.58155C7.59289 1.4161 7.60423 1.42179 7.6109 1.43131C7.61223 1.43346 7.61356 1.43567 7.61423 1.43802L11.2486 0.0811386L11.3486 0.00706371C11.358 0.000226031 11.37 -0.00178505 11.3806 0.00163379C11.392 0.00505263 11.4007 0.0134992 11.404 0.024359L11.9983 1.79612C12.0003 1.80202 12.0003 1.80846 11.9996 1.81456L11.6061 3.69988L11.8362 3.8733C11.8449 3.88001 11.8502 3.89046 11.8502 3.90153C11.8502 3.91265 11.8449 3.92311 11.8362 3.92988L11.4987 4.18703L11.7522 4.38311C11.7608 4.38955 11.7655 4.39927 11.7662 4.40973C11.7668 4.42018 11.7622 4.43037 11.7548 4.43741L11.4127 4.7492L11.6108 4.89192C11.6194 4.89775 11.6241 4.90666 11.6254 4.91652C11.6268 4.92637 11.6234 4.93629 11.6174 4.94387L11.0878 5.55953L11.9049 8.07466C11.9089 8.08545 11.9069 8.09732 11.9002 8.10657C11.8936 8.11575 11.8822 8.12118 11.8709 8.12118H11.8602L11.1079 10.6706L8.45595 9.94175L7.94172 10.362L6.8939 11.0865H5.1024L4.05925 10.362L3.66039 10.0359L3.52967 9.97392C3.51966 9.96937 3.51299 9.96085 3.51032 9.95093L0.892442 10.6706L0.134756 8.08552L0.937796 5.58587C0.931126 5.58393 0.925123 5.58018 0.921122 5.57481L0.382872 4.94374C0.376202 4.93616 0.373534 4.92631 0.374868 4.91645C0.375535 4.9066 0.380871 4.89768 0.388874 4.89192L0.587633 4.7492L0.245474 4.43741C0.238138 4.43037 0.233469 4.42032 0.234136 4.40986C0.234136 4.39947 0.239472 4.38975 0.247475 4.38325L0.496925 4.18723L0.159434 3.92988C0.150097 3.92311 0.144761 3.91259 0.145428 3.90139C0.145428 3.89026 0.150764 3.87974 0.159434 3.8731L0.393543 3.69968L0.000694001 1.81456C-0.000639952 1.80846 2.70248e-05 1.80209 0.00202795 1.79619L0.591635 0.0244261C0.59497 0.0135662 0.603641 0.00505263 0.614979 0.00163379ZM3.73509 2.53967L4.75092 3.30687L4.33471 3.67537L3.27949 4.567L1.14966 5.18967L0.711109 4.67494L0.889232 4.54649C0.896874 4.54094 0.902165 4.53231 0.902165 4.52286C0.902753 4.51347 0.899226 4.50431 0.892171 4.49793L0.589421 4.22207L0.812222 4.04712C0.819864 4.04109 0.823979 4.03194 0.823979 4.02231C0.823979 4.01262 0.819276 4.00352 0.811634 3.99761L0.51535 3.77156L0.704054 3.63153C0.714048 3.62426 0.718751 3.61197 0.7164 3.60004L0.367796 1.92721L0.87042 0.415094L3.73509 2.53967ZM10.8432 5.18626L11.2852 4.67221L11.1074 4.54401C11.0991 4.53847 11.0945 4.52985 11.0939 4.52041C11.0933 4.51103 11.0974 4.50189 11.1044 4.49552L11.4061 4.22023L11.1802 4.04554C11.1725 4.03959 11.1678 4.03038 11.1684 4.02071C11.1684 4.01097 11.1725 4.00183 11.1807 3.99593L11.4772 3.76997L11.2917 3.63026C11.2823 3.62295 11.2776 3.61073 11.2799 3.59894L11.628 1.92861L11.122 0.418512L7.24491 3.29416L7.81665 3.80419L8.71593 4.56437L10.8432 5.18626ZM5.04102 7.42137L4.65751 6.60802L3.75442 7.01862C3.75643 7.02284 3.75776 7.02747 3.75776 7.03223L3.75843 7.04402L5.04102 7.42137ZM5.32045 9.03574L5.15504 9.14957C5.16038 9.15661 5.16238 9.16532 5.16171 9.17417L5.04966 10.1639L5.11636 10.0999H6.87984L6.9959 10.2021L6.87451 9.20528C6.86584 9.20622 6.85716 9.20421 6.84983 9.19918L6.63373 9.05089H5.3498C5.33779 9.05089 5.32712 9.04493 5.32045 9.03574ZM8.23372 7.01098L6.98714 7.37626L6.9858 7.36654L7.34797 6.60802L8.23372 7.01098Z"></path></svg></button>
                            <button class="border border-solid border-slate-300 dark:border-slate-500 w-10 h-10 rounded hover:bg-slate-300"><svg class="w-4 h-4 fill-title mx-auto" width="16" height="16" viewBox="0 0 13 9" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.4289 3.91921L12.1201 4.58746C12.2153 4.67825 12.2153 4.82718 12.1201 4.91797L9.00652 7.93605C8.91132 8.02685 8.75766 8.02685 8.66608 7.93605L6.45637 5.79324C6.43412 5.77145 6.39429 5.77145 6.37204 5.79324L4.16233 7.93605C4.06713 8.02685 3.91347 8.02685 3.82189 7.93605L0.697462 4.91797C0.602265 4.82718 0.602265 4.67825 0.697462 4.58746L1.38868 3.91921C1.48387 3.82842 1.63753 3.82842 1.72911 3.91921L3.93882 6.06203C3.96107 6.08381 4.00142 6.08381 4.02315 6.06203L6.23287 3.91921C6.32806 3.82842 6.48172 3.82842 6.5733 3.91921L8.78353 6.06203C8.80526 6.08381 8.84561 6.08381 8.86734 6.06203L11.0776 3.91921C11.18 3.82842 11.3337 3.82842 11.4289 3.91921ZM2.9949 2.36498C4.87918 0.53817 7.93791 0.53817 9.82219 2.36498L10.0493 2.58655C10.144 2.67735 10.144 2.82627 10.0493 2.91707L9.27326 3.66883C9.22566 3.71605 9.14909 3.71605 9.10149 3.66883L8.79054 3.36739C7.47331 2.09261 5.34379 2.09261 4.02655 3.36739L3.69388 3.69062C3.64628 3.73783 3.56919 3.73783 3.52159 3.69062L2.74604 2.93885C2.65085 2.84806 2.65085 2.69913 2.74604 2.60834L2.9949 2.36498Z"></path></svg></button>
                            <button class="border border-solid border-slate-300 dark:border-slate-500 w-10 h-10 rounded hover:bg-slate-300"><svg class="w-4 h-4 fill-title mx-auto" width="13" height="13" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg"><path d="M7.2 0a7 7 0 0 0-5.67 11.1l-.87 2.6 2.7-.86A7 7 0 1 0 7.2 0Zm4.08 9.88c-.17.48-.84.88-1.38 1-.36.07-.84.13-2.45-.53-2.06-.86-3.38-2.95-3.49-3.08-.1-.14-.83-1.1-.83-2.11 0-1 .51-1.5.72-1.7.17-.18.45-.26.71-.26h.24c.2.02.3.03.44.36l.63 1.51c.05.1.1.24.03.38-.06.14-.12.2-.22.32s-.2.21-.3.34c-.1.1-.21.23-.1.43.13.2.54.88 1.14 1.41.79.7 1.42.92 1.65 1.02.17.07.37.05.49-.08.16-.17.35-.45.55-.73.14-.2.31-.22.5-.15s1.19.56 1.4.66c.2.1.34.16.38.24.05.09.05.5-.12.97Z"></path></svg></button>
                            <button class="border border-solid border-slate-300 dark:border-slate-500 w-10 h-10 rounded hover:bg-slate-300"><svg class="w-4 h-4 fill-title mx-auto" width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024"><path d="M972.55 409.27h.01l-.29-2.37-.01-.12-.01-.1-1.08-8.91-.74-6.16-.23-1.86-.46.06c-11.29-64.2-42.3-125.13-90.32-177.14-47.8-51.78-109.9-92.65-179.6-118.21-59.7-21.9-123.06-33.01-188.3-33.01-88.07 0-173.6 20.7-247.34 59.9C121.97 196.9 38.1 335.78 50.5 475.16c6.41 72.12 34.67 140.78 81.71 198.55 44.28 54.37 104.18 98.25 173.22 126.89 42.45 17.6 84.42 25.9 128.86 34.69l5.2 1.03c12.23 2.42 15.53 5.75 16.37 7.06 1.57 2.45.75 7.27.12 9.93-.58 2.45-1.18 4.9-1.78 7.34-4.77 19.46-9.7 39.58-5.83 61.77 4.46 25.5 20.39 40.13 43.7 40.13 25.08 0 53.62-16.82 72.5-27.95l2.52-1.48c45.06-26.46 87.5-56.3 119.44-79.34 69.9-50.43 149.12-107.6 208.52-181.54 59.81-74.48 87.98-170.19 77.5-262.97zm-635.07 141.1h-79.84a21.85 21.85 0 0 1-21.84-21.84V360.96a21.85 21.85 0 0 1 43.69 0v145.73h57.99a21.85 21.85 0 0 1 0 43.69zm83.29-22.43a21.85 21.85 0 0 1-43.7 0V360.36a21.85 21.85 0 0 1 43.7 0v167.58zm197.46 0a21.85 21.85 0 0 1-39.52 12.83l-78.67-108.34v95.51a21.85 21.85 0 0 1-43.69 0V365.16a21.85 21.85 0 0 1 39.53-12.84l78.66 108.35v-100.3a21.85 21.85 0 0 1 43.7 0v167.57zm159.19 18.4H669.3a21.85 21.85 0 0 1-21.85-21.84V356.92a21.85 21.85 0 0 1 21.85-21.84h104.76a21.85 21.85 0 0 1 0 43.69h-82.91v40.1h67.29a21.85 21.85 0 0 1 0 43.69h-67.3v40.1h86.28a21.85 21.85 0 0 1 0 43.68z"></path></svg></button>
                            <button class="border border-solid border-slate-300 dark:border-slate-500 w-10 h-10 rounded hover:bg-slate-300"><svg class="w-4 h-4 fill-title mx-auto" width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g clip-path="url(#a)"><path d="M16 8A8 8 0 0 1 .17 9.642l3.177 1.335a2.098 2.098 0 0 0 4.154-.396l.004-.002 2.402-1.79a2.727 2.727 0 1 0 .031-5.456A2.728 2.728 0 0 0 7.211 6.01l-1.76 2.462a2.068 2.068 0 0 0-1.194.34L.061 7.048C.533 3.079 3.905 0 8 0a8 8 0 0 1 8 8ZM4.949 11.651l-1.03-.432a1.62 1.62 0 0 0 3.106-.665 1.627 1.627 0 0 0-1.621-1.607c-.191 0-.38.033-.573.106l1.028.432a1.174 1.174 0 0 1-.91 2.166Zm4.989-3.734a1.857 1.857 0 0 1-1.854-1.855c0-1.023.832-1.855 1.854-1.855 1.023 0 1.854.832 1.854 1.855a1.857 1.857 0 0 1-1.854 1.855Zm0-.455a1.401 1.401 0 1 0-.002-2.802 1.401 1.401 0 0 0 .002 2.802Z"></path></g><defs><clipPath id="a"><path d="M0 0h16v16H0z"></path></clipPath></defs></svg></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 언어 / 법정화폐 모달 -->
<div id="lang_currency_modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body flex flex-wrap content-start relative">
                <button class="absolute z-10 right-5 top-5 basic-hover" data-tw-dismiss="modal"><svg class="w-5 h-5 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>

                <ul class="nav nav-link-tabs type02 w-full" role="tablist">
                    <li id="lang-tab-1" class="nav-item w-1/3 sm:w-1/4" role="presentation">
                       <button class="nav-link w-full py-2 h-16 active" data-tw-toggle="pill" data-tw-target="#lang-con-1" type="button" role="tab" aria-controls="lang-con-1" aria-selected="true" >언어</button> 
                    </li>
                    <li id="lang-tab-2" class="nav-item w-1/3 sm:w-1/4" role="presentation">
                       <button class="nav-link w-full py-2 h-16" data-tw-toggle="pill" data-tw-target="#lang-con-2" type="button" role="tab" aria-controls="lang-con-2" aria-selected="false" >법정화폐로 보기</button> 
                    </li>
                    <li class="nav-item flex-1"><div class="nav-link h-16"></div></li>
                </ul> 
                <div class="tab-content w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[504px]"> 
                    <div id="lang-con-1" class="tab-pane leading-relaxed overflow-y-auto active" role="tabpanel" aria-labelledby="lang-tab-1">
                        <ul class="grid grid-cols-2 sm:grid-cols-4 w-full gap-3">
                            <li><button class="btn-top w-full p-5 py-4 text-left">Indian English</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">English</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Tiếng việt</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Indonesian</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">日本語</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left active">한국어</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Français</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Español</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Filipino</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">عربى</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">हिन्दी</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Türkçe</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">فارسی</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Português</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Руccкий</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Deutsch</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">ภาษาไทย</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Suomi</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Polski</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Italiano</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">မြန်မာ</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">اردو</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Українська</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Melayu</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">বাংলা</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Marathi</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Tamil</button></li>
                            <li><button class="btn-top w-full p-5 py-4 text-left">Telugu</button></li>
                        </ul>
                    </div>
                    <div id="lang-con-2" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="lang-tab-2">
                        <ul class="grid grid-cols-2 sm:grid-cols-4 w-full gap-3">
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4 active">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/USD.webp">
                                <p class="text-tit">없음</p>
                            </button></li>
                        </ul>
                        <ul class="grid grid-cols-2 sm:grid-cols-4 w-full gap-3 mt-4">
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/USD.webp">
                                <p>USD</p>
                                <span class="text-sub truncate">US Dollar</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/BRL.webp">
                                <p>BRL</p>
                                <span class="text-sub truncate">Brazil</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/INR.webp">
                                <p>INR</p>
                                <span class="text-sub truncate">India</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/EUR.webp">
                                <p>EUR</p>
                                <span class="text-sub truncate">Euro</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/RUB.webp">
                                <p>PUR</p>
                                <span class="text-sub truncate">Russia</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/NGN.webp">
                                <p>NGN</p>
                                <span class="text-sub truncate">Nigeria</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/INR.webp">
                                <p>INR</p>
                                <span class="text-sub truncate">India</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/BDT.webp">
                                <p>BDT</p>
                                <span class="text-sub truncate">Bangladesh</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/PHP.webp">
                                <p>PHP</p>
                                <span class="text-sub truncate">Philippine</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/VND.webp">
                                <p>VND</p>
                                <span class="text-sub truncate">Vietnam</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/THB.webp">
                                <p>THB</p>
                                <span class="text-sub truncate">Thailand</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/KZT.webp">
                                <p>KZT</p>
                                <span class="text-sub truncate">Kazakhstani tenge</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/MAD.webp">
                                <p>MAD</p>
                                <span class="text-sub truncate">Morocco</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/ZAR.webp">
                                <p>ZAR</p>
                                <span class="text-sub truncate">South Africa</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/PLN.webp">
                                <p>PLN</p>
                                <span class="text-sub truncate">Poland</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/CUP.webp">
                                <p>CUP</p>
                                <span class="text-sub truncate">Cuba</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/KRW.webp">
                                <p>KRW</p>
                                <span class="text-sub truncate">Korea</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/JPY.webp">
                                <p>JPY</p>
                                <span class="text-sub truncate">Japan</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/GBP.webp">
                                <p>GBP</p>
                                <span class="text-sub truncate">United Kingdom</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/HRK.webp">
                                <p>HRK</p>
                                <span class="text-sub truncate">Croatia</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/ISK.webp">
                                <p>ISK</p>
                                <span class="text-sub truncate">Iceland</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/HUF.webp">
                                <p>HUF</p>
                                <span class="text-sub truncate">Hungary</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/NOK.webp">
                                <p>NOK</p>
                                <span class="text-sub truncate">Norwegian</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/NZD.webp">
                                <p>NZD</p>
                                <span class="text-sub truncate">New Zealand Dollar</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/ARS.webp">
                                <p>ARS</p>
                                <span class="text-sub truncate">Argentina Peso</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/MXN.webp">
                                <p>MXN</p>
                                <span class="text-sub truncate">Mexico Peso</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/AUD.webp">
                                <p>AUD</p>
                                <span class="text-sub truncate">Australia Dollar</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/TRY.webp">
                                <p>TRY</p>
                                <span class="text-sub truncate">Turkey Lira</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/IRR.webp">
                                <p>IRR</p>
                                <span class="text-sub truncate">Iran Rial</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/AED.webp">
                                <p>AED</p>
                                <span class="text-sub truncate">UAE-Dirham</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/CAD.webp">
                                <p>CAD</p>
                                <span class="text-sub truncate">Canada Dollar</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/UAH.webp">
                                <p>UAH</p>
                                <span class="text-sub truncate">Ukraine Hryvnia</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/CZK.webp">
                                <p>CZK</p>
                                <span class="text-sub truncate">Czech Republic Koruna</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/LKR.webp">
                                <p>LKR</p>
                                <span class="text-sub truncate">Sri Lanka Rupee</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/ILS.webp">
                                <p>ILS</p>
                                <span class="text-sub truncate">Israel Shekel</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/EGP.webp">
                                <p>EGP</p>
                                <span class="text-sub truncate">Egypt Pound</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/PKR.webp">
                                <p>PKR</p>
                                <span class="text-sub truncate">Pakistan Rupee</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/AED.webp">
                                <p>GHS</p>
                                <span class="text-sub truncate">Ghana Cedi</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/VEF.webp">
                                <p>VEF</p>
                                <span class="text-sub truncate">Venezuela Bolívar</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/PEN.webp">
                                <p>PEN</p>
                                <span class="text-sub truncate">Peru Sol</span>
                            </button></li>

                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/RON.webp">
                                <p>RON</p>
                                <span class="text-sub truncate">Romania Leu</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/BGN.webp">
                                <p>BGN</p>
                                <span class="text-sub truncate">Bulgaria Lev</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/RSD.webp">
                                <p>RSD</p>
                                <span class="text-sub truncate">Serbia Dinar</span>
                            </button></li>
                            <li><button class="btn-top w-full flex items-center gap-2 h-14 px-4">
                                <img class="w-8 h-8" src="./dist/custom_img/coin/CLP.webp">
                                <p>CLP</p>
                                <span class="text-sub truncate">Chile Peso</span>
                            </button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 프로필 - vip 클럽 -->
<div id="profile_vip-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-2lg overflow-y-auto scrollbar sm:max-h-[820px]">
        <div class="modal-content">
            <div class="modal-body relative">
                <button class="absolute z-10 right-5 top-5 basic-hover" data-tw-dismiss="modal"><svg class="w-5 h-5 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                <div class="pt-8"></div>
                <div class="relative mb-4">
                    <img class="w-[350px] mx-auto" src="./dist/custom_img/profile/ribbon.png" alt="">
                    <span class="absolute left-0 top-2 w-full text-center text-base text-white font-extrabold">VIP 클럽</span>
                </div>
                <div class="bg-back pt-2 pb-8 px-4">
                    <div class="p-4 bg-back2 text-center text-xs rounded">
                        넉넉한 보상과 맞춤형 선물을 독점적으로 받으려면 레벨을 올리십시오! <a href="javascript:;" class="text-primary hover:underline"data-tw-dismiss="modal" data-tw-toggle="modal" data-tw-target="#profile_vip_level-modal">레벨업 세부정보 보기</a>
                    </div>
                    <div class="my-4 flex sm:flex-row flex-col w-full gap-4">
                        <!-- vip_grade 클래스 : bronze silver gold plat dia  -->
                        <div class="vip_grade rounded w-full sm:w-3/5">
                            <div class="flex gap-8 items-start px-4 rounded">
                                <div class="relative">
                                    <!-- img 경로 : nostage.webp bronze_medal.png silver_medal.png gold_medal.webp platinum_medal.png diamond_medal.webp -->
                                    <img class="w-28" src="./dist/custom_img/profile/nostage.webp" alt="">
                                    <img class="absolute left-0 top-0 w-full h-full" src="./dist/custom_img/profile/light.svg" alt="">
                                    <p class="z-10 absolute left-0 top-1/2 w-full -mt-1 text-center text-white">VIP <b class="text-xl">0</b></p>
                                </div>
                                <div class="text-tit py-8 flex-1">
                                    <div class="text-base font-semibold">VIP 진행 상황</div>
                                    <div class="mt-2 vip-cont">
                                        <div class="flex items-center gap-2">
                                            0 XP 
                                            <div class="relative hover_box">
                                                <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                <div class="z-20 absolute left-0 top-full w-[350px] -translate-x-1/3 bg-shadow text-xs p-3 rounded shadow">
                                                    <p class="text-basic font-normal">
                                                        롤링 $1.00 = 1 XP; 스포츠 롤링 $1.00 = 2 XP<br/>
                                                        모든 베팅은 현재 환율로 USD로 변환됩니다.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vip-process w-full h-2.5 mt-2 bg-[#f7f4f3] rounded">
                                            <div class="h-full rounded" style="width:20%;"></div>
                                        </div>
                                    </div>
                                    <p class="mt-2">1 XP 까지 VIP 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:w-2/5 sm:pb-0 pb-4 vip-cont relative rounded bg-white dark:bg-[#2D3035] p-2">
                            <div class="flex flex-col h-full">
                                <div>
                                    <div class="vip_flag host !absolute left-0 top-2 text-xs">VIP 호스트</div>
                                    <div class="flex justify-end">
                                        <div class="relative hover_box">
                                            <button class="basic-hover pt-1 cursor-pointer"><svg class="w-5 h-5 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                            <div class="z-20 absolute right-0 top-full w-[350px] bg-shadow p-3 rounded shadow">
                                                <p class="text-basic font-normal">
                                                    VIP 호스트는 귀하의 독점적인 고객 지원입니다. 언제든지 연락 주시기 바랍니다.
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-1 items-center flex-col justify-center">
                                    <img class="w-36 mx-auto" src="./dist/custom_img/profile/host.webp" alt="">
                                    <p class="text-basic mt-2"><b class="text-tit">VIP 38</b> 에서 독점 VIP HOST 잠금 해제</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-back2 p-4">
                        <div class="text-center font-bold">BC.GAME의 독점 VIP 시스템으로 최고의 게임 경험을 발견하십시오!</div>
                                                
                        <div class="overflow-x-auto overflow-y-hidden">
                            <ul class="nav nav-tabs gap-1 vip-tabs mt-4 min-w-[500px]" role="tablist">
                                <li id="vip-1-tab" class="nav-item " role="presentation">
                                    <button class="nav-link w-full py-4 text-xs bronze active" data-tw-toggle="pill" data-tw-target="#vip-tab-1" type="button" role="tab" aria-controls="vip-tab-1" aria-selected="true">
                                        <img src="./dist/custom_img/profile/bronze.png" alt=""> 브론즈 
                                    </button> 
                                </li>
                                <li id="vip-2-tab" class="nav-item " role="presentation"> 
                                    <button class="nav-link w-full py-4 text-xs silver" data-tw-toggle="pill" data-tw-target="#vip-tab-2" type="button" role="tab" aria-controls="vip-tab-2" aria-selected="false"> 
                                        <img src="./dist/custom_img/profile/silver.png" alt=""> 실버 
                                    </button> 
                                </li>
                                <li id="vip-3-tab" class="nav-item " role="presentation"> 
                                    <button class="nav-link w-full py-4 text-xs gold" data-tw-toggle="pill" data-tw-target="#vip-tab-3" type="button" role="tab" aria-controls="vip-tab-3" aria-selected="false"> 
                                        <img src="./dist/custom_img/profile/gold.png" alt=""> 골드 
                                    </button> 
                                </li>
                                <li id="vip-4-tab" class="nav-item " role="presentation"> 
                                    <button class="nav-link w-full py-4 text-xs plat" data-tw-toggle="pill" data-tw-target="#vip-tab-4" type="button" role="tab" aria-controls="vip-tab-4" aria-selected="false"> 
                                        <img src="./dist/custom_img/profile/platinum.png" alt=""> 플래티넘 I 
                                    </button> 
                                </li>
                                <li id="vip-5-tab" class="nav-item " role="presentation"> 
                                    <button class="nav-link w-full py-4 text-xs plat" data-tw-toggle="pill" data-tw-target="#vip-tab-5" type="button" role="tab" aria-controls="vip-tab-5" aria-selected="false"> 
                                        <img src="./dist/custom_img/profile/platinum.png" alt=""> 플래티넘 II 
                                    </button> 
                                </li>
                                <li id="vip-6-tab" class="nav-item " role="presentation"> 
                                    <button class="nav-link w-full py-4 text-xs dia" data-tw-toggle="pill" data-tw-target="#vip-tab-6" type="button" role="tab" aria-controls="vip-tab-6" aria-selected="false"> 
                                        <img src="./dist/custom_img/profile/diamond.png" alt=""> 다이아몬드 I 
                                    </button> 
                                </li>
                                <li id="vip-7-tab" class="nav-item " role="presentation"> 
                                    <button class="nav-link w-full py-4 text-xs dia" data-tw-toggle="pill" data-tw-target="#vip-tab-7" type="button" role="tab" aria-controls="vip-tab-7" aria-selected="false"> 
                                        <img src="./dist/custom_img/profile/diamond.png" alt=""> 다이아몬드 II  
                                    </button> 
                                </li>
                                <li id="vip-8-tab" class="nav-item " role="presentation"> 
                                    <button class="nav-link w-full py-4 text-xs dia" data-tw-toggle="pill" data-tw-target="#vip-tab-8" type="button" role="tab" aria-controls="vip-tab-8" aria-selected="false"> 
                                        <img src="./dist/custom_img/profile/diamond.png" alt=""> 다이아몬드 III  
                                    </button> 
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content bg-back vip-cont">
                            <!-- 브론즈 -->
                            <div id="vip-tab-1" class="tab-pane leading-relaxed p-5 active" role="tabpanel" aria-labelledby="vip-1-tab">
                                <div class="flex items-center gap-2 text-xs">
                                    <div class="bronze vip_flag font-bold">브론즈</div>
                                    <span>VIP 2-7</span>
                                </div>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">레벨업 보너스</div>
                                            <p class="text-xs text-basic">총 상금: <span class="text-yellow font-bold">1.04 BCD</span></p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">비</div>
                                            <p class="text-xs text-basic">채팅에서 매우 활동적인 플레이어를 위한 레인 알고리즘 보상.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">코인 드랍</div>
                                            <p class="text-xs text-basic">채팅에서 친구를 위한 코인 드롭을 생성합니다.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- 실버 -->
                            <div id="vip-tab-2" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="vip-2-tab"> 
                                <div class="flex flex-wrap items-center gap-2 text-xs">
                                    <div class="silver vip_flag font-bold">실버</div>
                                    <span>VIP 8-21</span>
                                    <span>* 이전 레벨의 혜택이 모두 포함되어 있습니다.</span>
                                </div>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">레벨업 보너스</div>
                                            <p class="text-xs text-basic">총 상금: <span class="text-yellow font-bold">18.9 BCD</span></p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">팁</div>
                                            <p class="text-xs text-basic">팁을 보내 다른 플레이어에게 감사를 표하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 스핀</div>
                                            <p class="text-xs text-basic">Starting from VIP level 8, you will receive an extra lucky spin with each level-up.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- 골드 -->
                            <div id="vip-tab-3" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="vip-3-tab"> 
                                <div class="flex flex-wrap items-center gap-2 text-xs">
                                    <div class="gold vip_flag font-bold">골드</div>
                                    <span>VIP 22-37</span>
                                    <span>* 이전 레벨의 혜택이 모두 포함되어 있습니다.</span>
                                </div>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">레벨업 보너스</div>
                                            <p class="text-xs text-basic">총 상금: <span class="text-yellow font-bold">204 BCD</span></p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                재충전 
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow text-xs p-3 rounded shadow">
                                                        <p class="text-basic font-normal">
                                                            재충전 비율: 귀하의 비율은 베팅을 기준으로 계산됩니다. 더 많이 걸수록 더 높은 충전률을 얻을 수 있습니다!<br/>
                                                            현재 VIP 재충전 요금 등급:
                                                        </p>
                                                        <div class="bg-back p-3 mt-3">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-tit">등급 1 - Basic <b class="text-sub">(₩1292k - 64600.7k)</b></div>
                                                                <div class="text-yellow font-normal">10%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 2 - Super <b class="text-sub">(₩64602k - 258406.7k)</b></div>
                                                                <div class="text-yellow font-normal">12%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 3 - Mega <b class="text-sub">(₩258641k - 646601.2k)</b></div>
                                                                <div class="text-yellow font-normal">14%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 4 - Epic <b class="text-sub">(₩646602.5k+)</b></div>
                                                                <div class="text-yellow font-normal">16%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">7일 연속으로 <span class="text-yellow font-bold">10-16%</span> 보너스를 활성화하고 청구하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">주간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*5%</span>의 주간 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">월간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*5%</span>의 월별 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                스포츠 주간 캐쉬백
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow p-3 text-basic rounded shadow">
                                                        <ul class="list-disc font-normal pl-3">
                                                            <li>
                                                                7d 스포츠 베팅:<br/>
                                                                $500-$2,499 = $5 보너스<br/>
                                                                $2,500-$4,999 = $30 보너스<br/>
                                                                $5,000-$9,999 = $70 보너스<br/>
                                                                $10,000+ = $150 보너스
                                                            </li>
                                                            <li class="mt-2">배팅 기간 토요일 00:00 ~ 금요일 23:59 (7일)</li>
                                                            <li class="mt-2">우리는 매주 토요일 주간 캐쉬백을 떨어뜨리는 것을 목표로 합니다.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">스포츠 베터를 위한 추가 보상 및 혜택.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 스핀</div>
                                            <p class="text-xs text-basic">Starting from VIP level 8, you will receive an extra lucky spin with each level-up.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- 플래티넘1 -->
                            <div id="vip-tab-4" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="vip-4-tab"> 
                                <div class="flex flex-wrap items-center gap-2 text-xs">
                                    <div class="plat vip_flag font-bold">플래티넘 I</div>
                                    <span>VIP 38-55</span>
                                    <span>* 이전 레벨의 혜택이 모두 포함되어 있습니다.</span>
                                </div>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">레벨업 보너스</div>
                                            <p class="text-xs text-basic">총 상금: <span class="text-yellow font-bold">1905 BCD</span></p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                재충전 
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow text-xs p-3 rounded shadow">
                                                        <p class="text-basic font-normal">
                                                            재충전 비율: 귀하의 비율은 베팅을 기준으로 계산됩니다. 더 많이 걸수록 더 높은 충전률을 얻을 수 있습니다!<br/>
                                                            현재 VIP 재충전 요금 등급:
                                                        </p>
                                                        <div class="bg-back p-3 mt-3">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-tit">등급 1 - Basic <b class="text-sub">(₩1293.7k - 64687.4k)</b></div>
                                                                <div class="text-yellow font-normal">12%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 2 - Super <b class="text-sub">(₩64662.5k - 258648.7k)</b></div>
                                                                <div class="text-yellow font-normal">14%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 3 - Mega <b class="text-sub">(₩258650k - 646623.7k)</b></div>
                                                                <div class="text-yellow font-normal">16%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 4 - Epic <b class="text-sub">(₩646625k+)</b></div>
                                                                <div class="text-yellow font-normal">18%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">7일 연속으로 <span class="text-yellow font-bold">12-18%</span> 보너스를 활성화하고 청구하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">주간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*8%</span>의 주간 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">월간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*3.5%</span>의 월별 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                스포츠 주간 캐쉬백
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow p-3 text-basic rounded shadow">
                                                        <ul class="list-disc font-normal pl-3">
                                                            <li>
                                                                7d 스포츠 베팅:<br/>
                                                                $500-$2,499 = $5 보너스<br/>
                                                                $2,500-$4,999 = $30 보너스<br/>
                                                                $5,000-$9,999 = $70 보너스<br/>
                                                                $10,000+ = $150 보너스
                                                            </li>
                                                            <li class="mt-2">배팅 기간 토요일 00:00 ~ 금요일 23:59 (7일)</li>
                                                            <li class="mt-2">우리는 매주 토요일 주간 캐쉬백을 떨어뜨리는 것을 목표로 합니다.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">스포츠 베터를 위한 추가 보상 및 혜택.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 호스트</div>
                                            <p class="text-xs text-basic">주문형 서비스와 독점 혜택을 즐기십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">수수료없는 출금</div>
                                            <p class="text-xs text-basic">제로 수수료로 원활한 인출.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 스핀</div>
                                            <p class="text-xs text-basic">Starting from VIP level 8, you will receive an extra lucky spin with each level-up.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- 플래티넘2 -->
                            <div id="vip-tab-5" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="vip-5-tab"> 
                                <div class="flex flex-wrap items-center gap-2 text-xs">
                                    <div class="plat vip_flag font-bold">플래티넘 II</div>
                                    <span>VIP 56-69</span>
                                    <span>* 이전 레벨의 혜택이 모두 포함되어 있습니다.</span>
                                </div>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">레벨업 보너스</div>
                                            <p class="text-xs text-basic">총 상금: <span class="text-yellow font-bold">5850 BCD</span></p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                재충전 
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow text-xs p-3 rounded shadow">
                                                        <p class="text-basic font-normal">
                                                            재충전 비율: 귀하의 비율은 베팅을 기준으로 계산됩니다. 더 많이 걸수록 더 높은 충전률을 얻을 수 있습니다!<br/>
                                                            현재 VIP 재충전 요금 등급:
                                                        </p>
                                                        <div class="bg-back p-3 mt-3">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-tit">등급 1 - Basic <b class="text-sub">(₩1293.2k - 64661.9k)</b></div>
                                                                <div class="text-yellow font-normal">14%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 2 - Super <b class="text-sub">(₩64663.2k - 258651.6k)</b></div>
                                                                <div class="text-yellow font-normal">16%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 3 - Mega <b class="text-sub">(₩258652.9k - 646630.9k)</b></div>
                                                                <div class="text-yellow font-normal">18%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 4 - Epic <b class="text-sub">(₩646632.2k+)</b></div>
                                                                <div class="text-yellow font-normal">20%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">7일 연속으로 <span class="text-yellow font-bold">14-20%</span> 보너스를 활성화하고 청구하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">주간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*8%</span>의 주간 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">월간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*4%</span>의 월별 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                스포츠 주간 캐쉬백
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow p-3 text-basic rounded shadow">
                                                        <ul class="list-disc font-normal pl-3">
                                                            <li>
                                                                7d 스포츠 베팅:<br/>
                                                                $500-$2,499 = $5 보너스<br/>
                                                                $2,500-$4,999 = $30 보너스<br/>
                                                                $5,000-$9,999 = $70 보너스<br/>
                                                                $10,000+ = $150 보너스
                                                            </li>
                                                            <li class="mt-2">배팅 기간 토요일 00:00 ~ 금요일 23:59 (7일)</li>
                                                            <li class="mt-2">우리는 매주 토요일 주간 캐쉬백을 떨어뜨리는 것을 목표로 합니다.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">스포츠 베터를 위한 추가 보상 및 혜택.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 호스트</div>
                                            <p class="text-xs text-basic">주문형 서비스와 독점 혜택을 즐기십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">수수료없는 출금</div>
                                            <p class="text-xs text-basic">제로 수수료로 원활한 인출.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 스핀</div>
                                            <p class="text-xs text-basic">Starting from VIP level 8, you will receive an extra lucky spin with each level-up.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- 다이아1 -->
                            <div id="vip-tab-6" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="vip-6-tab"> 
                                <div class="flex flex-wrap items-center gap-2 text-xs">
                                    <div class="dia vip_flag font-bold">다이아몬드 I</div>
                                    <span>SVIP 1-15</span>
                                    <span>* 이전 레벨의 혜택이 모두 포함되어 있습니다.</span>
                                </div>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">레벨업 보너스</div>
                                            <p class="text-xs text-basic">총 상금: <span class="text-yellow font-bold">30600 BCD</span></p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                재충전 
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow text-xs p-3 rounded shadow">
                                                        <p class="text-basic font-normal">
                                                            재충전 비율: 귀하의 비율은 베팅을 기준으로 계산됩니다. 더 많이 걸수록 더 높은 충전률을 얻을 수 있습니다!<br/>
                                                            현재 VIP 재충전 요금 등급:
                                                        </p>
                                                        <div class="bg-back p-3 mt-3">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-tit">등급 1 - Basic <b class="text-sub">(₩1293.5k - 64674.9k)</b></div>
                                                                <div class="text-yellow font-normal">16%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 2 - Super <b class="text-sub">(₩64676.2k - 258703.7k)</b></div>
                                                                <div class="text-yellow font-normal">18%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 3 - Mega <b class="text-sub">(₩258705k - 646761.2k)</b></div>
                                                                <div class="text-yellow font-normal">20%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 4 - Epic <b class="text-sub">(₩646762.5k+)</b></div>
                                                                <div class="text-yellow font-normal">22%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">7일 연속으로 <span class="text-yellow font-bold">16-22%</span> 보너스를 활성화하고 청구하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">주간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*8%</span>의 주간 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">월간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*5%</span>의 월별 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                스포츠 주간 캐쉬백
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow p-3 text-basic rounded shadow">
                                                        <ul class="list-disc font-normal pl-3">
                                                            <li>
                                                                7d 스포츠 베팅:<br/>
                                                                $500-$2,499 = $5 보너스<br/>
                                                                $2,500-$4,999 = $30 보너스<br/>
                                                                $5,000-$9,999 = $70 보너스<br/>
                                                                $10,000+ = $150 보너스
                                                            </li>
                                                            <li class="mt-2">배팅 기간 토요일 00:00 ~ 금요일 23:59 (7일)</li>
                                                            <li class="mt-2">우리는 매주 토요일 주간 캐쉬백을 떨어뜨리는 것을 목표로 합니다.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">스포츠 베터를 위한 추가 보상 및 혜택.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">독점 SVIP 패키지</div>
                                            <p class="text-xs text-basic">다이아몬드 VIP로서 상상할 수 없는 놀라움을 발견하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">럭셔리 깁어웨이</div>
                                            <p class="text-xs text-basic">놀라운 놀라움을 얻을 수 있는 독점적인 기회에 참여하세요.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 스핀</div>
                                            <p class="text-xs text-basic">Starting from VIP level 8, you will receive an extra lucky spin with each level-up.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- 다이아2 -->
                            <div id="vip-tab-7" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="vip-7-tab"> 
                                <div class="flex flex-wrap items-center gap-2 text-xs">
                                    <div class="dia vip_flag font-bold">다이아몬드 II</div>
                                    <span>SVIP 16-37</span>
                                    <span>* 이전 레벨의 혜택이 모두 포함되어 있습니다.</span>
                                </div>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">레벨업 보너스</div>
                                            <p class="text-xs text-basic">총 상금: <span class="text-yellow font-bold">297800 BCD</span></p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                재충전 
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow text-xs p-3 rounded shadow">
                                                        <p class="text-basic font-normal">
                                                            재충전 비율: 귀하의 비율은 베팅을 기준으로 계산됩니다. 더 많이 걸수록 더 높은 충전률을 얻을 수 있습니다!<br/>
                                                            현재 VIP 재충전 요금 등급:
                                                        </p>
                                                        <div class="bg-back p-3 mt-3">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-tit">등급 1 - Basic <b class="text-sub">(₩1293.5k - 64674.9k)</b></div>
                                                                <div class="text-yellow font-normal">18%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 2 - Super <b class="text-sub">(₩64676.2k - 258703.7k)</b></div>
                                                                <div class="text-yellow font-normal">20%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 3 - Mega <b class="text-sub">(₩258705k - 646761.2k)</b></div>
                                                                <div class="text-yellow font-normal">22%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 4 - Epic <b class="text-sub">(₩646762.5k+)</b></div>
                                                                <div class="text-yellow font-normal">24%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">7일 연속으로 <span class="text-yellow font-bold">18-24%</span> 보너스를 활성화하고 청구하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">주간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*8%</span>의 주간 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">월간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*5%</span>의 월별 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                스포츠 주간 캐쉬백
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow p-3 text-basic rounded shadow">
                                                        <ul class="list-disc font-normal pl-3">
                                                            <li>
                                                                7d 스포츠 베팅:<br/>
                                                                $500-$2,499 = $5 보너스<br/>
                                                                $2,500-$4,999 = $30 보너스<br/>
                                                                $5,000-$9,999 = $70 보너스<br/>
                                                                $10,000+ = $150 보너스
                                                            </li>
                                                            <li class="mt-2">배팅 기간 토요일 00:00 ~ 금요일 23:59 (7일)</li>
                                                            <li class="mt-2">우리는 매주 토요일 주간 캐쉬백을 떨어뜨리는 것을 목표로 합니다.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">스포츠 베터를 위한 추가 보상 및 혜택.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">독점 SVIP 패키지</div>
                                            <p class="text-xs text-basic">다이아몬드 VIP로서 상상할 수 없는 놀라움을 발견하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">럭셔리 깁어웨이</div>
                                            <p class="text-xs text-basic">놀라운 놀라움을 얻을 수 있는 독점적인 기회에 참여하세요.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 스핀</div>
                                            <p class="text-xs text-basic">Starting from VIP level 8, you will receive an extra lucky spin with each level-up.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- 다이아3 -->
                            <div id="vip-tab-8" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="vip-8-tab"> 
                                <div class="flex flex-wrap items-center gap-2 text-xs">
                                    <div class="dia vip_flag font-bold">다이아몬드 III</div>
                                    <span>SVIP 38-55</span>
                                    <span>* 이전 레벨의 혜택이 모두 포함되어 있습니다.</span>
                                </div>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">레벨업 보너스</div>
                                            <p class="text-xs text-basic">총 상금: <span class="text-yellow font-bold">1462000 BCD</span></p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                재충전 
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow text-xs p-3 rounded shadow">
                                                        <p class="text-basic font-normal">
                                                            재충전 비율: 귀하의 비율은 베팅을 기준으로 계산됩니다. 더 많이 걸수록 더 높은 충전률을 얻을 수 있습니다!<br/>
                                                            현재 VIP 재충전 요금 등급:
                                                        </p>
                                                        <div class="bg-back p-3 mt-3">
                                                            <div class="flex items-center justify-between">
                                                                <div class="text-tit">등급 1 - Basic <b class="text-sub">(₩1293.5k - 64674.9k)</b></div>
                                                                <div class="text-yellow font-normal">20%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 2 - Super <b class="text-sub">(₩64676.2k - 258703.7k)</b></div>
                                                                <div class="text-yellow font-normal">22%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 3 - Mega <b class="text-sub">(₩258705k - 646761.2k)</b></div>
                                                                <div class="text-yellow font-normal">24%</div>
                                                            </div>
                                                            <div class="flex items-center justify-between mt-2">
                                                                <div class="text-tit">등급 4 - Epic <b class="text-sub">(₩646762.5k+)</b></div>
                                                                <div class="text-yellow font-normal">25%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">7일 연속으로 <span class="text-yellow font-bold">20-25%</span> 보너스를 활성화하고 청구하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">주간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*8%</span>의 주간 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">월간 캐쉬백</div>
                                            <p class="text-xs text-basic">베팅 금액을 기준으로 대략 <span class="text-yellow font-bold">롤링*1%*5%</span>의 월별 보너스를 받으십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="flex items-center gap-2 text-tit font-bold">
                                                스포츠 주간 캐쉬백
                                                <div class="relative hover_box">
                                                    <button class="basic-hover pt-1 cursor-pointer"><svg class="w-4 h-4"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg></button>
                                                    <div class="absolute left-0 bottom-full w-[350px] -translate-x-1/2 bg-shadow p-3 text-basic rounded shadow">
                                                        <ul class="list-disc font-normal pl-3">
                                                            <li>
                                                                7d 스포츠 베팅:<br/>
                                                                $500-$2,499 = $5 보너스<br/>
                                                                $2,500-$4,999 = $30 보너스<br/>
                                                                $5,000-$9,999 = $70 보너스<br/>
                                                                $10,000+ = $150 보너스
                                                            </li>
                                                            <li class="mt-2">배팅 기간 토요일 00:00 ~ 금요일 23:59 (7일)</li>
                                                            <li class="mt-2">우리는 매주 토요일 주간 캐쉬백을 떨어뜨리는 것을 목표로 합니다.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-basic">스포츠 베터를 위한 추가 보상 및 혜택.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">독점 SVIP 패키지</div>
                                            <p class="text-xs text-basic">다이아몬드 VIP로서 상상할 수 없는 놀라움을 발견하십시오.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">럭셔리 깁어웨이</div>
                                            <p class="text-xs text-basic">놀라운 놀라움을 얻을 수 있는 독점적인 기회에 참여하세요.</p>
                                        </div>
                                    </li>
                                    <li class="flex items-center gap-3 border border-solid border-opacity-50 border-slate-300 p-3 rounded">
                                        <i class="flex-shrink-0 rounded-full border border-solid border-slate-300 dark:border-slate-400 bg-opacity-100 dark:bg-opacity-30 bg-white dark:bg-slate-400 p-1"><img class="w-14 h-14" src="./dist/custom_img/profile/lock.png" alt=""></i>
                                        <div>
                                            <div class="text-tit font-bold">VIP 스핀</div>
                                            <p class="text-xs text-basic">Starting from VIP level 8, you will receive an extra lucky spin with each level-up.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <button class="btn mt-6 border-slate-300 w-full h-12 text-primary"> BC.GAME’s VIP 시스템에 대하여 더 알아보세요.</button>
                </div>
                

            </div>
        </div>
    </div>
</div>

<!-- 프로필 - vip 클럽 - vip 레벨 시스템 -->
<div id="profile_vip_level-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-modaldark relative rounded">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center gap-2">
                        <button data-tw-dismiss="modal" data-tw-toggle="modal" data-tw-target="#profile_vip-modal"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">VIP 레벨 시스템</p>
                    </div>
                    <button class="basic-hover" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px]">
                    <!-- 브론즈 -->
                    <div class="py-2 vip-info bg-slate-200 dark:bg-back2 rounded">
                        <div class="flex justify-between cursor-pointer on" onclick="vipLevelHandle(this)">
                            <div class="vip-cont flex items-center gap-2">
                                <div class="vip_flag small bronze w-7 "></div>
                                <p class="text-tit font-bold">브론즈 VIP 2-7</p>
                            </div>
                            <i class="p-2"><svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </div>
                        <div class="overflow-hidden open">
                            <table class="table table-sm table-striped noline rounded"> 
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">레벨</th> 
                                        <th class="whitespace-nowrap text-center">XP 요구됨</th> 
                                        <th class="whitespace-nowrap text-right">레벨업 보너스 (BCD)</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/bronze_medal.png" alt="">VIP 2</td>
                                        <td class="text-center">100</td> 
                                        <td class="text-right text-tit">0.04</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/bronze_medal.png" alt="">VIP 3</td>
                                        <td class="text-center">200</td> 
                                        <td class="text-right text-tit">0.05</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/bronze_medal.png" alt="">VIP 4</td>
                                        <td class="text-center">1000</td> 
                                        <td class="text-right text-tit">0.1</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/bronze_medal.png" alt="">VIP 5</td>
                                        <td class="text-center">2000</td> 
                                        <td class="text-right text-tit">0.2</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/bronze_medal.png" alt="">VIP 6</td>
                                        <td class="text-center">3000</td> 
                                        <td class="text-right text-tit">0.3</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/bronze_medal.png" alt="">VIP 7</td>
                                        <td class="text-center">4000</td> 
                                        <td class="text-right text-tit">0.35</td> 
                                    </tr> 
                                </tbody> 
                            </table> 
                        </div>
                    </div>
                    <!-- 실버 -->
                    <div class="py-2 vip-info mt-3 bg-slate-200 dark:bg-back2 rounded">
                        <div class="flex justify-between cursor-pointer" onclick="vipLevelHandle(this)">
                            <div class="vip-cont flex items-center gap-2">
                                <div class="vip_flag small silver w-7 "></div>
                                <p class="text-tit font-bold">실버 VIP 8-21</p>
                            </div>
                            <i class="p-2"><svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </div>
                        <div class="overflow-hidden">
                            <table class="table table-sm table-striped noline rounded"> 
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">레벨</th> 
                                        <th class="whitespace-nowrap text-center">XP 요구됨</th> 
                                        <th class="whitespace-nowrap text-right">레벨업 보너스 (BCD)</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 8</td>
                                        <td class="text-center">5000</td> 
                                        <td class="text-right text-tit">0.7</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 9</td>
                                        <td class="text-center">7000</td> 
                                        <td class="text-right text-tit">0.8</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 10</td>
                                        <td class="text-center">9000</td> 
                                        <td class="text-right text-tit">0.9</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 11</td>
                                        <td class="text-center">11000</td> 
                                        <td class="text-right text-tit">1</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 12</td>
                                        <td class="text-center">13000</td> 
                                        <td class="text-right text-tit">1.1</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 13</td>
                                        <td class="text-center">15000</td> 
                                        <td class="text-right text-tit">1.2</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 14</td>
                                        <td class="text-center">17000</td> 
                                        <td class="text-right text-tit">1.3</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 15</td>
                                        <td class="text-center">21000</td> 
                                        <td class="text-right text-tit">1.4</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 16</td>
                                        <td class="text-center">25000</td> 
                                        <td class="text-right text-tit">1.5</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 17</td>
                                        <td class="text-center">29000</td> 
                                        <td class="text-right text-tit">1.6</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 18</td>
                                        <td class="text-center">33000</td> 
                                        <td class="text-right text-tit">1.7</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 19</td>
                                        <td class="text-center">37000</td> 
                                        <td class="text-right text-tit">1.8</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 20</td>
                                        <td class="text-center">41000</td> 
                                        <td class="text-right text-tit">1.9</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/silver_medal.png" alt="">VIP 21</td>
                                        <td class="text-center">45000</td> 
                                        <td class="text-right text-tit">2</td> 
                                    </tr> 
                                </tbody> 
                            </table> 
                        </div>

                    </div>
                    <!-- 골드 -->
                    <div class="py-2 vip-info mt-3 bg-slate-200 dark:bg-back2 rounded">
                        <div class="flex justify-between cursor-pointer" onclick="vipLevelHandle(this)">
                            <div class="vip-cont flex items-center gap-2">
                                <div class="vip_flag small gold w-7 "></div>
                                <p class="text-tit font-bold">골드 VIP 22-37</p>
                            </div>
                            <i class="p-2"><svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </div>
                        <div class="overflow-hidden">
                            <table class="table table-sm table-striped noline rounded"> 
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">레벨</th> 
                                        <th class="whitespace-nowrap text-center">XP 요구됨</th> 
                                        <th class="whitespace-nowrap text-right">레벨업 보너스 (BCD)</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 22</td>
                                        <td class="text-center">49000</td> 
                                        <td class="text-right text-tit">3</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 23</td>
                                        <td class="text-center">59000</td> 
                                        <td class="text-right text-tit">4</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 24</td>
                                        <td class="text-center">69000</td> 
                                        <td class="text-right text-tit">5</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 25</td>
                                        <td class="text-center">79000</td> 
                                        <td class="text-right text-tit">6</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 26</td>
                                        <td class="text-center">89000</td> 
                                        <td class="text-right text-tit">7</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 27</td>
                                        <td class="text-center">99000</td> 
                                        <td class="text-right text-tit">8</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 28</td>
                                        <td class="text-center">109000</td> 
                                        <td class="text-right text-tit">9</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 29</td>
                                        <td class="text-center">119000</td> 
                                        <td class="text-right text-tit">10</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 30</td>
                                        <td class="text-center">129000</td> 
                                        <td class="text-right text-tit">12</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 31</td>
                                        <td class="text-center">153000</td> 
                                        <td class="text-right text-tit">14</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 32</td>
                                        <td class="text-center">177000</td> 
                                        <td class="text-right text-tit">16</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 33</td>
                                        <td class="text-center">201000</td> 
                                        <td class="text-right text-tit">18</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 34</td>
                                        <td class="text-center">225000</td> 
                                        <td class="text-right text-tit">20</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 35</td>
                                        <td class="text-center">249000</td> 
                                        <td class="text-right text-tit">22</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 36</td>
                                        <td class="text-center">273000</td> 
                                        <td class="text-right text-tit">24</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/gold_medal.webp" alt="">VIP 37</td>
                                        <td class="text-center">297000</td> 
                                        <td class="text-right text-tit">26</td> 
                                    </tr> 
                                </tbody> 
                            </table> 
                        </div>

                    </div>
                    <!-- 플래티넘 1 -->
                    <div class="py-2 vip-info mt-3 bg-slate-200 dark:bg-back2 rounded">
                        <div class="flex justify-between cursor-pointer" onclick="vipLevelHandle(this)">
                            <div class="vip-cont flex items-center gap-2">
                                <div class="vip_flag small plat w-7 "></div>
                                <p class="text-tit font-bold">플래티넘 I VIP 38-55</p>
                            </div>
                            <i class="p-2"><svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </div>
                        <div class="overflow-hidden">
                            <table class="table table-sm table-striped noline rounded"> 
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">레벨</th> 
                                        <th class="whitespace-nowrap text-center">XP 요구됨</th> 
                                        <th class="whitespace-nowrap text-right">레벨업 보너스 (BCD)</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 38</td>
                                        <td class="text-center">321000</td> 
                                        <td class="text-right text-tit">30</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 39</td>
                                        <td class="text-center">377000</td> 
                                        <td class="text-right text-tit">35</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 40</td>
                                        <td class="text-center">433000</td> 
                                        <td class="text-right text-tit">40</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 41</td>
                                        <td class="text-center">489000</td> 
                                        <td class="text-right text-tit">50</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 42</td>
                                        <td class="text-center">545000</td> 
                                        <td class="text-right text-tit">60</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 43</td>
                                        <td class="text-center">601000</td> 
                                        <td class="text-right text-tit">70</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 44</td>
                                        <td class="text-center">657000</td> 
                                        <td class="text-right text-tit">80</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 45</td>
                                        <td class="text-center">713000</td> 
                                        <td class="text-right text-tit">90</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 46</td>
                                        <td class="text-center">769000</td> 
                                        <td class="text-right text-tit">100</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 47</td>
                                        <td class="text-center">897000</td> 
                                        <td class="text-right text-tit">110</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 48</td>
                                        <td class="text-center">1025000</td> 
                                        <td class="text-right text-tit">120</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 49</td>
                                        <td class="text-center">1153000</td> 
                                        <td class="text-right text-tit">130</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 50</td>
                                        <td class="text-center">1281000</td> 
                                        <td class="text-right text-tit">140</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 51</td>
                                        <td class="text-center">1409000</td> 
                                        <td class="text-right text-tit">150</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 52</td>
                                        <td class="text-center">1537000</td> 
                                        <td class="text-right text-tit">160</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 53</td>
                                        <td class="text-center">1665000</td> 
                                        <td class="text-right text-tit">170</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 54</td>
                                        <td class="text-center">1793000</td> 
                                        <td class="text-right text-tit">180</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 55</td>
                                        <td class="text-center">2081000</td> 
                                        <td class="text-right text-tit">190</td> 
                                    </tr>
                                </tbody> 
                            </table> 
                        </div>

                    </div>
                    <!-- 플래티넘 2 -->
                    <div class="py-2 vip-info mt-3 bg-slate-200 dark:bg-back2 rounded">
                        <div class="flex justify-between cursor-pointer" onclick="vipLevelHandle(this)">
                            <div class="vip-cont flex items-center gap-2">
                                <div class="vip_flag small plat w-7 "></div>
                                <p class="text-tit font-bold">플래티넘 II VIP 56-69</p>
                            </div>
                            <i class="p-2"><svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </div>
                        <div class="overflow-hidden">
                            <table class="table table-sm table-striped noline rounded"> 
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">레벨</th> 
                                        <th class="whitespace-nowrap text-center">XP 요구됨</th> 
                                        <th class="whitespace-nowrap text-right">레벨업 보너스 (BCD)</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 56</td>
                                        <td class="text-center">2369000</td> 
                                        <td class="text-right text-tit">200</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 57</td>
                                        <td class="text-center">2657000</td> 
                                        <td class="text-right text-tit">220</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 58</td>
                                        <td class="text-center">2945000</td> 
                                        <td class="text-right text-tit">240</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 59</td>
                                        <td class="text-center">3233000</td> 
                                        <td class="text-right text-tit">260</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 60</td>
                                        <td class="text-center">3521000</td> 
                                        <td class="text-right text-tit">280</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 61</td>
                                        <td class="text-center">3809000</td> 
                                        <td class="text-right text-tit">300</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 62</td>
                                        <td class="text-center">4097000</td> 
                                        <td class="text-right text-tit">350</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 63</td>
                                        <td class="text-center">4737000</td> 
                                        <td class="text-right text-tit">400</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 64</td>
                                        <td class="text-center">5377000</td> 
                                        <td class="text-right text-tit">450</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 65</td>
                                        <td class="text-center">6017000</td> 
                                        <td class="text-right text-tit">500</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 66</td>
                                        <td class="text-center">6657000</td> 
                                        <td class="text-right text-tit">550</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 67</td>
                                        <td class="text-center">7297000</td> 
                                        <td class="text-right text-tit">600</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 68</td>
                                        <td class="text-center">7937000</td> 
                                        <td class="text-right text-tit">700</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/platinum_medal.png" alt="">VIP 69</td>
                                        <td class="text-center">8577000</td> 
                                        <td class="text-right text-tit">800</td> 
                                    </tr>
                                </tbody> 
                            </table> 
                        </div>

                    </div>
                    <!-- 다이아몬드 1 -->
                    <div class="py-2 vip-info mt-3 bg-slate-200 dark:bg-back2 rounded">
                        <div class="flex justify-between cursor-pointer" onclick="vipLevelHandle(this)">
                            <div class="vip-cont flex items-center gap-2">
                                <div class="vip_flag small dia w-7 "></div>
                                <p class="text-tit font-bold">다이아몬드 I SVIP 1-15</p>
                            </div>
                            <i class="p-2"><svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </div>
                        <div class="overflow-hidden">
                            <table class="table table-sm table-striped noline rounded"> 
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">레벨</th> 
                                        <th class="whitespace-nowrap text-center">XP 요구됨</th> 
                                        <th class="whitespace-nowrap text-right">레벨업 보너스 (BCD)</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 1</td>
                                        <td class="text-center">9217000</td> 
                                        <td class="text-right text-tit">1200</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 2</td>
                                        <td class="text-center">10625000</td> 
                                        <td class="text-right text-tit">1300</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 3</td>
                                        <td class="text-center">12033000</td> 
                                        <td class="text-right text-tit">1400</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 4</td>
                                        <td class="text-center">13441000</td> 
                                        <td class="text-right text-tit">1500</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 5</td>
                                        <td class="text-center">14849000</td> 
                                        <td class="text-right text-tit">1600</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 6</td>
                                        <td class="text-center">16257000</td> 
                                        <td class="text-right text-tit">1700</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 7</td>
                                        <td class="text-center">17665000</td> 
                                        <td class="text-right text-tit">1800</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 8</td>
                                        <td class="text-center">19073000</td> 
                                        <td class="text-right text-tit">2000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 9</td>
                                        <td class="text-center">20481000</td> 
                                        <td class="text-right text-tit">2200</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 10</td>
                                        <td class="text-center">23553000</td> 
                                        <td class="text-right text-tit">2300</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 11</td>
                                        <td class="text-center">26625000</td> 
                                        <td class="text-right text-tit">2500</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 12</td>
                                        <td class="text-center">29697000</td> 
                                        <td class="text-right text-tit">2600</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 13</td>
                                        <td class="text-center">32769000</td> 
                                        <td class="text-right text-tit">2700</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 14</td>
                                        <td class="text-center">35841000</td> 
                                        <td class="text-right text-tit">2800</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 15</td>
                                        <td class="text-center">38913000</td> 
                                        <td class="text-right text-tit">3000</td> 
                                    </tr>
                                </tbody> 
                            </table> 
                        </div>

                    </div>
                    <!-- 다이아몬드 2 -->
                    <div class="py-2 vip-info mt-3 bg-slate-200 dark:bg-back2 rounded">
                        <div class="flex justify-between cursor-pointer" onclick="vipLevelHandle(this)">
                            <div class="vip-cont flex items-center gap-2">
                                <div class="vip_flag small dia w-7 "></div>
                                <p class="text-tit font-bold">다이아몬드 II SVIP 16-37</p>
                            </div>
                            <i class="p-2"><svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </div>
                        <div class="overflow-hidden">
                            <table class="table table-sm table-striped noline rounded"> 
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">레벨</th> 
                                        <th class="whitespace-nowrap text-center">XP 요구됨</th> 
                                        <th class="whitespace-nowrap text-right">레벨업 보너스 (BCD)</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 16</td>
                                        <td class="text-center">41985000</td> 
                                        <td class="text-right text-tit">3200</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 17</td>
                                        <td class="text-center">45057000</td> 
                                        <td class="text-right text-tit">3600</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 18</td>
                                        <td class="text-center">51713000</td> 
                                        <td class="text-right text-tit">4000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 19</td>
                                        <td class="text-center">58369000</td> 
                                        <td class="text-right text-tit">4500</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 20</td>
                                        <td class="text-center">65025000</td> 
                                        <td class="text-right text-tit">5000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 21</td>
                                        <td class="text-center">71681000</td> 
                                        <td class="text-right text-tit">5500</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 22</td>
                                        <td class="text-center">78337000</td> 
                                        <td class="text-right text-tit">6000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 23</td>
                                        <td class="text-center">84993000</td> 
                                        <td class="text-right text-tit">7000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 24</td>
                                        <td class="text-center">91649000</td> 
                                        <td class="text-right text-tit">8000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 25</td>
                                        <td class="text-center">98305000</td> 
                                        <td class="text-right text-tit">9000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 26</td>
                                        <td class="text-center">112641000</td> 
                                        <td class="text-right text-tit">10000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 27</td>
                                        <td class="text-center">126977000</td> 
                                        <td class="text-right text-tit">11000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 28</td>
                                        <td class="text-center">141313000</td> 
                                        <td class="text-right text-tit">12000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 29</td>
                                        <td class="text-center">155649000</td> 
                                        <td class="text-right text-tit">13000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 30</td>
                                        <td class="text-center">169985000</td> 
                                        <td class="text-right text-tit">15000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 31</td>
                                        <td class="text-center">184321000</td> 
                                        <td class="text-right text-tit">18000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 32</td>
                                        <td class="text-center">198657000</td> 
                                        <td class="text-right text-tit">20000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 33</td>
                                        <td class="text-center">212993000</td> 
                                        <td class="text-right text-tit">23000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 34</td>
                                        <td class="text-center">243713000</td> 
                                        <td class="text-right text-tit">26000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 35</td>
                                        <td class="text-center">274433000</td> 
                                        <td class="text-right text-tit">28000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 36</td>
                                        <td class="text-center">305153000</td> 
                                        <td class="text-right text-tit">31000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 37</td>
                                        <td class="text-center">335873000</td> 
                                        <td class="text-right text-tit">35000</td> 
                                    </tr>
                                </tbody> 
                            </table> 
                        </div>

                    </div>
                    <!-- 다이아몬드 3 -->
                    <div class="py-2 vip-info mt-3 bg-slate-200 dark:bg-back2 rounded">
                        <div class="flex justify-between cursor-pointer" onclick="vipLevelHandle(this)">
                            <div class="vip-cont flex items-center gap-2">
                                <div class="vip_flag small dia w-7 "></div>
                                <p class="text-tit font-bold">다이아몬드 III SVIP 38-55</p>
                            </div>
                            <i class="p-2"><svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </div>
                        <div class="overflow-hidden">
                            <table class="table table-sm table-striped noline rounded">
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">레벨</th> 
                                        <th class="whitespace-nowrap text-center">XP 요구됨</th> 
                                        <th class="whitespace-nowrap text-right">레벨업 보너스 (BCD)</th> 
                                    </tr> 
                                </thead> 
                                <tbody>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 38</td>
                                        <td class="text-center">366593000</td> 
                                        <td class="text-right text-tit">38000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 39</td>
                                        <td class="text-center">397313000</td> 
                                        <td class="text-right text-tit">40000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 40</td>
                                        <td class="text-center">428033000</td> 
                                        <td class="text-right text-tit">42000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 41</td>
                                        <td class="text-center">458753000</td> 
                                        <td class="text-right text-tit">45000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 42</td>
                                        <td class="text-center">524289000</td> 
                                        <td class="text-right text-tit">48000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 43</td>
                                        <td class="text-center">589825000</td> 
                                        <td class="text-right text-tit">50000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 44</td>
                                        <td class="text-center">655361000</td> 
                                        <td class="text-right text-tit">53000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 45</td>
                                        <td class="text-center">720897000</td> 
                                        <td class="text-right text-tit">56000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 46</td>
                                        <td class="text-center">786433000</td> 
                                        <td class="text-right text-tit">60000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 47</td>
                                        <td class="text-center">851969000</td> 
                                        <td class="text-right text-tit">65000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 48</td>
                                        <td class="text-center">917505000</td> 
                                        <td class="text-right text-tit">70000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 49</td>
                                        <td class="text-center">983041000</td> 
                                        <td class="text-right text-tit">75000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 50</td>
                                        <td class="text-center">1122305000</td> 
                                        <td class="text-right text-tit">80000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 51</td>
                                        <td class="text-center">1261569000</td> 
                                        <td class="text-right text-tit">90000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 52</td>
                                        <td class="text-center">1400833000</td> 
                                        <td class="text-right text-tit">100000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 53</td>
                                        <td class="text-center">1540097000</td> 
                                        <td class="text-right text-tit">120000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 54</td>
                                        <td class="text-center">1679361000</td> 
                                        <td class="text-right text-tit">180000</td> 
                                    </tr>
                                    <tr class="rounded">
                                        <td class="text-left"><img class="w-4 h-4 inline-flex items-center mr-1" src="./dist/custom_img/profile/diamond_medal.webp" alt="">SVIP 55</td>
                                        <td class="text-center">1818625000</td> 
                                        <td class="text-right text-tit">250000</td> 
                                    </tr>
                                </tbody> 
                            </table> 
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 프로필 - 추천 그리고 보상 -->
<div id="profile_reward-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-head">
                <div class="flex items-center justify-between p-4">
                    <p class="text-tit font-extrabold text-base">친구 추천하기</p>
                    <button class="basic-hover" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
            </div>
            <div class="modal-body rounded overflow-hidden dark:bg-back2 bg-white">
                <div class="p-5">
                    <div class="flex items-center gap-4 bg-gradient-green h-40">
                        <img class="w-1/3" src="./dist/custom_img/profile/refer.webp" alt="">
                        <div class="text-tit text-lg font-extrabold text-left">
                            <p>친구를 초대하고</p>
                            <p><b class="text-2xl text-yellow">1,290,905 KRW</b> + <span class="text-2xl font-extrabold text-primary">15</span></p>
                            <p>커미션 받기</p>
                        </div>
                    </div>
                    <div class="my-2 text-center">
                        <a href="javascript:;" class="text-sub underline">더 알아보기</a>
                    </div>
                    <div class="p-3 text-left">
                        <p class="pl-4">당신의 추천인 링크를 공유하세요:</p>
                        <div class="border border-solid border-slate-300 bg-white dark:bg-back2 mt-2 p-2 flex items-center justify-center">
                            <input type="text" class="form-control form-control-rounded !bg-transparent" disabled value="https://bc.game/i-uoqapt06-k/">
                            <button class="w-28 h-9 border-none text-tit bg-slate-300 rounded font-extrabold">링크복사</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<!-- 프로필 - 유저정보 -->
<div id="profile_info-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            <!-- 유저정보 -->
            <div class="modal-body bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4">
                    <p class="text-tit font-extrabold text-base">유저정보</p>
                    <!-- vip-bat 클래스 : bronze silver gold plat dia -->
                    <div class="vip-bat plat absolute right-14 top-0 text-center">
                        <span class="text-white font-extrabold">V38</span>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px]">

                    <div class="relative pb-8 text-center">
                        <div class="absolute left-0 top-0 flex text-tit gap-2 bg-white dark:bg-back p-1.5 px-3 rounded">
                            <svg class="w-5 h-5 fill-place fill-red"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Like"></use></svg>
                            51
                        </div>
                        <div class="overflow-hidden w-[70px] mx-auto rounded-full border-2 border-solid border-slate-300">
                            <img src="./dist/custom_img/profile_img.png" alt="">
                        </div>
                        <div class="mt-2 text-tit text-xl font-bold">Tauruz🐂</div>
                        <div class="mt-1 text-basic cursor-pointer" onclick="viewAlert('copy_alert')">사용자 ID: 832483</div>
                    </div>

                    <!-- 메달 -->
                    <div class="p-3 mt-2 bg-white dark:bg-back rounded">
                        <div class="flex justify-between items-center p-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Medal"></use></svg>
                                <p class="text-tit font-bold">메달 2</p>
                            </div>
                            <button class="flex gap-1 items-center text-primary" onclick="modalInHandle('profile_info-modal','profile_medal')">자세히 <svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        </div>
                        <div class="overflow-x-auto scrollbar_x flex nowrap w-full py-2 gap-2 cursor-pointer" onclick="modalInHandle('profile_info-modal','profile_medal')">
                            <div class="shrink-0"><img class="w-11" src="./dist/custom_img/profile/achieve_1.png" alt=""></div>
                            <div class="shrink-0"><img class="w-11" src="./dist/custom_img/profile/achieve_2.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_3.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_4.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_5.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_6.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_7.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_8.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_9.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_10.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_11.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_12.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_13.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_14.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_15.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_16.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_17_BTC.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_17_DOGE.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_17_EOS.png" alt=""></div>
                            <div class="shrink-0 opacity-50"><img class="w-11" src="./dist/custom_img/profile/achieve_17_ETH.png" alt=""></div>
                        </div>
                    </div>

                    <!-- 통계 -->
                    <div class="p-3 mt-2 bg-white dark:bg-back rounded">
                        <div class="flex justify-between items-center p-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Statistics"></use></svg>
                                <p class="text-tit font-bold">통계</p>
                            </div>
                            <button class="flex gap-1 items-center text-primary" onclick="modalInHandle('profile_info-modal','profile_statis')">자세히 <svg class="w-4 h-4 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        </div>
                        <div class="flex nowrap w-full py-2 gap-2">
                            <div class="w-1/3 bg-back2 text-center rounded p-4">
                                <div class="text-xs"><svg class="inline-flex mr-1 items-center w-4 h-4 fill-title"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Bet"></use></svg>총승리</div>
                                <div class="text-tit text-base font-extrabold pt-1 truncate">199233</div>
                            </div>
                            <div class="w-1/3 bg-back2 text-center rounded p-4">
                                <div class="text-xs"><svg class="inline-flex mr-1 items-center w-4 h-4 fill-yellow"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Coin"></use></svg>총베팅</div>
                                <div class="text-tit text-base font-extrabold pt-1 truncate">446731</div>
                            </div>
                            <div class="w-1/3 bg-back2 text-center rounded p-4">
                                <div class="text-xs"><svg class="inline-flex mr-1 items-center w-4 h-4 fill-yellow"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_TotalWager"></use></svg>총롤링</div>
                                <div class="text-tit text-base font-extrabold pt-1 truncate">₩407,608,896.74</div>
                            </div>
                        </div>
                    </div>

                    <!-- 즐겨찾기 -->
                    <div class="p-3 mt-2 bg-white dark:bg-back rounded">
                        <div class="flex justify-between items-center p-2">
                            <div class="flex items-center gap-2">
                                <p class="text-tit font-bold">Top 3 즐겨찾기</p>
                            </div>
                        </div>
                        <div class="flex flex-col w-full py-2 gap-3">
                           <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <img class="w-20 rounded" src="./dist/custom_img/casino/casino_1.png" alt="">
                                    <p class="text-base font-medium">Tower Legend</p>
                                </div>
                                <div class="text-xs text-right">
                                    <p>롤링된</p>
                                    <p class="text-tit">₩73,981,545.72</p>
                                </div>
                           </div>
                           <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <img class="w-20 rounded" src="./dist/custom_img/casino/casino_2.png" alt="">
                                    <p class="text-base font-medium">Hilo</p>
                                </div>
                                <div class="text-xs text-right">
                                    <p>롤링된</p>
                                    <p class="text-tit">₩51,210,121.06</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                 <div class="flex items-center gap-4">
                                     <img class="w-20 rounded" src="./dist/custom_img/casino/casino_3.png" alt="">
                                     <p class="text-base font-medium">Plinko</p>
                                 </div>
                                 <div class="text-xs text-right">
                                     <p>롤링된</p>
                                     <p class="text-tit">₩744,238.57</p>
                                 </div>
                             </div>
                        </div>
                    </div>

                    <!-- 롤링대회  데이터 없을때 -->
                    <div class="p-3 mt-2 bg-white dark:bg-back rounded">
                        <div class="flex justify-between items-center p-2">
                            <p class="text-tit">롤링 대회</p>
                        </div>
                        <div class="flex flex-col justify-center pt-8 pb-16 text-center">
                            <img class="w-48 mx-auto" src="./dist/custom_img/empty.webp">
                            <div class="-mt-5 text-basic opacity-70 ">웁스! 아직 데이터가 없습니다!</div>
                        </div>
                    </div>

                    <!-- 롤링대회  데이터 있을떄 -->
                    <div class="p-3 mt-2 bg-white dark:bg-back rounded">
                        <div class="flex justify-between items-center p-2">
                            <p class="text-tit">롤링 대회</p>
                        </div>
                        <div class="py-2">
                            <table class="table noline pad-s table-sm ">   
                                <colgroup>
                                    <col width="40%">
                                    <col width="20%">
                                    <col width="40%">
                                </colgroup>
                                <thead>
                                    <tr class="text-center text-xs">
                                        <th class="whitespace-nowrap">날짜</th>
                                        <th class="whitespace-nowrap">위치</th>
                                        <th class="whitespace-nowrap">상품/상금</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">2020. 8. 9. Daily</td>
                                        <td class="text-center text-tit font-semibold">9th</td>
                                        <td class="text-right text-tit font-extrabold">₩ 33,408.60<img class="inline-flex items-center ml-1 w-5" src="./dist/custom_img/coin/BTC.webp" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">2020. 8. 2. Daily</td>
                                        <td class="text-center text-tit font-semibold">9th</td>
                                        <td class="text-right text-tit font-extrabold">₩ 30,536.35<img class="inline-flex items-center ml-1 w-5" src="./dist/custom_img/coin/BTC.webp" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">2020. 6. 17. Daily</td>
                                        <td class="text-center text-tit font-semibold">8th</td>
                                        <td class="text-right text-tit font-extrabold">₩ 41,674.01<img class="inline-flex items-center ml-1 w-5" src="./dist/custom_img/coin/BTC.webp" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">2020. 6. 12. Daily</td>
                                        <td class="text-center text-tit font-semibold">5th</td>
                                        <td class="text-right text-tit font-extrabold">₩ 174,209.31<img class="inline-flex items-center ml-1 w-5" src="./dist/custom_img/coin/BTC.webp" alt=""></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="flex gap-2 items-center justify-end mt-4">
                                <p class="text-xs">총 1</p>
                                <div class="flex gap-0 text-base px-4 py-1 bg-back2 rounded font-medium">
                                    <button class="w-6 h-6 basic-hover active font-extrabold">1</button>
                                    <button class="w-6 h-6 basic-hover">2</button>
                                    <button class="w-6 h-6 basic-hover">3</button>
                                </div>
                                <div class="flex gap-1">
                                    <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto rotate-180"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                                    <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="py-4 text-xs text-center opacity-70">
                        가입일 2023. 4. 3.
                    </div>
                </div>
            </div>

            <!-- 메달 -->
            <div class="profile_medal modal-body modal-in bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('profile_info-modal','profile_medal')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">메달</p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="w-full py-6 px-3 overflow-y-auto scrollbar h-auto sm:h-[640px] bg-white dark:bg-back2">
                    <div class="grid grid-cols-3 gap-1 p-3">

                        <div class="flex flex-col justify-between pt-9 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto" src="./dist/custom_img/profile/achieve_1.png" alt="">
                            <div class="text-xs text-center pt-7">
                                <p>수다쟁이</p>
                                <p class="text-sub mt-1">2023. 10. 1. 얻기</p>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between pt-9 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto" src="./dist/custom_img/profile/achieve_6.png" alt="">
                            <div class="text-xs text-center pt-7">
                                <p>비 소환사</p>
                                <p class="text-sub mt-1">2023. 8. 24. 얻기</p>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between pt-9 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto" src="./dist/custom_img/profile/achieve_7.png" alt="">
                            <div class="text-xs text-center pt-7">
                                <p>코코러버</p>
                                <p class="text-sub mt-1">2023. 7. 20. 얻기</p>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between pt-9 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto" src="./dist/custom_img/profile/achieve_10.png" alt="">
                            <div class="text-xs text-center pt-7">
                                <p>룰 제왕</p>
                                <p class="text-sub mt-1">2023. 11. 7. 얻기</p>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between pt-9 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto" src="./dist/custom_img/profile/achieve_15.png" alt="">
                            <div class="text-xs text-center pt-7">
                                <p>올드 타이머</p>
                                <p class="text-sub mt-1">2023. 12. 10. 얻기</p>
                            </div>
                        </div>

                    </div>
                    <div class="pt-2 text-center">
                        <button class="text-primary underline text-xs" onclick="modalInHandle('profile_info-modal','profile_medal_master')">BC 마스터 메달</button>
                    </div>
                </div>
            </div>

            <!-- 메달 상세 -->
            <div class="profile_medal_detail z-20 modal-body modal-in bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('profile_info-modal','profile_medal_detail')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">더 알아보기</p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px] bg-white dark:bg-back2">
                    <div class="pb-10">
                        <img class="w-24 mx-auto" src="./dist/custom_img/profile/achieve_1.png" alt="">
                        <p class="text-center text-lg opacity-70">수다쟁이</p>
                    </div>
                    <div class="border-primary border-solid border rounded text-primary py-3 px-5">총 200일 동안 아무 방에서나 채팅하여 이 메달을 획득하세요. (연속 200일 필요는 없습니다!)</div>
                    <div class="flex items-center justify-between mt-4 bg-back h-14 rounded py-3 px-5">
                        <p class="text-sub">수량</p>
                        <p>제한없는</p>
                    </div>
                    <div class="flex items-center justify-between mt-2 bg-back h-14 rounded py-3 px-5">
                        <p class="text-sub">지속시간</p>
                        <p>제한없는</p>
                    </div>
                    <div class="flex items-center justify-center border border-solid border-slate-300 mt-8 h-14 rounded py-3 px-5">
                        <p class="text-sub font-medium"><svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg>8369</p>
                    </div>
                </div>
            </div>

            <!-- bc 마스터 메달 -->
            <div class="profile_medal_master modal-body modal-in bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('profile_info-modal','profile_medal_master')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">마스터 메달</p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px] bg-white dark:bg-back">

                    <div class="flex gap-2 items-center justify-between">
                        <div class="bg-modaldark py-4 px-2 w-full rounded">
                            <img class="w-8 mx-auto" src="./dist/custom_img/profile/start.png" alt="">
                            <p class="text-sub text-center text-xs pt-1">0</p>
                        </div>
                        <div class="bg-modaldark py-4 px-2 w-full rounded">
                            <img class="w-8 mx-auto" src="./dist/custom_img/profile/box.webp" alt="">
                            <p class="text-sub text-center text-xs pt-1">5</p>
                        </div>
                        <div class="bg-modaldark py-4 px-2 w-full rounded">
                            <img class="w-8 mx-auto" src="./dist/custom_img/profile/box.webp" alt="">
                            <p class="text-sub text-center text-xs pt-1">10</p>
                        </div>
                        <div class="bg-modaldark py-4 px-2 w-full rounded">
                            <img class="w-8 mx-auto" src="./dist/custom_img/profile/box.webp" alt="">
                            <p class="text-sub text-center text-xs pt-1">15</p>
                        </div>
                        <div class="bg-modaldark py-4 px-2 w-full rounded">
                            <img class="w-8 mx-auto" src="./dist/custom_img/profile/box.webp" alt="">
                            <p class="text-sub text-center text-xs pt-1">max</p>
                        </div>
                    </div>

                    <div class="mt-2 py-3 p-4 rounded bg-modaldark">
                        <div class="relative rounded bg-white dark:bg-back h-[7px] progressbar">
                            <div class="pointer active"></div>
                            <div class="pointer"></div>
                            <div class="pointer"></div>
                            <div class="pointer"></div>
                            <div class="pointer"></div>
                            <div class="bar h-full rounded bg-primary" style="width:7%;"></div>
                        </div>
                    </div>

                    <div class="mt-4 p-3 bg-modaldark rounded text-xs leading-5">
                        메달 <span class="text-primary font-bold">5개</span> 달성: 20 BCD<br/>
                        메달 <span class="text-primary font-bold">10개</span> 달성: 800 BCD<br/>
                        달성 <span class="text-primary font-bold">15 </span>메달 획득: 2400 BCD<br/>
                        달성 <span class="text-primary font-bold">20개의</span> 메달: 10000 BCD<br/>
                        획득
                    </div>

                    <div class="text-tit font-bold pt-6 pb-2">잠금 해제</div>
                    <div class="grid grid-cols-3 gap-1">

                    </div>

                    <div class="border-t border-solid border-slate-300 mt-4"></div>

                    <div class="text-tit font-bold pt-6 pb-2">잠금 해제 대기 중</div>
                    <div class="grid grid-cols-3 gap-1">
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_1.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">수다쟁이</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 8369
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_2.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">두려움이 없는 자</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 6
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_3.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">만물의 왕</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 1
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_4.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">최고액 베터</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 9
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_5.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">탑건</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 23
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_6.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">비 소환사</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 12878
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_7.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">코코러버</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 6011
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_8.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">무적의 행운별</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 7987
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_9.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">콘테스트 마스터</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 38
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_10.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">틀 제왕</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 1372
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_11.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">폭풍우의 노블레스</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 2235
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_12.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">치킨 디너!</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 12495
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_13.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">로얄 플레이어</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 2193
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_14.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">'부자왕'이라고 불러다오</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 4806
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_15.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">올드 타이머</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 6530131
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_16.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">보스</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 4408
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_17_ETH.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">ETHTOP 1</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 2
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_17_BTC.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">BTCTOP 1</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 2
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_17_DOGE.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">DOGETOP 1</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 2
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between pt-6 pb-4 bg-modaldark cursor-pointer rounded" onclick="modalInHandle('profile_info-modal','profile_medal_detail')">
                            <img class="w-12 mx-auto opacity-50" src="./dist/custom_img/profile/achieve_17_EOS.png" alt="">
                            <div class="text-xs text-center pt-3">
                                <p class="mb-3">EOSTOP 1</p>
                                <button class="h-9 min-w-[62px] px-2 btn-normal text-primary font-bold rounded">
                                    <svg class="inline-flex w-3 h-3 mr-1 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Firends"></use></svg> 2
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="py-8 text-xs text-center text-primary">
                        <svg class="inline-flex w-4 h-4 fill-primary"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg>
                        팁! JB는 메달 계산에 포함되지 않습니다.<br/>24시간마다 통계가 업데이트 됩니다.
                    </div>

                </div>
            </div>

            <!-- 통계 -->
            <div class="profile_statis modal-body modal-in bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('profile_info-modal','profile_statis')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">자세히</p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px]">
                    <div class="flex items-center gap-3">
                        <p class="text-tit text-base font-bold">통계</p>
                        <div class="custom_select flex-1">
                            <button class="btn w-32 h-9 flex px-2 items-center justify-between border-none bg-white dark:bg-back">
                                <span></span>
                                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                <li class="py-2">글로벌</li>
                                <li class="py-2">Crash</li>
                                <li class="py-2">Crash Trenball</li>
                                <li class="py-2">Fast Parity</li>
                                <li class="py-2">Limbo</li>
                                <li class="py-2">Classic Dice</li>
                                <li class="py-2">Hash Dice</li>
                                <li class="py-2">Plinko</li>
                                <li class="py-2">Ultimate Dice</li>
                                <li class="py-2">Keno</li>
                                <li class="py-2">Wheel</li>
                                <li class="py-2">Cave Of Plunder</li>
                                <li class="py-2">Mines</li>
                                <li class="py-2">Twist</li>
                                <li class="py-2">CoinFlip</li>
                                <li class="py-2">Tower Legend</li>
                                <li class="py-2">Hilo</li>
                                <li class="py-2">Roulette</li>
                                <li class="py-2">Ring of Fortune</li>
                                <li class="py-2">Beauties</li>
                                <li class="py-2">Video Poker</li>
                                <li class="py-2">Sword</li>
                                <li class="py-2">Baccarat</li>
                                <li class="py-2">Double</li>
                                <li class="py-2">Blackjack</li>
                                <li class="py-2">Roulette Multiplayer</li>
                                <li class="py-2">Baccarat Multiplayer</li>
                                <li class="py-2">Keno Multiplayer</li>
                                <li class="py-2">BC Blackjack A</li>
                                <li class="py-2">BCGAME Speed Blackjack </li>
                                <li class="py-2">BCGAME VIP Blackjack </li>
                                <li class="py-2">BC Speed Baccareat </li>
                                <li class="py-2">BC ONE BlackJack </li>
                            </ul>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="overflow-hidden w-9 mx-auto rounded-full border-2 border-solid border-slate-300">
                                <img src="./dist/custom_img/profile_img.png" alt="">
                            </div>
                            <p class="text-tit font-bold">StanSmirnoff</p>
                        </div>
                    </div>

                    <div class="p-3 mt-3 bg-white dark:bg-back rounded">
                        <div class="flex nowrap w-full gap-2">
                            <div class="w-1/3 bg-back2 text-center rounded p-4">
                                <div class="text-xs"><svg class="inline-flex mr-1 items-center w-4 h-4 fill-title"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Bet"></use></svg>총승리</div>
                                <div class="text-tit text-base font-extrabold pt-1 truncate">6</div>
                            </div>
                            <div class="w-1/3 bg-back2 text-center rounded p-4">
                                <div class="text-xs"><svg class="inline-flex mr-1 items-center w-4 h-4 fill-yellow"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Coin"></use></svg>총베팅</div>
                                <div class="text-tit text-base font-extrabold pt-1 truncate">11</div>
                            </div>
                            <div class="w-1/3 bg-back2 text-center rounded p-4">
                                <div class="text-xs"><svg class="inline-flex mr-1 items-center w-4 h-4 fill-yellow"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_TotalWager"></use></svg>총롤링</div>
                                <div class="text-tit text-base font-extrabold pt-1 truncate">₩1,271.41</div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 mt-2 bg-white dark:bg-back rounded">
                        <div class="py-2">
                            <table class="table noline pad-s table-sm ">   
                                <colgroup>
                                    <col width="30%">
                                    <col width="20%">
                                    <col width="20%">
                                    <col width="30%">
                                </colgroup>
                                <thead>
                                    <tr class="text-center text-xs">
                                        <th class="whitespace-nowrap text-left">화폐</th>
                                        <th class="whitespace-nowrap">승리</th>
                                        <th class="whitespace-nowrap">벳</th>
                                        <th class="whitespace-nowrap text-right">롤링된</th>
                                    </tr>
                                </thead>
                                <tbody class="text-tit font-extrabold">
                                    <tr>
                                        <td class="text-left"><img class="inline-flex items-center mr-2 w-5" src="./dist/custom_img/coin/BCD.webp" alt="">BCD</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">5</td>
                                        <td class="text-right">0.981514</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left"><img class="inline-flex items-center mr-2 w-5" src="./dist/custom_img/coin/JB.webp" alt="">JB</td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">4</td>
                                        <td class="text-right">1537.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left"><img class="inline-flex items-center mr-2 w-5" src="./dist/custom_img/coin/BTC.webp" alt="">BTC</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">0.0000001</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left"><img class="inline-flex items-center mr-2 w-5" src="./dist/custom_img/coin/XLM.webp" alt="">XLM</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="flex gap-2 items-center justify-end mt-4">
                                <p class="text-xs">총 1</p>
                                <div class="flex gap-0 text-base px-4 py-1 bg-back2 rounded font-medium">
                                    <button class="w-6 h-6 basic-hover active font-extrabold">1</button>
                                    <button class="w-6 h-6 basic-hover">2</button>
                                    <button class="w-6 h-6 basic-hover">3</button>
                                </div>
                                <div class="flex gap-1">
                                    <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto rotate-180"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                                    <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col justify-center py-40 text-center">
                        <img class="w-48 mx-auto" src="./dist/custom_img/empty.webp">
                        <div class="-mt-5 text-basic opacity-70 ">웁스! 아직 데이터가 없습니다!</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- 프로필 - 유저정보 - 시크릿 모드 -->
<div id="profile_info_secret-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4">
                    <p class="text-tit font-extrabold text-base">유저정보</p>
                    <!-- vip-bat 클래스 : bronze silver gold plat dia -->
                    <div class="vip-bat gold absolute right-14 top-0 text-center">
                        <span class="text-white font-extrabold">V30</span>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px]">

                    <div class="relative pb-8 text-center">
                        <div class="absolute left-0 top-0 flex text-tit gap-2 bg-white dark:bg-back p-1.5 px-3 rounded">
                            <svg class="w-5 h-5 fill-place fill-red"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Like"></use></svg>
                            266
                        </div>
                        <div class="overflow-hidden w-[70px] mx-auto rounded-full border-2 border-solid border-slate-300">
                            <img src="./dist/custom_img/profile_img2.png" alt="">
                        </div>
                        <div class="mt-2 text-tit text-xl font-bold">Tauruz🐂</div>
                        <div class="mt-1 text-basic cursor-pointer" onclick="viewAlert('copy_alert')">사용자 ID: Zatouyb</div>
                    </div>

                    <div class="p-3 mt-2 bg-white dark:bg-back2 rounded">
                        <div class="flex justify-between items-center p-2">
                            <p class="text-tit font-semibold">통계</p>
                        </div>
                        <div>
                            <div class="flex flex-col justify-center pt-8 pb-16 text-center">
                                <img class="w-48 mx-auto" src="./dist/custom_img/privacy.png">
                                <div class="-mt-5 text-basic opacity-70 text-xs">통계숨기기</div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 text-xs text-center opacity-70">
                        가입일 2023. 4. 3.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 화폐 설정 모달 -->
<div id="currency_setting-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body relative">
                <div class="relative flex items-center justify-between p-5 py-3 bg-modaldark rounded-t">
                    <div class="relative w-full">
                        <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                        <input type="text" id="cash_input" class="form-control type02 pl-10" placeholder="검색" />
                    </div>
                    
                    <button class="basic-hover px-2 ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="px-6 py-4">
                    <ul class="nav nav-boxed-tabs bg-back rounded" role="tablist">
                        <li id="currency-1-tab" class="nav-item w-full" role="presentation">
                            <button class="rounded w-full h-9 active" data-tw-toggle="pill" data-tw-target="#currency-tab-1" type="button" role="tab" aria-controls="currency-tab-1" aria-selected="false">크립토</button>
                        </li>
                        <li id="currency-2-tab" class="nav-item w-full" role="presentation">
                            <button class="rounded w-full h-9 "  data-tw-toggle="pill" data-tw-target="#currency-tab-2" type="button" role="tab" aria-controls="currency-tab-2" aria-selected="false">법정화폐</button>
                        </li>
                        <li id="currency-3-tab" class="nav-item w-full" role="presentation">
                            <button class="rounded w-full h-9 "  data-tw-toggle="pill" data-tw-target="#currency-tab-3" type="button" role="tab" aria-controls="currency-tab-3" aria-selected="false">mNFT</button>
                        </li>
                        <li id="currency-4-tab" class="nav-item w-full" role="presentation">
                            <button class="rounded w-full h-9 "  data-tw-toggle="pill" data-tw-target="#currency-tab-4" type="button" role="tab" aria-controls="currency-tab-4" aria-selected="false">즐겨찾기</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div id="currency-tab-1" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="currency-1-tab">
                        <div class="flex justify-between items-center px-6">
                            <p>즐겨찾는 코인</p>
                            <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ReverseOrder"></use></svg></button>
                        </div>
                        <div class="w-full px-6 py-4 pb-6 overflow-y-auto scrollbar h-auto sm:h-[560px]">

                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check01">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTC.webp" />
                                    BTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check01" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check02">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BCD.webp" />
                                    BCD
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BCD
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check02" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check03">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SATS.webp" />
                                    SATS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Satoshi
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check03" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check04">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ETH.webp" />
                                    ETH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ethereum
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check04" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check05">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BNB.webp" />
                                    BNB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Binance Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check05" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check06">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DOGE.webp" />
                                    DOGE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Doge Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check06" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check07">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDT.webp" />
                                    USDT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Tether
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check07" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check08">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XRP.webp" />
                                    XRP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ripple
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check08" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check09">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/LTC.webp" />
                                    LTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Litecoin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check09" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check10">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BCH.webp" />
                                    BCH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin Cash
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check10" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check11">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/TRX.webp" />
                                    TRX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    TRON
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check11" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check12">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XLM.webp" />
                                    XLM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Stellar
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check12" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check13">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DOT.webp" />
                                    DOT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Polkadot
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check13" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check14">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/LINK.webp" />
                                    LINK
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    ChainLink
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check14" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check15">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/EOS.webp" />
                                    EOS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    EOS
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check15" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check16">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DAI.webp" />
                                    DAI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Multi-collateral DAI
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check16" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check17">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDC.webp" />
                                    USDC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    USDC Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check17" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check18">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XMR.webp" />
                                    XMR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Monero
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check18" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check19">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BSV.webp" />
                                    BSV
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BItcoin SV
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check19" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check20">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/UNI.webp" />
                                    UNI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Uniswap
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check20" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check21">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KSM.webp" />
                                    KSM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Kusama
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check21" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check22">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AMPL.webp" />
                                    AMPL
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ampleforth
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check22" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check23">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SUSHI.webp" />
                                    SUSHI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Sushi
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check23" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check24">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/WBTC.webp" />
                                    WBTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Wrapped BTC
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check24" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check25">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SNX.webp" />
                                    SNX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Synthetix Network
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check25" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check26">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CRO.webp" />
                                    CRO
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Crypto.com Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check26" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check27">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AAVE.webp" />
                                    AAVE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Aave Token
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check27" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check28">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/YFI.webp" />
                                    YFI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    yearn.finance
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check28" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check29">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ATOM.webp" />
                                    ATOM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Cosmos
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check29" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check30">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/MANA.webp" />
                                    MANA
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Decentraland
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check30" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check31">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DASH.webp" />
                                    DASH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Dash
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check31" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check32">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BAT.webp" />
                                    BAT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Basic Attention Token
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check32" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check33">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/APT.webp" />
                                    APT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    APT
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check33" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check34">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ENJ.webp" />
                                    ENJ
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Enjin Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check34" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check35">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CRV.webp" />
                                    CRV
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Curve DAO Token
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check35" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check36">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XEN.webp" />
                                    XEN
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    XEN
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check36" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check37">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/WLD.webp" />
                                    WLD
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    WLD
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check37" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check38">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/HNT.webp" />
                                    HNT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    HNT
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check38" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check39">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/RUNE.webp" />
                                    RUNE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    RUNE
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check39" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check40">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SUI.webp" />
                                    SUI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    SUI
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check40" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check41">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTCB.webp" />
                                    BTCB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BTCB
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check41" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check42">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ARB.webp" />
                                    ARB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    ARB
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check42" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check43">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/GMX.webp" />
                                    GMX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    GMX
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check43" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check44">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTG.webp" />
                                    BTG
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin Gold
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check44" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check45">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ALGO.webp" />
                                    ALGO
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Algorand
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check45" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check46">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BIGTIME.webp" />
                                    BIGTIME
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BIGTIME
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check46" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check47">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ICP.webp" />
                                    ICP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Internet Computer
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check47" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check48">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BLUR.webp" />
                                    BLUR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BLUR
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check48" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check49">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDC.webp" />
                                    USDC.e
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    USDC.E
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check49" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check50">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/HBAR.webp" />
                                    HBAR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Hedera
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check50" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>

                        </div>
                    </div>
                    <div id="currency-tab-2" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="currency-2-tab">
                        <div class="flex justify-between items-center px-6">
                            <p>즐겨찾는 코인</p>
                            <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ReverseOrder"></use></svg></button>
                        </div>
                        <div class="w-full px-6 py-4 pb-6 overflow-y-auto scrollbar h-auto sm:h-[560px]">

                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check01">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ARS.webp" />
                                    ARS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Argentine Peso
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check01" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check02">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CLP.webp" />
                                    CLP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Chilean Peso
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check02" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check03">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp" />
                                    IDR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Indonesian Rupiah
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check03" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check04">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp" />
                                    COP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Colombian Pesos
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check04" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check05">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/UAH.webp" />
                                    UAH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    UAH
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check05" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check06">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KES.webp" />
                                    KES
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Kenyan Shilling
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check06" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check07">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XOF.webp" />
                                    XOF
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    CFA Franc BCEAO
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check07" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check08">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XAF.webp" />
                                    XAF
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Central African CFA
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check08" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check09">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/UZS.webp" />
                                    UZS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Uzbekistani Som
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check09" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check10">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" />
                                    KRW
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Korean won
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check10" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check11">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KGS.webp" />
                                    KGS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Kyrgystani Som
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check11" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check12">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/EUR.webp" />
                                    EUR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    EUR
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check12" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check13">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/MXN.webp" />
                                    MXN
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Peso mexicano
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check13" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check14">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/MMK.webp" />
                                    MMK
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Burmese Kyat
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check14" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check15">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/GBP.webp" />
                                    GBP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    GBP
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check15" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check16">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/TZS.webp" />
                                    TZS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Tanzanian Shilling
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check16" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check17">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/VND.webp" />
                                    VND
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Vietnamese Dong
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check17" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check18">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/RUB.webp" />
                                    RUB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Russian Rubles
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check18" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check19">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/EGP.webp" />
                                    EGP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Egyptian Pound
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check19" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check20">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AZN.webp" />
                                    AZN
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Azerbaijani Manat
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check20" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>

                        </div>
                    </div>
                    <div id="currency-tab-3" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="currency-3-tab">
                        <div class="flex justify-between items-center px-6">
                            <p>즐겨찾는 코인</p>
                            <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ReverseOrder"></use></svg></button>
                        </div>
                        <div class="w-full px-6 py-4 pb-6 overflow-y-auto scrollbar h-auto sm:h-[560px]">
                            
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check01">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mDegenPass.webp" />
                                    mDegenPass
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    DegenPass
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check01" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check02">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mBAYC.webp" />
                                    mBAYC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bored Ape Yacht Club
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check02" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check03">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mPunks.webp" />
                                    mPunks
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Punks
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check03" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check04">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mMeka.webp" />
                                    mMeka
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Mekaverse
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check04" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check05">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mMfers.webp" />
                                    mMfers
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Mfers
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check05" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check06">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mClonex.webp" />
                                    mClonex
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    CloneX
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check06" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check07">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mDoodles.webp" />
                                    mDoodles
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Doodles
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check07" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check08">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mAzuki.webp" />
                                    mAzuki
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Azuki
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check08" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>

                        </div>
                    </div>
                    <div id="currency-tab-4" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="currency-4-tab">
                        <div class="flex justify-between items-center px-6">
                            <p>즐겨찾는 코인</p>
                            <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ReverseOrder"></use></svg></button>
                        </div>
                        <div class="w-full px-6 py-4 pb-6 overflow-y-auto scrollbar h-auto sm:h-[560px]">

                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check02">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BCD.webp" />
                                    BCD
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BCD
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check03">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SATS.webp" />
                                    SATS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Satoshi
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check04">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ETH.webp" />
                                    ETH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ethereum
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check05">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BNB.webp" />
                                    BNB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Binance Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check06">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DOGE.webp" />
                                    DOGE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Doge Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check07">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDT.webp" />
                                    USDT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Tether
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check08">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XRP.webp" />
                                    XRP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ripple
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check09">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/LTC.webp" />
                                    LTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Litecoin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check10">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BCH.webp" />
                                    BCH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin Cash
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check11">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/TRX.webp" />
                                    TRX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    TRON
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check12">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XLM.webp" />
                                    XLM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Stellar
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check13">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DOT.webp" />
                                    DOT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Polkadot
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check14">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/LINK.webp" />
                                    LINK
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    ChainLink
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check15">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/EOS.webp" />
                                    EOS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    EOS
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check16">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DAI.webp" />
                                    DAI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Multi-collateral DAI
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check17">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDC.webp" />
                                    USDC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    USDC Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check18">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XMR.webp" />
                                    XMR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Monero
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check19">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BSV.webp" />
                                    BSV
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BItcoin SV
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check20">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/UNI.webp" />
                                    UNI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Uniswap
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check21">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KSM.webp" />
                                    KSM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Kusama
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check22">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AMPL.webp" />
                                    AMPL
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ampleforth
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check23">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SUSHI.webp" />
                                    SUSHI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Sushi
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check24">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/WBTC.webp" />
                                    WBTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Wrapped BTC
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check25">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SNX.webp" />
                                    SNX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Synthetix Network
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check26">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CRO.webp" />
                                    CRO
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Crypto.com Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check27">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AAVE.webp" />
                                    AAVE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Aave Token
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check28">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/YFI.webp" />
                                    YFI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    yearn.finance
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check29">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ATOM.webp" />
                                    ATOM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Cosmos
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check30">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/MANA.webp" />
                                    MANA
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Decentraland
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check31">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DASH.webp" />
                                    DASH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Dash
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check32">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BAT.webp" />
                                    BAT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Basic Attention Token
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check33">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/APT.webp" />
                                    APT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    APT
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check34">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ENJ.webp" />
                                    ENJ
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Enjin Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check35">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CRV.webp" />
                                    CRV
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Curve DAO Token
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check36">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XEN.webp" />
                                    XEN
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    XEN
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check37">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/WLD.webp" />
                                    WLD
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    WLD
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check38">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/HNT.webp" />
                                    HNT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    HNT
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check39">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/RUNE.webp" />
                                    RUNE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    RUNE
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check40">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SUI.webp" />
                                    SUI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    SUI
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check41">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTCB.webp" />
                                    BTCB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BTCB
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check42">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ARB.webp" />
                                    ARB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    ARB
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check43">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/GMX.webp" />
                                    GMX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    GMX
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check44">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTG.webp" />
                                    BTG
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin Gold
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check45">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ALGO.webp" />
                                    ALGO
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Algorand
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check46">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BIGTIME.webp" />
                                    BIGTIME
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BIGTIME
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check47">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ICP.webp" />
                                    ICP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Internet Computer
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check48">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BLUR.webp" />
                                    BLUR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BLUR
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check49">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDC.webp" />
                                    USDC.e
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    USDC.E
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check50">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/HBAR.webp" />
                                    HBAR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Hedera
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
  
<!-- 입금 모달 -->
<div id="deposit-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content overflow-hidden relative rounded">
        <!-- 기본 -->
        <div class="modal-body relative">
            <div class="relative px-5 bg-modaldark rounded-t">
                <div class="flex items-center justify-between py-3">
                    <p class="text-tit font-extrabold text-base">입금</p>
                    <button class="basic-hover px-2 ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="px-5 pb-3">
                    <ul class="nav nav-boxed-tabs bg-slate-200 dark:bg-back" role="tablist">
                        <li id="deposit-1-tab" class="nav-item w-full" role="presentation">
                            <button class="w-full h-9 active" data-tw-toggle="pill" data-tw-target="#deposit-tab-1" type="button" role="tab" aria-controls="deposit-tab-1" aria-selected="false">크립토</button>
                        </li>
                        <li id="deposit-2-tab" class="nav-item w-full" role="presentation">
                            <button class="w-full h-9 "  data-tw-toggle="pill" data-tw-target="#deposit-tab-2" type="button" role="tab" aria-controls="deposit-tab-2" aria-selected="false">법정화폐</button>
                        </li>
                        <li id="deposit-3-tab" class="nav-item w-full" role="presentation">
                            <button class="w-full h-9 "  data-tw-toggle="pill" data-tw-target="#deposit-tab-3" type="button" role="tab" aria-controls="deposit-tab-3" aria-selected="false">가상화폐 구매하기</button>
                        </li>
                    </ul>
                </div>

            </div>


            <div class="tab-content overflow-y-auto scrollbar h-[680px] text-sub">
                <div id="deposit-tab-1" class="tab-pane leading-relaxed p-6 px-10 active" role="tabpanel" aria-labelledby="deposit-1-tab">
                    <div>입금화폐</div>
                    <div class="flex flex-wrap gap-1 items-center mt-1 font-medium">
                        <button class="flex items-center h-7 border border-solid border-slate-300 px-3 rounded-3xl hover:bg-slate-300 hover:bg-opacity-50"><img class="w-3.5 mr-1" src="/bcGame/dist/custom_img/coin/USDT.webp" /> USDT</button>
                        <button class="flex items-center h-7 border border-solid border-slate-300 px-3 rounded-3xl hover:bg-slate-300 hover:bg-opacity-50"><img class="w-3.5 mr-1" src="/bcGame/dist/custom_img/coin/TRX.webp" /> TRX</button>
                        <button class="flex items-center h-7 border border-solid border-slate-300 px-3 rounded-3xl hover:bg-slate-300 hover:bg-opacity-50"><img class="w-3.5 mr-1" src="/bcGame/dist/custom_img/coin/XRP.webp" /> XRP</button>
                        <button class="flex items-center h-7 border border-solid border-slate-300 px-3 rounded-3xl hover:bg-slate-300 hover:bg-opacity-50"><img class="w-3.5 mr-1" src="/bcGame/dist/custom_img/coin/BNB.webp" /> BNB</button>
                        <button class="flex items-center h-7 border border-solid border-slate-300 px-3 rounded-3xl hover:bg-slate-300 hover:bg-opacity-50"><img class="w-3.5 mr-1" src="/bcGame/dist/custom_img/coin/LTC.webp" /> LTC</button>
                        <button class="flex items-center h-7 border border-solid border-slate-300 px-3 rounded-3xl hover:bg-slate-300 hover:bg-opacity-50">더보기 <img class="w-3.5 ml-1" src="/bcGame/dist/custom_img/coin/TRX.webp" /><img class="w-3.5 -ml-1" src="/bcGame/dist/custom_img/coin/DOGE.webp" /><img class="w-3.5 -ml-1" src="/bcGame/dist/custom_img/coin/LTC.webp" /> <svg class="w-3 ml-1 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                    </div>
                    <div class="custom_select2 flex-1 mt-3">
                        <button class="btn w-32 h-12 flex px-4 items-center justify-between border-none  bg-modaldark">
                            <div class="flex items-center gap-3 text-tit name text-base ">
                                <img class="w-7" src="/bcGame/dist/custom_img/coin/BTC.webp" />
                                BTC
                            </div>
                            <div class="flex items-center gap-1">
                                잔고현황
                                <div class="cash text-tit">0</div>
                                <i class="ml-2"><svg class="w-3.5 h-3.5 fill-basic arr"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </div>
                        </button>
                        <div class="bg-white dark:bg-back2 shadow-lg">
                            <div class="p-4 pb-2">
                                <div class="relative w-full">
                                    <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                                    <input type="text" id="cash_input" class="form-control bg-modaldark pl-10" placeholder="검색" />
                                </div>
                            </div>
                            <ul class="overflow-y-auto scrollbar h-64 p-2 rounded text-sub">
                                <li class="p-2 px-4 flex items-center justify-between on">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/BTC.webp" />
                                        BTC
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 mt-1 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/BCD.webp" />
                                        BCD 
                                        <svg class="w-5 h-5 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg>
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/SATS.webp" />
                                        SATS
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/ETH.webp" />
                                        ETH
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/BNB.webp" />
                                        BNB
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/DOGE.webp" />
                                        DOGE
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/USDT.webp" />
                                        USDT
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/XRP.webp" />
                                        XRP
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/LTC.webp" />
                                        LTC
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                                <li class="p-2 px-4 flex items-center justify-between">
                                    <div class="flex items-center gap-2 text-tit font-extrabold name">
                                        <img class="w-7" src="/bcGame/dist/custom_img/coin/BCH.webp" />
                                        BCH
                                    </div>
                                    <div class="text-right text-xs">
                                        <b class="block text-tit text-sm">₩ 0.00</b>
                                        0.00
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-3">네트워크 선택</div>

                    <div class="custom_select flex-1 mt-3">
                        <button class="btn w-32 h-12 flex px-4 items-center justify-between border-none bg-modaldark">
                            <span>Segwit</span>
                            <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                        </button>
                        <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                            <li class="py-2">Segwit</li>
                        </ul>
                    </div>

                    <div class="flex items-center mt-3">
                        <p>
                            최소 <b class="text-tit">180%</b> 예치금으로 추가 <b class="text-tit">0.001 BTC</b> 보너스 받기 
                        </p>
                        <div class="tooltip_custom ml-1">
                            <svg class="inline-flex w-5 h-5 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg>
                            <div class="hover_box top w-56 shadow p-2 rounded bg-back">
                                <p class="text-tit">1st 입금 보너스</p>
                                <span>180% 최대 0.53700060 BTC<br/>최소 입금 0.001 BTC</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#f5f6fa] dark:bg-[#1b1c1f] flex items-center gap-4 p-4">
                        <img class="w-36" src="/bcGame/dist/custom_img/bc.png" alt="">
                        <div>
                            <p>입금 주소</p>
                            <div class="flex items-center gap-2 bg-back2 py-3 px-2">
                                <p class="break-all"><span class="text-primary">bc1q</span>nxp2zlsfur2uu7c5hulwcw6n6mygkm7gmp<span class="text-primary">tu6p</span></p>
                                <button class="btn-normal basic-hover w-24 h-10 rounded" onclick="viewAlert('copy_alert')">복사 하기</button>
                            </div>
                        </div>
                    </div>

                    
                    <div class="mt-4 bg-primary p-2 px-4 rounded bg-opacity-20 text-primary text-xs font-semibold">
                        참고: <span class="text-tit">BTC만 이 주소로 보내십시오. 코인은 2번의 네트워크 확인 후에 입금됩니다.</span>
                    </div>
                </div>
                <div id="deposit-tab-2" class="tab-pane leading-relaxed p-6" role="tabpanel" aria-labelledby="deposit-2-tab">
                    <div class="flex items-center justify-between">
                        <p>입금 화폐</p>
                        <div class="custom_select2 w-32">
                            <button class="btn w-32 h-12 flex px-4 items-center justify-between border-none ">
                                <div class="flex flex-row-reverse items-center gap-3 text-tit name text-base ">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" />
                                    KRW
                                </div>
                                <i class="ml-2"><svg class="w-3.5 h-3.5 fill-basic arr"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <div class="bg-white dark:bg-back2 right !w-72 shadow-2xl">
                                <div class="p-4 pb-2">
                                    <div class="relative w-full">
                                        <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                                        <input type="text" id="cash_input" class="form-control bg-modaldark pl-10" placeholder="검색" />
                                    </div>
                                </div>
                                <ul class="overflow-y-auto scrollbar h-64 p-2 rounded text-sub">
                                    <li class="p-2 px-4 flex items-center justify-between on">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" />
                                            KRW
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                    <li class="p-2 px-4 flex items-center justify-between ">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/ARS.webp" />
                                            ARS
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                    <li class="p-2 px-4 flex items-center justify-between ">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/CLP.webp" />
                                            CLP
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                    <li class="p-2 px-4 flex items-center justify-between ">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp" />
                                            IDR
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                    <li class="p-2 px-4 flex items-center justify-between ">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/AUD.webp" />
                                            AUD
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                    <li class="p-2 px-4 flex items-center justify-between ">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/AZN.webp" />
                                            AZN
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                    <li class="p-2 px-4 flex items-center justify-between ">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/BDT.webp" />
                                            BDT
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                    <li class="p-2 px-4 flex items-center justify-between ">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/CAD.webp" />
                                            CAD
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                    <li class="p-2 px-4 flex items-center justify-between ">
                                        <div class="flex items-center gap-2 text-tit font-extrabold name">
                                            <img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp" />
                                            COP
                                        </div>
                                        <div class="text-right text-xs">
                                            <b class="block text-tit text-sm">₩ 0.00</b>
                                            0.00
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-tab-wrap">
                        <!-- 결제방법 선택 -->
                        <div class="deposit-list">
                            <div class="mt-4">결제방법 선택하기</div>
                            <div class="bg-modaldark mt-2 p-3 rounded">
                                <p class="mb-2">추천</p>
                                <button class="relative flex items-center justify-between w-full py-2 px-4 bg-slate-200 dark:bg-back hover:bg-primary hover:bg-opacity-20 rounded" onclick="ModalTab('deposit-tab-2','deposit-detail')">
                                    <span class="absolute right-0 top-0 px-5 text-white bg-tag text-xs rounded-bl">가장 빠른</span>
                                    <div class="flex items-center gap-4">
                                        <img class="w-16 max-h-9" src="/bcGame/dist/custom_img/bank_transfer.png" />
                                        <i class="border-r border-solid border-slate-300 h-9"></i>
                                        <p class="text-tit">은행 이체</p>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-sub">
                                        10,000~2,500,000 KRW
                                        <i><svg class="w-4 h-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                                    </div>
                                </button>
                                <button class="mt-2 relative flex items-center justify-between w-full py-2 px-4 bg-slate-200 dark:bg-back hover:bg-primary hover:bg-opacity-20 rounded" onclick="ModalTab('deposit-tab-2','deposit-detail')">
                                    <span class="absolute right-0 top-0 px-5 text-white bg-tag text-xs rounded-bl">인기</span>
                                    <div class="flex items-center gap-4">
                                        <img class="w-16 max-h-9" src="/bcGame/dist/custom_img/bank_transfer2.png" />
                                        <i class="border-r border-solid border-slate-300 h-9"></i>
                                        <p class="text-tit">은행 이체</p>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-sub">
                                        30,000~9,000,000 KRW
                                        <i><svg class="w-4 h-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                                    </div>
                                </button>
                                <button class="mt-2 relative flex items-center justify-between w-full py-2 px-4 bg-slate-200 dark:bg-back hover:bg-primary hover:bg-opacity-20 rounded" onclick="ModalTab('deposit-tab-2','deposit-detail')">
                                    <span class="absolute right-0 top-0 px-5 text-white bg-tag text-xs rounded-bl">추천</span>
                                    <div class="flex items-center gap-4">
                                        <img class="w-16 max-h-9" src="/bcGame/dist/custom_img/bank_transfer3.png" />
                                        <i class="border-r border-solid border-slate-300 h-9"></i>
                                        <p class="text-tit">QRIS</p>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-sub">
                                        10,000~10,000,000 IDR
                                        <i><svg class="w-4 h-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                                    </div>
                                </button>

                                <p class="mt-2 mb-2">E지갑</p>
                                <button class="relative flex items-center justify-between w-full py-2 px-4 bg-slate-200 dark:bg-back hover:bg-primary hover:bg-opacity-20 rounded" onclick="ModalTab('deposit-tab-2','deposit-detail')">
                                    <div class="flex items-center gap-4">
                                        <img class="w-16 max-h-9" src="/bcGame/dist/custom_img/bank_transfer4.png" />
                                        <i class="border-r border-solid border-slate-300 h-9"></i>
                                        <p class="text-tit">DANA</p>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-sub">
                                        10,000~10,000,000 IDR
                                        <i><svg class="w-4 h-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                                    </div>
                                </button>
                                <button class="mt-2 relative flex items-center justify-between w-full py-2 px-4 bg-slate-200 dark:bg-back hover:bg-primary hover:bg-opacity-20 rounded" onclick="ModalTab('deposit-tab-2','deposit-detail')">
                                    <div class="flex items-center gap-4">
                                        <img class="w-16 max-h-9" src="/bcGame/dist/custom_img/bank_transfer3.png" />
                                        <i class="border-r border-solid border-slate-300 h-9"></i>
                                        <p class="text-tit">QRIS</p>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-sub">
                                        10,000~10,000,000 IDR
                                        <i><svg class="w-4 h-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                                    </div>
                                </button>
                                <button class="mt-2 relative flex items-center justify-between w-full py-2 px-4 bg-slate-200 dark:bg-back hover:bg-primary hover:bg-opacity-20 rounded" onclick="ModalTab('deposit-tab-2','deposit-detail')">
                                    <div class="flex items-center gap-4">
                                        <img class="w-16 max-h-9" src="/bcGame/dist/custom_img/bank_transfer5.png" />
                                        <i class="border-r border-solid border-slate-300 h-9"></i>
                                        <p class="text-tit">OVO</p>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-sub">
                                        10,000~10,000,000 IDR
                                        <i><svg class="w-4 h-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                                    </div>
                                </button>
                                <button class="text-primary w-full text-center p-2">더 보기</button>
                            </div>
                        </div>

                        <!-- 입금 -->
                        <div class="hidden deposit-detail">
                            <div class="mt-4">결제방법 선택하기</div>
                            <div class="bg-modaldark mt-2 p-2 rounded">
                                <button class="relative flex items-center justify-between w-full p-1 rounded" onclick="ModalTab('deposit-tab-2','deposit-list')">
                                    <div class="flex items-center gap-4">
                                        <img class="h-8" src="/bcGame/dist/custom_img/bank_transfer2.png" />
                                        <p>은행 이체</p>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-sub">
                                        <i><svg class="w-4 h-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                                    </div>
                                </button>
                            </div>
                            <div class="mt-3">10000 - 2500000 KRW</div>

                            <div class="flex items-center justify-between mt-1 bg-modaldark p-2 rounded">
                                <div class="flex items-center gap-4 text-base">
                                    <p class="pl-4 text-tit">₩</p>
                                    <input type="text" class="form-control nofocus !bg-transparent pl-2 text-tit text-base" value="19655" />
                                </div>
                                <div class="text-primary">추가 +₩35415.0</div>
                            </div>

                            <div class="flex items-center mt-3">
                                <p>
                                    최소 <b class="text-tit">180%</b> 예치금으로 추가 <b class="text-tit">20000 KRW</b> 보너스 받기 
                                </p>
                                <div class="tooltip_custom ml-1">
                                    <svg class="inline-flex w-5 h-5 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg>
                                    <div class="hover_box top w-56 shadow p-2 rounded bg-back">
                                        <p class="text-tit">1st 입금 보너스</p>
                                        <span>180% 최대 0.53700060 BTC<br/>최소 입금 0.001 BTC</span>
                                    </div>
                                </div>
                            </div>

                            <div class="cash_btn_box mt-2">
                                <button class="cash_btn text-base text-tit rounded on"><span class="bonus text-xs px-2 rounded-bl">+180%</span>₩ 30,000</button>
                                <button class="cash_btn text-base text-tit rounded"><span class="bonus text-xs px-2 rounded-bl">+180%</span>₩ 90,000</button>
                                <button class="cash_btn text-base text-tit rounded"><span class="bonus text-xs px-2 rounded-bl">+180%</span>₩ 900,000</button>
                                <button class="cash_btn text-base text-tit rounded"><span class="bonus text-xs px-2 rounded-bl">+180%</span>₩ 9,000,000</button>
                            </div>

                            <div class="mt-3">은행이름</div>
                            <div class="custom_select flex-1 mt-1">
                                <button class="btn w-32 h-12 flex px-4 items-center justify-between border-none bg-modaldark">
                                    <span>국민은행</span>
                                    <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                                </button>
                                <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                    <li class="py-1 on">국민은행</li>
                                    <li class="py-1">신한은행</li>
                                    <li class="py-1">우리은행</li>
                                    <li class="py-1">NH농협은행</li>
                                    <li class="py-1">기업은행</li>
                                    <li class="py-1">SC제일은행</li>
                                    <li class="py-1">농축협조합(지역농협)</li>
                                    <li class="py-1">카카오뱅크</li>
                                    <li class="py-1">KEB하나은행</li>
                                    <li class="py-1">부산은행</li>
                                    <li class="py-1">한국씨티은행</li>
                                    <li class="py-1">대구은행</li>
                                    <li class="py-1">새마을금고</li>
                                    <li class="py-1">제주은행</li>
                                    <li class="py-1">우체국</li>
                                    <li class="py-1">산업은행</li>
                                    <li class="py-1">케이뱅크은행</li>
                                    <li class="py-1">수협</li>
                                    <li class="py-1">신협</li>
                                    <li class="py-1">저축은행</li>
                                    <li class="py-1">전북은행</li>
                                    <li class="py-1">광주은행</li>
                                </ul>
                            </div>

                            <div class="mt-3">계좌 번호</div>
                            <input class="mt-1 form-control bg-modaldark nofocus pl-2 text-tit" />



                            <div class="mt-4 bg-primary p-2 px-4 rounded bg-opacity-20 text-primary font-semibold">
                                공지: <span class="text-tit">실명 인증 후 주문하십시오</span>
                            </div>

                            <div class="text-center mt-10">
                                <button class="btn-green w-1/2 h-12 font-bold">은행 이체으로 입금</button>
                            </div>


                        </div>
                    </div>
                    
                </div>
                <div id="deposit-tab-3" class="tab-pane leading-relaxed p-6" role="tabpanel" aria-labelledby="deposit-3-tab">
                    
                    <div>지불을</div>
                    <div class="flex items-center justify-between mt-1 bg-modaldark p-2 rounded">
                        <input class="form-control nofocus pl-2 text-tit text-xl font-extrabold !bg-transparent" value="30" />
                        <button class="flex items-center shrink-0 justify-center gap-3 btn-normal h-11 w-32 rounded text-tit" onclick="modalInHandle('deposit-modal','deposit-body')">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/USD.png" />
                            USD 
                            <svg class="w-3.5 h-3.5 fill-basic rotate-90"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                        </button>
                    </div>
                    <div class="mt-2">얻다</div>
                    <div class="flex items-center justify-between mt-1 bg-modaldark p-2 rounded">
                        <input class="form-control nofocus pl-2 text-tit text-xl font-extrabold !bg-transparent" value="29.55" />
                        <button class="flex items-center shrink-0 justify-center gap-3 btn-normal h-11 w-32 rounded text-tit" onclick="modalInHandle('deposit-modal','deposit_pot-body')">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/USDT.webp" />
                            USDT
                            <svg class="w-3.5 h-3.5 fill-basic rotate-90"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                        </button>
                    </div>

                    <div class="mt-2">결제 세부사항</div>
                    <div class="bg-back p-2 mt-3">
                        <div class="flex items-center justify-between p-2">
                            <div>제공사</div>
                            <div class="flex items-center gap-2 text-tit"><img class="w-5" src="/bcGame/dist/custom_img/MoonPay.webp" /> MoonPay</div>
                        </div>
                        <div class="flex items-center justify-between p-2">
                            <div>방법</div>
                            <div class="flex items-center gap-2 text-tit">Credit Card <img class="h-5" src="/bcGame/dist/custom_img/visa_mastercard.webp" /></div>
                        </div>
                        <div class="flex items-center justify-between p-2">
                            <div>계정으로 입금</div>
                            <div class="text-tit">setgbsea</div>
                        </div>
                    </div>  
                    
                    <div class="bg-back p-2 mt-3">
                        <div class="flex items-center justify-between p-2">
                            <div>총액 (수수료 포함)</div>
                            <div class="text-tit">30 USD</div>
                        </div>
                        <div class="flex items-center justify-between p-2">
                            <div>얻을 것입니다.</div>
                            <div class="text-primary text-base font-extrabold">29.55 USDT</div>
                        </div>
                    </div>

                    <div class="mt-4 bg-primary p-2 px-4 rounded bg-opacity-20 text-primary font-semibold text-xs">
                        공지: <span class="text-tit">블록체인에 따라 보증금이 도착하는 데 몇 분에서 1시간이 걸릴 수 있습니다.</span>
                    </div>

                    <div class="flex items-center gap-2 mt-4">
                        <input type="checkbox" class="form-check-input" id="deposit-agree" />
                        <label for="deposit-agree" class="flex items-center text-tit">
                            본인은 다음 사항을 읽었으며 동의합니다 - 
                            <div class="tooltip_custom ml-1">
                                <button class="underline">거부자</button>
                                <div class="hover_box top w-[400px] shadow p-2 rounded bg-back text-sub">
                                    <p class="text-tit">거부자: </p>
                                    <span>타사에서 제공하는 MoonPay 결제 서비스로 리디렉션됩니다. 서비스를 이용하기 전에 MoonPay 이용약관을 읽고 동의해 주십시오. 결제와 관련된 질문은 MoonPay 지원팀에 문의하세요. BC.GAME은 이 결제 서비스 사용으로 인해 발생하는 손실이나 손상에 대해 책임을 지지 않습니다.</span>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="text-center mt-10">
                        <button class="btn-green w-1/2 h-12 font-bold flex items-center gap-1 justify-center mx-auto"><img class="w-7" src="/bcGame/dist/custom_img/moonpay_icon.png" alt="">Via MoonPay 구매</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- 지불 -->
        <div class="deposit-body modal-in modal-body relative rounded bg-stand">
            <div class="relative flex items-center justify-between p-4 py-6 bg-modaldark">
                <div class="flex items-center gap-2">
                    <button onclick="modalInHandle('deposit-modal','deposit-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                </div>
                <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
            </div>
            <div class="w-full p-6 px-4">
                <div class="flex items-center gap-3 px-4">
                    <div class="relative w-full">
                        <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                        <input type="text" id="cash_input" class="form-control type02 pl-10" placeholder="검색">
                    </div>
                </div>
                <div class="overflow-y-auto scrollbar h-auto sm:h-[640px] p-4">

                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded border border-solid border-primary" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/AUD-1.webp">
                            AUD
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Australian Dollar
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/BGN.webp">
                            BGN
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Bulgarian Lev
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/BRL.webp">
                            BRL
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Brazilian Real
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/CAD.webp">
                            CAD
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Canadian Dollar
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/CHF.webp">
                            CHF
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Swiss Franc
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp">
                            COP
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Colombian Peso
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/CZK.webp">
                            CZK
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Czech Koruna
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/DKK.webp">
                            DKK
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Danish Krone
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <span class="flex items-center justify-center w-7 h-7 rounded-full text-white font-extrabold font-base" style="background:rgb(240, 134, 146)">D</span>
                            DOP
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Dominican Peso
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/EGP.webp">
                            EGP
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Egyptian Pound
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/EUR.webp">
                            EUR
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Euro
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/GBP.webp">
                            GBP
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Pound Sterling
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/HKD.webp">
                            HKD
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Hong Kong Dollar
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp">
                            IDR
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Indonesian Rupiah
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full py-3 px-3 cursor-pointer hover:bg-slate-300 hover:bg-opacity-30 rounded" onclick="modalInHandle('deposit-modal','deposit-body')">
                        <div class="flex items-center gap-2">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/ILS.webp">
                            ILS
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            Israeli New Shekel
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- 자산 포트폴리오 -->
        <div class="deposit_pot-body modal-in modal-body relative rounded bg-stand">
            <div class="relative flex items-center justify-between p-4 py-2 bg-modaldark">
                <div class="flex items-center gap-2">
                    <button onclick="modalInHandle('deposit-modal','deposit_pot-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                    <p class="text-tit font-extrabold text-base">자산 포트폴리오</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="relative w-full">
                        <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                        <input type="text" id="cash_input" class="form-control type02 pl-10" placeholder="검색">
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
            </div>
            <div class="w-full p-6 px-0">

                <div class="px-10 pb-4">
                    <ul class="nav nav-boxed-tabs bg-back rounded p-0.5" role="tablist">
                        <li id="deposit-pot_tab01" class="nav-item w-full" role="presentation"> 
                            <button class="w-full py-1 text-basic active" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab01" type="button" role="tab" aria-controls="deposit-pot_tab01" aria-selected="true">화폐</button>
                        </li>
                        <li id="deposit-pot_tab02" class="nav-item w-full" role="presentation"> 
                            <button class="w-full py-1 text-basic" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab02" type="button" role="tab" aria-controls="deposit-pot_tab02" aria-selected="false">mNFT</button>
                        </li>
                    </ul>
                </div>
                <div class="overflow-y-auto scrollbar h-auto sm:h-[560px] p-4 px-8">
                    <div class="tab-content">
                        <div id="deposit-pot_tab01" class="tab-pane active" role="tabpanel" aria-labelledby="deposit-pot_tab01" >
                            <div class="flex justify-between p-3 rounded cursor-pointer border border-solid border-primary">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" alt=""><b class="text-tit font-extrabold">KRW</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/ARS.webp" alt=""><b class="text-tit font-extrabold">ARS</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CLP.webp" alt=""><b class="text-tit font-extrabold">CLP</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp" alt=""><b class="text-tit font-extrabold">IDR</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AUD.webp" alt=""><b class="text-tit font-extrabold">AUD</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AZN.webp" alt=""><b class="text-tit font-extrabold">AZN</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/BDT.webp" alt=""><b class="text-tit font-extrabold">BDT</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CAD.webp" alt=""><b class="text-tit font-extrabold">CAD</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp" alt=""><b class="text-tit font-extrabold">COP</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EGP.webp" alt=""><b class="text-tit font-extrabold">EGP</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EUR.webp" alt=""><b class="text-tit font-extrabold">EUR</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GBP.webp" alt=""><b class="text-tit font-extrabold">GBP</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GHS.webp" alt=""><b class="text-tit font-extrabold">GHS</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/JPY.webp" alt=""><b class="text-tit font-extrabold">JPY</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KES.webp" alt=""><b class="text-tit font-extrabold">KES</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                            <div class="flex justify-between p-3 rounded  cursor-pointer">
                                <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KGS.webp" alt=""><b class="text-tit font-extrabold">KGS</b></p>
                                <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                            </div>
                        </div>
                        <div id="deposit-pot_tab02" class="tab-pane" role="tabpanel" aria-labelledby="deposit-pot_tab02">
                            <div class="h-80 py-10 text-center ">
                                <img class="w-48 mx-auto" src="/bcGame/dist/custom_img/empty.webp" alt="">
                                <p class="-mt-5 text-basic opacity-70">코인 또는 토큰을 찾을 수 없음</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="p-6 px-10 border-t border-slate-200 border-solid flex items-center justify-between">
                    <div>
                        <div class="form-check form-switch"> 
                            <input id="top-cash_check" class="form-check-input legal_check" type="checkbox" checked> 
                            <label class="form-check-label" for="top-cash_check">법정화폐로 보기</label> 
                        </div>
                    </div>
                    <div>
                        <div class="form-check form-switch"> 
                            <input id="top-cash_check02" class="form-check-input small_check" type="checkbox"> 
                            <label class="form-check-label" for="top-cash_check02">작게보기</label> 
                        </div>
                    </div>
                </div>

                
                
            </div>
        </div>
    </div>
</div>
</div>

<!-- 채팅규칙 모달 -->
<div id="chat_info-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4">
                    <p class="text-tit font-extrabold text-base">채팅규칙</p>
                    
                    <button class="basic-hover" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="./dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="p-6 font-semibold">
                    <p class="">1. 스팸을 보내거나 괴롭히거나 다른 사용자에게 불쾌감을 주지 마십시오!</p>

                    <p class="mt-3">2. 대출, 비, 팁 및 두 배로 동전을 구걸하거나 요구하지 마십시오.</p>

                    <p class="mt-3">3. 잠재적인 사기로 볼 수 있는 의심스러운 행동을 하지 않습니다.</p>

                    <p class="mt-3">4. 어떠한 형태의 광고/거래/판매/구매 또는 서비스 제공에 참여하지 마십시오.</p>

                    <p class="mt-3">5. URL 단축기를 사용하지 마십시오. 항상 원본 링크를 제출하십시오.</p>

                    <p class="mt-3">6. 지정된 언어 대화방을 이용하세요..</p>

                    <p class="mt-3">전체 규칙 목록은 포럼에서 찾을 수 있습니다.</p>
                </div>


                   
            </div>
        </div>
    </div>
</div>

<!-- 레인 모달 -->
<div id="chat_rain-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            <!-- 기본 -->
            <div class="modal-body relative rounded">
                <div class="relative flex items-center justify-between bg-modaldark p-4">
                    <p class="text-tit font-extrabold text-base">레인</p>
                    <button class="basic-hover" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-6 pb-20 h-[670px]">
                    <div class="flex items-center justify-between">
                        <p>양</p>
                        <p>최소: 0.00002645 BTC</p>
                    </div>
                    <div class="relative mt-2">
                        <input type="text" class="form-control type02 !h-14 text-tit" value="0.00002645">
                        <button class="absolute right-0 top-2 flex items-center gap-2 h-10 px-6 text-base font-extrabold border-l border-solid border-slate-300 text-tit" onclick="modalInHandle('chat_rain-modal','rain_pot-body')">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/BTC.webp" alt="">
                            BTC
                            <svg class="w-3 h-3 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                        </button>
                    </div>
                    <div class="flex justify-between mt-2">
                        <div>이용 가능 :<b class="text-tit">₩0.00</b></div>
                        <div><span class="underline cursor-pointer" onclick="modalInHandle('chat_rain-modal','rain_lock-body')">잠김 금액 :</span><b class="text-tit">₩0.00</b></div>
                    </div>
                    <div class="mt-5">사람 수</div>
                    <div class="relative mt-2">
                        <input type="text" class="form-control type02 !h-14 text-tit" value="50">
                        <div class="absolute right-0 top-2 flex items-center h-10 px-6  text-sub">
                            1~100
                        </div>
                    </div>
                    <div class="mt-5">메세지 (옵션)</div>
                    <div class="relative mt-2">
                        <span class="absolute right-0 bottom-0 p-4 text-sub">0/20</span>
                        <textarea class="form-control type02 !h-32 text-tit resize-none"></textarea>
                    </div>
                    <div class="text-center mt-10">
                        <button class="btn-green w-2/3 h-12 font-bold" disabled>비가 쏟아집니다</button>
                    </div>
                </div>
            </div>

            <!-- 화폐 -->
            <div class="rain_pot-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 py-2 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('chat_rain-modal','rain_pot-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">자산 포트폴리오</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="relative w-full">
                            <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                            <input type="text" id="cash_input" class="form-control type02 pl-10" placeholder="검색">
                        </div>
                        <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                    </div>
                </div>
                <div class="w-full p-6 px-4">

                    <div class="px-4 pb-4">
                        <ul class="nav nav-boxed-tabs bg-back rounded p-0.5" role="tablist">
                            <li id="deposit-pot_tab01" class="nav-item w-full" role="presentation"> 
                                <button class="w-full py-1 text-basic active" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab01" type="button" role="tab" aria-controls="deposit-pot_tab01" aria-selected="true">화폐</button>
                            </li>
                            <li id="deposit-pot_tab02" class="nav-item w-full" role="presentation"> 
                                <button class="w-full py-1 text-basic" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab02" type="button" role="tab" aria-controls="deposit-pot_tab02" aria-selected="false">mNFT</button>
                            </li>
                        </ul>
                    </div>
                    <div class="overflow-y-auto scrollbar h-[525px] p-4 px-4">
                        <div class="tab-content">
                            <div id="deposit-pot_tab01" class="tab-pane active" role="tabpanel" aria-labelledby="deposit-pot_tab01" >
                                <div class="py-1 wallet_tit">법정화폐</div>
                                <div class="flex justify-between p-3 rounded cursor-pointer border border-solid border-primary">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" alt=""><b class="text-tit font-extrabold">KRW</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/ARS.webp" alt=""><b class="text-tit font-extrabold">ARS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CLP.webp" alt=""><b class="text-tit font-extrabold">CLP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp" alt=""><b class="text-tit font-extrabold">IDR</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AUD.webp" alt=""><b class="text-tit font-extrabold">AUD</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AZN.webp" alt=""><b class="text-tit font-extrabold">AZN</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/BDT.webp" alt=""><b class="text-tit font-extrabold">BDT</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CAD.webp" alt=""><b class="text-tit font-extrabold">CAD</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp" alt=""><b class="text-tit font-extrabold">COP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EGP.webp" alt=""><b class="text-tit font-extrabold">EGP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EUR.webp" alt=""><b class="text-tit font-extrabold">EUR</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GBP.webp" alt=""><b class="text-tit font-extrabold">GBP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GHS.webp" alt=""><b class="text-tit font-extrabold">GHS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/JPY.webp" alt=""><b class="text-tit font-extrabold">JPY</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KES.webp" alt=""><b class="text-tit font-extrabold">KES</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KGS.webp" alt=""><b class="text-tit font-extrabold">KGS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                            </div>
                            <div id="deposit-pot_tab02" class="tab-pane" role="tabpanel" aria-labelledby="deposit-pot_tab02">
                                <div class="h-80 py-10 text-center ">
                                    <img class="w-48 mx-auto" src="/bcGame/dist/custom_img/empty.webp" alt="">
                                    <p class="-mt-5 text-basic opacity-70">코인 또는 토큰을 찾을 수 없음</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="p-6 px-4 border-t border-slate-200 border-solid flex items-center justify-between">
                        <div>
                            <div class="form-check form-switch"> 
                                <input id="top-cash_check" class="form-check-input legal_check" type="checkbox" checked> 
                                <label class="form-check-label" for="top-cash_check">법정화폐로 보기</label> 
                            </div>
                        </div>
                        <div>
                            <div class="form-check form-switch"> 
                                <input id="top-cash_check02" class="form-check-input small_check" type="checkbox"> 
                                <label class="form-check-label" for="top-cash_check02">작게보기</label> 
                            </div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>

            <!-- 롤오버 개요 -->
            <div class="rain_lock-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('chat_rain-modal','rain_lock-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">롤오버 개요</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full">
                    <div class="flex items-center gap-3 px-4 py-6">
                        <div class="custom_select w-48">
                            <button class="btn w-32 h-9 flex px-4 items-center justify-between border-none bg-white dark:bg-back">
                                <span>모든 유형</span>
                                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                <li class="py-2 on">모든 유형</li>
                                <li class="py-2">입금</li>
                                <li class="py-2">보너스</li>
                            </ul>
                        </div>
                        <div class="custom_select w-48">
                            <button class="btn w-32 h-9 flex px-4 items-center justify-between border-none bg-white dark:bg-back">
                                <span>모든 상태</span>
                                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                <li class="py-2 on">모든 상태</li>
                                <li class="py-2">아직 시작하지 않았습니다.</li>
                                <li class="py-2">진행 중</li>
                                <li class="py-2">완료</li>
                                <li class="py-2">취소</li>
                                <li class="py-2">만료되었습니다.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-4 px-4 h-[490px] overflow-y-auto scrollbar">
                        <table class="table table-hover noline pad-s text-xs sm:text-sm">   
                            <colgroup>
                                <col width="25%">
                                <col width="25%">
                                <col class="hidden sm:table-cell" width="25%">
                                <col width="25%">
                            </colgroup>
                            <thead class="bg-back">
                                <tr class="text-center">
                                    <th class="whitespace-nowrap text-left">유형</th>
                                    <th class="whitespace-nowrap text-center">양</th>
                                    <th class="whitespace-nowrap text-center hidden sm:table-cell">시간</th>
                                    <th class="whitespace-nowrap text-right">상태</th>
                                </tr>
                            </thead>
                            <tbody class="cursor-pointer">
                                <tr onclick="modalInHandle('chat_rain-modal','rain_detail-body')">
                                    <td class="text-left text-tit">신규 럭키 스핀 보너스</td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center gap-1">₩ 6,429.02 <img class="w-3 h-3" src="/bcGame/dist/custom_img/coin/USDC.webp" alt=""></div>
                                    </td>
                                    <td class="text-center hidden sm:table-cell">2023. 11. 8. 오전 10:21:12</td>
                                    <td class="text-right text-tit">
                                        <div class="flex items-center justify-end gap-2">
                                            <i class="w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i>
                                            만료되었습니다.
                                            <svg class="w-3 h-3 ml-1 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                                        </div>
                                    </td>
                                </tr>
                                <tr onclick="modalInHandle('chat_rain-modal','rain_detail-body')">
                                    <td class="text-left text-tit">신규 럭키 스핀 보너스</td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center gap-1">₩ 6,429.02 <img class="w-3 h-3" src="/bcGame/dist/custom_img/coin/USDC.webp" alt=""></div>
                                    </td>
                                    <td class="text-center hidden sm:table-cell">2023. 11. 8. 오전 10:21:12</td>
                                    <td class="text-right text-tit">
                                        <div class="flex items-center justify-end gap-2">
                                            <i class="w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i>
                                            만료되었습니다.
                                            <svg class="w-3 h-3 ml-1 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex gap-2 items-center justify-end mt-4 py-4 px-4 bg-back2">
                        <p class="text-xs">총 1</p>
                        <div class="flex gap-0 text-base px-4 py-1 bg-back2 rounded font-medium">
                            <button class="w-6 h-6 basic-hover active font-extrabold">1</button>
                            <button class="w-6 h-6 basic-hover">2</button>
                            <button class="w-6 h-6 basic-hover">3</button>
                        </div>
                        <div class="flex gap-1">
                            <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                            <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 롤오버 디테일 -->
            <div class="rain_detail-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('chat_rain-modal','rain_detail-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">롤오버 디테일</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-4">
                    <div class="text-center pt-2 pb-6">
                        <img class="w-12 mx-auto" src="./dist/custom_img/coin/USDC.webp" alt="">
                        <p class="mt-1 text-tit text-base">+ <b>5.00383700</b> USDC</p>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <div>상태</div>
                        <div class="text-tit"><i class="inline-flex w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i> 만료되었습니다.</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>유형</div>
                        <div class="text-tit">신규 럭키 스핀 보너스</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>가능 게임</div>
                        <div class="text-primary cursor-pointer underline" onclick="modalInHandle('chat_rain-modal','rain_bonusgame-body')">게임 보기</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>생성일</div>
                        <div class="text-tit">2023. 11. 8. 오전 10:21:12</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>만료</div>
                        <div class="text-tit">2023. 11. 15. 오전 10:21:12</div>
                    </div>

                    <div class="my-3 border-t border-solid border-slate-300"></div>

                    <div class="flex items-center justify-between py-2">
                        <div>롤오버 배수</div>
                        <div class="text-tit">60.00x</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>총 필요 롤링</div>
                        <div class="text-tit">₩386,262.04</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>롤링 완료</div>
                        <div class="text-tit">₩0.00</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>롤링 필요</div>
                        <div class="text-tit">₩386,262.04</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>출금 가능 자금</div>
                        <div class="text-tit">₩6,437.70
                        </div>
                    </div>
                </div>

            </div>

            <!-- 보너스를 위한 게임 -->
            <div class="rain_bonusgame-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('chat_rain-modal','rain_bonusgame-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">보너스를 위한 게임</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="h-[670px] overflow-y-auto scrollbar w-full p-4">
                    <ul class="grid grid-cols-4 gap-4">
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- 코인드롭 모달 -->
<div id="chat_coin-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            <!-- 기본 -->
            <div class="modal-body relative rounded">
                <div class="relative flex items-center justify-between bg-modaldark p-4">
                    <p class="text-tit font-extrabold text-base">코인드롭</p>
                    <button class="basic-hover" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-6 pb-20 h-[670px]">
                    <div class="flex items-center justify-between">
                        <p>양</p>
                        <p>최소: 0.00002645 BTC</p>
                    </div>
                    <div class="relative mt-2">
                        <input type="text" class="form-control type02 !h-14 text-tit" value="0.00002645">
                        <button class="absolute right-0 top-2 flex items-center gap-2 h-10 px-6 text-base font-extrabold border-l border-solid border-slate-300 text-tit" onclick="modalInHandle('chat_coin-modal','rain_pot-body')">
                            <img class="w-7" src="/bcGame/dist/custom_img/coin/BTC.webp" alt="">
                            BTC
                            <svg class="w-3 h-3 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                        </button>
                    </div>
                    <div class="flex justify-between mt-2">
                        <div>이용 가능 :<b class="text-tit">₩0.00</b></div>
                        <div><span class="underline cursor-pointer" onclick="modalInHandle('chat_coin-modal','rain_lock-body')">잠김 금액 :</span><b class="text-tit">₩0.00</b></div>
                    </div>
                    <div class="mt-5">사람 수</div>
                    <div class="relative mt-2">
                        <input type="text" class="form-control type02 !h-14 text-tit" value="50">
                        <div class="absolute right-0 top-2 flex items-center h-10 px-6  text-sub">
                            1~100
                        </div>
                    </div>
                    <div class="mt-5">메세지 (옵션)</div>
                    <div class="relative mt-2">
                        <span class="absolute right-0 bottom-0 p-4 text-sub">0/20</span>
                        <textarea class="form-control type02 !h-32 text-tit resize-none"></textarea>
                    </div>
                    <div class="text-center py-6 text-tit text-2xl font-extrabold">
                        1.003295 <b class="text-primary">USDC</b>
                    </div>
                    <div class="text-center">
                        <button class="btn-green w-2/3 h-12 font-bold" disabled>코인드롭 시작하기</button>
                    </div>
                </div>
            </div>

            <!-- 화폐 -->
            <div class="rain_pot-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 py-2 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('chat_coin-modal','rain_pot-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">자산 포트폴리오</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="relative w-full">
                            <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                            <input type="text" id="cash_input" class="form-control type02 pl-10" placeholder="검색">
                        </div>
                        <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                    </div>
                </div>
                <div class="w-full p-6 px-4">

                    <div class="px-4 pb-4">
                        <ul class="nav nav-boxed-tabs bg-back rounded p-0.5" role="tablist">
                            <li id="deposit-pot_tab01" class="nav-item w-full" role="presentation"> 
                                <button class="w-full py-1 text-basic active" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab01" type="button" role="tab" aria-controls="deposit-pot_tab01" aria-selected="true">화폐</button>
                            </li>
                            <li id="deposit-pot_tab02" class="nav-item w-full" role="presentation"> 
                                <button class="w-full py-1 text-basic" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab02" type="button" role="tab" aria-controls="deposit-pot_tab02" aria-selected="false">mNFT</button>
                            </li>
                        </ul>
                    </div>
                    <div class="overflow-y-auto scrollbar h-[525px] p-4 px-4">
                        <div class="tab-content">
                            <div id="deposit-pot_tab01" class="tab-pane active" role="tabpanel" aria-labelledby="deposit-pot_tab01" >
                                <div class="py-1 wallet_tit">법정화폐</div>
                                <div class="flex justify-between p-3 rounded cursor-pointer border border-solid border-primary">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" alt=""><b class="text-tit font-extrabold">KRW</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/ARS.webp" alt=""><b class="text-tit font-extrabold">ARS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CLP.webp" alt=""><b class="text-tit font-extrabold">CLP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp" alt=""><b class="text-tit font-extrabold">IDR</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AUD.webp" alt=""><b class="text-tit font-extrabold">AUD</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AZN.webp" alt=""><b class="text-tit font-extrabold">AZN</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/BDT.webp" alt=""><b class="text-tit font-extrabold">BDT</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CAD.webp" alt=""><b class="text-tit font-extrabold">CAD</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp" alt=""><b class="text-tit font-extrabold">COP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EGP.webp" alt=""><b class="text-tit font-extrabold">EGP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EUR.webp" alt=""><b class="text-tit font-extrabold">EUR</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GBP.webp" alt=""><b class="text-tit font-extrabold">GBP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GHS.webp" alt=""><b class="text-tit font-extrabold">GHS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/JPY.webp" alt=""><b class="text-tit font-extrabold">JPY</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KES.webp" alt=""><b class="text-tit font-extrabold">KES</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KGS.webp" alt=""><b class="text-tit font-extrabold">KGS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                            </div>
                            <div id="deposit-pot_tab02" class="tab-pane" role="tabpanel" aria-labelledby="deposit-pot_tab02">
                                <div class="h-80 py-10 text-center ">
                                    <img class="w-48 mx-auto" src="/bcGame/dist/custom_img/empty.webp" alt="">
                                    <p class="-mt-5 text-basic opacity-70">코인 또는 토큰을 찾을 수 없음</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="p-6 px-4 border-t border-slate-200 border-solid flex items-center justify-between">
                        <div>
                            <div class="form-check form-switch"> 
                                <input id="top-cash_check" class="form-check-input legal_check" type="checkbox" checked> 
                                <label class="form-check-label" for="top-cash_check">법정화폐로 보기</label> 
                            </div>
                        </div>
                        <div>
                            <div class="form-check form-switch"> 
                                <input id="top-cash_check02" class="form-check-input small_check" type="checkbox"> 
                                <label class="form-check-label" for="top-cash_check02">작게보기</label> 
                            </div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>

            <!-- 롤오버 개요 -->
            <div class="rain_lock-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('chat_coin-modal','rain_lock-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">롤오버 개요</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full">
                    <div class="flex items-center gap-3 px-4 py-6">
                        <div class="custom_select w-48">
                            <button class="btn w-32 h-9 flex px-4 items-center justify-between border-none bg-white dark:bg-back">
                                <span>모든 유형</span>
                                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                <li class="py-2 on">모든 유형</li>
                                <li class="py-2">입금</li>
                                <li class="py-2">보너스</li>
                            </ul>
                        </div>
                        <div class="custom_select w-48">
                            <button class="btn w-32 h-9 flex px-4 items-center justify-between border-none bg-white dark:bg-back">
                                <span>모든 상태</span>
                                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                <li class="py-2 on">모든 상태</li>
                                <li class="py-2">아직 시작하지 않았습니다.</li>
                                <li class="py-2">진행 중</li>
                                <li class="py-2">완료</li>
                                <li class="py-2">취소</li>
                                <li class="py-2">만료되었습니다.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-4 px-4 h-[490px] overflow-y-auto scrollbar">
                        <table class="table table-hover noline pad-s text-xs sm:text-sm">   
                            <colgroup>
                                <col width="25%">
                                <col width="25%">
                                <col class="hidden sm:table-cell" width="25%">
                                <col width="25%">
                            </colgroup>
                            <thead class="bg-back">
                                <tr class="text-center">
                                    <th class="whitespace-nowrap text-left">유형</th>
                                    <th class="whitespace-nowrap text-center">양</th>
                                    <th class="whitespace-nowrap text-center hidden sm:table-cell">시간</th>
                                    <th class="whitespace-nowrap text-right">상태</th>
                                </tr>
                            </thead>
                            <tbody class="cursor-pointer">
                                <tr onclick="modalInHandle('chat_coin-modal','rain_detail-body')">
                                    <td class="text-left text-tit">신규 럭키 스핀 보너스</td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center gap-1">₩ 6,429.02 <img class="w-3 h-3" src="/bcGame/dist/custom_img/coin/USDC.webp" alt=""></div>
                                    </td>
                                    <td class="text-center hidden sm:table-cell">2023. 11. 8. 오전 10:21:12</td>
                                    <td class="text-right text-tit">
                                        <div class="flex items-center justify-end gap-2">
                                            <i class="w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i>
                                            만료되었습니다.
                                            <svg class="w-3 h-3 ml-1 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                                        </div>
                                    </td>
                                </tr>
                                <tr onclick="modalInHandle('chat_coin-modal','rain_detail-body')">
                                    <td class="text-left text-tit">신규 럭키 스핀 보너스</td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center gap-1">₩ 6,429.02 <img class="w-3 h-3" src="/bcGame/dist/custom_img/coin/USDC.webp" alt=""></div>
                                    </td>
                                    <td class="text-center hidden sm:table-cell">2023. 11. 8. 오전 10:21:12</td>
                                    <td class="text-right text-tit">
                                        <div class="flex items-center justify-end gap-2">
                                            <i class="w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i>
                                            만료되었습니다.
                                            <svg class="w-3 h-3 ml-1 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex gap-2 items-center justify-end mt-4 py-4 px-4 bg-back2">
                        <p class="text-xs">총 1</p>
                        <div class="flex gap-0 text-base px-4 py-1 bg-back2 rounded font-medium">
                            <button class="w-6 h-6 basic-hover active font-extrabold">1</button>
                            <button class="w-6 h-6 basic-hover">2</button>
                            <button class="w-6 h-6 basic-hover">3</button>
                        </div>
                        <div class="flex gap-1">
                            <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                            <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 롤오버 디테일 -->
            <div class="rain_detail-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('chat_coin-modal','rain_detail-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">롤오버 디테일</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-4">
                    <div class="text-center pt-2 pb-6">
                        <img class="w-12 mx-auto" src="./dist/custom_img/coin/USDC.webp" alt="">
                        <p class="mt-1 text-tit text-base">+ <b>5.00383700</b> USDC</p>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <div>상태</div>
                        <div class="text-tit"><i class="inline-flex w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i> 만료되었습니다.</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>유형</div>
                        <div class="text-tit">신규 럭키 스핀 보너스</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>가능 게임</div>
                        <div class="text-primary cursor-pointer underline" onclick="modalInHandle('chat_coin-modal','rain_bonusgame-body')">게임 보기</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>생성일</div>
                        <div class="text-tit">2023. 11. 8. 오전 10:21:12</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>만료</div>
                        <div class="text-tit">2023. 11. 15. 오전 10:21:12</div>
                    </div>

                    <div class="my-3 border-t border-solid border-slate-300"></div>

                    <div class="flex items-center justify-between py-2">
                        <div>롤오버 배수</div>
                        <div class="text-tit">60.00x</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>총 필요 롤링</div>
                        <div class="text-tit">₩386,262.04</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>롤링 완료</div>
                        <div class="text-tit">₩0.00</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>롤링 필요</div>
                        <div class="text-tit">₩386,262.04</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>출금 가능 자금</div>
                        <div class="text-tit">₩6,437.70
                        </div>
                    </div>
                </div>

            </div>

            <!-- 보너스를 위한 게임 -->
            <div class="rain_bonusgame-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('chat_coin-modal','rain_bonusgame-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">보너스를 위한 게임</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="h-[670px] overflow-y-auto scrollbar w-full p-4">
                    <ul class="grid grid-cols-4 gap-4">
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

 <!-- 최신베팅&레이스 > 롤링대회 > 내역 모달 -->
 <div id="racing_lank-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-2lg">
        <div class="modal-content">
            <div class="modal-body bg-stand relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-3">
                        <p class="text-tit font-extrabold text-base">내역</p>
                        <span>2023. 12. 1. ~ 2023. 12. 2.</span>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-5">
                    <div class="overflow-x-auto scrollbar_x">
                        <table class="table table-hover noline mo_pad-s rounded min-w-[580px]">
                            <thead class="text-center text-xs text-sub">
                                <tr>
                                    <th class="whitespace-nowrap text-left">#</th>
                                    <th class="whitespace-nowrap">플레이어</th>
                                    <th class="whitespace-nowrap">롤링된</th>
                                    <th class="whitespace-nowrap text-right">상품/상금</th>
                                </tr>
                            </thead>
                            <tbody class="font-extrabold text-center cursor-pointer">
                                <tr>
                                    <td class="text-left font-normal"><img class="w-5" src="/bcGame/dist/custom_img/chat_gold.svg" /></td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img.png"/><b class="text-tit font-extrabold" data-tw-toggle="modal" data-tw-target="#profile_info-modal">M■■</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal"><img class="w-5" src="/bcGame/dist/custom_img/chat_silver.svg" /></td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img2.png"/><b class="text-tit font-extrabold" data-tw-toggle="modal" data-tw-target="#profile_info-modal">NotFrank</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal"><img class="w-5" src="/bcGame/dist/custom_img/chat_copper.svg" /></td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img3.png"/><b class="font-extrabold"><svg class="inline-flex w-3.5 h-3.5 mb-0.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Hidden"></use></svg> 숨기기</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal">4th</td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img3.png"/><b class="font-extrabold"><svg class="inline-flex w-3.5 h-3.5 mb-0.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Hidden"></use></svg> 숨기기</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal">5th</td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img.png"/><b class="text-tit font-extrabold" data-tw-toggle="modal" data-tw-target="#profile_info-modal">M■■</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal">6th</td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img2.png"/><b class="text-tit font-extrabold" data-tw-toggle="modal" data-tw-target="#profile_info-modal">NotFrank</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal">7th</td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img3.png"/><b class="font-extrabold"><svg class="inline-flex w-3.5 h-3.5 mb-0.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Hidden"></use></svg> 숨기기</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal">8th</td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img.png"/><b class="text-tit font-extrabold" data-tw-toggle="modal" data-tw-target="#profile_info-modal">M■■</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal">9th</td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img2.png"/><b class="text-tit font-extrabold" data-tw-toggle="modal" data-tw-target="#profile_info-modal">NotFrank</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left font-normal">10th</td>
                                    <td><img class="inline-flex w-6 h-6 mr-3 rounded-full" src="/bcGame/dist/custom_img/profile_img3.png"/><b class="font-extrabold"><svg class="inline-flex w-3.5 h-3.5 mb-0.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Hidden"></use></svg> 숨기기</b></td>
                                    <td><b class="text-primary">₩8,138,540,579.90</td>
                                    <td class="text-right text-primary">₩6,071,620.61 <span class="text-sub">(50%)</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 롤링 모달 -->
<div id="rolling_info-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-stand relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">롤</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-4 py-6 max-h-[660px] overflow-y-auto scrollbar">
                    <div class="text-base font-bold">규칙-데일리 롤링 대회</div>
                    <div class="text-sub">2023. 12. 3. ~ 2023. 12. 4.</div>
                    <div class="mt-2 text-xs">
                        1. 콘테스트 상금 풀은 자금에 따라 크게 달라지며 더 많은 플레이어가 베팅할수록 그 금액도 커집니다. 현재 상금 풀은 콘테스트 페이지에 표시됩니다.<br/>
                        2. 10 대부분의 베팅 플레이어는 상금 풀을 분할합니다.<br/>
                        3. 이 대회는 다음 베팅을 지원합니다: XEN, MATIC, COP, APT, UAH, mDegenPass, IOTX, SHIB, KES, XOF, NEAR, mBAYC, WLD, HNT, FLOOR, IDR, RUNE, DOG, DGB, VNDC, BCD, BSV, NBX, BCH, SUI, CAKE, DOT, BCL, JST, BANANO, SUNOLD, BTCB, GMT, BTC, TWT, ARB, AVAX, TON, GMX, BTG, AMPL, XAF, UZS, mPunks, FTM, BTTOLD, ONE, JPEG, SUSHI, ALGO, KRW, ATOM, BIGTIME, WBTC, GODS, SAMO, SNX, KUMA, KGS, mMeka, MANA, mMfers, EUR, ROSE, WAXP, SATS, ARS, DAI, VTHO, MXN, USD, SOL, ETC, BNB, ICP, USTC, BLUR, ETH, CELO, KLAY, TOMO, ADA, ICX, PAR, VET, MMK, DOGE, GBP, USDC.e, USDT, HBAR, RVN, mClonex, DASH, NANO, TZS, WAVES, VND, WBNB, XRP, RUB, SNACK, FLOKI, EGP, TRX, NFT, AZN, JPY, MYR, SUNNEW, GHS, JOE, KAVA, SAND, AMP, AUD, BRL, mDoodles, BDT, AVC, UGX, THB, DCR, KZT, PEN, TUSD, NZD, USDT.e, EGLD, LTC, USDC, KAS, KHR, THETA, VSYS, ENJ, CRO, CRV, CLP, NEXO, TFUEL, LUNA, NEWBTT, AAVE, EURS, NGN, UNI, MDL, mAzuki, MAGIC, NOK, CAD, XLM, LINK, PHP, QTUM, YFI, XTZ, OP, KSM, ELON, GM, INR, TAMA, EOS, FIL, GST, WETH, BIT, AXE, GALA, BAT, APE, YGG, HEX, PEOPLE, AXS, XMR, ZIL, WCK, PKR<br/>
                        4. 위의 모든 암호화폐로 베팅할 수 있으며 모두 현재 환율로 USDT로 전환됩니다.<br/>
                        5. 모든 상품은 BCD에 발송됩니다.<br/>
                        6. 경품은 콘테스트가 종료되면 공지사항 페이지를 통해 발송됩니다.<br/>
                        7. BC.GAME는 콘테스트의 어느 단계에서나 규칙을 위반한 플레이어를 제외할 권리를 보유합니다.<br/>
                        8. BC.GAME은(는) 단독 재량에 따라 사전 통지 없이 규칙과 조건을 변경할 권리를 보유합니다.<br/><br/>
                        🌟🌟 행운이 함께하기를 바랍니다. 재미있게 즐겨 보세요! 🌟🌟
                    </div>
                    <div class="text-base font-bold mt-4">상금 계산 공식</div>
                    <div class="mt-1 text-xs">
                        1st위 - 50% 콘테스트 상금 풀 중 데일리<br/>
                        2nd위 - 25% 콘테스트 상금 풀 중 데일리<br/>
                        3rd위 - 12% 콘테스트 상금 풀 중 데일리<br/>
                        4th위 - 6% 콘테스트 상금 풀 중 데일리<br/>
                        5th위 - 3% 콘테스트 상금 풀 중 데일리<br/>
                        6th위 - 1.5% 콘테스트 상금 풀 중 데일리<br/>
                        7th위 - 0.9% 콘테스트 상금 풀 중 데일리<br/>
                        8th위 - 0.7% 콘테스트 상금 풀 중 데일리<br/>
                        9th위 - 0.5% 콘테스트 상금 풀 중 데일리<br/>
                        10th위 - 0.4% 콘테스트 상금 풀 중 데일리<br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- 벳슬립 -->
<div id="betslip-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content betslip_modal">
            <div class="modal-body bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">뱃슬립</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="relative p-5 overflow-y-auto scrollbar max-h-[660px]">
                    <img class="absolute left-0 top-0 w-full z-10" src="/bcGame/dist/custom_img/main/betslip_bg.webp" alt="">
                    <div class="relative z-20 betslip_box">
                        <div class="top_box px-4 text-center">
                            <div class="py-4 border-b border-solid border-slate-500 border-opacity-40">
                                <div class="text-tit font-bold">혜택</div>
                                <div class="flex items-center justify-center gap-2">
                                    <img class="w-6" src="/bcGame/dist/custom_img/coin/USDT.webp" alt="">
                                    <span class="text-primary">₩22,519,790</span>
                                    <b class="text-tit font-extrabold text-base">USDT</b>
                                </div>
                            </div>
                            <div class="flex items-center py-4 text-xs">
                                <div class="text-center w-1/2 border-r border-solid border-slate-500 border-opacity-40">
                                    <p>베팅금액</p>
                                    <div class="flex items-center justify-center gap-1 mt-1 text-tit text-sm">
                                        <img class="w-4" src="/bcGame/dist/custom_img/coin/USDT.webp" alt="">
                                        ₩460
                                    </div>
                                </div>
                                <div class="text-center w-1/2">
                                    <p>지불금액</p>
                                    <div class="text-tit font-bold mt-1 text-sm">
                                        49000 x
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mid_box">
                            <div class="relative top_line border-b border-dashed border-slate-500 border-opacity-60"></div>
                            <div class="flex items-center gap-2 p-5 py-6">
                                <img class="w-11 h-11 rounded-full" src="/bcGame/dist/custom_img/profile_img.png" alt="">
                                <div class="font-medium">
                                    <p class="flex items-center gap-1">
                                        <span class="text-tit">Ltymleubkwb</span>
                                        <span>On</span>
                                        <span>2023. 12. 6. 오전 7:24:29</span>
                                    </p>
                                    <p class="flex items-center gap-1">
                                        <span>베팅아이디:</span>
                                        <img class="w-3" src="/bcGame/dist/custom_img/main/verified_icon.svg" alt="">
                                        <span class="text-tit">40684568715684723</span>
                                        <button class="basic-hover" onclick="viewAlert('copy_alert')"><svg class="w-4 h-4"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Copy"></use></svg></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bot_box p-3">
                            <div class="rounded bg-btndark flex items-center justify-between p-3">
                                <div class="flex items-center gap-4 flex-1">
                                    <img class="w-12 rounded" src="/bcGame/dist/custom_img/casino/casino_2.png" alt="">
                                    <div class="font-medium">
                                        <p class="text-tit">Crash</p>
                                        <p class="mt-1">BC Originals</p>
                                    </div>
                                </div>
                                <button class="basic-hover flex items-center gap-1">
                                    지금 게임하기
                                    <svg class="w-4 h-4"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                                </button>
                            </div>  
                            <div id="betslip-accr" class="accordion accordion-boxed mt-2">                   
                                <div class="accordion-item bg-btndark">
                                    <div id="betslip-accordion-content-1" class="accordion-header">
                                            <button class="accordion-button basic-hover collapsed flex justify-between items-center" type="button" data-tw-toggle="collapse" data-tw-target="#betslip-accordion-content-1" aria-expanded="false" aria-controls="betslip-accordion-content-1">
                                            <div class="text-basic">게임 세부 사항</div>
                                            <span class="arrow"><svg class="w-4 h-4"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></span>
                                            </button> 
                                    </div>
                                    <div id="betslip-accordion-content-1" class="accordion-collapse collapse" aria-labelledby="faq-accordion-content-6" data-tw-parent="#betslip-accr">
                                        <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed"> 
                                            <!-- 게임 세부 사항 -->
                                            <div class="flex items-center bg-back2 rounded p-4 text-xs text-center">
                                                <div class="w-1/3 flex-1 border-r border-solid border-slate-500 border-opacity-40">
                                                    <p class="flex items-center justify-center gap-1"><svg class="w-4 h-4 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Result"></use></svg> 결과</p>
                                                    <p class="mt-2">3.29x</p>
                                                </div>
                                                <div class="w-1/3 flex-1 border-r border-solid border-slate-500 border-opacity-40">
                                                    <p class="flex items-center justify-center gap-1"><svg class="w-4 h-4 fill-blue"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Bet"></use></svg> 벳</p>
                                                    <p class="mt-2">Classic</p>
                                                </div>
                                                <div class="w-1/3 flex-1">
                                                    <p class="flex items-center justify-center gap-1"><svg class="w-4 h-4 fill-orange"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Chance"></use></svg> 찬스</p>
                                                    <p class="mt-2">-</p>
                                                </div>
                                            </div>

                                            <!-- 서버시드 -->
                                            <div class="mb-1 mt-4">서버시드</div>
                                            <input type="text" class="form-control form-control-rounded bg-back2" placeholder="시드가 아직 업데이트 되지 않았습니다." readonly>

                                            <!-- 서버시드 (hash) -->
                                            <div class="mb-1 mt-4">서버시드 (hash)</div>
                                            <input type="text" class="form-control form-control-rounded bg-back2" value="62a6f86e87b6016f544eb3f8e1d2f1da7b98a06490e50401b61045a1d01676a7" readonly>

                                            <!-- 해시 -->
                                            <div class="flex items-center gap-2 mt-4">
                                                <div class="w-1/2">
                                                    <div class="mb-1">시드</div>
                                                    <input type="text" class="form-control form-control-rounded bg-back2" value="62a6f86e87b6016f544eb3f8e1d2f1da7b98a06490e50401b61045a1d01676a7" readonly>
                                                </div>
                                                <div class="w-1/2">
                                                    <div class="mb-1">nonce</div>
                                                    <input type="text" class="form-control form-control-rounded bg-back2" value="108" readonly>
                                                </div>
                                            </div>

                                            <!-- 게임아이디 -->
                                            <!-- <div class="mb-1">게임아이디</div>
                                            <input type="text" class="form-control form-control-rounded bg-back2" value="658721" readonly> -->

                                            <!-- 해시 -->
                                            <!-- <div class="mb-1 mt-4">해시</div>
                                            <input type="text" class="form-control form-control-rounded bg-back2" value="62a6f86e87b6016f544eb3f8e1d2f1da7b98a06490e50401b61045a1d01676a7" readonly> -->

                                            <!-- <div class="flex items-center gap-2 mt-4">
                                                <button class="bg-sub font-extrabold text-tit w-1/3 h-12 rounded">
                                                    모든 플레이어
                                                    <svg class="inline-flex w-4 h-4 fill-title mb-0.5"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                                                </button>
                                                <button class="btn-green font-extrabold w-2/3 h-12">인증</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- 프로필 정보 편집 모달 -->
<div id="profile_edit-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">

            <!-- 나의 프로필 -->
            <div class="modal-body bg-stand relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">나의 프로필</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="relative p-6 overflow-y-auto scrollbar h-[660px]">
                    <div class="py-10">
                        <div class="w-44 h-44 mx-auto text-center " onclick="modalInHandle('profile_edit-modal','profile_avatar')">
                            <a class="block w-full h-full border-4 border-slate-300 rounded-full overflow-hidden" href="javascript:;">
                                <img src="/bcGame/dist/custom_img/profile_img.png" alt="">
                            </a>
                            <button class="btn-normal p-3 py-2 rounded -mt-2 text-tit">아바타 편집하기</button>
                        </div>
                    </div>
                    <div class="pt-20">
                        <div class="mb-3 text-sub">유저이름</div>
                        <input type="text" class="form-control type02 !h-14" value="wtbsersdr">
                        <p class="p-2 text-xs text-sub">특수 구두점을 사용하지 마십시오. 그렇지 않으면 계정이 지원되지 않을 수 있습니다.</p>
                        <div class="text-center mt-8">
                            <button class="btn-green w-3/4 h-12 font-extrabold" onclick="viewAlert('noname_alert')">수정</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 아바타 편집하기 -->
            <div class="profile_avatar modal-body modal-in bg-stand relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('profile_edit-modal','profile_avatar')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">아바타 편집하기</p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="relative overflow-y-auto scrollbar h-[660px]">
                    <div class="relative h-80 overflow-hidden">
                        <div class="img_crop">
                            <img class="absolute left-0 top-0 right-0 bottom-0 m-auto max-w-full max-h-full" src="/bcGame/dist/custom_img/profile/head1.png" alt="">
                            <div class="absolute left-1/2 top-1/2 w-[300px] h-[300px] -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-full text-black text-opacity-80" style="box-shadow:0 0 0 9999em;"></div>
                        </div>
                        <div class="absolute left-2 bottom-2 flex gap-1 text-white">
                            <svg class="w-5 h-5 fill-white"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Gesture"></use></svg>
                            <div>확대/축소 및 조정</div>
                        </div>
                        <button class="absolute left-1/2 top-1/2  -translate-x-1/2 -translate-y-1/2">
                            <svg class="w-8 h-8 fill-white"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Camera"></use></svg>
                            <input type="file" class="absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer" >
                        </button>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center rounded bg-back">
                            <button class="basic-hover hover:bg-stand w-16 h-12"><svg class="w-4 h-4 mx-auto"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ZoomOut"></use></svg></button>
                            <div class="flex-1 px-8">
                                <div id="slider" class="slide_type01"></div>
                            </div>
                            <button class="basic-hover hover:bg-stand w-16 h-12"><svg class="w-4 h-4 mx-auto"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ZoomIn"></use></svg></button>
                            <button class="basic-hover hover:bg-stand w-16 h-12"><svg class="w-4 h-4 mx-auto"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Rotate"></use></svg></button>
                            <button class="basic-hover hover:bg-stand w-16 h-12"><svg class="w-4 h-4 mx-auto -scale-x-100"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Rotate"></use></svg></button>
                        </div>
                        <div class="mb-3 mt-5 font-medium">기본아바타</div>
                        <div class="flex items-center justify-between gap-1 avatar_list">
                            <a class="w-12 h-12 rounded-full overflow-hidden" href="javascript:;"><img src="/bcGame/dist/custom_img/profile/head1.png" alt=""></a>
                            <a class="w-12 h-12 rounded-full overflow-hidden" href="javascript:;"><img src="/bcGame/dist/custom_img/profile/head2.png" alt=""></a>
                            <a class="w-12 h-12 rounded-full overflow-hidden" href="javascript:;"><img src="/bcGame/dist/custom_img/profile/head3.png" alt=""></a>
                            <a class="w-12 h-12 rounded-full overflow-hidden" href="javascript:;"><img src="/bcGame/dist/custom_img/profile/head4.png" alt=""></a>
                            <a class="w-12 h-12 rounded-full overflow-hidden" href="javascript:;"><img src="/bcGame/dist/custom_img/profile/head5.png" alt=""></a>
                            <a class="w-12 h-12 rounded-full overflow-hidden" href="javascript:;"><img src="/bcGame/dist/custom_img/profile/head6.png" alt=""></a>
                            <button class="relative w-12 h-12 rounded-full flex items-center justify-center border border-primary text-tit font-extrabold text-2xl">+<input type="file" class="absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer" ></button>
                        </div>
                        <div class="text-center mt-8">
                            <button class="btn-green w-3/4 h-12 font-extrabold" onclick="modalInHandle('profile_edit-modal','profile_avatar')">제출하기</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 전화번호 추가 모달 -->
<div id="profile_phone-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">

            <!-- 휴대폰 인증 -->
            <div class="modal-body bg-back relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base"></p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="relative p-6 overflow-y-auto scrollbar h-[660px]">
                    <div class="py-5">
                        <div class="text-center font-medium mb-5">
                            <img class="w-10 mx-auto" src="/bcGame/dist/custom_img/profile/phone.png" alt="">
                            <p class="text-tit text-lg font-bold mt-1">휴대폰 인증</p>
                            <p class="mt-1">인증 코드를 받으려면 아래에 새 전화번호를 입력하세요.</p>
                        </div>
                        <div class="relative">
                            <p class="absolute left-0 top-0 w-14 h-full flex items-center justify-center cursor-pointer join_phone_btn" onclick="joinPhoneHandle()"><span class="text-xs text-tit">+82</span><svg class="w-3 h-3 ml-1 fill-basic rotate-90"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></p>
                            <div class="join_phone_box bg-stand">
                                <div class="relative border-b border-solid border-slate-300">
                                    <svg class="absolute left-0 top-3 w-4 h-4 mx-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg>
                                    <input type="text" class="form-control form-control-rounded pl-12">
                                </div>
                                <div class="overflow-y-auto scrollbar h-60 p-1 cursor-pointer">
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)"> 
                                        <p>Andorra</p>
                                        <p>+376</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>United Arab Emirates (‫الإمارات العربية المتحدة‬‎)</p>
                                        <p>+971</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Antigua and Barbuda</p>
                                        <p>+1268</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Anguilla</p>
                                        <p>+1264</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Angola</p>
                                        <p>+244</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Antarctica</p>
                                        <p>+672</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Australia</p>
                                        <p>+61</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Aruba</p>
                                        <p>+297</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Barbados</p>
                                        <p>+1246</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Bolibia</p>
                                        <p>+591</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Belize</p>
                                        <p>+501</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200" onclick="joinPhoneClick(this)">
                                        <p>Canada</p>
                                        <p>+1</p>
                                    </div>
                                    <div class="flex items-center justify-between rounded p-3 hover:bg-slate-200 active" onclick="joinPhoneClick(this)">
                                        <p>South Korea (대한민국)</p>
                                        <p>+82</p>
                                    </div>
                                </div>
                            </div>
                            <input type="text" class="form-control pl-16" placeholder="전화번호를 입력하세요">
                        </div>

                        <button class="btn-green w-full h-12 font-extrabold mt-5">인증</button>
                    </div>

                    <div class="py-5">
                        <div class="text-center font-medium mb-5">
                            <img class="w-10 mx-auto" src="/bcGame/dist/custom_img/profile/phone.png" alt="">
                            <p class="text-tit text-lg font-bold mt-1">휴대폰 인증</p>
                            <p class="mt-1">(으)로 인증 코드를 보냈습니다. 아래 6자리 코드를 입력하세요.</p>
                        </div>
                        <div class="flex gap-2 justify-center">
                            <div class="w-11">
                                <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                            </div>
                            <div class="w-11">
                                <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                            </div>
                            <div class="w-11">
                                <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                            </div>
                            <div class="w-11">
                                <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                            </div>
                            <div class="w-11">
                                <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                            </div>
                            <div class="w-11">
                                <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="javascript:;" class="text-primary hover:underline">보내기</a>
                            <p class="mt-1">어려움이 있으신가요? <a href="javascript:;" class="text-tit hover:underline" data-tw-toggle="modal" data-tw-target="#phone_message-modal">지금 참여하세요</a></p>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- 인증코드 모달 -->
<div id="phone_message-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-modaldark relative rounded">
                <div class="relative flex items-center justify-between p-4">
                    <p class="text-tit font-extrabold text-base">인증 코드를 받지 못하셨나요?</p>
                    <button class="basic-hover" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="p-6 font-semibold">
                    <p class="">휴대전화로 SMS가 전송되었습니다. 여러 번 시도한 후에도 코드를 받지 못한 경우 다음을 시도해 보세요.</p>
                    <p class="mt-3">1. 전화 요금이 연체되었는지 확인하세요.</p>
                    <p class="mt-3">2. 다음을 확인하세요. 메시지가 SMS 휴지통에 있을 수 있습니다.</p>
                    <p class="mt-3">3. 메시지가 몇 분 동안 지연될 수 있습니다. 10분 후에 다시 시도하세요.</p>
                    <p class="mt-3">4. 이 전화번호가 이미 있는 경우 보내드리지 않습니다. 인증 코드.</p>
                    <button class="btn-green w-full h-12 font-extrabold mt-5" data-tw-dismiss="modal">예</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 비밀번호 변경 모달 -->
<div id="password_change-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">

            <!-- 비밀번호 변경 -->
            <div class="modal-body bg-back relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base"></p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="relative p-6 overflow-y-auto scrollbar h-[660px]">
                    <div class="py-5">
                        <div class="text-center font-medium mb-5">
                            <img class="w-10 mx-auto" src="/bcGame/dist/custom_img/profile/password.png" alt="">
                            <p class="text-tit text-lg font-bold mt-1">비밀번호 변경</p>
                            <p class="mt-1">귀하의 안전을 위해 먼저 이전 비밀번호를 확인해야 합니다.</p>
                        </div>
                        <p>이전 비밀번호</p>
                        <div class="relative mt-2">
                            <input type="password" class="form-control form-control-rounded bg-back2" placeholder="비밀번호 설정">
                            <button class="absolute right-3 top-[14px] basic-hover" onclick="passwordView(this)"><svg class="w-4 h-4"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_View"></use></svg></button>
                        </div>

                        <button class="btn-green w-full h-12 font-extrabold mt-5" onclick="modalInHandle('password_change-modal','password_setting')">확인</button>
                    </div>

                    
                </div>
            </div>


            <!-- 비밀번호 설정 -->
            <div class="modal-body bg-back password_setting modal-in relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('profile_edit-modal','profile_avatar')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base"></p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="relative p-6 overflow-y-auto scrollbar h-[660px]">
                    <div class="py-5">
                        <div class="text-center font-medium mb-5">
                            <img class="w-10 mx-auto" src="/bcGame/dist/custom_img/profile/password.png" alt="">
                            <p class="text-tit text-lg font-bold mt-1">비밀번호 설정</p>
                        </div>
                        <p>이전 비밀번호</p>
                        <div class="relative mt-2">
                            <input type="password" class="form-control form-control-rounded bg-back2" placeholder="비밀번호 설정">
                            <button class="absolute right-3 top-[14px] basic-hover" onclick="passwordView(this)"><svg class="w-4 h-4"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_View"></use></svg></button>
                        </div>

                        <p class="mt-5">비밀번호 확인</p>
                        <div class="relative mt-2">
                            <input type="password" class="form-control form-control-rounded bg-back2" placeholder="비밀번호 확인">
                            <button class="absolute right-3 top-[14px] basic-hover" onclick="passwordView(this)"><svg class="w-4 h-4"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_View"></use></svg></button>
                        </div>

                        <div class="flex items-center gap-1 mt-6 text-xs">
                            <svg class="w-4 h-4 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg>
                            비밀번호 변경 후 재로그인이 필요합니다.
                        </div>

                        <button class="btn-green w-full h-12 font-extrabold mt-5">확인</button>
                    </div>

                    
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- 2fa 활성화 -->
<div id="fa2_active-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            <div class="modal-body bg-back relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base"></p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="relative p-6 overflow-y-auto scrollbar h-[660px]">
                    <div class="text-tit text-base font-bold">2FA 활성화</div>
                    <div class="mt-1">무단 액세스로부터 계정을 보호하려면 이중 인증을 활성화하세요.</div>

                    <div class="bg-back2 p-3 mt-2">
                        <div class="w-36 h-36 p-3 rounded bg-white mx-auto">
                            <img class="w-full" src="/bcGame/dist/custom_img/bc.png" alt="">
                        </div>
                        <div class="mt-2 text-xs text-tit">Google Authenticator 앱</div>
                        <div class="flex items-center gap-3 mt-2">
                            <button class="bg-list flex items-center justify-center gap-3 h-9 w-full rounded">
                                <img class="w-6" src="/bcGame/dist/custom_img/profile/apple.png" alt="">
                                <p class="text-left text-xs">Free Download <b class="block text-tit">Apple Store</b></p>
                            </button>
                            <button class="bg-list flex items-center justify-center gap-3 h-9 w-full rounded">
                                <img class="w-6" src="/bcGame/dist/custom_img/profile/google-play.png" alt="">
                                <p class="text-left text-xs">Free Download <b class="block text-tit">Google Play</b></p>
                            </button>
                        </div>
                        <div class="text-xs text-tit mt-3">으로 QR 코드를 스캔하거나 비밀 키를 수동으로 입력하세요.</div>
                        <div class="relative mt-2">
                            <input type="text" class="form-control form-control-rounded bg-back2 type02" value="vaser15wersgwer6asdgerhy6uty">
                            <button class="absolute right-3 top-[14px] basic-hover" onclick="viewAlert('copy_alert')"><svg class="w-4 h-4"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Copy"></use></svg></button>
                        </div>
                        <div class="mt-2 text-xs">이 코드를 적어두고 다른 사람에게 절대 공개하지 마십시오. 인증자에 대한 액세스 권한이 없는 경우 이를 사용하여 계정에 대한 액세스 권한을 다시 얻을 수 있습니다.</div>
                    </div>

                    <div class="text-tit font-bold mt-3">2FA 인증 코드</div>
                    <div class="flex gap-2 justify-between mt-2">
                        <div class="w-12">
                            <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                        </div>
                        <div class="w-12">
                            <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                        </div>
                        <div class="w-12">
                            <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                        </div>
                        <div class="w-12">
                            <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                        </div>
                        <div class="w-12">
                            <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                        </div>
                        <div class="w-12">
                            <input type="text" class="form-control type02 !h-14 !border-slate-300" >
                        </div>
                    </div>
                    <button class="btn-green w-full h-12 font-extrabold mt-5">활성화</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- 좌측메뉴 - 퀘스트허브 -->
<div id="left_quest-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            <!-- 기본 -->
            <div class="modal-body relative">

                <div class="relative flex items-center justify-between p-4 bg-modaldark rounded-t">
                    <p class="text-tit font-extrabold text-base">퀘스트허브</p>
                    
                    <button class="basic-hover px-2 ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="p-5 bg-gradient-purple overflow-y-auto scrollbar h-[660px]">
                    <div class="text-white dark:text-purple-400">월요일</div>
                    <div class="flex items-center justify-between mt-5">
                        <div class="text-tit">
                            <p>누적 보상:</p>
                            <div class="flex items-center gap-1 text-2xl font-extrabold"><img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"/> 0 <i>BCD</i></div>
                        </div>
                        <button class="btn-normal btn-top w-36 h-10" onclick="modalInHandle('left_quest-modal','prev_quest-body')">이전 퀘스트</button>
                    </div>

                    <ul class="nav nav-link-tabs mt-2" role="tablist">
                        <li id="quest-1-tab" class="nav-item flex-1" role="presentation"> 
                            <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#quest-tab-1" type="button" role="tab" aria-controls="quest-tab-1" aria-selected="true"> 
                                일일 퀘스트
                            </button> 
                        </li>
                        <li id="quest-2-tab" class="nav-item flex-1" role="presentation"> 
                            <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#quest-tab-2" type="button" role="tab" aria-controls="quest-tab-2" aria-selected="false">
                                주간 미션
                            </button> 
                        </li>
                    </ul>
                    <div class="tab-content mt-5">
                        <div id="quest-tab-1" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="quest-1-tab"> 
                            <div class="flex items-center gap-4">만료 <b class="text-tit">23 : 28 : 22</b></div>

                            <div class="flex items-center gap-4 py-4 p-3 bg-back rounded mt-4">
                                <div>
                                    <svg class="w-16 h-16" viewBox="0 0 64 64">
                                        <circle w="64" h="64" stroke-width="7" r="28.5" cx="32" cy="32" fill="transparent" stroke="#46434C"></circle>
                                        <circle w="64" h="64" stroke-width="0" r="20" cx="32" cy="32" fill="#46434C"></circle>
                                        <circle w="64" h="64" stroke-width="7" r="28.5" cx="32" cy="32" fill="transparent" stroke="#8651FA" stroke-dasharray="179.0707812546182" stroke-dashoffset="240" style="transform: rotate(-90deg); transform-origin: center center;"></circle>
                                        <text fill="#ffffff" x="32" y="37" text-anchor="middle" style="font-size: 12px;">0/3</text>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-tit font-bold">룰렛 멀티플레이어 마스터</p>
                                    <div class="flex items-center justify-between gap-2 py-1">
                                        <p class="text-xs text-sub">$ 0.4 이상의 베팅으로 룰렛 멀티플레이어에서 3 라운드 연속 승리.</p>
                                        <button class="btn-green w-40 h-8">이동하기</button>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"/>
                                        <p class="text-yellow text-base font-extrabold">수익 <i>0.1 BCD</i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 py-4 p-3 bg-back rounded mt-2">
                                <div>
                                    <img class="w-16" src="/bcGame/dist/custom_img/refer.webp"/>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 text-tit font-bold">
                                        빅 윈!
                                        <div class="tooltip_custom">
                                            <svg class="w-5 h-5 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg>
                                            <div class="hover_box top w-72 p-2 bg-back text-xs rounded">좋아하는 게임에 가서 게임이 50 이상의 지불금을 받을 수 있는지 확인하십시오. 그렇다면 이길 때까지 $ 0.4보다 큰 금액으로 계속 베팅하십시오.</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between py-1">
                                        <p class="text-xs text-sub">$ 0.4 이상의 베팅으로 모든 게임에서 50x 이상의 지불금을 획득하십시오.</p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"/>
                                        <p class="text-yellow text-base font-extrabold">수익 <i>0.2 BCD</i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 py-4 p-3 bg-back rounded mt-2">
                                <div>
                                    <svg class="w-16 h-16" viewBox="0 0 64 64">
                                        <circle w="64" h="64" stroke-width="7" r="28.5" cx="32" cy="32" fill="transparent" stroke="#46434C"></circle>
                                        <circle w="64" h="64" stroke-width="0" r="20" cx="32" cy="32" fill="#46434C"></circle>
                                        <circle w="64" h="64" stroke-width="7" r="28.5" cx="32" cy="32" fill="transparent" stroke="#8651FA" stroke-dasharray="179.0707812546182" stroke-dashoffset="179.0707812546182" style="transform: rotate(-90deg); transform-origin: center center;"></circle>
                                        <text fill="#ffffff" x="32" y="37" text-anchor="middle" style="font-size: 12px;">0/100</text>
                                    </svg>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 text-tit font-bold">
                                        롤링금액 달성
                                        <div class="tooltip_custom">
                                            <svg class="w-5 h-5 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg>
                                            <div class="hover_box top w-72 p-2 bg-back text-xs rounded">오늘 모든 게임에서 누적 베팅 총액이 $100에 도달할 때까지 계속 베팅하세요.</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between py-1">
                                        <p class="text-xs">일일 롤링 $ 100에 도달하세요.</p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"/>
                                        <p class="text-yellow text-base font-extrabold">수익 <i>0.2 BCD</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="quest-tab-2" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="quest-2-tab">
                            <div class="flex items-center gap-4">만료 <b class="text-tit">5D 23 : 28 : 22</b></div>

                            <div class="flex items-center gap-4 py-4 p-3 bg-back rounded mt-4">
                                <div>
                                    <svg class="w-16 h-16" viewBox="0 0 64 64">
                                        <circle w="64" h="64" stroke-width="7" r="28.5" cx="32" cy="32" fill="transparent" stroke="#46434C"></circle>
                                        <circle w="64" h="64" stroke-width="0" r="20" cx="32" cy="32" fill="#46434C"></circle>
                                        <circle w="64" h="64" stroke-width="7" r="28.5" cx="32" cy="32" fill="transparent" stroke="#8651FA" stroke-dasharray="179.0707812546182" stroke-dashoffset="179.0707812546182" style="transform: rotate(-90deg); transform-origin: center center;"></circle>
                                        <text fill="#ffffff" x="32" y="37" text-anchor="middle" style="font-size: 12px;">0/700</text>
                                    </svg>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 text-tit font-bold">
                                        주간 롤링
                                        <div class="tooltip_custom">
                                            <svg class="w-5 h-5 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Inform"></use></svg>
                                            <div class="hover_box top w-72 p-2 bg-back text-xs rounded">이번 주 내 모든 게임에서 누적 베팅 총액이 $700에 도달할 때까지 베팅을 계속하세요.</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between py-1">
                                        <p class="text-xs text-sub">주간 롤링 $ 700에 도달하세요.</p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"/>
                                        <p class="text-yellow text-base font-extrabold">수익 <i>0.7 BCD</i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <!-- 이전퀘스트 -->
            <div class="prev_quest-body modal-in modal-body relative rounded bg-stand">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('left_quest-modal','prev_quest-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">이전 퀘스트</p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-6 px-4 overflow-y-auto scrollbar h-[660px]">
                    <div class="flex flex-col justify-center h-full text-center">
                        <img class="w-48 mx-auto -mt-32" src="/bcGame/dist/custom_img/empty.webp">
                        <div class="-mt-5 text-basic opacity-70">웁스! 아직 데이터가 없습니다!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 좌측메뉴 - 스핀 -->
<div id="left_spin-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            <!-- 기본 -->
            <div class="modal-body relative">
                <button class="absolute right-1 top-2 basic-hover px-1" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>

                <div class="spin_box py-6 p-5">
                    <div class="bg-1"></div>
                    <div class="bg-2"></div>
                    <div class="flex items-center gap-1">
                        <div class="flex items-center justify-between gap-1 w-1/2 bg-[#151617] p-1 spin_btn rounded">
                            <button class="rounded p-1 w-1/3 lucky_btn active">
                                <img src="/bcGame/dist/custom_img/spin/tbtn_luckspin_1.webp" />
                                <img class="active" src="/bcGame/dist/custom_img/spin/tbtn_luckspin_2.webp" />
                            </button>
                            <button class="rounded p-1 w-1/3 super_btn">
                                <img src="/bcGame/dist/custom_img/spin/tbtn_superspin_1.webp" />
                                <img class="active" src="/bcGame/dist/custom_img/spin/tbtn_superspin_2.png" />
                            </button>
                            <button class="rounded p-1 w-1/3 mega_btn">
                                <img src="/bcGame/dist/custom_img/spin/tbtn_megaspin_1.webp" />
                                <img class="active" src="/bcGame/dist/custom_img/spin/tbtn_megaspin_2.webp" />
                            </button>
                        </div>
                        <div class="w-1/2 bg-[#151617] p-1 rounded ">
                            <div class="text-center rounded py-2 spin_info" style="background-color: rgb(101, 49, 32);">
                                <div class="tag-img" style="color: rgb(101, 49, 32);">브론즈</div>
                                <b class="font-extrabold text-white">레벨 0 이상</b>
                            </div>
                        </div>
                    </div>

                    <div class="spin_wrap mt-4 mx-auto">
                        <!-- lucky spin -->
                        <div class="active spin_bronze ">
                            <div class="spin_area relative mx-auto">
                                <div class="zoom_box">
                                        
                                    <img class="spin-img mx-auto" src="/bcGame/dist/custom_img/spin/spin_bronze.webp" alt="">
                                    <img class="spin-light absolute left-0 top-0" src="/bcGame/dist/custom_img/spin/spinLight.webp" alt="">
                                    <!-- <img class="absolute left-0 top-0" src="/bcGame/dist/custom_img/spin/diamond_fuck.webp" alt=""> -->
                                    
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(0deg);">
                                        <span class="amount text-white font-semibold">1.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BTC.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(22.5deg);">
                                        <span class="amount text-white font-semibold">50.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/USDC.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(45deg);">
                                        <span class="amount text-white font-semibold">50.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(67.5deg);">
                                        <span class="amount text-white font-semibold">20.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/USDT.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(90deg);">
                                        <span class="amount text-white font-semibold">0.00857</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/ETH.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(112.5deg);">
                                        <span class="amount text-white font-semibold">15.4000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/XRP.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(135deg);">
                                        <span class="amount text-white font-semibold">10.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(157.5deg);">
                                        <span class="amount text-white font-semibold">0.06880</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/SOL.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(180deg);">
                                        <span class="amount text-white font-semibold">0.02100</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BNB.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(202.5deg);">
                                        <span class="amount text-white font-semibold">10.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/DOGE.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(225deg);">
                                        <span class="amount text-white font-semibold">1.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(247.5deg);">
                                        <span class="amount text-white font-semibold">0.76100</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/XLM.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(270deg);">
                                        <span class="amount text-white font-semibold">0.93200</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/TRX.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(292.5deg);">
                                        <span class="amount text-white font-semibold">0.19300</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/CRO.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(315deg);">
                                        <span class="amount text-white font-semibold">1950.00</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/SHIB.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(337.5deg);">
                                        <span class="amount text-white font-semibold">5.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>

                                    <img class="absolute left-[63%] top-[36.5%] w-[46%]" src="/bcGame/dist/custom_img/spin/point_bronze.webp" alt="" style="opacity: 1; transform: none;">

                                </div>

                                <button class="z-20 absolute left-1/2 top-1/2 w-[30%] -translate-x-1/2 -translate-y-1/2">
                                    <img src="/bcGame/dist/custom_img/spin/spin_center1.webp" alt="">
                                    <img class="absolute left-1/2 top-1/2  btn-txt" src="/bcGame/dist/custom_img/spin/btn_luckspin.webp" alt="">
                                </button>
                            </div>
                            <div class="spin_logo relative z-10 -mt-8"><img class="w-full mx-auto" src="/bcGame/dist/custom_img/spin/banner_bronze.webp" /></div>
                            <button class="block btn-bronze w-2/3 h-12 mx-auto mt-4 font-extrabold rounded">스핀 돌리기</button>
                        </div>
                        <!-- super spin -->
                        <div class="spin_gold">
                            <div class="spin_area relative mx-auto">
                                <div class="zoom_box">
                                        
                                    <img class="spin-img mx-auto" src="/bcGame/dist/custom_img/spin/spin_bronze.webp" alt="">
                                    <img class="spin-light absolute left-0 top-0" src="/bcGame/dist/custom_img/spin/spinLight.webp" alt="">
                                    <!-- <img class="absolute left-0 top-0" src="/bcGame/dist/custom_img/spin/diamond_fuck.webp" alt=""> -->
                                    
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(0deg);">
                                        <span class="amount text-white font-semibold">1.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BTC.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(22.5deg);">
                                        <span class="amount text-white font-semibold">50.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/USDC.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(45deg);">
                                        <span class="amount text-white font-semibold">50.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(67.5deg);">
                                        <span class="amount text-white font-semibold">20.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/USDT.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(90deg);">
                                        <span class="amount text-white font-semibold">0.00857</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/ETH.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(112.5deg);">
                                        <span class="amount text-white font-semibold">15.4000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/XRP.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(135deg);">
                                        <span class="amount text-white font-semibold">10.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(157.5deg);">
                                        <span class="amount text-white font-semibold">0.06880</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/SOL.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(180deg);">
                                        <span class="amount text-white font-semibold">0.02100</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BNB.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(202.5deg);">
                                        <span class="amount text-white font-semibold">10.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/DOGE.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(225deg);">
                                        <span class="amount text-white font-semibold">1.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(247.5deg);">
                                        <span class="amount text-white font-semibold">0.76100</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/XLM.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(270deg);">
                                        <span class="amount text-white font-semibold">0.93200</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/TRX.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(292.5deg);">
                                        <span class="amount text-white font-semibold">0.19300</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/CRO.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(315deg);">
                                        <span class="amount text-white font-semibold">1950.00</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/SHIB.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(337.5deg);">
                                        <span class="amount text-white font-semibold">5.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>

                                    <img class="absolute left-[63%] top-[36.5%] w-[46%]" src="/bcGame/dist/custom_img/spin/point_bronze.webp" alt="" style="opacity: 1; transform: none;">

                                </div>

                                <button class="z-20 absolute left-1/2 top-1/2 w-[30%] -translate-x-1/2 -translate-y-1/2">
                                    <img src="/bcGame/dist/custom_img/spin/spin_center1.webp" alt="">
                                    <img class="absolute left-1/2 top-1/2  btn-txt" src="/bcGame/dist/custom_img/spin/btn_luckspin.webp" alt="">
                                </button>
                            </div>
                            <div class="spin_logo relative z-10 -mt-8"><img class="w-full mx-auto" src="/bcGame/dist/custom_img/spin/banner_gold.png" /></div>
                            <button class="block btn-yellow w-2/3 h-12 mx-auto mt-4 font-extrabold rounded">스핀 돌리기</button>
                        </div>
                        <!-- mega spin -->
                        <div class="spin_diamond">
                            <div class="spin_area relative mx-auto">
                                <div class="zoom_box">
                                        
                                    <img class="spin-img mx-auto" src="/bcGame/dist/custom_img/spin/spin_bronze.webp" alt="">
                                    <img class="spin-light absolute left-0 top-0" src="/bcGame/dist/custom_img/spin/spinLight.webp" alt="">
                                    <!-- <img class="absolute left-0 top-0" src="/bcGame/dist/custom_img/spin/diamond_fuck.webp" alt=""> -->
                                    
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(0deg);">
                                        <span class="amount text-white font-semibold">1.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BTC.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(22.5deg);">
                                        <span class="amount text-white font-semibold">50.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/USDC.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(45deg);">
                                        <span class="amount text-white font-semibold">50.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(67.5deg);">
                                        <span class="amount text-white font-semibold">20.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/USDT.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(90deg);">
                                        <span class="amount text-white font-semibold">0.00857</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/ETH.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(112.5deg);">
                                        <span class="amount text-white font-semibold">15.4000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/XRP.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(135deg);">
                                        <span class="amount text-white font-semibold">10.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(157.5deg);">
                                        <span class="amount text-white font-semibold">0.06880</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/SOL.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(180deg);">
                                        <span class="amount text-white font-semibold">0.02100</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BNB.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(202.5deg);">
                                        <span class="amount text-white font-semibold">10.0000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/DOGE.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(225deg);">
                                        <span class="amount text-white font-semibold">1.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(247.5deg);">
                                        <span class="amount text-white font-semibold">0.76100</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/XLM.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(270deg);">
                                        <span class="amount text-white font-semibold">0.93200</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/TRX.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(292.5deg);">
                                        <span class="amount text-white font-semibold">0.19300</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/CRO.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(315deg);">
                                        <span class="amount text-white font-semibold">1950.00</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/SHIB.webp">
                                    </div>
                                    <div class="spin-item flex items-center gap-1" style="opacity: 1; height: 24px; transform: rotate(337.5deg);">
                                        <span class="amount text-white font-semibold">5.00000</span>
                                        <img class="coin-icon w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                                    </div>

                                    <img class="absolute left-[63%] top-[36.5%] w-[46%]" src="/bcGame/dist/custom_img/spin/point_bronze.webp" alt="" style="opacity: 1; transform: none;">

                                </div>

                                <button class="z-20 absolute left-1/2 top-1/2 w-[30%] -translate-x-1/2 -translate-y-1/2">
                                    <img src="/bcGame/dist/custom_img/spin/spin_center1.webp" alt="">
                                    <img class="absolute left-1/2 top-1/2  btn-txt" src="/bcGame/dist/custom_img/spin/btn_luckspin.webp" alt="">
                                </button>
                            </div>
                            <div class="spin_logo relative z-10 -mt-8"><img class="w-full mx-auto" src="/bcGame/dist/custom_img/spin/banner_diamond.webp" /></div>
                            <button class="block btn-purple w-2/3 h-12 mx-auto mt-4 font-extrabold rounded">스핀 돌리기</button>
                        </div>
                    </div>

                    <div class="flex gap-1 mt-4 rounded bg-[#151617] p-1 ">
                        <div class="flex items-center justify-center flex-col p-2 px-4 text-center" style="background-color: rgb(25, 26, 27);">
                            <p class="text-xs">스핀 보너스 총계</p>
                            <b class="text-base" style="color:#e9d317;">$9,178,524.90</b>
                        </div>
                        <div class="relative flex flex-1 items-start gap-2 p-4 cursor-pointer" style="background-color: rgb(25, 26, 27);"  onclick="modalInHandle('left_spin-modal','spin_bonus-body')">
                            <svg class="absolute right-2 top-1/2 -translate-y-1/2 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>

                            <img class="w-7 h-7 rounded-full" src="/bcGame/dist/custom_img/profile_img.png" alt="">
                            <div class="font-medium">
                                <p>Pqtjrrjioyb</p>
                                <p class="text-sub">Win: <span class="text-primary">15.5</span> <span class="text-white">XRP</span></p>
                                <p class="text-sub">in <b style="color:rgb(255, 90, 196);">LUCKY SPIN</b></p>
                                <!-- <p class="text-sub">in <b style="color:rgb(255, 172, 4);">SUPER SPIN</b></p> -->
                                <!-- <p class="text-sub">in <b style="color:rgb(105, 14, 224);">MEGA SPIN</b></p> -->
                            </div>
                        </div>
                    </div>


                    

                </div>



            </div>

            <!-- 스핀 보너스 -->
            <div class="spin_bonus-body modal-in modal-body relative rounded bg-modaldark">
                <div class="relative flex items-center justify-between p-2 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('left_spin-modal','spin_bonus-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-6 pb-2 px-4 overflow-y-auto scrollbar h-[690px]">
                    <div>
                        <img class=" w-12 mx-auto" src="/bcGame/dist/custom_img/crown.png"/>
                        <div class="flex items-center justify-center mt-1 gap-1">
                            <img class="w-3" src="/bcGame/dist/custom_img/grass_left.svg"/>
                            <b class="text-tit text-xl font-extrabold">스핀 보너스</b>
                            <img class="w-3" src="/bcGame/dist/custom_img/grass_right.svg"/>
                        </div>
                    </div>
                    <div class="bg-stand mt-4 p-2 rounded">
                        <div class="flex items-center justify-between py-3">
                            <p class="text-left w-[30%]">유저이름</p>
                            <p class="text-center w-[30%]">스핀 레벨</p>
                            <p class="text-right w-[40%]">상품/상금</p>
                        </div>
                        <div class="spin_bonus_wrap h-[500px] overflow-hidden">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Sosidnwetasdf</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">84.60</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Uriqiaahnyb</p>
                                        <p class="text-center w-[30%] text-tit">SUPER SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">0.967</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/MYR.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Yog_Leo</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">8.33</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/GBP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Manuel Abril</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">15.50</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/XRP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">bloodman123</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">4.38</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Jmvybpfplyb</p>
                                        <p class="text-center w-[30%] text-tit">MEGA SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><b class="text-primary text-yellow">150.00</b> <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Sosidnwetasdf</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">84.60</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Uriqiaahnyb</p>
                                        <p class="text-center w-[30%] text-tit">SUPER SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">0.967</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/MYR.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Yog_Leo</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">8.33</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/GBP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Manuel Abril</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">15.50</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/XRP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">bloodman123</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">4.38</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Jmvybpfplyb</p>
                                        <p class="text-center w-[30%] text-tit">MEGA SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><b class="text-primary text-yellow">150.00</b> <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Sosidnwetasdf</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">84.60</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Uriqiaahnyb</p>
                                        <p class="text-center w-[30%] text-tit">SUPER SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">0.967</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/MYR.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Yog_Leo</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">8.33</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/GBP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Manuel Abril</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">15.50</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/XRP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">bloodman123</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">4.38</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Jmvybpfplyb</p>
                                        <p class="text-center w-[30%] text-tit">MEGA SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><b class="text-primary text-yellow">150.00</b> <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Sosidnwetasdf</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">84.60</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Uriqiaahnyb</p>
                                        <p class="text-center w-[30%] text-tit">SUPER SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">0.967</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/MYR.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Yog_Leo</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">8.33</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/GBP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Manuel Abril</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">15.50</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/XRP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">bloodman123</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">4.38</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Jmvybpfplyb</p>
                                        <p class="text-center w-[30%] text-tit">MEGA SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><b class="text-primary text-yellow">150.00</b> <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Sosidnwetasdf</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">84.60</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Uriqiaahnyb</p>
                                        <p class="text-center w-[30%] text-tit">SUPER SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">0.967</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/MYR.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Yog_Leo</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">8.33</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/GBP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Manuel Abril</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">15.50</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/XRP.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">bloodman123</p>
                                        <p class="text-center w-[30%] text-tit">LUCKY SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><span class="text-primary">4.38</span> <img class="w-5" src="/bcGame/dist/custom_img/coin/BTC.webp"></p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-center justify-between py-3">
                                        <p class="text-left w-[30%] text-tit font-extrabold truncate pr-8">Jmvybpfplyb</p>
                                        <p class="text-center w-[30%] text-tit">MEGA SPIN</p>
                                        <p class="text-right w-[40%] flex items-center justify-end gap-1"><b class="text-primary text-yellow">150.00</b> <img class="w-5" src="/bcGame/dist/custom_img/coin/BCD.webp"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- 보너스정보 모달 -->
<div id="bonus_info-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            <div class="modal-body">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">보너스 정보</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
    
                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px]">

                    <div class="text-tit font-bold text-base">보너스 카테고리</div>
                    <div class="bg-modaldark dark:bg-backlight p-3 rounded flex flex-wrap gap-y-4">
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/quests.webp" alt=""><span class="truncate">퀘스트</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$0.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/spin.webp" alt=""><span class="truncate">럭키스핀</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$5.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/roll.webp" alt=""><span class="truncate">롤</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$0.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/recharge.webp" alt=""><span class="truncate">재충전</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$0.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/weekly.webp" alt=""><span class="truncate">주간 캐시백</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$0.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/monthly.webp" alt=""><span class="truncate">월간 캐시백</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$0.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/sports.webp" alt=""><span class="truncate">스포츠 주간 캐쉬백</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$5.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/levelup.webp" alt=""><span class="truncate">레벨업 보너스</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$0.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/freespin.webp" alt=""><span class="truncate">무료 스핀</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$0.00</b>
                        </div>
                        <div class="w-1/5">
                            <p class="flex items-center justify-center text-xs gap-1"><img class="w-5" src="/bcGame/dist/custom_img/bonus/icon/deposit.webp" alt=""><span class="truncate">입금 보너스</span></p>
                            <b class="block mt-1 pl-2 text-tit font-bold">$0.00</b>
                        </div>

                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-tit text-base font-bold">보너스 거래 내역</div>

                        <div class="custom_select w-48">
                            <button class="btn h-10 flex px-4 items-center justify-between border-none bg-modaldark dark:bg-backlight">
                                <span>총 보너스</span>
                                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                <li class="py-2 on">총 보너스</li>
                                <li class="py-2">퀘스트</li>
                                <li class="py-2">럭키스핀</li>
                                <li class="py-2">롤</li>
                                <li class="py-2">입금 보너스</li>
                                <li class="py-2">재충전</li>
                                <li class="py-2">주간 캐쉬백</li>
                                <li class="py-2">월간 캐쉬백</li>
                                <li class="py-2">스포츠 주간 캐쉬백</li>
                                <li class="py-2">Levelup Bonus</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-1">최근 60일 거래만 아래에 표시됩니다.</div>
    
                    <div class="p-3 mt-2 bg-modaldark dark:bg-backlight rounded">
                        <div class="py-2">
                            <table class="table noline pad-s table-sm ">   
                                <colgroup>
                                    <col width="20%">
                                    <col width="30%">
                                    <col width="50%">
                                </colgroup>
                                <thead class="bg-back">
                                    <tr class="text-center text-xs">
                                        <th class="whitespace-nowrap text-left">보너스 유형</th>
                                        <th class="whitespace-nowrap">수령한 금액</th>
                                        <th class="whitespace-nowrap text-right">시간</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left">럭키 스핀</td>
                                        <td class="text-center">5.0038<img class="inline-flex items-center ml-1 w-5" src="/bcGame/dist/custom_img/coin/BTC.webp" alt=""></td>
                                        <td class="text-right">2023. 11. 8. 오전 10:21:12</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">럭키 스핀</td>
                                        <td class="text-center">5.0038<img class="inline-flex items-center ml-1 w-5" src="/bcGame/dist/custom_img/coin/BTC.webp" alt=""></td>
                                        <td class="text-right">2023. 11. 8. 오전 10:21:12</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>

                    <div class="flex gap-2 items-center justify-end mt-4">
                        <p class="text-xs">총 1</p>
                        <div class="flex gap-0 text-base px-4 py-1 bg-back2 rounded font-medium">
                            <button class="w-6 h-6 basic-hover active font-extrabold">1</button>
                            <button class="w-6 h-6 basic-hover">2</button>
                            <button class="w-6 h-6 basic-hover">3</button>
                        </div>
                        <div class="flex gap-1">
                            <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                            <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 입금 보너스 모달 -->
<div id="bonus_deposit-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            <div class="modal-body">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">입금 보너스 규칙</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
    
                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px]">
                    <div>BC.GAME은(는) 예외적인 4개의 보상 입금 매치 보너스를 제공합니다. 이것은 추가 Crypto를 획득하고 귀하의 재량에 따라 사용할 수 있는 고유한 Crypto 코인인 BC Dollar(BCD)를 획득할 수 있는 절호의 기회입니다. 따라서 이 환상적인 기회를 활용하여 BC.GAME의 탁월한 보너스로 암호화폐 보유량을 늘리십시오.</div>
                    
                    <div class="grid grid-cols-2 gap-3 mt-4">
                        <div class="rounded bg-backlight pb-3">
                            <div class="relative text-black">
                                <img src="/bcGame/dist/custom_img/bonus/1st.webp" alt="">
                                <span class="absolute left-0 top-4 w-full text-center text-base font-bold">1st 입금</span>
                                <p class="absolute left-0 bottom-4 w-full text-center text-lg font-bold"><b class="block text-4xl">180%</b>보너스</p>
                            </div>
                            <div class="flex justify-between text-xs px-2">
                                <span>최소 입금</span>
                                <b class="text-tit font-bold">$ 10</b>
                            </div>
                            <div class="flex justify-between mt-1 text-xs px-2">
                                <span>획득 가능한 최대 수량</span>
                                <b class="text-tit font-bold">20,000 BCD</b>
                            </div>
                        </div>
                        <div class="rounded bg-backlight pb-3">
                            <div class="relative text-black">
                                <img src="/bcGame/dist/custom_img/bonus/2nd.webp" alt="">
                                <span class="absolute left-0 top-4 w-full text-center text-base font-bold">2nd 입금</span>
                                <p class="absolute left-0 bottom-4 w-full text-center text-lg font-bold"><b class="block text-4xl">240%</b>보너스</p>
                            </div>
                            <div class="flex justify-between text-xs px-2">
                                <span>최소 입금</span>
                                <b class="text-tit font-bold">$ 50</b>
                            </div>
                            <div class="flex justify-between mt-1 text-xs px-2">
                                <span>획득 가능한 최대 수량</span>
                                <b class="text-tit font-bold">40,000 BCD</b>
                            </div>
                        </div>
                        <div class="rounded bg-backlight pb-3">
                            <div class="relative text-black">
                                <img src="/bcGame/dist/custom_img/bonus/3rd.webp" alt="">
                                <span class="absolute left-0 top-4 w-full text-center text-base font-bold">3rd 입금</span>
                                <p class="absolute left-0 bottom-4 w-full text-center text-lg font-bold"><b class="block text-4xl">300%</b>보너스</p>
                            </div>
                            <div class="flex justify-between text-xs px-2">
                                <span>최소 입금</span>
                                <b class="text-tit font-bold">$ 100</b>
                            </div>
                            <div class="flex justify-between mt-1 text-xs px-2">
                                <span>획득 가능한 최대 수량</span>
                                <b class="text-tit font-bold">60,000 BCD</b>
                            </div>
                        </div>
                        <div class="rounded bg-backlight pb-3">
                            <div class="relative text-black">
                                <img src="/bcGame/dist/custom_img/bonus/4th.webp" alt="">
                                <span class="absolute left-0 top-4 w-full text-center text-base font-bold">4th 입금</span>
                                <p class="absolute left-0 bottom-4 w-full text-center text-lg font-bold"><b class="block text-4xl">360%</b>보너스</p>
                            </div>
                            <div class="flex justify-between text-xs px-2">
                                <span>최소 입금</span>
                                <b class="text-tit font-bold">$ 200</b>
                            </div>
                            <div class="flex justify-between mt-1 text-xs px-2">
                                <span>획득 가능한 최대 수량</span>
                                <b class="text-tit font-bold">100,000 BCD</b>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- 롤 모달 -->
<div id="bonus_roll-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content roll-modal overflow-hidden relative rounded">
            <div class="modal-body">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">롤</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
    
                <div class="w-full p-6 overflow-y-auto scrollbar h-auto sm:h-[640px]">
                    <div>
                        <h4 class="text-tit text-base font-extrabold">롤 포인트 게임</h4>
                        <p class=text-xs>베팅을 한 플레이어는 매일 한 번의 롤 기회를 갖습니다.<b class="text-primary font-bold">(VIP3)</b></p>
                    </div>

                    <div class="my-5 bg-modaldark rounded p-2 py-10">
                        <div class="relative flex justify-center">
                            <div class="absolute left-0 top-0 w-full h-full flex items-center justify-center text-center overflow-hidden font-bold">
                                <div class="w-16 mx-4">
                                    <div class="scroll_box relative" style="top:80px">
                                        <div class="num_box">
                                            <span>1</span>
                                            <span>2</span>
                                            <span>3</span>
                                            <span>4</span>
                                            <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                            <span>8</span>
                                            <span>9</span>
                                            <span>0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-16 mx-4">
                                    <div class="scroll_box type02 relative" style="top:160px">
                                        <div class="num_box">
                                            <span>1</span>
                                            <span>2</span>
                                            <span>3</span>
                                            <span>4</span>
                                            <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                            <span>8</span>
                                            <span>9</span>
                                            <span>0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-16 mx-4">
                                    <div class="scroll_box type03 relative" style="top:0">
                                        <div class="num_box">
                                            <span>1</span>
                                            <span>2</span>
                                            <span>3</span>
                                            <span>4</span>
                                            <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                            <span>8</span>
                                            <span>9</span>
                                            <span>0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img class="w-16 mx-4" src="/bcGame/dist/custom_img/bonus/egg.png" alt="">
                            <img class="w-16 mx-4" src="/bcGame/dist/custom_img/bonus/egg.png" alt="">
                            <img class="w-16 mx-4" src="/bcGame/dist/custom_img/bonus/egg.png" alt="">
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn-green w-4/5 h-12 font-bold" disabled>롤</button>
                    </div>
                    <div class="flex items-center justify-between py-5 text-xs border-b border-slate-300 border-opacity-40">
                        <p>카운트다운: 21:55:33</p>
                        <p>남은번호: <span class="text-primary">0</span></p>
                    </div>

                    <div class="mt-6 text-tit text-xs">오늘의 보상: <span class="text-primary">50 BCD</span></div>

                    <div class="py-4">
                        <table class="table noline table-striped striped-dark rounded text-xs pad-bl">   
                            <thead>
                                <tr class="text-center">
                                    <th class="whitespace-nowrap text-left">랭킹</th>
                                    <th class="whitespace-nowrap">플레이어</th>
                                    <th class="whitespace-nowrap">결과</th>
                                    <th class="whitespace-nowrap text-right">보너스</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>1</td>
                                    <td class="text-tit font-bold">Orengenas</td>
                                    <td>998</td>
                                    <td class="text-right text-tit font-bold">20 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="text-tit font-bold">Xhyaigvfnyb</td>
                                    <td>997</td>
                                    <td class="text-right text-tit font-bold">10 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="text-tit font-bold">orignal007</td>
                                    <td>997</td>
                                    <td class="text-right text-tit font-bold">5 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="text-tit font-bold">Ciko☘️</td>
                                    <td>997</td>
                                    <td class="text-right text-tit font-bold">2.5 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="text-tit font-bold">✦𝐊𝐄𝐕𝐈𝐍✦</td>
                                    <td>997</td>
                                    <td class="text-right text-tit font-bold">2.5 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="text-tit font-bold">infinite19</td>
                                    <td>997</td>
                                    <td class="text-right text-tit font-bold">2 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td class="text-tit font-bold">Ldwckxpinyb</td>
                                    <td>996</td>
                                    <td class="text-right text-tit font-bold">2 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td class="text-tit font-bold">SøFìYâÑ</td>
                                    <td>995</td>
                                    <td class="text-right text-tit font-bold">2 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td class="text-tit font-bold">bigger117</td>
                                    <td>995</td>
                                    <td class="text-right text-tit font-bold">2 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td class="text-tit font-bold">Milky Gunter</td>
                                    <td>995</td>
                                    <td class="text-right text-tit font-bold">2 BCD <img class="inline-flex w-5" src="/bcGame/dist/custom_img/coin/BCD.webp" alt=""></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>


                    <div>
                        <h6 class="font-bold">롤 시간</h6>
                        <p class="mt-1 text-xs">매일 UTC+0 02:00부터 02:10까지 시작; 보상은 나중에 분배됩니다.</p>
                        <h6 class="mt-3 font-bold">롤 게임 방법</h6>
                        <ul class="pl-4 list-decimal text-xs mt-1">
                            <li>플랫폼 다른 통화와 금액을 보상으로 받습니다.</li>
                            <li>베팅 플레이어는 (JB) 플레이어를 제외하고 상위 10개 롤 포인트를 기준으로 보상을 받을 기회를 얻을 수 있습니다.</li>
                            <li>롤은 0에서 999 사이의 임의의 숫자입니다. 행운을 빕니다!</li>
                            <li>다른 플레이어라면 같은 양을 굴리면 시간에 따라 순위가 결정됩니다.</li>
                        </ul>
                    </div>
                    
                    

                </div>
            </div>
        </div>
    </div>
</div>

<!-- BCD 레이크백 모달 -->
<div id="bonus_bcd-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bcd-modal overflow-hidden relative rounded">
            <!-- 기본 -->
            <div class="modal-body">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">BCD 레이크백</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
    
                <div class="w-full p-3 overflow-y-auto scrollbar h-[660px]">

                    <div class="text-center pt-1 pb-5 bcd_bg relative">
                        <img class="w-14 mx-auto" src="/bcGame/dist/custom_img/bonus/bcd.webp" alt="">
                        <p class="mt-1">잠금해제 BCD</p>
                        <div class="flex items-center justify-center gap-2 mt-2 w-1/2 h-11 mx-auto bg-white dark:bg-black bg-opacity-30 dark:bg-opacity-40 rounded">
                            <img class="w-6" src="/bcGame/dist/custom_img/coin/BCD.webp">
                            <span class="text-primary text-xl font-bold">0.00</span>
                        </div>
                        <button type="button" class="btn-yellow h-11 w-48 mt-4 font-bold" disabled>수령</button>
                        <div class="mt-2 text-xs">최소 수령: <span class="text-tit">5 BCD</pan></div>
                    </div> 

                    <div class="flex items-center justify-between mb-3 p-4 px-8 border border-slate-300 border-opacity-50 bg-backlight rounded">
                        <div>
                            <svg class="inline-flex w-3 h-3 fill-basic opacity-50"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Locked"></use></svg>
                            잠금 BCD:
                        </div>
                        <p class="text-tit"><b class="text-lg">0</b> BCD</p>
                    </div>

                    <div class="py-2 text-center text-tit font-bold text-base">수령 방법</div>
                    <div class="bg-back p-6">
                        <p class="text-tit">잠긴금액 = 롤링금액 * 1% * <b>20%</b></p>
                        <div class="mt-2">잠금 해제 가능한 최소 금액인 ₩3,286,490에 도달하려면 여전히 5 BCD. 정도 더 베팅해야 합니다. <button class="text-primary hover:underline" onclick="modalInHandle('bonus_bcd-modal','bcd_lakeback')">상세 보기</button></div>
                        <div class="w-full h-[1px] my-4 bg-place opacity-50"></div>
                        <div class="flex gap-3">
                            <button class="btn-purple w-full h-11 font-extrabold">카지노로 가기</button>
                            <button class="btn-green w-full h-11 font-extrabold">스포츠 가기</button>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="btn-normal p-2 px-4 rounded" onclick="modalInHandle('bonus_bcd-modal','bcd_bonus_recode')">BCD 보너스 기록 <svg class="inline-flex w-3 h-3 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                    </div>
                    

                </div>
            </div>

            <!-- BCD 보너스 기록 -->
            <div class="modal-body bcd_bonus_recode modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('bonus_bcd-modal','bcd_bonus_recode')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">BCD 보너스 기록</p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-3 overflow-y-auto scrollbar h-[660px]">
                    <div class="flex flex-col justify-center text-center py-10">
                        <img class="w-48 mx-auto" src="/bcGame/dist/custom_img/empty.webp">
                        <div class="-mt-5 text-basic opacity-70">웁스! 아직 데이터가 없습니다!</div>
                    </div>
                </div>
            </div>


            <!-- BCD 레이크백 -->
            <div class="modal-body bcd_lakeback modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('bonus_bcd-modal','bcd_lakeback')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">BCD 레이크백</p>
                    </div>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-3 overflow-y-auto scrollbar h-[660px]">
                    <div class="relative">
                        <img src="/bcGame/dist/custom_img/bonus/bcd-1.webp" alt="">
                        <a href="javascript:;" class="absolute left-11 bottom-1/3 text-white">컨트랙트 보기 <svg class="inline-flex w-4 h-4 fill-white"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_NewWindow"></use></svg></a>
                    </div>

                    <div class="accordian_list mt-6">
                        <div class="accordian_item">
                            <div class="title flex items-center justify-between bg-back shadow py-3 px-4 text-base text-tit font-bold cursor-pointer">
                                BCD을(를) 잠금 해제하고 청구하는 방법은 무엇입니까?
                                <svg class="arrow w-6 h-6 fill-basic opacity-50"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                            </div>
                            <div class="summary hidden bg-backlight px-4 py-6 font-medium">
                                <p>
                                    <span class="text-tit">BCD 를 어떻게 잠금해제 하나요?</span><br/><br/>
                                    잠긴 BCD는 예금 보너스 및 럭키 스핀과 같은 특정 보너스를 통해 얻습니다.<br/><br/>
                                    BCD 잠금 해제는 쉽습니다! 본질적으로 레이크백과 동일하며 베팅을 통해 비례적으로 잠금 해제됩니다.
                                </p>
                                <div class="bg-primary bg-opacity-20 my-2 text-tit font-extrabold px-4 py-2 rounded">잠긴금액 = 롤링금액 * 1% * 20%</div>
                                <p>
                                    0 BCD를 모두 잠금 해제하려면 0.00 베팅이 필요합니다.<br/><br/>
                                    <span class="text-tit">잠금 해제된 BCD를 청구하는 방법은 무엇입니까?</span><br/><br/>

                                    베팅을 하면 <span class="text-primary">BC 스왑</span> 보물 상자가 잠금 해제된 로 채워집니다.<br/><br/>

                                    보물 상자를 최소 5BCD로 채운 후 '청구'를 클릭하면 잠금 해제된 BCD이(가) 잔액으로 바로 전송됩니다.<br/><br/>

                                    쉽죠?! 이제 BCD를 즉시 사용할 수 있습니다!
                                </p>
                            </div>
                        </div>

                        <div class="accordian_item mt-2">
                            <div class="title flex items-center justify-between bg-back shadow py-3 px-4 text-base text-tit font-bold cursor-pointer">
                                BCD 에 대하여
                                <svg class="arrow w-6 h-6 fill-basic opacity-50"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                            </div>
                            <div class="summary hidden bg-backlight px-4 py-6 font-medium">
                                <p>
                                    <span class="text-tit">BCD 를 다른 가상화폐로 환전할 수 있나요?</span><br/><br/>

                                    전적으로! BCD를 <span class="text-primary">BC 스왑</span>로 언제든지 다른 통화로 교환할 수 있습니다.<br/><br/>

                                    <span class="text-tit">BCD 의 특별한 점은 무엇인가요??</span><br/><br/>

                                    볼트프로에 BCD를 저장하시면 최대 10%의 연간 수익률을 누릴 수 있습니다. BCD 수집을 즐기십시오!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- 레퍼럴 이용약관 모달 -->
<div id="referral_info-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-stand relative rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">레퍼럴 이용약관</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-4 py-6 max-h-[660px] overflow-y-auto scrollbar">
                    <div>
                        이 웹사이트는 BC.GAME 예측 플랫폼에서 지원합니다. 플랫폼 게임에는 Crash, Classic Dice 등이 있습니다.
                        <br/><br/>
                        BC.GAME 제휴 프로그램(이하 제휴 프로그램) 신청서를 작성하고 등록 양식에서이용약관(이하약관)에 동의합니다를 클릭하면 귀하(이하제휴사)가 준수하는 데 동의합니다. 본 계약에 명시된 모든 조건에 따라수수료 규칙의 수수료 구조도 본 계약의 불가분의 일부입니다. 본 계약에 명시된 조건에 따라 제휴사에 사전 통지 없이 언제든지 BC.GAME은 본 계약의 조항을 단독 재량으로 수정, 변경, 삭제 또는 확장할 수 있는 권리를 보유합니다. 귀하는 이에 동의합니다.
                        <br/><br/>
                        1. 제휴 프로그램 참여<br/>
                        2. BC.GAME 제휴 웹사이트 및/또는 BC.GAME 마케팅 도구(이하 정의됨) 사용.<br/>
                        3. BC.GAME의 제휴 커미션 수락이 본 계약 및 이에 대한 수정 사항에 대한 취소 불가능한 수락을 확인한다는 조건.<br/>
                        따라서 귀하는 본 계약의 조건을 지속적으로 준수하고 BC.GAME 웹사이트의 일반 이용약관 및 개인정보 보호정책은 물론, 이후에 나온 기타 모든 규칙 및/또는 지침을 준수해야 합니다. 회사와 제휴사 간의 계약은 제휴 신청이 승인된 날부터 효력이 발생합니다.
                        <br/><br/>
                        1. 목적
                        <br/><br/>
                        1.1. 제휴사는 인터넷에서 하나 이상의 웹사이트(이하 웹사이트로 통칭)를 유지 및 운영하며, 다른 채널을 통해 잠재 고객을 추천합니다.<br/>
                        1.2. 본 계약은 제휴사(이하 BC.GAME)의 웹사이트 BC.GAME 프로모션과 관련된 이용약관에 적용되며, 제휴사는 트래픽에 따라 본 계약에서 정의한 수수료를 지급받습니다. BC.GAME 및 본 계약 조건으로 전송됩니다.<br/>
                        1.3. 순 게임 수익이라는 용어의 정의는 본 계약의 20조에서 찾을 수 있습니다. 향후 다른 제품 또는 제품 그룹이 도입되는 경우 BC.GAME은 각 제품에 대해 순 게임 수익이라는 용어의 개별 정의를 사용할 권리를 보유합니다.
                        <br/><br/>
                        2. 계열사 수락
                        <br/><br/>
                        2.1. 회사는 단독적이고 절대적인 재량으로 등록을 거부할 권리가 있습니다.
                        <br/><br/>
                        3. 자격 조건
                        <br/><br/>
                        3.1. 계열사는 다음을 보증합니다.:<br/>
                        a) 계약에 동의하고 계약을 체결할 수 있는 해당 관할권의 법적 연령입니다.<br/>
                        b) 법적 구속력이 있는 계약을 체결할 자격이 있고 정당한 권한이 있습니다.<br/>
                        c) 본 계약의 조항에 따라 BC.GAME을 마케팅, 판촉 및 광고할 수 있는 모든 권리, 라이선스 및 허가의 소유자입니다.<br/>
                        d) BC.GAME의 판촉과 관련하여 적용 가능한 모든 규칙, 법률 및 규정을 준수합니다.<br/>
                        e) 계약 조건을 완전히 이해하고 수락합니다.
                        <br/><br/>
                        4. 회사의 책임과 의무
                        <br/><br/>
                        4.1. 회사는 추적 링크 구현에 필요한 모든 정보와 마케팅 자료를 제휴사에 제공해야 합니다.<br/>
                        4.2. 회사는 추적 링크를 통해 발생하는 매출을 관리하고 링크를 통해 얻은 수익과 총 수수료를 기록하고 제휴사에 수수료 통계를 제공하며 비즈니스와 관련된 모든 고객 서비스를 처리합니다. 추천된 모든 고객에게 고유한 추적 식별 코드가 할당됩니다.<br/>
                        4.3. 회사는 본 계약 조건에 따라 생성된 트래픽에 따라 지불해야 하는 금액을 제휴사에 지불합니다..
                        <br/><br/>
                        5. 계열사의 책임 및 의무ate
                        <br/><br/>
                        5.1. 계열사는 다음을 보증합니다.<br/>
                        a) 양 당사자의 이익을 극대화하고 때때로 제시될 수 있는 회사의 지침을 준수하기 위해 BC.GAME을 최대한 광범위하게 적극적이고 효과적으로 광고, 마케팅 및 홍보하기 위해 최선의 노력을 다합니다. /또는 온라인에 게시.<br/>
                        b) 자체 비용과 비용으로 잠재적인 플레이어를 BC.GAME에 마케팅하고 추천합니다. 제휴사는 마케팅 활동의 배포, 콘텐츠 및 매너에 대해 전적으로 책임을 집니다. 계열사의 모든 마케팅 활동은 관련 법률에 따라 전문적이고 적절하며 합법적이어야 하며 본 계약을 준수해야 합니다.<br/>
                        c) 제휴 프로그램의 범위 내에서 제공된 추적 링크만 사용합니다. 그렇지 않으면 적절한 등록 및 판매 회계에 대해 어떠한 보장도 할 수 없습니다. 또한 회사의 사전 서면 승인 없이 링크 또는 마케팅 자료를 변경하거나 수정하지 않습니다.<br/>
                        d) 웹 사이트의 개발, 운영 및 유지 관리는 물론 웹 사이트에 표시되는 모든 자료에 대한 책임을 집니다.<br/>
                        5.2. 계열사는 다음을 보증합니다.
                        <br/><br/>
                        a) 비방, 차별, 외설, 불법 또는 기타 부적절하거나 성적으로 노골적이거나 음란하거나 폭력적인 자료가 포함된 행위를 하지 않습니다.<br/>
                        b) 합법적인 도박 연령 미만인 사람을 적극적으로 타겟팅하지 않습니다.<br/>
                        c) 도박 및 그 판촉이 불법인 관할권을 적극적으로 타겟팅하지 않습니다.<br/>
                        d) 불법적이거나 사기적인 활동으로 BC.GAME에 대한 트래픽을 생성하지 않으며, 특히 다음 사항에 국한되지 않습니다.
                        I. 스팸을 보냄.
                        <br/><br/>
                        II. 잘못된 메타태그.
                        <br/><br/>
                        III. 자신의 개인적 사용 및/또는 친척, 친구, 직원 또는 기타 제3자의 사용을 위해 플레이어로 등록하거나 트래커를 통해 플레이어 계정에 직간접적으로 입금하거나 다른 방법으로 시도하는 행위 지불해야 할 수수료를 인위적으로 늘리거나 회사를 사취하는 행위. 이 조항의 위반은 사기로 간주됩니다.
                        <br/><br/>
                        e) BC.GAME 및/또는 회사와 혼동의 위험을 야기할 수 있는 방식으로 웹사이트를 표시하지 않으며 계약 당사자의 웹사이트가 부분적으로 또는 전체적으로 BC.GAME에서 유래했다는 인상을 전달하지 않습니다.<br/>
                        f) 회사에서 전달하고/하거나 웹사이트 https://bc.game/를 통해 온라인으로 제공할 수 있는 마케팅 자료를 침해하지 않고 계열사는 BC.GAME 또는 다음과 같은 기타 용어, 상표 및 기타 지적 재산권을 사용할 수 없습니다. 회사가 서면으로 동의하지 않는 한 회사에 귀속됩니다.
                        
                        <br/><br/>6. 지불
                        <br/><br/>
                        6.1. 회사는 제휴사의 웹사이트 및/또는 기타 채널에서 추천한 신규 고객으로부터 생성된 게임 배팅 금액을 기반으로 제휴사에 수수료를 지불하는 데 동의합니다. 신규 고객은 아직 게임 계정이 없고 추적 링크를 통해 웹사이트에 액세스하고 적절하게 등록하고 BC.GAME 베팅 계정에 최소 입금액과 동일한 비트코인 이체를 하는 회사의 고객입니다. 수수료는 해당되는 경우 부가가치세 또는 기타 세금을 포함하는 것으로 간주됩니다.<br/>
                        6.2. 커미션은 특정 제품에 대한 커미션 구조에 명시된 내용에 따라 게임 배팅 금액의 백분율입니다. 계산은 제품별로 이루어지며 모든 제품별 커미션 구조에 명시되어 있습니다. (자세한 내용은 커미션 규칙참조)<br/>
                        6.3. 사용자는 언제든지 에이전트 시스템에서 수수료를 인출할 수 있습니다. 수수료는 플랫폼 지갑으로 인출됩니다. 사용자는 플랫폼 지갑을 언제든지 원하는 주소로 인출할 수도 있습니다. (에이전트 시스템에서 수수료 추출을 확인하고 플랫폼 지갑에서 거래 기록을 볼 수 있습니다).<br/>
                        6.4. 수수료는 디지털 통화로 수집되며 플랫폼 지갑에서만 수령됩니다. 출금 신청 시 출금페이지에서 올바른 지갑 주소를 제출해야 합니다. 수수료 계산에 오류가 있는 경우 회사는 언제든지 금액을 수정하고 미지급 차액을 대리인에게 즉시 정산하거나 초과 지급된 잔액을 대리인으로부터 회수할 수 있는 권리가 있습니다.<br/>
                        6.5. 제휴사에 의한 대리인 철회 수수료는 전체로 간주되며 표시된 기간 동안 미지불 잔액이 최종 결제됩니다.<br/>
                        6.6. 제휴사가 보고된 미지불 잔액에 동의하지 않는 경우, 칠(7)일 이내에 admin@BC.GAME으로 회사에 이메일을 보내고 분쟁 이유를 표시해야 합니다. 또는 Telegram을 통해 고객 서비스에 문의하십시오. 규정된 기한 내에 이메일을 보내지 않거나 Telegram을 통해 고객 서비스에 연락하지 않는 경우 표시된 기간 동안 미결제 잔액에 대한 취소 불가능한 승인으로 간주됩니다.<br/>
                        6.7. 해당 거래가 약관의 규정을 준수하는지 조사 및 확인하는 동안 대리인을 통한 출금 요청을 최대 60일 동안 지연할 수 있습니다.<br/>
                        6.8. 생성된 트래픽이 불법이거나 본 약관의 조항을 위반하는 경우 지불해야 합니다.<br/>
                        6.9. 제휴사는 사기 또는 위조된 거래를 기반으로 받은 모든 수수료와 법률이 허용하는 최대 범위 내에서 제휴사에 대해 제기될 수 있는 법적 원인 또는 조치에 대한 모든 비용을 반환하는 데 동의합니다.<br/>
                        6.10. 명확성을 기하기 위해 당사자는 일방 당사자가 본 계약을 종료할 때 이전의 미해결 수수료 외에 대리인의 수수료가 더 이상 결제되지 않는다는 데 구체적으로 동의합니다.<br/>
                        6.11.제휴사는 모든 세금, 부과금, 수수료, 요금 및 기타 현지 및 해외(있는 경우)에 지불해야 하는 금액을 제휴사가 세무 당국, 부서 또는 기타 권한 있는 기관으로 지불할 책임이 있습니다. 본 계약에 따라 생성된 수수료의 결과입니다. 회사는 미지급 금액에 대해 어떠한 책임도 지지 않지만 계열사가 지불해야 하는 것으로 확인된 금액에 대해 책임을 지지 않으며 이에 따라 계열사는 이와 관련하여 회사를 면책합니다.
                        <br/><br/>
                        7. 종료
                        <br/><br/>
                        본 계약은 일방 당사자가 상대방에게 삼십(30)일 서면 통지를 함으로써 종료될 수 있습니다. 서면 통지는 이메일로 할 수 있습니다.<br/>
                        7.2. 계약 당사자는 본 계약 종료 시 다음 사항에 동의합니다.<br/>
                        a) 제휴사는 커뮤니케이션이 상업적이든 비상업적이든 관계없이 제휴자의 웹사이트 및/또는 기타 마케팅 채널 및 커뮤니케이션에서 BC.GAME에 대한 모든 참조를 제거해야 합니다.<br/>
                        b) 본 계약에 따라 계열사에 부여된 모든 권리와 라이선스는 즉시 종료되며 모든 권리는 해당 라이선스 제공자에게 귀속되며 계열사는 회사에 귀속된 상표, 서비스 마크, 로고 및 기타 명칭의 사용을 중단합니다.<br/>
                        c) 제휴사는 해지 발효일 현재 적립 및 미지급 수수료에 대해서만 자격이 있습니다. 제휴사는 이 종료일 이후에 커미션을 받거나 받을 자격이 없습니다.<br/>
                        d) 본 계약이 계열사의 위반에 근거하여 회사에 의해 종료되는 경우, 회사는 그러한 위반으로 인해 발생하는 모든 청구에 대한 담보로 종료 날짜를 기준으로 계열사의 수익이지만 미지급된 수수료를 보류할 수 있습니다. 또한 계열사가 본 계약의 조항을 위반하여 회사가 종료하는 경우 통지 기간이 필요하지 않으며 그러한 종료는 회사가 계열사에 간단히 통지하는 즉시 효력을 발생합니다.<br/>
                        e) 계열사는 계열사가 소유, 보관 및 관리하는 모든 기밀 정보(및 모든 사본 및 파생물)를 회사에 반환해야 합니다.<br/>
                        f) 계열사는 본질적으로 해지 후에도 존속하도록 설계된 의무를 제외하고 그러한 해지일 이후에 발생하거나 발생하는 모든 의무와 책임에서 회사를 면제합니다. 해지로 인해 해지 이전에 발생한 본 계약 위반으로 인해 발생하는 책임 및/또는 본 계약 종료 후 언제든지 위반이 발생하더라도 기밀 정보 위반으로 인해 발생하는 책임에서 계열사가 면제되지는 않습니다. 회사에 대한 계열사의 기밀 유지 의무는 본 계약이 종료된 후에도 지속됩니다.
                        <br/><br/>
                        8. 보증
                        <br/><br/>
                        8.1. 제휴사는 인터넷 사용에 따른 위험 부담을 감수하고 이 제휴 프로그램이 명시적이든 묵시적이든 어떠한 보증이나 조건 없이 있는 그대로그리고사용 가능한 상태로제공된다는 점을 명시적으로 인정하고 동의합니다. 특정 시간이나 특정 위치에서 웹사이트에 액세스할 수 있다는 보장은 없습니다.<br/>
                        8.2. 회사는 어떠한 경우에도 BC.GAME 웹사이트 또는 계열사의 실패, 지연 또는 중단으로 인해 전체 또는 부분적으로 발생한 부정확성, 오류 또는 누락, 손실, 부상 또는 손해에 대해 계열사 또는 다른 사람에 대해 책임을 지지 않습니다. 프로그램.<br/>
                        9.1. 계열사는 합리적인 변호사 및 전문가 수임료를 포함하여 모든 청구 및 책임으로부터 회사와 회사의 계열사, 승계인, 임원, 직원, 대리인, 이사, 주주 및 변호사를 무료로 보호하고 면책하고 면책하는 데 동의합니다. , 다음과 관련되거나 다음과 관련하여 발생합니다.
                        <br/><br/>
                        a) 본 계약에 따른 계열사의 진술, 보증 또는 계약 위반.<br/>
                        b) 제휴사의 마케팅 자료 사용(또는 오용).<br/>
                        c) 제휴사의 사용자 ID 및 비밀번호로 발생하는 모든 행위 및 활동.<br/>
                        d) 제휴자의 웹사이트에 포함되거나 제휴자의 정보 및 데이터의 일부로 포함된 모든 명예 훼손, 비방 또는 불법 자료.<br/>
                        e) 계열사의 웹사이트 또는 계열사의 정보 및 데이터가 제3자의 특허, 저작권, 상표 또는 기타 지적 재산권을 침해하거나 제3자의 개인 정보 보호 또는 퍼블리시티권을 침해한다는 주장 또는 주장.<br/>
                        f) 제휴사의 웹사이트 또는 제휴사의 정보 및 데이터에 대한 제3자 액세스 또는 사용.<br/>
                        g) 제휴 웹사이트와 관련된 모든 클레임.<br/>
                        h) 본 계약의 모든 위반.<br/>
                        9.2. 회사는 모든 문제를 방어하기 위해 자체 비용으로 참여할 권리를 보유합니다.
                        <br/><br/>
                        10. 회사 권리
                        <br/><br/>
                        10.1. 회사 또는 BC.GAME 정책을 준수하고 회사 또는 BC.GAME의 이익을 보호하기 위해 회사 또는 BC.GAME은 모든 플레이어를 거부하거나 플레이어 계정을 폐쇄할 수 있습니다.
                        <br/><br/>
                        10.2. T회사는 회사의 정책을 준수하고 회사의 이익을 보호하기 위해 필요한 경우 신청자를 거부하거나 계열사의 계정을 폐쇄할 수 있습니다. 계열사가 본 계약 또는 회사의 약관 또는 회사의 기타 규칙, 정책 및 지침을 위반하는 경우, 회사는 계열사의 계정을 폐쇄하는 것 외에도 이익을 보호하기 위해 법적으로 다른 조치를 취할 수 있습니다.
                        <br/><br/>
                        11. 수수료 구성
                        <br/><br/>
                        11.1.에이전트에게 지불되는 수수료는 게임 베팅 금액의 백분율입니다. 정확한 수수료 구조는 이 계약의 일부입니다. 자세한 내용은 수수료 규칙조항을 참조하십시오. 이 경우 수수료는 플레이어의 플랫폼 지갑(디지털 통화)으로 인출되지만 다른 주소로 직접 인출되지는 않습니다.
                        <br/><br/>
                        12. 할당
                        <br/><br/>
                        12.1. 제휴사는 회사의 사전 서면 동의 없이 법률 또는 기타 방법으로 본 계약을 양도할 수 없습니다. 계열사가 BC.GAME의 다른 계열사를 인수하거나 다른 방식으로 통제하는 경우 계정은 개별 조건에 따라 공존합니다.<br/>
                        12.2. 회사는 법률 또는 기타 방법에 따라 제휴사의 사전 동의 없이 언제든지 본 계약을 양도할 수 있습니다.
                        <br/><br/>
                        13. 포기하지 않음
                        <br/><br/>
                        13.1. 회사가 본 계약에 요약된 조건에 대한 계열사의 준수를 시행하지 않는다고 해서 언제든지 해당 조건을 시행할 회사의 권리를 포기하는 것은 아닙니다.
                        <br/><br/>
                        14. 불가항력
                        <br/><br/>
                        14.1. 이러한 지연 또는 실패가 노동 분쟁을 포함하되 이에 국한되지 않는 합당한 통제 범위를 벗어난 원인으로 인해 발생하고 해당 당사자의 잘못이 아닌 경우 어느 당사자도 본 계약에 따른 의무를 이행하지 않거나 지연된 것에 대해 상대방에 대해 책임을 지지 않습니다. , 파업, 산업 혼란, 천재지변, 테러 행위, 홍수, 번개, 유틸리티 또는 통신 장애, 지진 또는 기타 사상자. 불가항력 사건이 발생하는 경우, 불이행 당사자는 불가항력 사건에 의해 금지된 이행이 방지된 범위 내에서 면제됩니다. 단, 불가항력 상황이 삼십(30)일을 초과하는 기간 동안 지속되는 경우 일방 당사자는 통지 없이 계약을 해지할 수 있습니다.
                        <br/><br/>
                        15. 당사자의 관계
                        <br/><br/>
                        15.1. 본 계약에 포함된 어떠한 내용이나 본 계약의 당사자가 취한 조치는 일방 당사자(또는 해당 당사자의 직원, 대리인 또는 대표자)의 직원 또는 상대방의 법적 대리인을 구성하는 것으로 간주되지 않습니다. 당사자 간 또는 당사자 간에 파트너십, 합작 투자, 협회 또는 신디케이션을 생성하지 않으며, 당사자를 대신하여 계약 또는 약속을 체결할 명시적 또는 묵시적 권리, 권한 또는 권한을 부여하지 않습니다(또는 의무를 부과하지 않음). 상대방.
                        <br/><br/>
                        16. 분리 가능성/포기
                        <br/><br/>
                        16.1. 가능한 한 본 계약의 각 조항은 해당 법률에 따라 효과적이고 유효한 방식으로 해석되지만, 본 계약의 조항이 어떤 면에서든 무효, 불법 또는 시행 불가능한 것으로 판명되면 해당 조항은 무효가 됩니다. 본 계약의 나머지 부분을 무효화하지 않고 그러한 무효성 또는 집행 불가능한 범위 내에서만. 권리를 행사하지 않거나 시행하지 않음으로 인해 권리 포기가 암시되지 않으며 유효하려면 서면으로 작성해야 합니다.
                        <br/><br/>
                        17. 기밀성
                        <br/><br/>
                        17.1. 비즈니스 및 재무, 고객 및 구매자 목록, 가격 및 판매 정보 및 제품, 기록, 운영, 사업 계획, 프로세스, 제품 정보, 비즈니스 노하우 또는 논리와 관련된 모든 정보를 포함하되 이에 국한되지 않는 모든 정보 , 영업 비밀, 시장 기회 및 회사의 개인 데이터는 기밀로 취급됩니다. 그러한 정보는 회사가 사전에 명시적이고 서면으로 동의한 경우를 제외하고는 자신의 상업적 또는 기타 목적으로 사용하거나 직간접적으로 다른 사람이나 제3자에게 누설해서는 안 됩니다. 이 조항은 본 계약이 종료된 후에도 유효합니다.<br/>
                        17.2. 계열사는 본 계약에 따른 의무 이행 이외의 목적으로 기밀 정보를 사용하지 않을 의무가 있습니다.<br/>
                        <br/><br/>
                        18. 본 계약의 변경 사항
                        <br/><br/>
                        18.1. 회사는 본 계약에 명시된 조건에 따라 제휴사에 사전 통지 없이 언제든지 단독 재량으로 본 계약의 조항을 수정, 변경, 삭제 또는 추가할 수 있는 권리를 보유합니다. 이러한 변경 사항은 BC.GAME에 게시됩니다.<br/>
                        18.2. 본 계약의 번역된 버전의 의미 사이에 불일치가 있는 경우 영어 버전이 우선합니다.<br/><br/>
                        19. 상표
                        <br/><br/>
                        19.1. 본 계약에 포함된 어떠한 내용도 상대방의 상표, 상호, 서비스 마크 또는 기타 지적 재산권[이하 간단히 '상표'라고 함]에 대한 권리, 소유권 또는 이익을 어느 한쪽 당사자에게 부여하지 않습니다. 기간 중 또는 그 이후에는 어느 당사자도 상대방 또는 상대방 회사 그룹 내 회사의 상표에 대해 다른 사람이 이의를 제기하거나 등록하거나 등록을 시도하거나 이의를 제기하거나 지원하거나 허용하지 않습니다. 단, 양 당사자는 기본적으로 상대방 또는 상대방의 회사 그룹에 포함된 회사에 속한 상표와 기본적으로 유사하거나 혼동을 일으킬 정도로 유사한 상표를 등록하거나 등록하려고 시도하지 않습니다.

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 레퍼럴 보상 규칙 -->
<div id="referral_rule-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-base">
        <div class="modal-content">
            <div class="modal-body bg-modaldark relative rounded referral_rule_modal">
                <div class="relative flex items-center justify-between p-4">
                    <p class="text-tit font-extrabold text-base">레퍼럴 보상 규칙</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="max-h-[660px] overflow-y-auto scrollbar font-medium">
                    <div class="p-3 md:p-5 pb-10">
                        <p class="text-center text-tit">레퍼럴 보상을 받는 방법</p>
                        <div class="flex items-center flex-col md:flex-row md:gap-0 gap-3 mt-4">
                            <div class="flex justify-center flex-col p-5 md:pr-10 bg1 w-full md:w-1/3 md:h-[152px] rounded">
                                <p class="text-lg md:text-4xl font-extrabold text-primary">1</p>
                                <p class="text-tit text-sm md:text-base">친구에게 <span class="text-primary">공유</span></p>
                                <p class="text-xs md:text-sm">친구에게 추천 링크 및 코드 공유</p>
                            </div>
                            <div class="flex justify-center flex-col p-5 md:pl-10 bg2 w-full md:w-1/3 md:h-[152px] rounded">
                                <p class="text-lg md:text-4xl font-extrabold text-primary">2</p>
                                <p class="text-tit text-sm md:text-base">Get <span class="text-primary">$1000</span></p>
                                <p class="text-xs md:text-sm">지금은 귀하의 보상이 잠겨있습니다.</p>
                            </div>
                            <div class="flex justify-center flex-col p-5 md:pl-10 bg3 w-full md:w-1/3 md:h-[152px] rounded">
                                <p class="text-lg md:text-4xl font-extrabold text-primary">3</p>
                                <p class="text-tit text-sm md:text-base">레벨 업 및 <span class="text-primary">받기!</span></p>
                                <p class="text-xs md:text-sm">친구의 VIP 레벨에 따라 보상이 잠금 해제됩니다(아래 규칙 참조).</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 md:p-5 pb-10 bg-sponsor">
                        <div class="flex items-center justify-center gap-2">
                            <span class="block w-12 h-[2px]" style="background:linear-gradient(90deg,#98A7B5 0%,rgba(152,167,181,0) 100%); transform:scaleX(-1)"></span>
                            <p class="text-tit">잠금해제 규칙</p>
                            <span class="block w-12 h-[2px]" style="background:linear-gradient(90deg,#98A7B5 0%,rgba(152,167,181,0) 100%);"></span>
                        </div>
                        <div class="bg-modaldark p-3">
                            <table class="table table-striped noline mo_pad-s rounded text-xs md:text-base"> 
                                <thead> 
                                    <tr> 
                                        <th class="whitespace-nowrap text-left">친구 레벨</th> 
                                        <th class="whitespace-nowrap text-center">총 롤링</th> 
                                        <th class="whitespace-nowrap text-right">잠금해제된 금액</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 04</td>
                                        <td class="text-center font-semibold">1000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+0.50</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 08</td>
                                        <td class="text-center font-semibold">5000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+2.50</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 14</td>
                                        <td class="text-center font-semibold">17000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+5.00</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 22</td>
                                        <td class="text-center font-semibold">49000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+12.00</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 30</td>
                                        <td class="text-center font-semibold">129000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+25.00</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 38</td>
                                        <td class="text-center font-semibold">321000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+50.00</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 46</td>
                                        <td class="text-center font-semibold">769000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+80.00</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 54</td>
                                        <td class="text-center font-semibold">1793000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+120.00</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 62</td>
                                        <td class="text-center font-semibold">4097000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+205.00</td> 
                                    </tr> 
                                    <tr class="rounded">
                                        <td class="text-left text-tit font-bold">VIP 70</td>
                                        <td class="text-center font-semibold">9217000</td> 
                                        <td class="text-right text-yellow font-extrabold"><img class="inline-flex w-5 mr-1 mb-1" src="/bcGame/dist/custom_img/coin/USD.webp" alt="">+500.00</td> 
                                    </tr> 
                                </tbody> 
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 커미션 보상 규칙 -->
<div id="commission_info-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-base">
        <div class="modal-content">
            <div class="modal-body bg-stand relative rounded comission_modal">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">커미션 보상 규칙</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-4 py-6 max-h-[660px] overflow-y-auto scrollbar font-medium">
                    <ul class="list-disc pl-4">
                        <li>커미션 비율은 게임에 따라 다릅니다.</li>
                    </ul>

                    <div class="mt-5 p-5 rounded bg1">
                        <div class="flex items-center gap-3">
                            <div class="flex flex-start gap-1">
                                <b class="text-tit text-4xl font-bold">7%</b>
                                <div class="tooltip_custom cursor-pointer">
                                    <b class="flex items-center justify-center w-5 h-5 rounded-full bg-[#D9D9D9] dark:bg-[#656B74] text-back">?</b>
                                    <div class="hover_box left_side w-60 shadow bg-modaldark rounded p-3">
                                        계산 예: 내기 100<br/>
                                        커미션= 100 ✕ 1% ✕ 7% = 0.07
                                    </div>
                                </div>
                            </div>
                            1% 베팅 의
                        </div>
                        <p class="mt-2 text-sub">게임: <span class="text-basic">오리지날 게임</span></p>
                    </div>
                    <div class="mt-4 p-5 rounded bg2">
                        <div class="flex items-center gap-3">
                            <div class="flex flex-start gap-1">
                                <b class="text-tit text-4xl font-bold">15%</b>
                                <div class="tooltip_custom cursor-pointer">
                                    <b class="flex items-center justify-center w-5 h-5 rounded-full bg-[#D9D9D9] dark:bg-[#656B74] text-back">?</b>
                                    <div class="hover_box left_side w-60 shadow bg-modaldark rounded p-3">
                                        계산 예: 내기 100<br/>
                                        커미션= 100 ✕ 1% ✕ 15% = 0.15
                                    </div>
                                </div>
                            </div>
                            1% 베팅 의
                        </div>
                        <p class="mt-2 text-sub">게임: <span class="text-basic">슬롯, 라이브 카지노</span></p>
                    </div>
                    <div class="mt-4 p-5 rounded bg3">
                        <div class="flex items-center gap-3">
                            <div class="flex flex-start gap-1">
                                <b class="text-tit text-4xl font-bold">25%</b>
                                <div class="tooltip_custom cursor-pointer">
                                    <b class="flex items-center justify-center w-5 h-5 rounded-full bg-[#D9D9D9] dark:bg-[#656B74] text-back">?</b>
                                    <div class="hover_box left_side w-60 shadow bg-modaldark rounded p-3">
                                        계산 예: 내기 100<br/>
                                        커미션= 100 ✕ 1% ✕ 25% = 0.25
                                    </div>
                                </div>
                            </div>
                            1% 베팅 의
                        </div>
                        <p class="mt-2 text-sub">게임: <span class="text-basic">스포츠</span></p>
                    </div>

                    <div class="bg-back py-2 px-4 flex items-center gap-4 mt-5">
                        <b class="flex items-center justify-center w-5 h-5 rounded-full bg-[#D9D9D9] dark:bg-[#656B74] text-back">!</b>
                        <div>
                            커미션 요율을 사용자 정의한 경우 여기에서 요율을 확인하십시오.<br/>
                            <a href="javascript:;" class="text-primary font-bold">내 커미션 비율 보기 <svg class="inline-flex w-3 h-3 ml-1 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_NewWindow"></use></svg></a>
                        </div>
                    </div>

                    <ul class="list-disc pl-4 mt-5">
                        <li>모든 공공 환경(예: 대학, 학교, 도서관, 사무실 공간)에서는 컴퓨터와 IP 주소는 다른 사람과 공유됩니다.</li>
                        <li class="mt-5">베팅 추첨에 대한 우리의 결정은 입금이 이루어지고 베팅이 성공적으로 완료된 후 전적으로 우리의 재량에 따라 결정됩니다.</li>
                        <li class="mt-5">커미션은 언제든지 대시보드에서 내부 BC.GAME 지갑으로 인출할 수 있습니다. (대시보드에서 커미션 추출을 확인하고 지갑에서 잔액을 확인하세요).</li>
                        <li class="mt-5">우리는 시장에서 대부분의 통화를 지원합니다.</li>
                        <li class="mt-5">시스템은 24시간마다 커미션을 계산합니다.</li>
                    </ul>
                    <div class="mt-8 rounded border border-slate-300 border-opacity-60 p-4 text-center">
                        규정에 대해 궁금한 사항이 있으시면 <a href="javascript:;" class="text-primary">고객센터<svg class="inline-flex w-3 h-3 ml-1 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_NewWindow"></use></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- JB 안내 모달 -->
 <div id="jb_info-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body bg-stand relative rounded ">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">JB에 대하여</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-4 pb-6 ">
                    <div class="relative">
                        <img src="/bcGame/dist/custom_img/fiat.png" alt="">
                        <a href="javascript:;" class="absolute left-11 bottom-1/3 text-white">컨트랙트 보기 <svg class="inline-flex w-4 h-4 fill-white"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_NewWindow"></use></svg></a>
                    </div>
                    <div class="mt-4 bg-back p-4 font-medium">
                        <span class="text-tit">JB 란?</span><br/><br/>

                        JB 는 BC.GAME 플랫폼의 독점 게임 화폐(자체 게임 화폐)입니다. VIP 레벨업, 럭키스핀 등 이벤트 보상으로 획득할 수 있습니다.<br/><br/>

                        더 놀라운 JB 기능이 곧 출시될 예정입니다... 계속 지켜봐 주세요!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BCD 안내 모달 -->
<div id="bcd_info-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body bg-stand relative rounded ">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">BCD에 대하여</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-4 pb-6 ">
                    <div class="relative">
                        <img src="/bcGame/dist/custom_img/bonus/bcd-1.webp" alt="">
                        <a href="javascript:;" class="absolute left-11 bottom-1/3 text-white">컨트랙트 보기 <svg class="inline-flex w-4 h-4 fill-white"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_NewWindow"></use></svg></a>
                    </div>
                    <div class="mt-4 bg-back p-4 font-medium">
                        
                        <span class="text-tit">BCD 란?</span><br/><br/>

                        BCD(BC 달러)는 BC.GAME에서 출시한 특별 통화입니다. BCD로 게임, 팁, 코인 드롭, 레인을 즐길 수 있습니다.<br/><br/>

                        <span class="text-tit">BCD 를 다른 가상화폐로 환전할 수 있나요?</span><br/><br/>

                        전적으로! BCD를 <button class="text-primary" onclick="tabchange('swap')">BC 스왑</button>로 언제든지 다른 통화로 교환할 수 있습니다.<br/><br/>

                        <span class="text-tit">BCD 의 특별한 점은 무엇인가요??</span><br/><br/>

                        볼트프로에 BCD를 저장하시면 최대 10%의 연간 수익률을 누릴 수 있습니다. BCD 수집을 즐기십시오!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 볼트프로 > 보안규정 모달 -->
<div id="vault_rule-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body bg-modaldark relative rounded ">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">볼트 프로 룰</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-4 pb-6 ">
                    •Vault Pro의 자금 입출금은 2FA로 보호되며 예금자가 언제든지 접근할 수 있습니다.<br/><br/>

                    •당일이자는 00:00부터 23:59(UTC+0)까지 출금되지 않은 금액을 기준으로 매일 계산됩니다. 이자는 02:00(UTC+0)에 계산됩니다. 자금 입금 후 24시간 후.<br/><br/>

                    •Vault Pro의 BC.GAME <b class="font-bold text-primary">자금(암호화폐)을 보장합니다.</b>은 예금자를 제외한 누구도 건드리지 않습니다. 그것은 당신의 것이고, 당신이 안전하게 사용할 수 있도록 항상 안전하게 유지될 것입니다!
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 볼트프로 > 입금 -->
<div id="vault_deposit-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-stand relative rounded ">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <p class="text-tit font-extrabold text-base">입금</p>
                    <button class="basic-hover ml-8" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="p-4 pb-6 overflow-y-auto scrollbar h-[660px]">
                    <div>양</div>
                    <div class="flex items-center justify-between bg-modaldark p-1.5 mt-2 rounded">
                        <input class="form-control nofocus pl-2 text-tit text-xl font-extrabold !bg-transparent" value="0">
                        <button class="btn-normal h-10 px-4 shrink-0 mr-1 rounded">최대</button>
                        <button class="flex items-center shrink-0 justify-center gap-3 btn-normal h-10 w-32 rounded text-tit text-xs" data-tw-toggle="modal" data-tw-target="#asset_portfolio-modal">
                            <img class="w-6" src="/bcGame/dist/custom_img/coin/SATS.webp">
                            SATS 
                            <svg class="w-3.5 h-3.5 fill-basic rotate-90"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                        </button>
                    </div>
                    <div class="mt-2 flex items-center justify-between">
                        <p>이용가능: <b class="text-tit font-bold">0.00 SATS</b></p>
                        <p>잠김 금액: <b class="text-tit font-bold">0.00 SATS</b></p>
                    </div>
                    <div class="text-center mt-10">
                        <button class="btn-green w-1/2 h-12 font-bold flex items-center gap-1 justify-center mx-auto" disabled>볼트프로로 전송하기</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 롤오버 개요 모달 -->
<div id="rollover-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content overflow-hidden relative rounded">
            <div class="modal-body relative bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <p class="text-tit font-extrabold text-base">롤오버 개요</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full">
                    <div class="flex items-center gap-3 px-4 py-6">
                        <div class="custom_select w-48">
                            <button class="btn w-32 h-9 flex px-4 items-center justify-between border-none bg-white dark:bg-back">
                                <span>모든 유형</span>
                                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                <li class="py-2 on">모든 유형</li>
                                <li class="py-2">입금</li>
                                <li class="py-2">보너스</li>
                            </ul>
                        </div>
                        <div class="custom_select w-48">
                            <button class="btn w-32 h-9 flex px-4 items-center justify-between border-none bg-white dark:bg-back">
                                <span>모든 상태</span>
                                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
                            </button>
                            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-modaldark text-sub">
                                <li class="py-2 on">모든 상태</li>
                                <li class="py-2">아직 시작하지 않았습니다.</li>
                                <li class="py-2">진행 중</li>
                                <li class="py-2">완료</li>
                                <li class="py-2">취소</li>
                                <li class="py-2">만료되었습니다.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-4 px-4 h-[490px] overflow-y-auto scrollbar">
                        <table class="table table-hover noline pad-s text-xs sm:text-sm">   
                            <colgroup>
                                <col width="25%">
                                <col width="25%">
                                <col class="hidden sm:table-cell" width="25%">
                                <col width="25%">
                            </colgroup>
                            <thead class="bg-back">
                                <tr class="text-center">
                                    <th class="whitespace-nowrap text-left">유형</th>
                                    <th class="whitespace-nowrap text-center">양</th>
                                    <th class="whitespace-nowrap text-center hidden sm:table-cell">시간</th>
                                    <th class="whitespace-nowrap text-right">상태</th>
                                </tr>
                            </thead>
                            <tbody class="cursor-pointer">
                                <tr onclick="modalInHandle('rollover-modal','rain_detail-body')">
                                    <td class="text-left text-tit">신규 럭키 스핀 보너스</td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center gap-1">₩ 6,429.02 <img class="w-3 h-3" src="/bcGame/dist/custom_img/coin/USDC.webp" alt=""></div>
                                    </td>
                                    <td class="text-center hidden sm:table-cell">2023. 11. 8. 오전 10:21:12</td>
                                    <td class="text-right text-tit">
                                        <div class="flex items-center justify-end gap-2">
                                            <i class="w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i>
                                            만료되었습니다.
                                            <svg class="w-3 h-3 ml-1 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                                        </div>
                                    </td>
                                </tr>
                                <tr onclick="modalInHandle('rollover-modal','rain_detail-body')">
                                    <td class="text-left text-tit">신규 럭키 스핀 보너스</td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center gap-1">₩ 6,429.02 <img class="w-3 h-3" src="/bcGame/dist/custom_img/coin/USDC.webp" alt=""></div>
                                    </td>
                                    <td class="text-center hidden sm:table-cell">2023. 11. 8. 오전 10:21:12</td>
                                    <td class="text-right text-tit">
                                        <div class="flex items-center justify-end gap-2">
                                            <i class="w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i>
                                            만료되었습니다.
                                            <svg class="w-3 h-3 ml-1 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex gap-2 items-center justify-end mt-4 py-4 px-4 bg-back2">
                        <p class="text-xs">총 1</p>
                        <div class="flex gap-0 text-base px-4 py-1 bg-back2 rounded font-medium">
                            <button class="w-6 h-6 basic-hover active font-extrabold">1</button>
                            <button class="w-6 h-6 basic-hover">2</button>
                            <button class="w-6 h-6 basic-hover">3</button>
                        </div>
                        <div class="flex gap-1">
                            <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                            <button class="btn-normal w-8 h-8 basic-hover rounded"><svg class="w-4 h-4 mx-auto"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="rain_detail-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('rollover-modal','rain_detail-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">롤오버 디테일</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-4">
                    <div class="text-center pt-2 pb-6">
                        <img class="w-12 mx-auto" src="./dist/custom_img/coin/USDC.webp" alt="">
                        <p class="mt-1 text-tit text-base">+ <b>5.00383700</b> USDC</p>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <div>상태</div>
                        <div class="text-tit"><i class="inline-flex w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i> 만료되었습니다.</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>유형</div>
                        <div class="text-tit">신규 럭키 스핀 보너스</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>가능 게임</div>
                        <div class="text-primary cursor-pointer underline" onclick="modalInHandle('rollover-modal','rain_bonusgame-body')">게임 보기</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>생성일</div>
                        <div class="text-tit">2023. 11. 8. 오전 10:21:12</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>만료</div>
                        <div class="text-tit">2023. 11. 15. 오전 10:21:12</div>
                    </div>

                    <div class="my-3 border-t border-solid border-slate-300"></div>

                    <div class="flex items-center justify-between py-2">
                        <div>롤오버 배수</div>
                        <div class="text-tit">60.00x</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>총 필요 롤링</div>
                        <div class="text-tit">₩386,262.04</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>롤링 완료</div>
                        <div class="text-tit">₩0.00</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>롤링 필요</div>
                        <div class="text-tit">₩386,262.04</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>출금 가능 자금</div>
                        <div class="text-tit">₩6,437.70
                        </div>
                    </div>
                </div>

            </div>

             <!-- 보너스를 위한 게임 -->
             <div class="rain_bonusgame-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('rollover_detail-modal','rain_bonusgame-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">보너스를 위한 게임</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="h-[660px] overflow-y-auto scrollbar w-full p-4">
                    <ul class="grid grid-cols-4 gap-4">
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 롤오버 디테일 -->
<div id="rollover_detail-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">

            <div class=" modal-body relative bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <p class="text-tit font-extrabold text-base">롤오버 디테일</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="w-full p-4 h-[660px] overflow-y-auto scrollbar">
                    <div class="text-center pt-2 pb-6">
                        <img class="w-12 mx-auto" src="./dist/custom_img/coin/USDC.webp" alt="">
                        <p class="mt-1 text-tit text-base">+ <b>5.00383700</b> USDC</p>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <div>상태</div>
                        <div class="text-tit"><i class="inline-flex w-1.5 h-1.5 bg-[#9ba7b4] rounded-full"></i> 만료되었습니다.</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>유형</div>
                        <div class="text-tit">신규 럭키 스핀 보너스</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>가능 게임</div>
                        <div class="text-primary cursor-pointer underline" onclick="modalInHandle('rollover_detail-modal','rain_bonusgame-body')">게임 보기</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>생성일</div>
                        <div class="text-tit">2023. 11. 8. 오전 10:21:12</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>만료</div>
                        <div class="text-tit">2023. 11. 15. 오전 10:21:12</div>
                    </div>

                    <div class="my-3 border-t border-solid border-slate-300"></div>

                    <div class="flex items-center justify-between py-2">
                        <div>롤오버 배수</div>
                        <div class="text-tit">60.00x</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>총 필요 롤링</div>
                        <div class="text-tit">₩386,262.04</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>롤링 완료</div>
                        <div class="text-tit">₩0.00</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>롤링 필요</div>
                        <div class="text-tit">₩386,262.04</div>
                    </div>
                    <div class="flex items-center justify-between py-2">
                        <div>출금 가능 자금</div>
                        <div class="text-tit">₩6,437.70
                        </div>
                    </div>
                </div>

            </div>

             <!-- 보너스를 위한 게임 -->
             <div class="rain_bonusgame-body modal-body relative modal-in bg-stand rounded">
                <div class="relative flex items-center justify-between p-4 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <button onclick="modalInHandle('rollover_detail-modal','rain_bonusgame-body')"><svg class="w-4 h-4 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                        <p class="text-tit font-extrabold text-base">보너스를 위한 게임</p>
                    </div>
                    <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
                <div class="h-[660px] overflow-y-auto scrollbar w-full p-4">
                    <ul class="grid grid-cols-4 gap-4">
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img1.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img2.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img3.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img4.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img5.png" alt="">
                                <p class="py-2 text-center text-tit">FA CHAI</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img6.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus/p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img7.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                        <li class="bg-modaldark">
                            <a href="javascript:;">
                                <img src="/bcGame/dist/custom_img/game/game_img8.png" alt="">
                                <p class="py-2 text-center text-tit">Platipus</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 자산 포트폴리오 -->
<div id="asset_portfolio-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            
            <div class="modal-body relative rounded bg-stand">
                <div class="relative flex items-center justify-between p-4 py-2 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <p class="text-tit font-extrabold text-base">자산 포트폴리오</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="relative w-full">
                            <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                            <input type="text" id="cash_input" class="form-control type02 pl-10" placeholder="검색">
                        </div>
                        <button class="basic-hover ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                    </div>
                </div>
                <div class="w-full p-6 px-0">

                    <div class="px-10 pb-4">
                        <ul class="nav nav-boxed-tabs bg-back rounded p-0.5" role="tablist">
                            <li id="deposit-pot_tab01" class="nav-item w-full" role="presentation"> 
                                <button class="w-full py-1 text-basic active" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab01" type="button" role="tab" aria-controls="deposit-pot_tab01" aria-selected="true">화폐</button>
                            </li>
                            <li id="deposit-pot_tab02" class="nav-item w-full" role="presentation"> 
                                <button class="w-full py-1 text-basic" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab02" type="button" role="tab" aria-controls="deposit-pot_tab02" aria-selected="false">mNFT</button>
                            </li>
                        </ul>
                    </div>
                    <div class="overflow-y-auto scrollbar h-[580px] p-4 px-8">
                        <div class="tab-content">
                            <div id="deposit-pot_tab01" class="tab-pane active" role="tabpanel" aria-labelledby="deposit-pot_tab01" >
                                <div class="flex justify-between p-3 rounded cursor-pointer border border-solid border-primary">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" alt=""><b class="text-tit font-extrabold">KRW</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/ARS.webp" alt=""><b class="text-tit font-extrabold">ARS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CLP.webp" alt=""><b class="text-tit font-extrabold">CLP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp" alt=""><b class="text-tit font-extrabold">IDR</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AUD.webp" alt=""><b class="text-tit font-extrabold">AUD</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AZN.webp" alt=""><b class="text-tit font-extrabold">AZN</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/BDT.webp" alt=""><b class="text-tit font-extrabold">BDT</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CAD.webp" alt=""><b class="text-tit font-extrabold">CAD</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp" alt=""><b class="text-tit font-extrabold">COP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EGP.webp" alt=""><b class="text-tit font-extrabold">EGP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EUR.webp" alt=""><b class="text-tit font-extrabold">EUR</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GBP.webp" alt=""><b class="text-tit font-extrabold">GBP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GHS.webp" alt=""><b class="text-tit font-extrabold">GHS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/JPY.webp" alt=""><b class="text-tit font-extrabold">JPY</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KES.webp" alt=""><b class="text-tit font-extrabold">KES</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KGS.webp" alt=""><b class="text-tit font-extrabold">KGS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                            </div>
                            <div id="deposit-pot_tab02" class="tab-pane" role="tabpanel" aria-labelledby="deposit-pot_tab02">
                                <div class="h-80 py-10 text-center ">
                                    <img class="w-48 mx-auto" src="/bcGame/dist/custom_img/empty.webp" alt="">
                                    <p class="-mt-5 text-basic opacity-70">코인 또는 토큰을 찾을 수 없음</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="p-6 px-10 border-t border-slate-200 border-solid flex items-center justify-between">
                        <div>
                            <div class="form-check form-switch"> 
                                <input id="top-cash_check" class="form-check-input legal_check" type="checkbox" checked> 
                                <label class="form-check-label" for="top-cash_check">법정화폐로 보기</label> 
                            </div>
                        </div>
                        <div>
                            <div class="form-check form-switch"> 
                                <input id="top-cash_check02" class="form-check-input small_check" type="checkbox"> 
                                <label class="form-check-label" for="top-cash_check02">작게보기</label> 
                            </div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 자산 포트폴리오2 -->
<div id="asset_portfolio2-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content overflow-hidden relative rounded">
            
            <div class="modal-body relative rounded bg-stand">
                <div class="relative flex items-center justify-between p-4 py-2 bg-modaldark">
                    <div class="flex items-center gap-2">
                        <p class="text-tit font-extrabold text-base">자산 포트폴리오</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="relative w-full">
                            <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                            <input type="text" id="cash_input" class="form-control type02 pl-10" placeholder="검색">
                        </div>
                        <button class="p-2" onclick="modalInHandle('asset_portfolio2-modal','wallet_setting-body')"><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_AddSub"></use></svg></button>
                        <button class="basic-hover ml-2" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                    </div>
                </div>
                <div class="w-full p-6 px-0">

                    <div class="px-10 pb-4">
                        <ul class="nav nav-boxed-tabs bg-back rounded p-0.5" role="tablist">
                            <li id="deposit-pot_tab01" class="nav-item w-full" role="presentation"> 
                                <button class="w-full py-1 text-basic active" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab01" type="button" role="tab" aria-controls="deposit-pot_tab01" aria-selected="true">화폐</button>
                            </li>
                            <li id="deposit-pot_tab02" class="nav-item w-full" role="presentation"> 
                                <button class="w-full py-1 text-basic" data-tw-toggle="pill" data-tw-target="#deposit-pot_tab02" type="button" role="tab" aria-controls="deposit-pot_tab02" aria-selected="false">mNFT</button>
                            </li>
                        </ul>
                    </div>
                    <div class="overflow-y-auto scrollbar h-[580px] p-4 px-8">
                        <div class="tab-content">
                            <div id="deposit-pot_tab01" class="tab-pane active" role="tabpanel" aria-labelledby="deposit-pot_tab01" >
                                <div class="flex justify-between p-3 rounded cursor-pointer border border-solid border-primary">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" alt=""><b class="text-tit font-extrabold">KRW</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/ARS.webp" alt=""><b class="text-tit font-extrabold">ARS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CLP.webp" alt=""><b class="text-tit font-extrabold">CLP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp" alt=""><b class="text-tit font-extrabold">IDR</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AUD.webp" alt=""><b class="text-tit font-extrabold">AUD</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/AZN.webp" alt=""><b class="text-tit font-extrabold">AZN</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/BDT.webp" alt=""><b class="text-tit font-extrabold">BDT</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/CAD.webp" alt=""><b class="text-tit font-extrabold">CAD</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp" alt=""><b class="text-tit font-extrabold">COP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EGP.webp" alt=""><b class="text-tit font-extrabold">EGP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/EUR.webp" alt=""><b class="text-tit font-extrabold">EUR</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GBP.webp" alt=""><b class="text-tit font-extrabold">GBP</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/GHS.webp" alt=""><b class="text-tit font-extrabold">GHS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/JPY.webp" alt=""><b class="text-tit font-extrabold">JPY</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KES.webp" alt=""><b class="text-tit font-extrabold">KES</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                                <div class="flex justify-between p-3 rounded  cursor-pointer">
                                    <p class="flex gap-2 items-center"><img class="w-7" src="/bcGame/dist/custom_img/coin/KGS.webp" alt=""><b class="text-tit font-extrabold">KGS</b></p>
                                    <p class="text-right"><strong class="block text-tit font-extrabold">₩ 0.00</strong><span class="block text-xs">0.00</span></p>
                                </div>
                            </div>
                            <div id="deposit-pot_tab02" class="tab-pane" role="tabpanel" aria-labelledby="deposit-pot_tab02">
                                <div class="h-80 py-10 text-center ">
                                    <img class="w-48 mx-auto" src="/bcGame/dist/custom_img/empty.webp" alt="">
                                    <p class="-mt-5 text-basic opacity-70">코인 또는 토큰을 찾을 수 없음</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="p-6 px-10 border-t border-slate-200 border-solid flex items-center justify-between">
                        <div>
                            <div class="form-check form-switch"> 
                                <input id="top-cash_check" class="form-check-input legal_check" type="checkbox" checked> 
                                <label class="form-check-label" for="top-cash_check">법정화폐로 보기</label> 
                            </div>
                        </div>
                        <div>
                            <div class="form-check form-switch"> 
                                <input id="top-cash_check02" class="form-check-input small_check" type="checkbox"> 
                                <label class="form-check-label" for="top-cash_check02">작게보기</label> 
                            </div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>

            <div class="wallet_setting-body modal-body modal-in bg-stand rounded relative">
                <div class="relative flex items-center justify-between p-5 py-3 bg-modaldark rounded-t">
                    <button onclick="modalInHandle('asset_portfolio2-modal','wallet_setting-body')"><svg class="w-4 h-4 mr-2 fill-basic rotate-180"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                    <div class="relative w-full">
                        <label for="cash_input"><svg class="absolute left-3 top-2.5 w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Search"></use></svg></label>
                        <input type="text" id="cash_input" class="form-control type02 pl-10" placeholder="검색" />
                    </div>
                    
                    <button class="basic-hover px-2 ml-4" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>
  
                <div class="px-6 py-4">
                    <ul class="nav nav-boxed-tabs bg-back rounded" role="tablist">
                        <li id="currency-1-tab" class="nav-item w-full" role="presentation">
                            <button class="rounded w-full h-9 active" data-tw-toggle="pill" data-tw-target="#currency-tab-1" type="button" role="tab" aria-controls="currency-tab-1" aria-selected="false">크립토</button>
                        </li>
                        <li id="currency-2-tab" class="nav-item w-full" role="presentation">
                            <button class="rounded w-full h-9 "  data-tw-toggle="pill" data-tw-target="#currency-tab-2" type="button" role="tab" aria-controls="currency-tab-2" aria-selected="false">법정화폐</button>
                        </li>
                        <li id="currency-3-tab" class="nav-item w-full" role="presentation">
                            <button class="rounded w-full h-9 "  data-tw-toggle="pill" data-tw-target="#currency-tab-3" type="button" role="tab" aria-controls="currency-tab-3" aria-selected="false">mNFT</button>
                        </li>
                        <li id="currency-4-tab" class="nav-item w-full" role="presentation">
                            <button class="rounded w-full h-9 "  data-tw-toggle="pill" data-tw-target="#currency-tab-4" type="button" role="tab" aria-controls="currency-tab-4" aria-selected="false">즐겨찾기</button>
                        </li>
                    </ul>
                </div>
  
                <div class="tab-content">
                    <div id="currency-tab-1" class="tab-pane leading-relaxed active" role="tabpanel" aria-labelledby="currency-1-tab">
                        <div class="flex justify-between items-center px-6">
                            <p>즐겨찾는 코인</p>
                            <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ReverseOrder"></use></svg></button>
                        </div>
                        <div class="w-full px-6 py-4 pb-6 overflow-y-auto scrollbar h-auto sm:h-[650px]">
  
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check01">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTC.webp" />
                                    BTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check01" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check02">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BCD.webp" />
                                    BCD
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BCD
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check02" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check03">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SATS.webp" />
                                    SATS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Satoshi
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check03" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check04">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ETH.webp" />
                                    ETH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ethereum
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check04" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check05">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BNB.webp" />
                                    BNB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Binance Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check05" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check06">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DOGE.webp" />
                                    DOGE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Doge Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check06" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check07">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDT.webp" />
                                    USDT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Tether
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check07" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check08">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XRP.webp" />
                                    XRP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ripple
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check08" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check09">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/LTC.webp" />
                                    LTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Litecoin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check09" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check10">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BCH.webp" />
                                    BCH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin Cash
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check10" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check11">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/TRX.webp" />
                                    TRX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    TRON
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check11" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check12">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XLM.webp" />
                                    XLM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Stellar
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check12" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check13">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DOT.webp" />
                                    DOT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Polkadot
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check13" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check14">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/LINK.webp" />
                                    LINK
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    ChainLink
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check14" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check15">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/EOS.webp" />
                                    EOS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    EOS
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check15" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check16">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DAI.webp" />
                                    DAI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Multi-collateral DAI
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check16" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check17">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDC.webp" />
                                    USDC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    USDC Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check17" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check18">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XMR.webp" />
                                    XMR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Monero
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check18" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check19">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BSV.webp" />
                                    BSV
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BItcoin SV
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check19" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check20">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/UNI.webp" />
                                    UNI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Uniswap
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check20" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check21">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KSM.webp" />
                                    KSM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Kusama
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check21" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check22">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AMPL.webp" />
                                    AMPL
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ampleforth
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check22" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check23">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SUSHI.webp" />
                                    SUSHI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Sushi
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check23" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check24">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/WBTC.webp" />
                                    WBTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Wrapped BTC
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check24" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check25">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SNX.webp" />
                                    SNX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Synthetix Network
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check25" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check26">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CRO.webp" />
                                    CRO
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Crypto.com Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check26" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check27">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AAVE.webp" />
                                    AAVE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Aave Token
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check27" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check28">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/YFI.webp" />
                                    YFI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    yearn.finance
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check28" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check29">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ATOM.webp" />
                                    ATOM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Cosmos
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check29" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check30">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/MANA.webp" />
                                    MANA
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Decentraland
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check30" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check31">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DASH.webp" />
                                    DASH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Dash
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check31" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check32">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BAT.webp" />
                                    BAT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Basic Attention Token
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check32" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check33">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/APT.webp" />
                                    APT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    APT
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check33" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check34">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ENJ.webp" />
                                    ENJ
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Enjin Coin
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check34" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check35">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CRV.webp" />
                                    CRV
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Curve DAO Token
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check35" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check36">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XEN.webp" />
                                    XEN
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    XEN
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check36" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check37">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/WLD.webp" />
                                    WLD
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    WLD
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check37" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check38">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/HNT.webp" />
                                    HNT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    HNT
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check38" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check39">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/RUNE.webp" />
                                    RUNE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    RUNE
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check39" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check40">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SUI.webp" />
                                    SUI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    SUI
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check40" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check41">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTCB.webp" />
                                    BTCB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BTCB
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check41" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check42">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ARB.webp" />
                                    ARB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    ARB
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check42" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check43">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/GMX.webp" />
                                    GMX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    GMX
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check43" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check44">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTG.webp" />
                                    BTG
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin Gold
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check44" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check45">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ALGO.webp" />
                                    ALGO
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Algorand
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check45" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check46">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BIGTIME.webp" />
                                    BIGTIME
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BIGTIME
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check46" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check47">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ICP.webp" />
                                    ICP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Internet Computer
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check47" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check48">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BLUR.webp" />
                                    BLUR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BLUR
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check48" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check49">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDC.webp" />
                                    USDC.e
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    USDC.E
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check49" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check50">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/HBAR.webp" />
                                    HBAR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Hedera
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency_check50" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
  
                        </div>
                    </div>
                    <div id="currency-tab-2" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="currency-2-tab">
                        <div class="flex justify-between items-center px-6">
                            <p>즐겨찾는 코인</p>
                            <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ReverseOrder"></use></svg></button>
                        </div>
                        <div class="w-full px-6 py-4 pb-6 overflow-y-auto scrollbar h-auto sm:h-[650px]">
  
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check01">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ARS.webp" />
                                    ARS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Argentine Peso
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check01" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check02">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CLP.webp" />
                                    CLP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Chilean Peso
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check02" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check03">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/IDR.webp" />
                                    IDR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Indonesian Rupiah
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check03" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check04">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/COP.webp" />
                                    COP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Colombian Pesos
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check04" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check05">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/UAH.webp" />
                                    UAH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    UAH
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check05" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check06">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KES.webp" />
                                    KES
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Kenyan Shilling
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check06" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check07">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XOF.webp" />
                                    XOF
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    CFA Franc BCEAO
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check07" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check08">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XAF.webp" />
                                    XAF
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Central African CFA
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check08" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check09">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/UZS.webp" />
                                    UZS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Uzbekistani Som
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check09" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check10">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KRW.webp" />
                                    KRW
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Korean won
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check10" class="form-check-input small_check" type="checkbox" checked> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check11">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KGS.webp" />
                                    KGS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Kyrgystani Som
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check11" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check12">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/EUR.webp" />
                                    EUR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    EUR
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check12" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check13">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/MXN.webp" />
                                    MXN
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Peso mexicano
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check13" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check14">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/MMK.webp" />
                                    MMK
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Burmese Kyat
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check14" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check15">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/GBP.webp" />
                                    GBP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    GBP
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check15" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check16">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/TZS.webp" />
                                    TZS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Tanzanian Shilling
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check16" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check17">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/VND.webp" />
                                    VND
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Vietnamese Dong
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check17" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check18">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/RUB.webp" />
                                    RUB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Russian Rubles
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check18" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check19">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/EGP.webp" />
                                    EGP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Egyptian Pound
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check19" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency1_check20">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AZN.webp" />
                                    AZN
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Azerbaijani Manat
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency1_check20" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
  
                        </div>
                    </div>
                    <div id="currency-tab-3" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="currency-3-tab">
                        <div class="flex justify-between items-center px-6">
                            <p>즐겨찾는 코인</p>
                            <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ReverseOrder"></use></svg></button>
                        </div>
                        <div class="w-full px-6 py-4 pb-6 overflow-y-auto scrollbar h-auto sm:h-[650px]">
                            
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check01">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mDegenPass.webp" />
                                    mDegenPass
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    DegenPass
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check01" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check02">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mBAYC.webp" />
                                    mBAYC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bored Ape Yacht Club
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check02" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check03">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mPunks.webp" />
                                    mPunks
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Punks
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check03" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check04">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mMeka.webp" />
                                    mMeka
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Mekaverse
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check04" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check05">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mMfers.webp" />
                                    mMfers
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Mfers
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check05" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check06">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mClonex.webp" />
                                    mClonex
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    CloneX
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check06" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check07">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mDoodles.webp" />
                                    mDoodles
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Doodles
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check07" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
                            <label class="flex justify-between items-center w-full py-2 px-1" for="top-currency2_check08">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/mAzuki.webp" />
                                    mAzuki
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Azuki
                                    <div class="form-check form-switch"> 
                                        <input id="top-currency2_check08" class="form-check-input small_check" type="checkbox"> 
                                    </div>
                                </div>
                            </label>
  
                        </div>
                    </div>
                    <div id="currency-tab-4" class="tab-pane leading-relaxed" role="tabpanel" aria-labelledby="currency-4-tab">
                        <div class="flex justify-between items-center px-6">
                            <p>즐겨찾는 코인</p>
                            <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_ReverseOrder"></use></svg></button>
                        </div>
                        <div class="w-full px-6 py-4 pb-6 overflow-y-auto scrollbar h-auto sm:h-[650px]">
  
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check02">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BCD.webp" />
                                    BCD
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BCD
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check03">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SATS.webp" />
                                    SATS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Satoshi
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check04">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ETH.webp" />
                                    ETH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ethereum
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check05">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BNB.webp" />
                                    BNB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Binance Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check06">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DOGE.webp" />
                                    DOGE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Doge Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check07">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDT.webp" />
                                    USDT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Tether
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check08">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XRP.webp" />
                                    XRP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ripple
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check09">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/LTC.webp" />
                                    LTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Litecoin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check10">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BCH.webp" />
                                    BCH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin Cash
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check11">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/TRX.webp" />
                                    TRX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    TRON
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check12">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XLM.webp" />
                                    XLM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Stellar
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check13">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DOT.webp" />
                                    DOT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Polkadot
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check14">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/LINK.webp" />
                                    LINK
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    ChainLink
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check15">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/EOS.webp" />
                                    EOS
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    EOS
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check16">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DAI.webp" />
                                    DAI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Multi-collateral DAI
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check17">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDC.webp" />
                                    USDC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    USDC Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check18">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XMR.webp" />
                                    XMR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Monero
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check19">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BSV.webp" />
                                    BSV
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BItcoin SV
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check20">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/UNI.webp" />
                                    UNI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Uniswap
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check21">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/KSM.webp" />
                                    KSM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Kusama
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check22">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AMPL.webp" />
                                    AMPL
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Ampleforth
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check23">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SUSHI.webp" />
                                    SUSHI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Sushi
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check24">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/WBTC.webp" />
                                    WBTC
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Wrapped BTC
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check25">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SNX.webp" />
                                    SNX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Synthetix Network
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check26">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CRO.webp" />
                                    CRO
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Crypto.com Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check27">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/AAVE.webp" />
                                    AAVE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Aave Token
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check28">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/YFI.webp" />
                                    YFI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    yearn.finance
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check29">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ATOM.webp" />
                                    ATOM
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Cosmos
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check30">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/MANA.webp" />
                                    MANA
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Decentraland
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check31">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/DASH.webp" />
                                    DASH
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Dash
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check32">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BAT.webp" />
                                    BAT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Basic Attention Token
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check33">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/APT.webp" />
                                    APT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    APT
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check34">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ENJ.webp" />
                                    ENJ
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Enjin Coin
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check35">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/CRV.webp" />
                                    CRV
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Curve DAO Token
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check36">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/XEN.webp" />
                                    XEN
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    XEN
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check37">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/WLD.webp" />
                                    WLD
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    WLD
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check38">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/HNT.webp" />
                                    HNT
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    HNT
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check39">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/RUNE.webp" />
                                    RUNE
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    RUNE
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check40">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/SUI.webp" />
                                    SUI
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    SUI
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check41">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTCB.webp" />
                                    BTCB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BTCB
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check42">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ARB.webp" />
                                    ARB
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    ARB
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check43">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/GMX.webp" />
                                    GMX
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    GMX
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check44">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BTG.webp" />
                                    BTG
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Bitcoin Gold
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check45">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ALGO.webp" />
                                    ALGO
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Algorand
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check46">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BIGTIME.webp" />
                                    BIGTIME
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BIGTIME
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check47">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/ICP.webp" />
                                    ICP
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Internet Computer
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check48">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/BLUR.webp" />
                                    BLUR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    BLUR
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check49">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/USDC.webp" />
                                    USDC.e
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    USDC.E
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full py-2 px-1" for="top-currency_check50">
                                <div class="flex items-center gap-2">
                                    <img class="w-7" src="/bcGame/dist/custom_img/coin/HBAR.webp" />
                                    HBAR
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    Hedera
                                </div>
                            </div>
  
                        </div>
                    </div>
                </div>
  
            </div>

        </div>
    </div>
</div>

<!-- 게임 공유하기 모달 -->
<div id="detail_share-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-modaldark relative rounded">
                <div class="relative flex items-center justify-end p-4">
                    <button class="basic-hover" data-tw-dismiss="modal"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
                </div>

                <div class="px-6 pb-10 font-semibold">
                    <p class="text-tit font-extrabold text-lg text-center">게임 공유하기</p>

                    <div class="flex items-center flex-wrap justify-center gap-4 mt-5">
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_3.webp" alt=""></a>
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_8.webp" alt=""></a>
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_7.webp" alt=""></a>
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_11.webp" alt=""></a>
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_12.webp" alt=""></a>
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_13.webp" alt=""></a>
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_14.webp" alt=""></a>
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_16.webp" alt=""></a>
                        <a href="javascript:;"><img class="w-10" src="/bcGame/dist/custom_img/share_icon/share_17.webp" alt=""></a>
                    </div>
                </div>


                    
            </div>
        </div>
    </div>
</div>

<!-- 하우스엣지 모달 -->
<div id="house_edge-modal" class="modal mo_full" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body bg-modaldark relative rounded">
                <div class="px-6 py-10 font-semibold">
                    <p class="text-tit font-extrabold text-lg text-center">하우스엣지: 4%</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 실시간 통계 모달 -->
<div class="draggable_modal w-[300px] transition-all bg-white md:bg-modaldark shadow-md">
    <div class="draggable_modal_header relative p-3 bg-grey-600 rounded-t-md">
        <p class="text-tit font-extrabold text-base text-center">실시간 통계</p>
        <button class="absolute right-0 top-1.5 p-2 basic-hover draggable_modal_close"><svg class="w-4 h-4 close_btn cursor-pointer hover:-rotate-90 duration-500 transition-all"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Close"></use></svg></button>
    </div>
    <div class="py-5 px-3 overflow-y-auto scrollbar h-[350px] sm:h-[580px]">
        <div class="custom_select flex-1 text-xs" data-select="add">
            <button class="btn h-10 flex px-4 items-center justify-between border-none bg-back2">
                <span class="add_name">벳</span>
                <i><svg class="w-3.5 h-3.5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></i>
            </button>
            <ul class="overflow-y-auto scrollbar p-2 shadow-basic rounded bg-back">
                <li class="py-1 flex items-center gap-2 nohover on">
                    <input type="checkbox" class="form-check-input grayborder" id="live-01" value="벳" checked>
                    <label for="live-01" class="flex items-center justify-between flex-1 w-3/4 pr-1">
                        <span class="truncate">벳</span>
                    </label>
                </li>
                <li class="border-t my-2 border-slate-300"></li>
                <li class="py-1 flex items-center gap-2 nohover">
                    <input type="checkbox" class="form-check-input grayborder" id="live-02" value="롤링 대회">
                    <label for="live-02" class="flex items-center justify-between flex-1 w-3/4 pr-1">
                        <span class="truncate">롤링 대회</span>
                    </label>
                </li>
                <li class="py-1 flex items-center gap-2 nohover">
                    <input type="checkbox" class="form-check-input grayborder" id="live-03" value="BCD 보물 상자">
                    <label for="live-03" class="flex items-center justify-between flex-1 w-3/4 pr-1">
                        <span class="truncate">BCD 보물 상자</span>
                    </label>
                </li>
            </ul>
        </div>
        <div class="mt-2 bg-back2 p-2 text-xs rounded">
            <div class="flex items-center justify-between py-1 gap-2">
                <p class="text-tit">벳</p>
                <button><svg class="w-5 h-5 fill-basic"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Clear"></use></svg></button>
            </div>
            <div class="py-3">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="block">롤링된</span>
                        <b class="text-tit">0.00 <img class="inline-flex w-3 h-3" src="/bcGame/dist/custom_img/coin/BTC.webp"></b>
                    </div>
                    <div>
                        <span class="block">혜택</span>
                        <b class="text-primary">0.00 <img class="inline-flex w-3 h-3" src="/bcGame/dist/custom_img/coin/BTC.webp"></b>
                    </div>
                </div>
            </div>
            <div class="h-40"></div>
            <div class="flex items-center justify-between py-3 text-xs">
                <div>승리 <span class="text-primary font-bold">0</span></div>
                <div>패배 <span class="text-danger font-bold">0</span></div>
            </div>
        </div>
        <div class="mt-2 bg-back2 p-2 text-xs rounded">
            <div class="flex items-center justify-between py-1 gap-2">
                <p class="text-tit">벳</p>
            </div>
            <button class="bg-tab text-tit w-full py-3 font-bold">daily</button>
            <div class="flex items-start justify-between mt-2">
                <div>
                    <p>Daily Contest End In</p>
                    <div class="flex items-center gap-1 mt-2 font-bold">
                        <div class="flex items-center justify-center w-8 h-9 rounded text-tit text-sm bg-tab">08</div>
                        :
                        <div class="flex items-center justify-center w-8 h-9 rounded text-tit text-sm bg-tab">03</div>
                        :
                        <div class="flex items-center justify-center w-8 h-9 rounded text-tit text-sm bg-tab">30</div>
                    </div>
                </div>
                <div>
                    <p class="mb-4">현재 랭킹</p>
                    <b class="text-tit text-base font-bold">50th+</b>
                </div>
            </div>
            <div class="flex items-center justify-center gap-1 py-3 border-b border-slate-300" style="font-size:10px;">
                <i class="w-1 h-1 rounded-full bg-primary"></i>
                <p>692986.8932 에 도달하기 위해 더 BCD 걸기</p>
                <span class="text-tit">TOP 10</span>
            </div>
            <div class="flex items-center justify-between mt-2">
                <div>
                    <span class="block">롤링된</span>
                    <b class="text-tit">0.00 <img class="inline-flex w-3 h-3" src="/bcGame/dist/custom_img/coin/BTC.webp"></b>
                </div>
                <div>
                    <span class="block">상품/상금</span>
                    <b class="text-primary">0.00 <img class="inline-flex w-3 h-3" src="/bcGame/dist/custom_img/coin/BTC.webp"></b>
                </div>
            </div>
        </div>

        <div class="mt-2 bg-back2 p-2 text-xs rounded">
            <div class="flex items-center justify-between py-1 gap-2">
                <p class="text-tit">BCD 보물 상자</p>
                <div><img class="inline-flex w-3 h-3" src="/bcGame/dist/custom_img/coin/BTC.webp"> 0.00</div>
            </div>
            <div class="relative rounded bg-white dark:bg-back h-[7px] progressbar my-2">
                <div class="relative bar h-full rounded bg-gradient-yellow " style="width:10%;">
                    <img class="absolute -right-2 -top-1 w-4" src="/bcGame/dist/custom_img/bcdprogress_coin.png" alt="">
                </div>
            </div>
            <div>
                청구에 필요한 최소 요건: <img class="inline-flex w-5 h-5" src="/bcGame/dist/custom_img/coin/BTC.webp"> 5
            </div>
            <div class="flex items-end justify-between w-full">
                <button class="text-primary" data-tw-toggle="modal" data-tw-target="#bonus_bcd-modal">보너스 잠금해제 <svg class="inline-flex w-3 h-3 fill-primary"><use xlink:href="/bcGame/dist/custom_img/symbol-defs.svg#icon_Arrow"></use></svg></button>
                <img class="inline-flex w-1/3" src="/bcGame/dist/custom_img/bg_live_img.png">
            </div>
        </div>
        
        
    </div>
</div>

<!-- 공통 모달 영역 : E -->

<script src='https://design01.codeidea.io/link_script.js'></script>
<script src="./dist/js/app.js"></script>
<script src="/bcGame/dist/js/jquery-1.12.4.js"></script>
<script src="./dist/custom_js/custom.js"></script>
<script src="./dist/js/jquery-ui.js"></script>

<script>
     $( function() {
            $( "#slider" ).slider();
        } );

    // 드래그
    $(window).on('load',function() {
        const DraggModal = $(".draggable_modal");
        
        $('.draggable_modal_open').on('click', function() {
            DraggModal.addClass('show');

            // show 클래스가 추가된 후 300ms 지연
            setTimeout(function() {
                DraggModal.removeClass('transition-all');
            }, 200);
        });
        
        DraggModal.draggable({ handle: ".draggable_modal_header" });
        
        $('.draggable_modal_close').on('click', function() {
            DraggModal.removeClass('show');
            DraggModal.addClass('transition-all');
        });

        
    });

    topbarHandle()

	jQuery(document).ready(function() {
		jQuery('.ghost_mode').click(function() {
			jQuery('#Ghost_alert').addClass('show');
		});
		jQuery('.ghost-btn-close').click(function(){
			jQuery('#Ghost_alert').removeClass('show');
		});
	});
	jQuery(document).ready(function() {
		jQuery('.ignore-mode').click(function() {
			jQuery('#Ignore_alert').addClass('show');
		});
		jQuery('.ignore-btn-close').click(function(){
			jQuery('#Ignore_alert').removeClass('show');
		});
	});

	jQuery(".select_custom .select_toggle_btn").on("click", function (e) {
		jQuery(".select_custom .option_box").hide();
		jQuery(".select_custom .select_toggle_btn").removeClass("active");

		jQuery(this).next(".option_box").toggle();
		jQuery(this).toggleClass("active");
	});

	// 바깥 클릭했을때 option 닫기
	jQuery("body").on("click", function (e) {
		if (!jQuery(e.target).closest(".select_custom").length) {
			jQuery(".select_custom .option_box").hide();
			jQuery(".select_custom .select_toggle_btn").removeClass("active");
		}
	});

	// option 클릭했을때 값 변경, option_box 닫기
	jQuery(".select_custom .click_option.option_box button").on("click", function () {
		const value = jQuery(this).find("span").text();

		if (jQuery(this).parents(".option_box").hasClass("language_option")) {
			// 채팅 > 언어 클릭시
			const img = jQuery(this).find("i").html();
			jQuery(this)
				.parents(".select_custom")
				.find(".select_toggle_btn span")
				.html(img + "Stake: " + value);
		} else {
			jQuery(this).parents(".select_custom").find(".select_toggle_btn span").text(value);
		}

		jQuery(this).addClass("active").siblings().removeClass("active");
		jQuery(this).parents(".option_box").hide();
		jQuery(this).parents(".select_custom").find(".select_toggle_btn").removeClass("active");
	});

	// input check 했을 때,
	jQuery(".select_custom .input_option.option_box input").on("change", function () {
		if (jQuery(this).prop("checked")) {
			jQuery(this).parents("button").addClass("active");
			jQuery(this).parents("button").siblings().addClass("off");
		} else {
			jQuery(this).parents("button").removeClass("active");
		}

		let checked = 0;
		jQuery(this)
			.parents(".option_box")
			.find("button")
			.each(function (index, item) {
				if (jQuery(item).find("input").prop("checked")) {
					checked += 1;
				}
			});
		if (checked > 0) {
			jQuery(this).parents(".select_custom").find(".select_toggle_btn span i").addClass("on").text(checked);
		} else {
			jQuery(this).parents(".select_custom").find(".select_toggle_btn span i").removeClass("on");
		}
	});

	jQuery(".select_custom .input_option.option_box .clear_btn").on("click", function () {
		jQuery(this).parents(".select_custom").find(".select_toggle_btn").removeClass("active");
		jQuery(this).parents(".select_custom").find(".select_toggle_btn span i").removeClass("on").text("");
		jQuery(this).parents(".select_custom").find(".option_box").hide();
		jQuery(this)
			.parents(".option_box")
			.find("button")
			.each(function (index, item) {
				jQuery(item).removeClass("active off");
				jQuery(item).find("input").prop("checked", false);
			});
	});
	

	 // 드래그
	 jQuery(document).ready(function() {
		const DraggModal = jQuery(".draggable_modal");
		
		jQuery('.draggable_modal_open').on('click', function() {
			DraggModal.addClass('show');
			jQuery("#toggleDiv2").show();

			// show 클래스가 추가된 후 300ms 지연
			setTimeout(function() {
				DraggModal.removeClass('transition-all');
			}, 200);
		});
		
		DraggModal.draggable({ handle: ".draggable_modal_header" });
		
		jQuery('.draggable_modal_close').on('click', function() {
			DraggModal.removeClass('show');
			DraggModal.addClass('transition-all');
		});

		jQuery(".click_main button").click(function(event) {
			// 클릭된 버튼에 "active" 클래스 추가, 다른 버튼에서 제거
			jQuery(".click_main button").removeClass("active");
			jQuery(this).addClass("active");

			var index = jQuery(this).index();

			// 기본적으로 모든 div를 숨깁니다.
			jQuery("#toggleDiv1, #toggleDiv2, .statistics_reset").hide();

			// index에 따라 필요한 div를 표시합니다.
			if (index === 0 || index === 1) {
				jQuery("#toggleDiv1").show();
				jQuery(".statistics_reset").show();
			}
			if (index === 0 || index === 2) {
				jQuery("#toggleDiv2").show();
			}

			// 특별한 케이스를 처리합니다.
			if (index === 3) {
				DraggModal.removeClass('show');
			}
		});

		// a태그 내부 버튼 a태그 이벤트 억제
        jQuery(document).ready(function() {
            jQuery('.prevention').on('click', function(e) {
                e.preventDefault();
            });
        });
	});


</script>

<script>
        // 롤 숫자 이동
        const rollHandle = ()=>{
            const box = document.querySelectorAll('.roll-modal .scroll_box')
            setTimeout(()=>{
                box[0].style.top = "-720px"
                box[1].style.top = "-720px"
                box[2].style.top = "-720px"
            })
        }
    </script>
</body>

</html>