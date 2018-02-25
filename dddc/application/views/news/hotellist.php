<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>滴滴打船demo</title>
    <link rel="stylesheet" href="<?php echo STATIC_URL."/";?>css/shiplist.css">
    <script src="<?php echo STATIC_URL."/";?>js/jquery.min.js"></script>
</head>
<body>
<!--头部返回键和标题-->
<section class="list_header">
    <a class="back_icon"><</a>
    <h1 class="nav_title">渔家乐</h1>
</section>
<button class="matou">码头1</button> 
<button class="matou">码头2</button>
<button id="desc">价格降序</button>
<button id="asc">价格升序</button>
<br>
<section class="hotels_tab">   
    <!--宾馆信息-->
    <div >  
        <ul class="hotel_list_tab">
        <?php foreach ($news_item as $item): ?>
            <li class="hotel_tips" data-flag="<?php echo $item['num'] ?>">
                <div class="img">
                    <img src="http://tpl-c5af28b.pic-tpl.websiteonline.cn/upload/mark_e5_tdpj.jpg" >
                    <span title></span>
                </div>
                <div class="hotel_info">
                    <p class="title"><?php echo $item['place']?></p>
                    <p class="price" data-price="<?php echo $item['price']?>">￥<?php echo $item['price']?>起</p>
                </div>
            </li>
        <?php endforeach ;?>
        </ul>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        var asc = function(a, b) {
        return $(a).find('.price').data('price') > $(b).find('.price').data('price') ? 1 : -1;
        }
        var desc = function(a, b) {
            return $(a).find('.price').data('price') > $(b).find('.price').data('price') ? -1 : 1;
        }
        var sortByInput = function(sortBy) {
            var sortEle = $('.hotel_list_tab>li').sort(sortBy);
            $('.hotel_list_tab').empty().append(sortEle);

        }
        $('#desc').click(function() {
            sortByInput(desc);
        });

        $('#asc').click(function() {
            sortByInput(asc);
        });
        
        $('.matou').click(function(){
             var mt_id = $(this).text();
             window.location.href = '<?php echo HOST_NAME."/yjl/news/view_sort";?>'+"?mt_id="+mt_id;
        });
       
    });
    $(".hotel_list_tab").on("click","li",function(){ 
        var num = $(this).data("flag");
        window.location.href = '<?php echo HOST_NAME."/yjl/news/xiangqing";?>'+"?num="+num;
    })
</script>
</body>
</html>