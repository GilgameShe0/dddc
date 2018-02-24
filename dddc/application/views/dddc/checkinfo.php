<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单填写</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/shiplist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_URL."/yjl/";?>css/common.css" >
    <link rel="stylesheet" href="<?php echo STATIC_URL."/"?>css/bootstrap.min.css">
</head>
<body>
<div class="hotel_info">
        <div class="hotel_name"><?php echo $shipid?></div>
        <div class="order_date">
            <span class="live_date"><?php echo $matou?>->东海</span>
        </div>
        <div class="room_info">
            <span class="room_name"><?php echo $start_date?></span>
        </div>
</div>
<div  class="customer_info">
        <form>
          <fieldset>
            <div class="customer_info_form">
                <span>联系人：</span>
                <input type="text" placeholder="登记姓名" name="user_name">
            </div>
            <div class="customer_info_form">
                <span>手机号：</span>
                <input type="text" placeholder="有效的手机号" name="user_mobile">
            </div>
          </fieldset>
        </form> 
    </div>
    <div class="space_bar"></div>
    <div class="hotel_agreement">
        <label class="checkbox">
            <input type="checkbox" id="checkbox-id">我已仔细阅读保险、注意事项等模块
        </label>
    </div>
    <div class="order-submit">
        <div class="order-submit-fixed">
            <p class="order-submit-c1">实际应付款: <span class="text-important">¥<span class="text-important"><?php echo $price?></span></p>
            <button class="btn btn-danger">提交订单</button>
        </div>
    </div>
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top:30%;">
            <div class="modal-content" style="font-size: 2.5rem;text-align: center;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
                        鱼多多科技有限公司
                    </h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-primary" id="isPay">
                        确认支付
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    <script src="<?php echo STATIC_URL."/"?>js/jquery.min.js"></script>
    <script src="<?php echo STATIC_URL."/"?>js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.btn-danger').click(function(){
            
            var name = $(" input[ name='user_name' ] ").val();
            var mobile =  $(" input[ name='user_mobile' ] ").val();
            var total_price = $('.text-important').text();
            var isMobile = /^(?:13\d|15\d|17\d|18\d)\d{5}(\d{3}|\*{3})$/;   
            if(!name){
                alert('请填写登记姓名');
            }else if(!mobile||!isMobile.test(mobile)){
                alert('请填写有效的手机号');
            }else if($('#checkbox-id').is(':checked')){
                $.ajax({
                        url:'<?php echo HOST_NAME."/menu/order_submit";?>',
                        type:'POST',
                        dataType:'json',  
                        data:{name:name,mobile:mobile,total_price:total_price},
                        success:function(data){ 
                            if(data.state==1){
                                $('#myModal').modal('show');
                                $(".modal-body").text(data.msg);
                                $('#myModal').attr( "data-orderid" ,data.orderid );
                            }       
                        }
                    });
            }else{
                alert('请同意酒店信用入住相关协议！');
            };
        })
    })
    $('#isPay').click(function(){
        var orderid = $('#myModal').data('orderid');
        var mark = 1;
        $.ajax({
            url:'<?php echo HOST_NAME."/menu/pay_order";?>',
            type:'POST',
            dataType:'json',  
            data:{mark:mark,orderid:orderid},
            success:function(data){ 
                $('#myModal').modal('hide');
                location.href="<?php echo HOST_NAME."/menu/orderlist";?>";      
            }
        });
    })  
    </script>
</body>
</html>