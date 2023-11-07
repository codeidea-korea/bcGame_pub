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
		<li class="" data-label="BC.GAME">
			<ul>
				<li><a href="../bcGame/index.html" target="_blank" class="">메인</a></li>
			</ul>
		</li>
	</ul>
</div>

<!-- ** 모달 시작 ** -->

<!-- ** 모달 끝 ** -->

<script src='https://design01.codeidea.io/link_script.js'></script>
<script src="./dist/js/app.js"></script>
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