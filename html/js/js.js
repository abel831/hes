/* bulid.html */

var checkMid = {
	mid:$("#mid"),
	checkval:function(val){
		val = this.mid.val();
		if (val == ""){
			return false;
		}else{
			return true;
		}
	},
	sub:function(){
		$("#mid").parents("div.row").siblings().remove();
		var html = "";
		if (this.checkval()){
			html = `
				<div class="row floor">
					<div class="col-lg-8 col-lg-offset-2">
						<p>
							用户大楼列表
						</p>
						<table class="table table-bordered">
							<tr>
								<th>新建日期</th>
								<th>城市</th>
								<th>街道</th>
								<th>经纬度</th>
								<th>打击日期时间</th>
								<th>拆除日期时间</th>
							</tr>
							<tr>
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td>4</td>
								<td>5</td>
								<td>6</td>
							</tr>
						</table>
					</div>
				</div>
			`;
			$("#mid").val(this.mid.val());
			$("#mid").parents("div.row").after(html);
			//ajax
		}else{
			$("#mid").parents("div.row").siblings().remove();
			html = `
				<div class="row">
					<div class="text-center col-lg-8 col-lg-offset-2">
						<form action="">
							<div class="form-group">
								<label for="coor" class="txt_lt">请输入用户任一大楼的地图经纬度</label>
								<input type="text" id="coor" class="form-control"/>
								<button type="submit" class="btn btn-Default">查询提交</button>
							</div>
						</form>
					</div>
				</div>
			<div class="row">
				<div class="text-center col-lg-8 col-lg-offset-2">
					<form action="">
						<div class="form-group">
							<label for="result" class="txt_lt">显示方式</label>
							<textarea name="result" id="result" class="result form-control" cols="30" rows="10"></textarea>
							<button type="submit" class="btn btn-Default">提交修改</button>
						</div>
					</form>
				</div>	
			</div>	
			`;
			$("#mid").val(this.mid.val());
			$("#mid").parents("div.row").after(html);
			
		}
		
	},
};

$("#checkMid").click(function(){
	checkMid.sub();
});


/* prop.html */
//var mid ="1"
function checkItem( mid , date ){
	this.mid = mid;
	this.date = date;
}
checkItem.prototype.checkMid = function(){
	this.mid = $("#mid").val();
	if (this.mid == ""){
			return false;
		}else{
			return true;
		}
};
checkItem.prototype.checkDate = function(){
	this.date = $("#date").val();
	if (this.date == ""){
			return false;
		}else{
			return true;
		}
}
checkItem.prototype.sub = function(mid , date){
	mid = this.checkMid();
	date = this.checkDate();
	$("#mid").parents("div.row").siblings().remove();
	var html = "";
	if (mid && date){
		html = `
			<div class="row floor">
				<div class="col-lg-8 col-lg-offset-2">
					<p>
						显示结果
					</p>
					<table class="table table-bordered">
						<tr>
							<th>道具</th>
							<th>制造/收货数量</th>
							<th>购买数量</th>
							<th>使用数量</th>
							<th>剩余数量</th>
							<th>？？数量</th>
							<th>应该补充</th>
							<th>操作</th>
						</tr>
						<tr>
							<td>导弹</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input type="text" maxlength="2" class="sup"/>
							</td>
							<td>
								<button type="submit">提交</button>
							</td>	
						</tr>
						<tr>
							<td>护盾</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input type="text" maxlength="2" class="sup"/>
							</td>
							<td>
								<button type="submit">提交</button>
							</td>	
						</tr>
						<tr>
							<td>抢夺卡</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input type="text" maxlength="2" class="sup"/>
							</td>
							<td>
								<button type="submit">提交</button>
							</td>	
						</tr>
						<tr>
							<td>火箭</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input type="text" maxlength="2" class="sup"/>
							</td>
							<td>
								<button type="submit">提交</button>
							</td>	
						</tr>
						<tr>
							<td>太阳</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<input type="text" maxlength="2" class="sup"/>
							</td>
							<td>
								<button type="submit">提交</button>
							</td>	
						</tr>
					</table>
				</div>
			</div>	
		`;
		$("#mid").val(this.mid);
		$("#mid").parents("div.row").after(html);
		return;
	}
}
var checkMid2 = new checkItem(mid , date);

/*
console.log(checkMid2.checkMid());
console.log(checkMid2.checkDate());
console.log(checkMid2.sub());
*/

/* 事件 */

$("#checkItem").click(function(){
	checkMid2.sub();
});