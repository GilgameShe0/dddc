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
    <title>商品详情</title>

    <link href="<?php echo STATIC_URL."/"?>fishshop/css/gwd_yungui_all.css" rel="stylesheet" charset="utf-8">

  </head>
  <body>
    <!-- === Gwd_top === -->
    <div id="gwd_top" class="gwd_p_big">
      <span id="goback">&nbsp;<img src="<?php echo STATIC_URL."/"?>fishshop/image/topleft.png" alt="返回"></span>
      <span id="gtmiddle">商品详情</span>
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

    <!-- === Gwd_topimg === -->
    <div id="gwd_topimg">
      <img src="<?php echo STATIC_URL."/"?>fishshop/image/loading.jpg" alt="商品图" class="gwd-img-block-center">
    </div><!-- gwd_topimg -->
    <!-- === End Gwd_topimg === -->

    <!-- === Gwd_content === -->
    <div id="gwd_content">
      <div class="container">
        <div class="fultitle gwd_p_big">舟山新鲜<?php echo $type;?></div>
        <div class="fulprice gwd_p_big"><?php echo $min_price;?>/斤起</div>
        <div class="need">
          <div class="indetail gwd_p">商品介绍</div>
        </div><!-- need -->
        <div class="related">
          <div class="relateddetail">
            <a href="javascript:void(0);"><div class="gwd_p_big rfdiv">在售船只</div></a>
            <div>
              <?php foreach ($news_item as $item):?>
              <a href="javascript:void(0);">
                <div class="row">
                  <div class="col-gwd-2-39">
                    <span></span>
                    <img src="<?php echo STATIC_URL."/"?>fishshop/image/loading.jpg" alt="促销活动" class="gwd-img-block-center">
                  </div><!-- col-gwd-2-39 -->
                  <div class="col-gwd-2-61">
                    <div class="smalltitle gwd_p_big"><?php echo $item['b_shipid']?><br> 库存：<?php echo $item['stock']?></div>
                    <div class="smallprice gwd_p_big red"><?php echo $item['price']?>斤/元</div>
                    <div class="smallmallname gwd_p_big">预计靠岸：<?php echo $item['land_date']?></div>
                  </div><!-- col-gwd-2-61 -->
                </div><!-- row -->
              </a>
            <?php endforeach ;?>
            </div><!-- div -->
          </div>
        </div><!-- related -->
      </div><!-- container -->
    </div><!-- gwd_content -->
    <!-- === End Gwd_content === -->

    <script type="text/javascript" src="<?php echo STATIC_URL."/"?>fishshop/js/jquery.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.1.6/ZeroClipboard.min.js" ></script>
    <script type="text/javascript" src="<?php echo STATIC_URL."/"?>fishshop/js/detail.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo STATIC_URL."/"?>fishshop/js/goTop.js" charset="utf-8"></script>
  </body>
</html>