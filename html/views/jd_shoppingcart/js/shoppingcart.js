/**功能点1：页面加载后，异步请求页头和页尾**/
$('div#header').load('header.php',function(){
	$('#welcome').html('欢迎回来：'+loginName);
});
$('div#footer').load('footer.php');


/**功能点2：页面加载完成后，读取前一个页面传递过来的loginName**/
//console.log(location); 
var s = location.search;  //?loginName=naicha
var loginName = s.substring( s.indexOf('=')+1 );
//alert(loginName);


/**功能点3：根据当前登录用户名，异步请求其购物车中的内容**/
$.ajax({
	type: 'GET',
	url: 'data/4_cart_detail_select.php',
	data: {uname: loginName},
	success: function(list){
		var html = '';
		if(list.msg==='err' || list.length == 0){
			html = '<tr><td colspan="6">您尚未购买任何商品！</td></tr>';
		}else{
			$.each(list, function(i, p){
			  html += `
					<tr>
						<td>
							<input type="checkbox"/>
							<input type="hidden" name="did" value="${p.did}">
							<div><img src="${p.pic}"></div>
						</td>
						<td><a href="#">${p.pname}</a></td>
						<td>￥${p.price}</td>
						<td>
								<button>-</button><input type="text" value="${p.count}"><button>+</button>
						</td>
						<td><span>￥${p.price*p.count}</span></td>
						<td><a href="${p.did}">删除</a></td>
				  </tr>
				`;
			});
		}
		$('#cart tbody').html(html);
	}
});

/**功能点4：为购买数量旁边的+和-按钮绑定事件监听**/
$('#cart').on('click', 'button', function(){
	var count = $(this).siblings('input').val();
	if($(this).html()==='-'){
		count--;
	}else if($(this).html()==='+'){
		count++;
	}
	$(this).siblings('input').val(count);

	//把修改后的购买数量异步提交给服务器
	var did = $(this).parent().siblings(':nth-child(1)').children(':hidden').val();
	$.ajax({
		type: 'POST',
		url: 'data/5_cart_detail_update.php',
		data: {did: did, count: count},
		success: function(result){
			console.log('修改完成');
			if(result!=='succ'){
				alert('修改失败');
			}
		}
	});
})


