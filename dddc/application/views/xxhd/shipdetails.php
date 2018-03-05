<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/shiplist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/common.css" >

</head>
<body>
    <section class="ships_tab">
    	<?php foreach ($ship_info as $ship_info):?>
        <img src="http://tpl-c5af28b.pic-tpl.websiteonline.cn/upload/mark_e5_tdpj.jpg">
         <!-- 购买 buy -->
            <div class="detail-mod">
                <div class="detail-mod-buy clearfix">
                    <div class="buy-price">
                        <div class="old"><?php echo $ship_info['shipid']?></div>
                        <div class="new">¥<?php echo $ship_info['price']?></span></div>
                    </div>
                    <div class="buy-sure">
                        <a class="content-call" href="javascript:void(0);">
                            直接预定
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach ;?>
    </section>	
    <!--评价系统-->
    <section class="evaluate_tab">
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
                        <dd class="js_comment">很赞的司机，性价比很高，服务态度也很好，下次还会来。
                        </dd>
                    </dl>

                    <dl class="content-comment">
                        <dt>
                            <span class="name">Ps1912</span>
                            <span class="time">2015-03-22</span>
                        </dt>
                        <dd class="js_comment">很赞的司机，性价比很高，服务态度也很好，下次还会来。
                        </dd>
                    </dl>

                    <dl class="content-comment">
                        <dt>
                            <span class="name">Ps1912</span>
                            <span class="time">2015-03-22</span>
                        </dt>
                        <dd class="js_comment">很赞的司机，性价比很高，服务态度也很好，下次还会来。
                        </dd>
                    </dl>
                </div>
            </div>
            <!-- 须知 -->
            <div class="detail-mod tips">
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
                        <li>咨询商家</li>
                        <li>限10人开船</li>
                        <li>租船默认购买人身意外险</li>
                    </ul>
                </div>
            </div>
            
    </section>
    <section class="bottom_tab">
        电话预约
    </section>
    <script src="<?php echo STATIC_URL."/"?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL."/"?>js/bootstrap.min.js"></script>
    <script type="text/javascript">


        $(".buy-sure").click(function(){
            var shipid = $('.old').text();
            window.location.href = '<?php echo HOST_NAME."/menu/checkinfo_view";?>'+"?shipid="+shipid;
        })  
    </script>
</body>
</html>  