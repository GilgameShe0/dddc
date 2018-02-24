<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>舟山民宿</title>
		<link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/common.css" >
	</head>
	<body>
		<!-- 图片轮播 -->
		<div class="carousel carousel-detail">
			<ul class="carousel-content carousel-animate clearfix">
				<li class="carousel-panel">
					<a href="javascript:void(0)">
						<img src="<?php echo STATIC_URL."/yjl/";?>img/carousel2.png" alt="">
					</a>
				</li>
			</ul>
		</div>
		<!-- 详细信息 -->
        <div class="detail">
            <!-- 购买 buy -->
            <?php foreach ($room_info as $k):?>
            <div class="detail-mod">
                <div class="detail-mod-buy clearfix"  data-hotelname="<?php echo $hotel_info['0']['hotel_name'];?>">
                    <div class="buy-price">
                        <div class="old"><?php echo $k['roomtype'];?></div>
                        <div class="new">¥<span><?php echo $k['roomprice'];?></span></div>
                    </div>
                    <div class="buy-sure" data-hotelid="<?php echo $k['hotelid'];?>">
                        <a href="javascript:void(0)">预定</a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <!-- 地址 -->
            <div class="detail-mod">
                <div class="detail-mod-title clearfix">
                    <div class="title"><?php echo $hotel_info['0']['hotel_name'];?></div>
                </div>
                <div class="detail-mod-content">
                    <div class="clearfix">
                        <span class="content-address">
                            <?php echo $hotel_info['0']['address'];?>
                        </span>
                        <a class="content-call" href="javascript:void(0);">
                            电话预约
                        </a>
                    </div>
                </div>
            </div>
            <!-- 介绍 -->
            <div class="detail-mod">
                <div class="detail-mod-title clearfix">
                    <div class="title">酒店介绍</div>
                    <div class="more">查看更多>></div>
                </div>
                <div class="detail-mod-content">
                    <ul class="clearfix">
                        <li><?php echo $hotel_info['0']['breakfast'];?></li>
                        <li><?php echo $hotel_info['0']['parking'];?></li>
                        <li><?php echo $hotel_info['0']['hotwater'];?></li>
                        <li><?php echo $hotel_info['0']['wifi'];?></li>
                    </ul>
                </div>
            </div>
            <!-- 须知 -->
            <div class="detail-mod">
                <div class="detail-mod-title clearfix">
                    <div class="title">购买须知</div>                    
                </div>
                <div class="detail-mod-content">
                    <div class="subtitle">预约提醒</div>
                    <ul class="notice">
                        <li>本单需要提前1天致电商家预约</li>
                    </ul>
                    <div class="subtitle">发票</div>
                    <ul class="notice">
                        <li>发票问题请咨询商家，以商家反馈为准</li>
                    </ul>

                    <div class="subtitle">使用规则</div>
                    <ul class="notice">
                        <li>可以连续入住，团购用户不可同时享受商家其他优惠</li>
                        <li>咨询前台；咨询前台</li>
                        <li>限2名成人入住</li>
                        <li>入住时候需缴纳押金100元</li>
                        <li>请携带有效证件（除驾驶证）办理入住登记</li>
                    </ul>
                </div>
            </div>
            <!-- 口碑 -->
            <div class="detail-mod">
                <div class="detail-mod-title clearfix">
                    <div class="title">评价详情</div>
                    <div class="more">查看更多>></div>
                </div>
                <div class="detail-mod-content">
                    <dl class="content-comment">
                        <dt>
                            <span class="name">Ps1912</span>
                            <span class="time">2015-03-22</span>
                        </dt>
                        <dd class="js_comment">很赞的酒店，性价比很高，服务态度也很好。离地铁口也不远，下次还会来。
                        </dd>
                    </dl>

                    <dl class="content-comment">
                        <dt>
                            <span class="name">Ps1912</span>
                            <span class="time">2015-03-22</span>
                        </dt>
                        <dd class="js_comment">很赞的酒店，性价比很高，服务态度也很好。离地铁口也不远，下次还会来。
                        </dd>
                    </dl>

                    <dl class="content-comment">
                        <dt>
                            <span class="name">Ps1912</span>
                            <span class="time">2015-03-22</span>
                        </dt>
                        <dd class="js_comment">很赞的酒店，性价比很高，服务态度也很好。离地铁口也不远，下次还会来。
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
		<script type="text/javascript" src="<?php echo STATIC_URL."/yjl/";?>js/lib/hammer.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL."/yjl/";?>js/lib/zepto.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL."/yjl/";?>js/main.js"></script>
		<script type="text/javascript">
			Zepto(function($){
			   //alert('Ready to Zepto!')
			   /*轮播图片*/
			   base.carousel(1,false);
			   //跳转首页
               $(".js-gohome").on("click",function(e){
                    location.href="home.html";
               });
               //跳转列表页
               $(".js-golist").on("click",function(e){
                    location.href="list.html";
               });

                //购买订单页
               $('.buy-sure').on('click',function(){
                    var hotelid = $(this).data('hotelid');
                    var roomtype = $(this).parent().find('.old').text();
                    var roomprice = $(this).parent().find('.new>span').text();
                    var hotel_name = $(this).parent().data('hotelname');
                    $.ajax({
                        url:'<?php echo HOST_NAME."/menu/hotel_ajax";?>',
                        type:'POST',
                        dataType:'json',  
                        data:{hotelid:hotelid,roomtype:roomtype,roomprice:roomprice,hotel_name:hotel_name},
                        success:function(data){ 
                            if(data.state == 1){
                                location.href="<?php echo HOST_NAME."/menu/order_view";?>";
                            }
                         }
                    });
               });
			});
		</script>
	</body>
</html>