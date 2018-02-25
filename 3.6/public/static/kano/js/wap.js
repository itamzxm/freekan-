function so(){
	  var key = $("#k").val();
	  if (key=="")
       {
		$("#k").attr('placeholder','请输入关键词，支持简拼哦！');
        return false;
      }   
}
function CheckForm()
{
	if(document.form1.username.value=="")
	{
		$(".errhtml").html("请填写登陆账号！")
		$(".login_err").show();$("#username").focus();
		return false;
	}

	if(document.form1.password.value=="")
	{
		$(".errhtml").html("请填写登陆密码！")
		$(".login_err").show();$("#password").focus();
		return false;
	}
}
  function checkbox()
{
if (! document.form1.addbox.checked){
		   $(".ck").html("下次自动登录！")
	}
	else{
	      $(".ck").html("请勿公共场所选择！")
	}
}