<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<style>
.btn-green {

    background: #21d376;

    color: #fff;

    border-color: #21d376;
}



.btn-green:hover {

    background: #0dbf62;

    color: #fff;

    border-color: #0dbf62
}

.account-box {

    width: 960px;

    border: 1px solid #e9eaed;

    border-radius: 3px;

    padding: 20px 0;

    margin-bottom: 30px background: #fff;
}



.account-box:after {

    content: ".";

    display: block;

    height: 0;

    clear: both;

    visibility: hidden
}



.account-box .item {
    float: left;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0 10px 0 30px
}
.account-box .item.list1 { width: 25%; }
.account-box .item.list2 {
    border: 1px solid #e9eaed; width: 37%;
    border-top: 0;
    border-bottom: 0
}

.account-box .item:last-child {
    border-right: 0;width: 38%;
}



.account-box h3 {

    font-size: 16px;

    margin-bottom: 20px
}



.account-box .number {

    font-size: 50px;

    font-weight: 300;

    color: #ff595f;

    text-align: center;

    margin-bottom: 50px
}



.account-box .btn-sm {

    margin-left: 15px
}



.account-box ul {

    margin-bottom: 2px
}



.account-box li {

    list-style: none;

    padding: 10px 0;

    border-bottom: 1px dotted #e9eaed
}



.account-box li span {

    color: #ff595f
}



.account-box li a {

    margin-left: 15px;

    color: #0096C4
}



.account-box li a:hover {

    color: #48b6d7
}

html,body{ width: 960px;    min-width: 960px; background-color:#fff; }
</style>
<div class="account-box">
    <div class="item list1">
        <h3>平台账户</h3>
        <div class="form-group">
            <li>账户：<a href="javascript:;"><?php  echo $username;?> / <?php  echo $user["level"];?></a></li>
            <li>账户余额：￥<span style="font-size:18px"><strong><?php  echo $user["credit2"];?></strong></span></li>
        </div>
    </div>
    <div class="item list2" style="display: none;" data-modify="Hjay aliplay">
        <h3>支付宝充值</h3>
        <form action="<?php  echo url('shop/recharge')?>" class="form-horizontal form" method="post" enctype="multipart/form-data" target="_blank">
            <div class="form-group">
                <div class="col-sm-2"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-addon">充值帐号</span>
                        <input class="form-control" type="text" placeholder="<?php  echo $username;?>" value="<?php  echo $username;?>" disabled="disabled" style="width: 199px;">
                        <input type="hidden" name="recharge_type" value="credit2">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-addon">充值金额</span>
                        <input class="form-control" name="recharge_number" type="text" placeholder="充值金额" value="10" style="width: 160px;">
                        <span class="input-group-addon">元</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="col-sm-8"><button type="submit" class="btn btn-success">在线充值</button></div>
                </div>
            </div>
        </form>
    </div>
    <div class="item list3">
        <h3 style="">微信支付</h3>
        <form action="<?php  echo url('shop/recharge')?>" class="form-horizontal form" method="post" enctype="multipart/form-data" target="_blank">
            <div class="form-group">
                <div class="col-sm-2"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-addon">充值帐号</span>
                        <input class="form-control" type="text" placeholder="<?php  echo $username;?>" value="<?php  echo $username;?>" disabled="disabled" style="width: 199px;">
                        <input type="hidden" name="recharge_type" value="weixinpay">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-addon">充值金额</span>
                        <input class="form-control" name="recharge_number" type="text" placeholder="充值金额" value="10" style="width: 160px;">
                        <span class="input-group-addon">元</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="col-sm-8"><button type="submit" class="btn btn-success">在线充值</button></div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="myModal" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">充值提醒</h4>
            </div>
            <div class="modal-body" style="line-height: 30px;text-indent: 2em;font-size: 16px;font-weight: bold">
                请在新弹出的第三方支付平台完成支付，即可自动充值到帐户，未完成支付前请不要关闭本窗口。
                <br/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning done">完成支付</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
require(['bootstrap'], function($) {

    $("button.ChangePackage").click(function() {

        var id = $(this).attr("id");

        if (parseInt(id) <= 0) return;

        $.post("<?php  echo url('shop/buypackage');?>", { 'groupid': parseInt(id) }, function(data) {

            if (data == 'illegal-uniacid') {

                u.message('您没有操作该公众号的权限');

            } else if (data == 'illegal-group') {

                u.message('您没有使用该服务套餐的权限');

            } else {

                location.reload();

            }

        });

    });

    $("#is_auto").on("click", function() {

        var is_auto = 0;

        if ($(this).is(':checked')) {

            console.log("c");

            is_auto = 1;

        }

        $.ajax({

            'url': "<?php  echo url('shop/site')?>",

            'data': { is_auto: is_auto },

            'type': 'POST',

            'async': 'true',

            'dataType': 'json',

            'success': function(data) {

                console.debug(data);

                alert(data.message);

            }

        });

    });

    $("a.buy").on("click", function() {

        $("a.buy").removeAttr("disabled");

        $('#myModal').modal('show');

        $("form.form").action = "<?php  echo url('shop/recharge')?>";

        $("form.form").submit();

    });

    $("button.done").on("click", function() {

        location.reload();

    });

});
</script>