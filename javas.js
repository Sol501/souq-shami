function addmaker( link,href,titl,img,desc) {
	document.getElementById("all-ads-container").innerHTML+='<a href="'+href+'" target="_blank"><div class="add-container" style="background-image:url('+link+');"><div class="decr"><div class="picture" style="background-image:url('+img+');"></div><span>'+titl+'</span><textarea class="description" disabled draggable="false">'+desc+'</textarea></div></div></a>';
}



function menu(type,link,img){
document.write('<div class="menu" onclick="goto('+link+')" style="background-image:url('+img+');">'+type+'</div>');
}
function list(text,fun,img) {
  document.write('<div class="menu list" id="ar"  onclick="show('+fun+')" ">'+text+'</div>');
}
function show() {
  if(document.getElementById("p").style.height=="100%"){
    document.getElementById("p").style.height="0";
    document.getElementById('ar').style.backgroundImage='url(icons/arrow.png),url("icons/doll.png")';
  }
  else{document.getElementById("p").style.height="100%";
    document.getElementById('ar').style.backgroundImage='url(icons/uparrow.png),url("icons/doll.png")';
}

}
