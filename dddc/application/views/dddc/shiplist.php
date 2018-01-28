<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>滴滴打船demo</title>
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/shiplist.css">
    <script src="<?php echo STATIC_URL."/"?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL."/"?>js/bootstrap.min.js"></script>
</head>
<body>
<!--头部返回键和标题-->
<section class="list_header">
    <a class="back_icon" href="<?php echo HOST_NAME.'/menu/index'?>"><</a>
    <h1 class="nav_title">船票</h1>
</section>
<section class="ships_tab">
    <!--显示用户已选择的码头和时间-->
    <div class="user_tab">
        <p><?php echo $matou?>->东海海域</p>
        <p><?php echo $date?></p>
    </div>
    <!--船票信息-->
    <div>
        <ul class="ship_list_tab">
            <?php foreach ($ship_info as $ships) :?>
          
            <li class="ship_tips" data-shipid="<?php echo $ships['shipid'] ?>">
                <div class="img">
                    <img src="http://tpl-c5af28b.pic-tpl.websiteonline.cn/upload/mark_e5_tdpj.jpg" >
                </div>
                <div class="ship_info">
                    <p class="title"><?php echo $ships['shipid']?></p>
                    <p class="price">价格:<span><?php echo $ships['price']?></span>元</p>
                </div>
            </li>
            <?php endforeach;?>
    </div>
    <button class="desc" data-caozuo="inc">降序</button>
    <button class="asc" data-caozuo="inc">升序</button>
</section>


</body>
<script type="text/javascript">
    // 价格排序
   $(document).ready(function(){
        var asc = function(a, b) {
        return $(a).find('span').text() > $(b).find('span').text() ? 1 : -1;
        }
        var desc = function(a, b) {
            return $(a).find('span').text() > $(b).find('span').text() ? -1 : 1;
        }
        var sortByInput = function(sortBy) {
            var sortEle = $('.ship_list_tab>li').sort(sortBy);
            $('.ship_list_tab').empty().append(sortEle);
        }
        $('.desc').click(function() {
            sortByInput(desc);
        });

        $('.asc').click(function() {
            sortByInput(asc);
        });
    });

   $(".ship_list_tab").on("click","li",function(){  
        var shipid = $(this).find('.title').text();
        window.location.href = '<?php echo HOST_NAME."/menu/shipinfo_view";?>'+"?shipid="+shipid;       
    });

</script>
    
</html>