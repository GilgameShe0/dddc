<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <title>鱼多多</title>
    <link rel="stylesheet" href="<?php echo STATIC_URL."/";?>css/base.css"/>
    <link rel="stylesheet" href="<?php echo STATIC_URL."/";?>css/index.css"/>
</head>
<body>
<!--头部-搜索栏-->
<header>
    <span>鱼多多</span>
    <a href="#">
        <span>我 的</span>
    </a>
</header>
<!--头部-搜索栏-结束-->
<div class="banner">
    <div id="banner_autoShow" class="swipe">
        <div class='swipe-wrap'>
            <div><img src="<?php echo STATIC_URL."/";?>image/banner1.jpg" /></div>
            <div><img src="<?php echo STATIC_URL."/";?>image/banner2.jpg" /></div>
            <div><img src="<?php echo STATIC_URL."/";?>image/banner3.jpg" /></div>
            <div><img src="<?php echo STATIC_URL."/";?>image/banner4.jpg" /></div>
        </div>
        <div class="circlt">
            <ul>
                <li class="cur"></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
</div>
<nav>
    <div class="row">
        <div class="col">
            <a href="<?php echo HOST_NAME."/menu/dcby";?>">租船捕鱼</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="<?php echo HOST_NAME."/menu/xxhd";?>">休闲海钓</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="<?php echo HOST_NAME."/menu/yjl";?>">民 宿</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="<?php echo HOST_NAME."/shops/shop/index";?>">鱼多多商城</a>
        </div>
    </div>
</nav>
<section class="bottom_tab">
    <div><a href="#">关于我们</a></div>
    <div><a href="#">加入我们</a></div>
</section>
</body>
</html>
<script src="<?php echo STATIC_URL."/";?>js/jquery-1.11.2.min.js"></script>
<script src="<?php echo STATIC_URL."/";?>js/swipe2.js"></script>
<script src="<?php echo STATIC_URL."/";?>js/index.js"></script>
