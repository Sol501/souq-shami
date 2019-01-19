function CreateButton(NameOrEle, clas, even1, even2) {
	"use strict";
  document.write('<button class="button button-' + clas + '" onclick="got(' + even1 + ');" onhovor="' + even2 + '">' + NameOrEle + '</button>');
}

function CL(name, PlaceHold) {
	"use strict";
  document.write('<input type="textbox" name="' + name + '" class="login-textbox" value="" placeholder="' + PlaceHold + '"/>');
}

function CD() {
	"use strict";
  document.write('<div class="city-dropbox" id="khra"><div><select name="cities" id="lemon"><option value="0" selected>جميع المحافظات</option><option value="1">دمشق</option><option value="2">حمص</option><option value="3">حلب</option><option value="4">اللاذقية</option><option value="5">حماة</option><option value="6">طرطوس</option><option value="7">درعا</option><option value="8">السويداء</option><option value="9">القنيطرة</option><option value="10">الرقة</option><option value="11">إدلب</option><option value="12">دير الزور</option><option value="13">الحسكة</option></select></div></div>');
}

$(document).ready(function () {
	"use strict";
	$("#khra").click(function () {
		$("#lemon").focusin();
	});
	
	$('.search-textbox').keypress(function(e){
		if(e.keyCode==13)
			$('#search-butt')
	});
});


function got(lnk){
	window.location.href=lnk;
}

$(document).ready(function(){
	var w=$("#drop-men").width();
	w-=12;
	var num=7;
	var w1=$("#athing").width();
	var num1=parseInt(w1/268);
	var allowed=num1*268;
	var win=$(window).width();
	var di=win-225;
	$("#side-complete").width(di);
	$('#all-ads-container').width(allowed);
	$(".drop-menu-content").width(w/num);
	$(window).bind("resize",function(){
		var win=$(window).width();
		if(win>605){
			if($("#side-cat").hasClass("clicked")){
				$("#side-cat").toggleClass("clicked");
				$("#side-cat-contain").toggleClass("side-cat-container-clicked");
				$("body").css("overflow-y","scroll");
			}
		}
		var w=$("#drop-men").width();
		w-=12;
		$(".drop-menu-content").width(w/num);
		var w1=$("#athing").width();
		var num1=parseInt(w1/268);
		var allowed=num1*268;
		$('#all-ads-container').width(allowed);
		var di=win-225;
		$("#side-complete").width(di);
	});
});

$(document).ready(function(){
	$("#side-cat").click(function(){
		$("#side-cat").toggleClass("clicked");
		$("#side-cat-contain").toggleClass("side-cat-container-clicked");
		if($("#side-cat").hasClass("clicked")){
			$("body").css("overflow-y","hidden");
		}
		else{
			$("body").css("overflow-y","scroll");
		}
	});
});

window.addEventListener("click", function(event) {
	var side=document.getElementById("actual-side-cat");
  if(event.target == document.getElementById("side-complete") ){
		if(side.offsetWidth == 225){
			document.getElementById("side-cat").classList.toggle("clicked");
			document.getElementById("side-cat-contain").classList.toggle("side-cat-container-clicked");
			$("body").css("overflow-y","scroll");
		}
	}
});

function showf(){
	document.getElementById("price-range-container").classList.toggle("after-click");
	document.getElementById("ads-changers").classList.toggle("change-height");
	document.getElementById("menu-sort").classList.toggle("sort-drop");
	if(!document.getElementById("ads-changers").classList.contains("change-height")){
		var arr=document.getElementsByClassName("price-input");
		for(var i=0;i<arr.length;i++){
			arr[i].value="";
		}
	}
}

function check_valid_num(f1){
	var reg=/[0-9]/;
	var cha=f1.value.charAt(f1.value.length-1);
	if(!reg.test(cha)){
		f1.value=f1.value.slice(0, f1.value.length-1);
	}
	else if(f1.value.length == 12){
		f1.value=f1.value.slice(0, f1.value.length-1);
	}
}
