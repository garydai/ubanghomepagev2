<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Vfq3R9v4fsZg81NchE6PLNiGG6QgNhwy"></script>
<div id="allmap"></div>

<div id="contact" class="contact-layout clearfix">

	<div class="contact-center">
		<li>
                <p class="contactTitle">
                    联系我们：
                </p>
                <p>
                    地址：浙江省杭州市上城区白云路28号新华社对面 移动互联技术研发中心一楼
                </p>
                <p>
                    微信: you_qiubiying
                </p>
                <p>
                	邮箱: contact@ubangwang.com
                </p>
        </li>

		<li>
                <div class="qrcode">
                   <img src="/img/weixinqr.png" style="width:146px;height:146px;">
                   <p>
                    扫一扫，添加微信公众号
                	</p>
                </div>
                
                
        </li>

    </div>
	
 </div>
<script type="text/javascript">

	// 百度地图API功能
	var map = new BMap.Map("allmap");
//	var point = new BMap.Point(116.331398,39.897445);
//	map.centerAndZoom(point,12);
	map.enableScrollWheelZoom(true);
	// 创建地址解析器实例
	var myGeo = new BMap.Geocoder();
	// 将地址解析结果显示在地图上,并调整地图视野
	myGeo.getPoint("浙江省杭州市上城区白云路28号新华社对面 移动互联技术研发中心一楼", function(point){
		if (point) {
			map.centerAndZoom(point, 16);
			map.addOverlay(new BMap.Marker(point));
		}else{
			alert("您选择地址没有解析到结果!");
		}
	}, "");
/*

	var poiLatitude = 30.298418;
    var poiLongitude = 120.01233;
    var map = new BMap.Map("allmap");
    map.centerAndZoom(new BMap.Point(poiLongitude, poiLatitude), 11);
    map.enableScrollWheelZoom(true);
    var point = new BMap.Point(poiLongitude, poiLatitude);
    map.centerAndZoom(point, 15);
    //create icon here
    var pt = new BMap.Point(poiLongitude, poiLatitude);
    var myIcon = new BMap.Icon("http://img.shenghuozhe.net/shz/2016/02/28/55w_54h_F97011456650583.png", new BMap.Size(55, 54));
    var marker2 = new BMap.Marker(pt,{icon:myIcon});
    marker2.setAnimation(BMAP_ANIMATION_BOUNCE); //璺冲姩鐨勫姩鐢�
    map.addOverlay(marker2);
*/
</script>

