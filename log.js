function change_selected_style(current){
	var first=document.getElementById("login-choice");
	var second=document.getElementById("signup-choice");
	var firstf=document.getElementById("f1");
	var secondf=document.getElementById("f2");
	var form1=document.getElementsByClassName("form");
	var form2=document.getElementsByClassName("form1");
	if(current.classList.contains("not-selected")){
		current.classList.remove("not-selected");
		if(current==first){
			second.classList.remove("signup-choice");
			second.classList.add("not-selected");
			current.classList.add("login-choice");
			firstf.classList.remove("remove-form");
			secondf.classList.add("remove-form");
			for(var i=0;i<form2.length;i++){
				form2[i].value="";
			}
		}
		if(current==second){
			first.classList.remove("login-choice");
			first.classList.add("not-selected");
			current.classList.add("signup-choice");
			secondf.classList.remove("remove-form");
			firstf.classList.add("remove-form");
			for(var i=0;i<form1.length;i++){
				form1[i].value="";
			}
		}
	}
}

function check_valid_num(f1){
	var reg=/[0-9]/;
	var cha=f1.value.charAt(f1.value.length-1);
	if(!reg.test(cha)){
		f1.value=f1.value.slice(0, f1.value.length-1);
	}
}

function check_password(){
	var ps1=document.getElementById("password").value;
  var ps1vaild=false;
  document.getElementById("pswvalid").style.opacity=0;
  if(ps1.length<8 && ps1.length!=0){
    ps1vaild=false;
    document.getElementById("pswvalid").innerHTML="*كلمة السر أقصر من ثمانية محارف";
    document.getElementById("pswvalid").style.opacity=1;
  }
  else{
    ps1vaild=true;
    document.getElementById("pswvalid").innerHTML="";
  }
}

function validate_name(f1){
	var reg=/^[\u0600-\u06ff\ufb50-\ufdff\ufe70-\ufeff ]+$/;
	var cha=f1.value.charAt(f1.value.length-1);
	if(!reg.test(cha)){
		f1.value=f1.value.slice(0, f1.value.length-1);
	}
}