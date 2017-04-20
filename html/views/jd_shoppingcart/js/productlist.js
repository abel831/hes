/**功能点1：页面加载完后，异步请求页头和页尾**/
$(function(){
	$('div#header').load('header.php');
	$('div#footer').load('footer.php');
})


/**功能点2：为“登录”按钮绑定监听函数，实现异步登录验证**/
var loginName = null;  //登录后的用户名
$('#bt-login').click(function(){
	var uname = $('[name="uname"]').val();
	var upwd = $('[name="upwd"]').val();
	//异步提交给服务器进行验证
	$.ajax({
		type: 'POST',							
		url: 'data/1_login.php',
		data: {"uname":uname, "upwd":upwd},
		success: function(txt, msg, xhr){
			if(txt==='err'){  //用户名或密码错误
				$('.modal .alert').html('用户名或密码错误！请重试！');
			}else if(txt==='ok'){   //登录成功
				$('.modal').fadeOut(300);
				$('#welcome').html('欢迎回来：'+uname);
				loginName = uname; //把登录用户名保存到全局
			}else { //其它错误
				$('.modal .alert').html(txt);
			}
		}
	});
});



//分页查询指定页面上的产品信息，并重新创建分页条
function loadProduct(pageNum){		
	$.ajax({
		type: 'GET',
		url: 'data/2_product_select.php',
		data: {'pageNum': pageNum},
		success: function(pager){
			//解析服务器端返回的JSON数组，转换为HTML片段，追加到产品列表中
			var html = "";
			$.each(pager.data, function(i, p){
				html += `
					<li>
						<a href="#"><img src="${p.pic}"></a>
						<p>￥${p.price}</p>
						<h1><a href="#">${p.pname}</a></h1>
						<div>
							<a href="#" class="contrast"><i></i>对比</a>
							<a href="#" class="p-operate"><i></i>关注</a>
							<a href="${p.pid}" class="addcart"><i></i>加入购物车</a>
						</div>
					</li>								
				`;
			});
			$('#plist ul').html(html);
			//根据分页对象，动态的创建分页条中内容
			var html = "";
			html += `<li><a href="#">${pager.pageNum-2}</a></li> `;
			html += `<li><a href="#">${pager.pageNum-1}</a></li> `;
			html += `<li class="active">${pager.pageNum}</li> `;
			html += `<li><a href="#">${pager.pageNum+1}</a></li> `;
			html += `<li><a href="#">${pager.pageNum+2}</a></li> `;
			$('.pager').html(html);
		}
	});
}
/**功能点3：当页面加载完后，异步请求第1页商品数据**/
loadProduct(1);

/**功能点4：为分页条中的超链接添加事件监听，点击后异步请求指定页中的数据**/
$('.pager').on('click', 'a', function(e){
	e.preventDefault();
	var pageNum = $(this).html(); //要显示的页号
	loadProduct(pageNum);
});


/**功能点5：点击每个商品下的“添加到购物车”，实现商品购买**/
$('#plist').on('click', 'a.addcart', function(e){
	e.preventDefault();
	var pid = $(this).attr('href');
	//把登录用户名和产品编号异步提交给服务器，实现购物车添加
	$.ajax({
		type: 'POST',
		url: 'data/3_cart_add.php',
		data: {uname: loginName, pid: pid},
		success: function(result){
			if(result.msg==='succ'){
				alert('购买成功！该商品已购买的数量：'+result.count);
			}else {
				alert('购买失败！失败原因为：'+result.reason);
			}
		},
		error: function(){
			console.log('error');
			console.log(arguments);
		}
	});
});


/**功能点6：点击“去购物车结算”，跳转到购物车详情页面，并把当前登录的用户名传递过去**/
$('#header').on('click', '#settle_up', function(){
	location.href="shoppingcart.html?loginName="+loginName;
});

