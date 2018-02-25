<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="renderer" content="webkit">
    <title>购物党N多值得买</title>

    <link href="<?php echo STATIC_URL."/"?>fishshop/css/gwd_yungui_all.css" rel="stylesheet" charset="utf-8">

  </head>
  <body>
    <!-- === Gwd_top === -->
    <div id="gwd_top" class="gwd_p_big">
      <span id="goback">&nbsp;<img src="<?php echo STATIC_URL."/"?>fishshop/image/topleft.png" alt="返回"></span>
      <span id="gtmiddle">鱼多多</span>
      <span id="formore">&nbsp;<img src="<?php echo STATIC_URL."/"?>fishshop/image/topright.png" alt="更多"></span>
    </div><!-- gwd_top -->
    <div id="gwd_top_shadow"></div>
    <div id="threesss">
      <div></div>
      <ul>
        <li><a href="javascript:void(0);"><img src="<?php echo STATIC_URL."/"?>fishshop/image/home.png" alt="首页"><span class="gwd_p_big">首页</span></a></li>
        <li><a href="javascript:void(0);" id="showshare"><img src="<?php echo STATIC_URL."/"?>fishshop/image/share.png" alt="分享"><span class="gwd_p_big">分享</span></a></li>
        <li><a href="javascript:void(0);"><img src="<?php echo STATIC_URL."/"?>fishshop/image/suggestion.png" alt="反馈"><span class="gwd_p_big">反馈</span></a></li>
      </ul>
    </div><!-- threesss -->
    <div class="mask"></div>
    <!-- === End Gwd_top === -->
    <!-- === Gwd_classify === -->
    <div id="gwd_classify">
      <ul>
        <li><a id="gcfl"><div><p class="gwd_p_big">分类</p><div class="heisanjiao"></div></div></a></li>
        <li><a href="javascript:void(0);" id="gcjg"><div><p class="gwd_p_big" id="wthp">价格排序<span>&nbsp;&nbsp;&nbsp;</span></p><div class="heisanjiao"></div></div></a></li>
      </ul>
      <div id="gcfldiv">
        <div class="row">
          <div class="col-gwd-2-50">
            <ul class="leftul">
              <li>
                <a href="javascript:void(0);" class="active">
                  <span class="name gwd_p red">按鱼类查找</span><span class="number gwd_p"></span>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);">
                  <span class="name gwd_p">按船只查找</span><span class="number gwd_p"></span>
                </a>
              </li>
            </ul>
          </div><!-- col-gwd-2-50 -->

        </div><!-- row -->
      </div><!-- gcfldiv -->
      <div id="gcjgdiv">
        <div class="row">
          <div class="col-gwd-2-50">
            <ul class="leftul">
              <li><a href="javascript:void(0);" class="active"><span class="timeleft gwd_p red">默认排序</span><span class="timeright gwd_p"></span></a></li>
              <li><a href="javascript:void(0);"><span class="timeleft gwd_p" id='asc'>价格由低到高</span><span class="timeright gwd_p">></span></a></li>
              <li><a href="javascript:void(0);"><span class="timeleft gwd_p" id='desc'>价格由高到低</span><span class="timeright gwd_p">></span></a></li>
            </ul>
          </div><!-- col-gwd-2-50 -->
        </div><!-- row -->
      </div><!-- gcjgdiv -->
    </div>

    <!-- === Gwd_index === -->
    <div id="gwd_index">
      <div class="container">
        <ul class="shop_list_tab">
          <?php foreach ($news_item as $item): ?>
            <li class="shop_tips" data-flag="<?php echo $item['fishid'] ?>">
              <a href="javascript:void(0);">
                <div class="row">
                  <div class="col-gwd-2-39">
                    <span></span>
                    <img src="<?php echo $item['imgurl']?>" alt="促销活动" class="gwd-img-block-center">
                  </div><!-- col-gwd-2-39 -->
                  <div class="col-gwd-2-61">
                    <div class="title gwd_p_big"><?php echo $item['type'] ?></div>
                    <div class="price gwd_p_big red">
                        <p class="prices" data-price="<?php echo $item['min(goodsinfo.price)']?>"><?php echo $item['min(goodsinfo.price)'] ?>元/斤起
                        </p>
                    </div>
                    <div class="mall-name gwd_p"><?php echo $item['min(shopship_info.land_date)'] ?></div>
                    <div class="mall-time gwd_p">在售：<?php echo $item['sum(goodsinfo.f)'] ?></div>
                  </div><!-- col-gwd-2-61 -->
                </div><!-- row -->
              </a>
            </li>
          <?php endforeach ;?> 
        <ul class="hotel_list_tab">
      </div><!-- container -->
    </div><!-- gwd_index -->
    <!-- === End Gwd_index === -->

    <!-- === Gwd_gotop === -->
    <div class="gwd_gotop">
      <img src="<?php echo STATIC_URL."/"?>fishshop/image/gotop.png" alt="回顶部图标" class="gwd-img-block-center">
    </div><!-- gwd_gotop -->
    <!-- === End Gwd_gotop === -->

    <script type="text/javascript" src="<?php echo STATIC_URL."/"?>fishshop/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL."/"?>fishshop/js/index.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL."/"?>fishshop/js/goTop.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var asc = function(a, b) {
        return $(a).find('.prices').data('price') > $(b).find('.prices').data('price') ? 1 : -1;
        }
        var desc = function(a, b) {
            return $(a).find('.prices').data('price') > $(b).find('.prices').data('price') ? -1 : 1;
        }
        var sortByInput = function(sortBy) {
            var sortEle = $('.shop_list_tab>li').sort(sortBy);
            $('.shop_list_tab').empty().append(sortEle);

        }
        $('#desc').click(function() {
            sortByInput(desc);
        });

        $('#asc').click(function() {
            sortByInput(asc);
        });
        
        // $('.matou').click(function(){
        //      var mt_id = $(this).text();
        //      window.location.href = '<?php echo HOST_NAME."/yjl/news/view_sort";?>'+"?mt_id="+mt_id;
        // });
       
    });
    $(".shop_list_tab").on("click","li",function(){ 
        var fishid = $(this).data("flag");
        var min_price=$(this).find('.prices').data("price");
        var type=$(this).find('.title').text();
        window.location.href = '<?php echo HOST_NAME."/shops/shop/detail";?>'+"?fishid="+fishid+"&min_price="+min_price+"&type="+type;
    })

</script>
  </body>
</html>