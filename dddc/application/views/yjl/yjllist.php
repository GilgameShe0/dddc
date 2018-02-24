<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>舟山民宿</title>
		<link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/common.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/calendar.css" >
	</head>
	<body>
        <div id="checkinout">
            <div id="firstSelect" style="width:100%;">
                <div class="Date_lr" style="float:left;">
                    <P>入住</p>
                    <input id="startDate" type="text" value=""style="" readonly>
                </div>
                <div class="Date_lr" style="float:right;">
                    <p>离店</p>
                    <input id="endDate" type="text" value="" style="" readonly>
                </div>
                <span class="span21">共<span class="NumDate">1</span>晚</span>
            </div>
        </div>
        <div class="mask_calendar">
            <div class="calendar"></div>
            <!-- 提示 -->
            <div class="calendar_tishi">请选择离店日期...</div>
        </div>
		<!-- 图片轮播 -->
		<div class="carousel carousel-list">
			<ul class="carousel-content carousel-animate clearfix">
				<li class="carousel-panel">
					<a href="javascript:void(0)">
						<img src="<?php echo STATIC_URL."/yjl/";?>img/carousel1.png" alt="">
					</a>
				</li>
				<li class="carousel-panel">
					<a href="javascript:void(0)">
						<img src="<?php echo STATIC_URL."/yjl/";?>img/carousel2.png" alt="">
					</a>
				</li>
				<li class="carousel-panel">
					<a href="javascript:void(0)">
						<img src="<?php echo STATIC_URL."/yjl/";?>img/carousel3.png" alt="">
					</a>
				</li>
			</ul>
			<ul class="carousel-mark clearfix">
				<li class="carousel-mark-active"></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<!-- 过滤条件 -->
		<div class="filter-mod">
			<div class="filter clearfix">
				<a class="filter-item js-filter-item" data-show="no"
					href="javascript:void(0)">全部<i></i></a>
				<a class="filter-item filter-asc"
					href="javascript:void(0)">价格升序</a>
				<a class="filter-item filter-desc"
					href="javascript:void(0)">价格降序</a>
				<a class="filter-item"
					href="javascript:void(0)">好评优先</a>
			</div>
            <!-- 具体类别过滤条件 -->
            <div class="filter-category">
                <div class="filter-category-content clearfix">
                    <ul class="category-type">
                        <li>
                            <a class="category-type-item category-type-item-active" 
                                href="javascript:void(0)">
                                全部
                            </a>
                        </li>
                        <li>
                            <a class="category-type-item" 
                                href="javascript:void(0)">
                                普陀区
                            </a>
                        </li>
                        <li>
                            <a class="category-type-item" 
                                href="javascript:void(0)">
                                朱家尖
                            </a>
                        </li>
                        <li>
                            <a class="category-type-item" 
                                href="javascript:void(0)">
                                定海区
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="filter-category-bottom js-fitler-category-hide">点击收起</div>
            </div>
		</div>
		<!-- 列表 -->
		<div class="list">
			<ul class="list-content">
                <?php foreach ($hotel_info as $k):?>
				<li class="list-item clearfix" data-location='<?php echo $k['location']?>' data-hotelid='<?php echo $k['hotelid']?>'>
					<div class="list-item-img">
						<img src="<?php echo $k['hotelimg']?>" alt="">
					</div> 
					<div class="list-item-brief">
                        <div class="list-item-brief-title"><?php echo $k['hotel_name']?></div>
                        <div class="list-item-brief-subtitle">
                            <span class='location'><?php echo $k['location']?></span> 
                            <?php echo $k['address']?>
                        </div>
                        <div class="list-item-brief-level">
                           <span class="level-value">4.8分</span>
                        </div>
                        <div class="list-item-brief-price">
                            <span class="price-value">
                                <em class="price-small">¥</em>
                                <em class="price-middle"><?php echo intval($k['(b_price+d_price-abs(b_price-d_price))/2'])?></em><em class="price-small">起</em>
                            </span>
                            <?php if($k['cook_price']):?>
                            <span class="cook-price">
                                <em class="price-small">海鲜加工<?php echo $k['cook_price']?>元/斤</em>
                            </span>
                            <?php endif;?>
                   		</div>
					</div>
				</li>
                <?php endforeach;?>
			</ul>
		</div>

		<script type="text/javascript" src="<?php echo STATIC_URL."/yjl/";?>js/lib/hammer.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL."/yjl/";?>js/lib/zepto.min.js"></script>
		<script type="text/javascript" src="<?php echo STATIC_URL."/yjl/";?>js/main.js"></script>
        <script src="<?php echo STATIC_URL."/"?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo STATIC_URL."/yjl/";?>js/date.js"></script>
		<script type="text/javascript">
            $(document).ready(function(){
               /* start__价格升降序排列*/
                var asc = function(a, b) {
                    return $(a).find('.price-middle').text() > $(b).find('.price-middle').text() ? 1 : -1;
                }
                var desc = function(a, b) {
                    return $(a).find('.price-middle').text() > $(b).find('.price-middle').text() ? -1 : 1;
                }
                var sortByInput = function(sortBy) {
                    var sortEle = $('.list-content>li').sort(sortBy);
                    $('.list-content').empty().append(sortEle);
                }

                $(".filter-desc").on("click",function(e){
                    $(".filter-item").css("color","#666");
                    $(".filter-desc").css("color","#6684ed");
                    sortByInput(desc);
                });
                $(".filter-asc").on("click",function(e){
                    $(".filter-item").css("color","#666");
                    $(".filter-asc").css("color","#6684ed");
                    sortByInput(asc);
                });
               /* end__价格升降序排列*/

            });

			Zepto(function($){
			   //alert('Ready to Zepto!')
			   /*轮播图片*/
			   base.carousel(3,false);
			   //跳转首页
               $(".js-gohome").on("click",function(e){
                    location.href="<?php echo HOST_NAME."/menu/index";?>";
               });
               //跳转详细页
               $(".list-content").on("click",".list-item",function(e){
                    var startDate = $('#startDate').val();  //入住的天数
                    var endDate = $('#endDate').val();      //离店的天数
                    var NumDate = $('.NumDate').text();    //共多少晚
                    if(!startDate||!endDate){
                        alert('请选择住店日期！')
                    }else{
                        console.log(startDate);
                        console.log(endDate);
                        console.log(NumDate);
                        //下面做ajax请求
                        $.ajax({
                            url:'<?php echo HOST_NAME."/menu/time_ajax";?>',
                            type:'POST',
                            dataType:'json',  
                            data:{startDate:startDate,endDate:endDate,NumDate:NumDate},
                            success:function(data){ 
                             }
                        });
                    }  
                    var hotelid = $(this).data('hotelid');
                    window.location.href = '<?php echo HOST_NAME."/menu/hotel_detail";?>'+"?hotelid="+hotelid;

               });



                /* start__按商圈筛选*/
                var location = function(a) {
                    return $(a).find('.location').text();
                }
                var screenByloc = function(sortBy) {
                        $('.list-content>li').hide();
                    }
                $('.category-type').on("click",'li',function(e){
                    var that = $(this).text();
                    // alert(that);
                    // return;
                    $(".js-filter-item").text(that);
                    $(".filter-category").hide();
                    // $('.list-content>li').find('.location').text();
                    // var b = location('.list-content>li');
                    // if(b != that){
                    //     screenByloc(location);
                    // }           
                });
                /* end__按商圈筛选*/

               $(".js-filter-item").on("click",function(e){
                    $(".filter-item").css("color","#666");
                    $(".js-filter-item").css("color","#6684ed");
                    var that = $(this),
                        isShow = that.attr("data-show");
                    if( isShow === "no" ){
                        $(".filter-category").show();
                        $("html,body").css("overflow","hidden");
                        $("body").css("height",window.innerHeight);
                        that.attr("data-show","yes").removeClass("filter-item").addClass("filter-item-active");
                    }else{
                        $(".filter-category").hide();
                        $("html,body").css("overflow","auto");
                        $("body").css("height","");
                        that.attr("data-show","no").removeClass("filter-item-active").addClass("filter-item");
                    }
               });
               $(".js-fitler-category-hide").on("click",function(e){
                    var that = $(".js-filter-item"),
                        isShow = that.attr("data-show");
                    $(".filter-category").hide();
                    $("html,body").css("overflow","auto");
                    $("body").css("height","");
                    that.attr("data-show","no").removeClass("filter-item-active").addClass("filter-item");
               });
			});
            $(function(){
            $('#firstSelect').on('click',function (e) {
                e.stopPropagation();
                e.preventDefault();
                $('.mask_calendar').show();
            });
            $('.mask_calendar').on('click',function (e) {
                e.stopPropagation();
                e.preventDefault();
                if(e.target.className == "mask_calendar"){
                    $('.calendar').slideUp(200);
                    $('.mask_calendar').fadeOut(200);
                }
            })
            $('#firstSelect').calendarSwitch({
                selectors : {
                    sections : ".calendar"
                },
                index : 4,      //展示的月份个数
                animateFunction : "slideToggle",        //动画效果
                controlDay:true,//知否控制在daysnumber天之内，这个数值的设置前提是总显示天数大于90天
                daysnumber : "90",     //控制天数
                comeColor : "#2EB6A8",       //入住颜色
                outColor : "#2EB6A8",      //离店颜色
                comeoutColor : "#E0F4F2",        //入住和离店之间的颜色
                callback :function(){//回调函数
                    $('.mask_calendar').fadeOut(200);
                    var startDate = $('#startDate').val();  //入住的天数
                    var endDate = $('#endDate').val();      //离店的天数
                    var NumDate = $('.NumDate').text();    //共多少晚
                    console.log(startDate);
                    console.log(endDate);
                    console.log(NumDate);   
                },
                comfireBtn:'.comfire'//确定按钮的class或者id
            });
            var b=new Date();
            var ye=b.getFullYear();
            var mo=b.getMonth()+1;
            mo = mo<10?"0"+mo:mo;
            var da=b.getDate();
            da = da<10?"0"+da:da;
            $('#startDate').val(ye+'-'+mo+'-'+da);
            b=new Date(b.getTime()+24*3600*1000);
            var ye=b.getFullYear();
            var mo=b.getMonth()+1;
            mo = mo<10?"0"+mo:mo;
            var da=b.getDate();
            da = da<10?"0"+da:da;
            $('#endDate').val(ye+'-'+mo+'-'+da);
            });
		</script>
	</body>
</html>