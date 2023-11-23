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
						<li><a href="../bcGame/index.html" target="_blank" class="">로그인 했을때</a></li>
						<li><a href="../bcGame/index_logout.html" target="_blank" class="">로그인 안했을때</a></li>
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
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_info-modal">유저 정보 모달</button>
                            <button class="pop-modal" data-tw-toggle="modal" data-tw-target="#profile_info_secret-modal">유저 정보 모달 - 시크릿 모드</button>
                        </li>
					</ul>
				</li>
			</ul>
		</li>

		<li class="mt20" data-label="메인">
			<ul>
				<li><a href="../bcGame/index.html" target="_blank" class="">메인</a></li>
			</ul>
		</li>
	</ul>
</div>


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


<!-- 공통 모달 영역 : E -->

<script src='https://design01.codeidea.io/link_script.js'></script>
<script src="./dist/js/app.js"></script>
<script src="./dist/custom_js/custom.js"></script>
<script src="./dist/js/jquery-ui.js"></script>

<script>
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
</body>

</html>