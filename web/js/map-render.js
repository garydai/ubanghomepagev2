(function () {
    var poiLatitude = 30.298418;
    var poiLongitude = 120.01233;
    var map = new BMap.Map("baiduMap");
    map.centerAndZoom(new BMap.Point(poiLongitude, poiLatitude), 11);
    map.enableScrollWheelZoom(true);
    var point = new BMap.Point(poiLongitude, poiLatitude);
    map.centerAndZoom(point, 15);
    //create icon here
    var pt = new BMap.Point(poiLongitude, poiLatitude);
    var myIcon = new BMap.Icon("http://img.shenghuozhe.net/shz/2016/02/28/55w_54h_F97011456650583.png", new BMap.Size(55, 54));
    var marker2 = new BMap.Marker(pt,{icon:myIcon});
    marker2.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
    map.addOverlay(marker2);
})();


(function() {
    window.BMap_loadScriptTime = (new Date).getTime();
    document.write('<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=2.0&ak=drgml85Sasim0e7z9O5iZwck&services=&t=20161025142414"></script>');
})();