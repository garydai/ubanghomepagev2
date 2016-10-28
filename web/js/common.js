$(function(){
	resizeScreen();
	
	$("ul.blockeasing li").hover(function() {
		  if($(window).width() > 960){
				$(this).find('.menu_hover:first').stop(true, true).fadeIn(500);
			}
		  },function() {
			if($(window).width() > 960){
			  $(this).find('.menu_hover:first').stop(true, true).fadeOut(500);
			}
			  
	});
	
	$(".medium_content_list li").hover(function(){
		$(this).find(".shade").css("display","block");
	},function(){
		$(this).find(".shade").css("display","none");
	});
	
	
	//提示框关闭事件
	$("#msgbox_close").click(function(){
		$("#shade").css("display","none");
		$("#msgbox").css("display","none");
	});
})


$(window).resize(function(){
	resizeScreen();
});


/**
 * 调整屏幕的操作
 */
function resizeScreen(){
	var screenWidth = $(window).width();
	if(screenWidth > 960){//导航的调整
		$(".blockeasing-warpp").css("display","");
		$(".menu_mobile").removeClass("menu_mobile_hover");
	}

	scHeight  = parseInt($(window).height()); //全局变量
	var contentHeight = parseInt($("#div_content").height());
	var cmpHeight = scHeight - ( parseInt($("header").height()) + parseInt($("footer").height()));
	if(cmpHeight > contentHeight)$("#div_content").css('min-height',cmpHeight + 'px');
	
	//统计图的调整
	$("#statistics").css("width",screenWidth);
}


//手机端下来菜单的切换
function menu_mobile_switch(_this){
		$(".blockeasing-warpp").toggle(250,function(){
			if($(_this).hasClass("menu_mobile_hover")) $(_this).removeClass("menu_mobile_hover");
			else  $(_this).addClass("menu_mobile_hover");
		});
}

/**
 * 提示弹出款 
 * @params string msg 是提示信息
 * @params stirng status 传入'error'是错误状态
 */
function showMsg(msg,status){
	$("#shade").css("display","block");
	var boxObj = $("#boxcontent");
	
	if (status == 'error'){
		boxObj.removeClass("boxcontent_success");
		if(!boxObj.hasClass("boxcontent_lose")){
			boxObj.addClass('boxcontent_lose');
		}
	}else{
		boxObj.removeClass("boxcontent_lose")
		if(!boxObj.hasClass("boxcontent_success")){
			boxObj.addClass('boxcontent_success');
		}
	}
	
	boxObj.html(msg).parent().css("display","block");
}

function closeMsgBox(){
	$("#shade").css("display","none");
	$("#msgbox").css("display","none");
}

/**
 * 显示加载样式
 * @params string 显示信息
 * @params status 传入'close'是隐藏显示状态
 */
function loading(msg,status){
	if(status == 'close'){
		$("#shade").hide();
		$("#loading").hide();
		return;
	}
	$("#shade").show();
	$("#loading").html(msg).show();
}


/**
 *  处理数据，并绘画成曲线图
 *  @params string id    绘画图标的id
 *  @params string title 标题
 *  @params data array(
 *  	array("title"=>"" , "avg_price" => "" , "count" => 0),
 *  	array("title"=>"" , "avg_price" => "" , "count" => 0)
 *  )
 */
function createGrapic(id,title,statistics_data){
	var xAxis = new Array();
	var series_price = new Array();
	var series_count = new Array();
	for(var i in statistics_data){
		xAxis.push(statistics_data[i].title);
		series_price.push(parseInt(statistics_data[i].avg_price));
		series_count.push(parseInt(statistics_data[i].count));
	}
	grapic(id,title,xAxis,series_price,series_count);
}


/*
 * 绘画域名统计图
 * @params string id    绘画图标的id
 * @params string       title   标题
 * @params xAxis        array   统计图底部标题数据
 * @params series_price array   统计的价格数据
 * @params series_count array   统计的数量数据
 */
function grapic(id,title,xAxis,series_price,series_count){
	$('#' + id).highcharts({
		chart: {
			//selectionMarkerFill : 'rgba(0,0,0,0.25)'
			zoomType:'xy',
			backgroundColor:'#fefefe'
		},
		credits:{
			enabled:false,   //去除版权
		},
        title: {
            text: title, //标题
			/*
			style : {
				fontSize:'30px',
				fontFamily:'微软雅黑'
			},
			*/
            x: -20 //center
        },
        subtitle: {
            text: '', //标题下的
            x: -20
        },
        xAxis: {
            categories: xAxis
        },
        yAxis: [
			{
				title: {
					text: ''
				},
				labels:{
					format:'　￥{value}',
					color:'#f60'
				}
			},
			{
				title: {
					text: ''
				},
				labels:{
					format:'{value} 个　　'
				},
				opposite:true   //放到右边
			}
			
        ],
        tooltip: {
            valueSuffix: '￥'
			
        },
        series: [
				{
					//color:Highcharts.getOptions().colors[9],
					color:'#7cb5ec',
					type:'column',
					yAxis:1,
					name: '交易个数',
					tooltip:{valueSuffix:' 个'},
					dataLabels:{
									enabled:true,
									color:'#666'
					},
					data: series_count
				}
				,
				{
					name: '当天交易价格',
					//color:Highcharts.getOptions().colors[2],
					color:'#2291b9',
					dataLabels:{
									enabled:true,
									color:'#666'
					},
					data: series_price
				}
		]
    });
	
}

/**
 * ajax分页获取数据(未完善)
 * @params htmlElement _this 元素对象
 * @params 
 */
function ajaxData(_this,p){
		p = parseInt(p);
		if(isNaN(p) || p < 1)return false;
		var params = {page : p};
		addParams= $.trim($(_this).attr('data')); 
		if(addParams != ""){
			var addParamsData = addParams.split("&");
			for(var index in addParamsData){
				var tmpParams = addParamsData[index].split("=");
				if(tmpParams.length == 2){	//追加
					params[tmpParams[0]] = tmpParams[1];
				}
			}
		}
		loading('正在加载中...');
		$.ajax({
			type : 'get',
			dataType : 'json',
			url : ajaxDataUrl,
			data : params,
			success : function(data){
				loading('','close');
				if(data.status == 0){
					showMsg(data.msg,'error');
				}else{
					dealDetail(data);
				}
			}
		});
}
