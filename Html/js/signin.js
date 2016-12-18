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

	$.ajax({
		type:'GET',
		url:'/app/api/signin.php',
		data:{'uid':uid,'password':password},
		datatype:'json',
		success:function(ret){
			$.each(ret, function(i, v){
				if (ret['code'] == 0) {
					window.location.href='/Public/index.php';
				}else if(ret['code'] == $code){
					$(".err").html(ret['msg']);
				}
			});
		}
	});
}
/*注册跳转*/
function reg(){
	window.location.href="register.php";
}