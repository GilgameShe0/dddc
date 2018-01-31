<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/shiplist.css">
    <script src="<?php echo STATIC_URL."/"?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL."/"?>js/bootstrap.min.js"></script>
</head>
<body>
<section class="list_header">
    <a class="back_icon" onclick="window.history.go(-1)"><</a>
    <h1 class="nav_title">详情</h1>
</section>

<section class="ships_tab">
	<?php foreach ($ship_info as $ship_info):?>
    <img src="http://tpl-c5af28b.pic-tpl.websiteonline.cn/upload/mark_e5_tdpj.jpg">
    <div class="ship_info">
        <p class="title"><?php echo $ship_info['shipid']?></p>
        <p class="price">价格<?php echo $ship_info['price']?></p>
    </div>
    <?php endforeach ;?>
</section>	
<!--评价系统-->
<section class="evaluate_tab">
    <div class="ship_title">用户评价</div>
</section>
<section class="bottom_tab">
    立即预约
</section>
</body>
<script type="text/javascript">
    $(".bottom_tab").click(function(){
        var shipid = $('.title').text();
        window.location.href = '<?php echo HOST_NAME."/menu/checkinfo_view";?>'+"?shipid="+shipid;
    })  
</script>
</html>  