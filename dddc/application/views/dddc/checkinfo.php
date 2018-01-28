<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单填写</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/shiplist.css">
    <script src="<?php echo STATIC_URL."/"?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL."/"?>js/bootstrap.min.js"></script>
</head>
<body>
<section class="list_header">
    <a class="back_icon"><</a>
    <h1 class="nav_title">订单填写</h1>
</section>

<div class="alert alert-info" role="alert">
    <div class="shipid">K0001</div>
    <div class="route">码头1->东海</div>
    <div class=""></div></div>
<div class="jumbotron">
    <div class="container">
        <section class="users_tab">
            出行人信息<br>
            姓名：<input type="text"/>
            身份证号：<input type="number"/>
        </section>
    </div>
</div>

<section class="tips_tab">
    保险、注意事项等模块
</section>
<div class="order-submit">
    <div class="order-submit-fixed">
        <p class="order-submit-c1">实际应付款: <span class="text-important">¥1730.00</span></p>
        <a class="btn btn-danger" href="#">提交订单</a>
    </div>
</div>
</body>
</html>