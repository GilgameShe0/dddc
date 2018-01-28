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
    <title>滴滴打船demo</title>
    <link rel="stylesheet" href="<?php echo STATIC_URL."/";?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/";?>css/style.css">
    <script src="<?php echo STATIC_URL."/";?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL."/";?>js/bootstrap.min.js"></script>
    <script src="<?php echo STATIC_URL."/";?>js/laydate/laydate.js"></script> <!--时间选择器-->

</head>
<body>
<div class="title">滴滴打船demo</div>
    <div class="menu">
    <ul id="myTab" class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">打船捕鱼</a></li>
<li><a href="#xxhd" data-toggle="tab">休闲海钓</a></li>
<li><a href="#yjl" data-toggle="tab">渔家乐</a></li>
<li><a href="#xc" data-toggle="tab">鲜船</a></li>
</ul>
</div>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="home">
    <div>
    登船码头:
        <select class="matou">
        <option>码头1</option>
        <option>码头2</option>
        <option>码头3</option>
        <option>码头4</option>
        </select>
    </div><br>
    <div>
    出行人数:
        <select class="renshu">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        </select>
    <label><input class="pinchuan" type="radio" value="" />拼船 </label>
    </div><br>
    <div>
    出发日期:<input class="date">
    <br><br>
    </div>
<a class="sub-btn">搜索</a>
    </div>
    <div class="tab-pane fade" id="xxhd">
    <p>休闲海钓</p>
    </div>
    <div class="tab-pane fade" id="yjl">
    <p>渔家乐</p>
    </div>
    <div class="tab-pane fade" id="xc">
    <p>鲜船</p>
    </div>
    </div>
    </body>
<script>
    laydate.render({
        elem: '.date' //指定元素
    });

    $(".sub-btn").click(function(){
        var matou = $(".matou option:selected").val() ;
        var renshu = $(".renshu option:selected").val() ;
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
                data:{matou:matou,renshu:renshu,date:date},
                type:"POST",
                dataType:"json",
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',//防止乱码
                success:function(back){
                    if(back.state == 1){
                        window.location.href = '<?php echo HOST_NAME."/menu/search_list";?>';
                    }               
                }
            });           
         }
    })

</script>

</html>
