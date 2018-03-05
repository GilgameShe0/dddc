<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/shiplist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/common.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/calendar.css" >
</head>
<body>
    <!--显示用户已选择的码头和时间-->
    <div class="user_tab">
        <span class="s_location"><?php echo $matou?></span>
        <span class="s_date"><?php echo $date?></span>
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
                 <?php foreach ($ship_info as $ships) :?>
                <li class="list-item clearfix">
                    <div class="list-item-img">
                        <img src="http://tpl-c5af28b.pic-tpl.websiteonline.cn/upload/mark_e5_tdpj.jpg">
                    </div> 
                    <div class="list-item-brief">
                        <div class="list-item-brief-title"><?php echo $ships['shipid']?></div>
                        <div class="list-item-brief-subtitle">
                            <span class='location'><?php echo $matou?></span> 
                        </div>
                        <div class="list-item-brief-level">
                           <span class="level-value">4.8分</span>
                        </div>
                        <div class="list-item-brief-price">
                            <span class="price-value">
                                <em class="price-small">¥</em>
                                <em class="price-middle"><?php echo $ships['price']?></em><em class="price-small">起</em>
                            </span>
                        </div>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    <script src="<?php echo STATIC_URL."/"?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL."/"?>js/bootstrap.min.js"></script>
    <script type="text/javascript">
        // 价格排序
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
                $(".list-content").on("click",".list-item",function(e){
                    var shipid = $(this).find('.list-item-brief-title').text();
                    window.location.href = '<?php echo HOST_NAME."/xxhd/shipinfo_view";?>'+"?shipid="+shipid; 

               });
            });
    </script>
</body>    
</html>