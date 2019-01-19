var slideIndex = 1;

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("im");
    if (n > x.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    x[slideIndex-1].style.display = "block"; 
}


function got(lnk){
	window.location.href=lnk;
}

function change_background(t){
	t.classList.toggle("liked");
	if(t.classList.contains("like"))
		t.classList.remove("like");
	else
		t.classList.add("like");
}


window.addEventListener("click", function(event) {
	var moda = document.getElementById('pop-up-container');
	if (event.target == moda) {
		moda.classList.toggle("pop-up-container-new");
		document.getElementById("pop-up-form").classList.toggle("pop-up-form-new");
		$("body").css("overflow-y","scroll");
		document.getElementById("report").value="";
	}
});

var prev;

$(document).ready(function(){
	$("#report-button-container").click(function(){
		$("#pop-up-container").toggleClass("pop-up-container-new");
		$("#pop-up-form").toggleClass("pop-up-form-new");
		$("body").css("overflow-y","hidden");
	});
	$("#X-sign").click(function(){
		$("#pop-up-container").toggleClass("pop-up-container-new");
		$("#pop-up-form").toggleClass("pop-up-form-new");
		$("body").css("overflow-y","scroll");
		document.getElementById("report").value="";
	});
});

function addmaker( link,href,titl,img,desc) {
	document.getElementById("ads-con").innerHTML+='<a href="'+href+'" target="_blank"><div class="add-container" style="background-image:url('+link+');"><div class="decr"><div class="picture" style="background-image:url('+img+');"></div><span>'+titl+'</span><textarea class="description" disabled draggable="false">'+desc+'</textarea></div></div></a>';
}

$(document).ready(function(){
	var num=$(".add-container").length;
	$("#ads-con").width(num*260);
});