var tcode = "";

/*注册条件*/
function checkval(id, val, tval){
	switch(id){
		case "uid":
			var reg = /^(((1[0-9]{2}))+\d{8})$/;
			if (val == "") {
				$(".uid_err").html("请填写您的手机号");
				return false;
			}else if (!val.match(reg)) {
				$(".uid_err").html("您的手机号输入有误");
				return false;
			}else{
				$(".uid_err").html("");
				return true;
			};
		case "name":
			if (val == "") {
				$(".name_err").html("请输入姓名");
				return false;
			}else if (val.length>6){
				$(".name_err").html("您的姓名输入有误");
				return false;
			}else{
				$(".name_err").html("");
				return true;
			};
		case "sex":
			if (val == null) {
				$(".sex_err").html("请选择您的性别");
				return false;
			}else{
				$(".sex_err").html("");
				return true;
			};
		case "age":
			var reg = /^120|((1[0-1]|\d)?\d)$/; 
			if (val == "") {
				$(".age_err").html("请输入您的年龄");
				return false;
			}else if (val.length>3) {
				$(".age_err").html("您输入的年龄有误");
				return false;
			}else if (!val.match(reg)) {
				$(".age_err").html("您输入的年龄有误");
				return false;
			}else{
				$(".age_err").html("");
				return true;
			};
		case "position_id":
			if (val == 0) {
				$(".position_err").html("请选择您的职称");
				return false;
			}else{
				$(".position_err").html("");
				return true;
			};
		case "room_id":
			if (val == 0) {
				$(".room_err").html("请选择您的科室");
				return false;
			}else{
				$(".room_err").html("");
				return true;
			};
		case "password":
			if (val == "") {
				$(".password_err").html("密码不能为空");
				return false;
			}else if(val.length>15 || val.length<5){
				$(".password_err").html("请填写5到15位密码");
				return false;
			}else{
				$(".password_err").html("");
				return true;
			};
		case "tpassword":
			if (val != tval) {
				$(".tpassword_err").html("两次密码不一致");
				return false;
			}else{
				$(".tpassword_err").html("");
				return true;
			};
		case "email":
			var reg = /\w+[@]{1}\w+[.]\w+/;
			if (val == '') {
				$(".email_err").html("请填写您的邮箱");
				return false;
			}else if (!val.match(reg)) {
				$(".email_err").html("邮箱格式不正确");
				return false;
			}else{
				$(".email_err").html("");
				return true;
			}
		case "code":
			if (val == "") {
				$(".code_err").html("请填写验证码");
				return false;
			}else if (val != tcode) {
				$(".code_err").html("验证码输入有误");
				return false;
			}else{
				$(".code_err").html("");
				return true;
			};
		default:
			return false;
	}
}
/*注册提交*/
function sub(){
	var uid = $("#uid").val();
	var uidName = $("#uid").attr("name");
	var name = $("#name").val();
	var nameName = $("#name").attr("name");
	var sex = $("input[name='sex']:checked").val();
	var sexName = $("input[name='sex']:checked").attr("name");
	var age = $("#age").val();
	var ageName = $("#age").attr("name");
	var position = $("#position_id").val();
	var positionName = $("#position_id").attr("name");
	var room = $("#room_id").val();
	var roomName = $("#room_id").attr("name");
	var password = $("#password").val();
	var passwordName = $("#password").attr("name");
	var tpassword = $("#tpassword").val();
	var tpasswordName = $("#tpassword").attr("name");
	var email = $("#email").val();
	var emailName = $("#email").attr("name");
	var code = $("#code").val();
	var codeName = $("#code").attr("name");


	var obj = {};
	obj[uidName] = uid;
	obj[nameName] = name;
	obj[sexName] = sex;
	obj[ageName] = age;
	obj[positionName] = position;
	obj[roomName] = room;
	obj[passwordName] = password;
	obj[tpasswordName] = tpassword;
	obj[emailName] = email;
	obj[codeName] = code;

	var data = "";

	for(key in obj){
		if (key == "tpassword") {
			var check = checkval(key, obj["password"], obj[key]);
		}else{
			var check = checkval(key, obj[key]);
		};
		if (check == false) {
			return;
		};
		data += key + '=' + obj[key] + '&';
	}
	$.ajax({
		type:'GET',
		url:'/app/api/register.php?' + data,
		dataType:'json',
		success: function(ret){
			$.each(ret, function(i, v){
				if (ret['code'] == 0) {
					alert("注册成功");
					window.location.href="signin.php";
				}else if (ret['code'] == 2) {
					$(".code_err").html(ret['msg']);
					alert("用户名已注册");
					window.location.href="signin.php";
				}else{
					alert(ret['msg']);
					$(".code_err").html(ret['msg']);
				};
			});
		}
	});
}


/*验证码*/
$(document).ready(function(){
	tcode =  Math.ceil(Math.random()*9000)+1000;
	$(".code_num").html(tcode);
});
function getcode(){
	tcode =  Math.ceil(Math.random()*9000)+1000;
	$(".code_num").html(tcode);
}
