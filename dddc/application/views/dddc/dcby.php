<!--
Created by IntelliJ IDEA.
User: mumuoo
Date: 2018/1/12
Time: 11:21
To change this template use File | Settings | File Templates.
-->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>租船捕鱼</title>
    <link rel="stylesheet" href="<?php echo STATIC_URL."/";?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/";?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/common.css" >
</head>
<body style="background-color:#E8E8E8;">
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="home">
        <div class="selected-matou">
            登船码头:<span class="selected-matou-text">码头1</span><span class="right-icon">></span>
        </div>
        <ul class="matou">
            <li>码头1</li>
            <li>码头2</li>
            <li>码头3</li>
            <li>码头4</li>
        </ul>
        <div class="start_date">
            出发日期:<input class="date"> 
        </div>
        <div class="search_btn">
            <a class="btn btn-info sub-btn">搜索</a>
        </div>
    </div>
    <script src="<?php echo STATIC_URL."/";?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL."/";?>js/bootstrap.min.js"></script>
    <script src="<?php echo STATIC_URL."/";?>js/laydate/laydate.js"></script> <!--时间选择器-->
    <script>
        laydate.render({
            elem: '.date' //指定元素
        });
        $(".js-gohome").on("click",function(e){
            location.href="<?php echo HOST_NAME."/menu/index";?>";
        });
        $('.selected-matou').click(function(){
            $(".matou").slideToggle("slow");
        });
        $('.matou>li').on("click",function(){
            var matou = $(this).text();
            $(".selected-matou-text").text(matou);
            $(".matou").slideUp("slow");
        })

        $(".sub-btn").click(function(){
            var matou = $(".selected-matou-text").text() ;
            var date = $(".date").val();
            if(!matou){
                alert('请选择出发码头！');
                return;
            }else if(!date){
                alert('请选择出发日期！');
                return;
            }else {
                 $.ajax({
                    url:"<?php echo HOST_NAME."/menu/search_ajax";?>",
                    data:{matou:matou,date:date},
                    type:"POST",
                    dataType:"json",
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',//防止乱码
                    success:function(back){
                        if(back.state == 1){
                            window.location.href = '<?php echo HOST_NAME."/menu/search_list";?>'+"?matou="+matou+"&date="+date;
                        }               
                    }
                });           
             }
        })
    </script>
    </body>
</html>
