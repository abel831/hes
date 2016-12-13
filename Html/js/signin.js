/*登录*/
function sub(){
	var uid = $("#uid").val();
	var password = $("#password").val();
	if (uid == "" || password == "") {
		$(".err").html("用户名密码不能为空");
		$(".btn input").css("margin-top","28px")
		return;
	}else{
		$(".err").html("");
		$(".btn input").css("margin-top","65px")
	}
/*	$.ajax({
		type:'GET',
		url:app/api/,
		data:
		datatype:'json',
		success:function(){}
	});
*/
}
/*注册跳转*/
function reg(){
	window.location.href="register.html";
}