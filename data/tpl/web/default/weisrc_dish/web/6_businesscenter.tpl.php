<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<style>
     .item_box img{
         width: 100%;
         height: 100%;
     }
</style>
<script type="text/javascript">
    $(function(){
        $(':radio[name="print_status"]').click(function(){
            if(this.checked) {
                if($(this).val() == '1') {
                    $('.sms').show();
                } else {
                    $('.sms').hide();
                }
            }
        });
    });
</script>
<?php  if($operation == 'display') { ?>
<style>
    /*统计样式*/
    .account-stat {
        overflow: hidden;
        color: #666;
    }

    .account-stat .account-stat-btn {
        width: 100%;
        overflow: hidden;
    }

    .account-stat .account-stat-btn > div {
        text-align: center;
        margin-bottom: 5px;
        /*margin-right: 2%;*/
        float: left;
        width: 25%;
        height: 80px;
        padding-top: 10px;
        font-size: 16px;
        border-left: 1px #DDD solid;
    }

    .account-stat .account-stat-btn > div.col-3 {
        width: 31%
    }

    .account-stat .account-stat-btn > div:first-child {
        border-left: 0;
    }

    .account-stat .account-stat-btn > div span {
        display: block;
        font-size: 30px;
        font-weight: bold
    }

    .account-stat .account-stat-btn > div.col-12 {
        width: 12.2%;
    }
    /*提现*/
    .get-cash-form .money {
        font-size: 28px;
        margin-top: -20px;
        display: inline-block;
        color: #FF6600
    }
</style>
<div class="main">
    <ul class="nav nav-tabs" role="tablist">
        <li class="active">
            <a href="<?php  echo $this->createWebUrl('businesscenter', array('op' => 'display', 'storeid' => $storeid))?>">提现管理</a>
        </li>
        <li>
            <a href="<?php  echo $this->createWebUrl('businesssetting', array('op' => 'display', 'storeid' => $storeid))?>">账号设置</a>
        </li>
        <li>
            <a href="<?php  echo $this->createWebUrl('businesscenter', array('op' => 'post', 'storeid' => $storeid))?>">申请提现</a>
        </li>
    </ul>
    <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
    <div class="clearfix">
        <div class="panel panel-default" id="scroll">
            <div class="panel-heading">
                <h4>数据统计<small class="text-danger">提示:数据只统计在线支付并已完成的订单</small></h4>
            </div>
            <div class="account-stat">
                <div class="account-stat-btn">
                    <div>可申请金额<span><?php  echo $totalprice;?></span></div>
                    <div>待审核金额<span><?php  echo $totalprice2;?></span></div>
                    <div>已提现金额<span><?php  echo $totalprice1;?></span></div>
                    <div>总消费金额<span><?php  echo $order_totalprice;?></span></div>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" class="form-horizontal form">
        <div class="panel panel-default">
            <div class="table-responsive panel-body">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:10%;">编号</th>
                        <th style="width:15%;">申请提现金额</th>
                        <th style="width:15%;">手续费</th>
                        <th style="width:15%;">到帐金额</th>
                        <th style="width:15%;">处理时间</th>
                        <th style="width:15%;">申请时间</th>
                        <th style="width:15%;">状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($list)) { foreach($list as $item) { ?>
                    <tr>
                        <td><?php  echo $item['id'];?></td>
                        <td><?php  echo $item['price'];?></td>
                        <td><?php  echo $item['charges'];?></td>
                        <td><?php  echo $item['successprice'];?></td>
                        <td>
                            <?php  if(empty($item['handletime'])) { ?>
                            ------
                            <?php  } else { ?>
                            <?php  echo date("Y-m-d H:i:s", $item['handletime'])?>
                            <?php  } ?>
                        </td>
                        <td>
                            <?php  echo date("Y-m-d H:i:s", $item['dateline'])?>
                        </td>
                        <td>
                            <?php  if($item['status'] == 1) { ?>
                            <span class="label label-success">已提现</span>
                            <?php  } else { ?>
                            <span class="label label-danger">待审核</span>
                            <?php  } ?>
                            <!--0为打印成功, 1为过热,3为缺纸卡纸等-->
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                </table>
                <?php  echo $pager;?>
            </div>
        </div>
    </form>
</div>
<?php  } else if($operation == 'post') { ?>
<style>
    .get-cash-form .money {
        font-size: 28px;
        margin-top: -20px;
        display: inline-block;
        color: #FF6600
    }
</style>
<div class="main">
    <ul class="nav nav-tabs" role="tablist">
        <li>
            <a href="<?php  echo $this->createWebUrl('businesscenter', array('op' => 'display', 'storeid' => $storeid))?>">提现管理</a>
        </li>
        <li>
            <a href="<?php  echo $this->createWebUrl('businesssetting', array('op' => 'display', 'storeid' => $storeid))?>">账号设置</a>
        </li>
        <li class="active">
            <a href="<?php  echo $this->createWebUrl('businesscenter', array('op' => 'post', 'storeid' => $storeid))?>">申请提现</a>
        </li>
    </ul>
    <form action="" method="post" class="form-horizontal get-cash-form" role="form">
        <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                商家提现
            </div>
            <div class="panel-body">
                <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require"></span>可提现金额</label>
                    <div class="col-sm-9 col-xs-12">
                        <p class="form-control-static"><span class="money"><?php  echo sprintf('%.2f', $totalprice);?> </span> 元</p>
                        <div class="help-block">
                            <?php  if($totalprice<$getcash_price || $totalprice<1) { ?>
                            <strong class="text-danger">当前账户余额小于最低提现金额(<?php  echo $getcash_price;?>元)限制,不能提现</strong>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">*</span>提现账户</label>
                    <div class="col-sm-12 col-lg-6">
                        <p class="form-control-static account" style="font-size: 20px" id="wechat-account">
                            <?php  if($store['business_type']==0) { ?>
                            <a href="<?php  echo $this->createWebUrl('businesssetting', array('op' => 'display', 'storeid' => $storeid))?>">选择提现账户</a>
                            <?php  } else { ?>
                            <?php  if($store['business_type']==1) { ?>
                            微信账号: <?php  echo $store['business_wechat'];?> 姓名: <strong><?php  echo $store['business_username'];?></strong> | 昵称:
                            <strong><?php  echo $fans['nickname'];?></strong>
                            <?php  } else { ?>
                            支付宝:<?php  echo $store['business_alipay'];?> 姓名: <strong><?php  echo $store['business_username'];?></strong>
                            <?php  } ?>
                            <br>
                            <a href="<?php  echo $this->createWebUrl('businesssetting', array('op' => 'display', 'storeid' => $storeid))?>">更改提现账户</a>
                            <?php  } ?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提现金额</label>
                    <div class="col-sm-9 col-lg-3">
                        <div class="input-group">
                            <input class="form-control" name="price" id="price" type="number" step="0.01" value=""
                                   placeholder="请输入提现金额"  data-limit="0" data-fee-rate="0" data-fee-min="0" data-fee-max="0">
                            <span class="input-group-addon">元</span>
                        </div>
                        <!--<span class="help-block"><code>最低提现金额为<?php  echo $getcash_price;?>元</code></span>-->
                    </div>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">手续费</label>
                    <div class="col-sm-9 form-control-static">
                        （每笔交易<?php  echo $fee_rate;?>%，最低<?php  echo $fee_min;?>元，最高<?php  echo $fee_max;?>元）
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
            <input type="submit" name="submit" value="提交申请" class="btn btn-success col-lg-3 <?php  if($totalprice<$getcash_price || $totalprice<1) { ?>disabled<?php  } ?>" onclick="return confirm('此操作不可恢复，确认提交吗？');return false;"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>


</div>
<?php  } else if($operation == 'detail') { ?>
<div class="main">
    <ul class="nav nav-tabs" role="tablist">
        <li>
            <a href="<?php  echo $this->createWebUrl('businesscenter', array('op' => 'display', 'storeid' => $storeid))?>">提现管理</a>
        </li>
        <li class="active">
            <a href="<?php  echo $this->createWebUrl('businesssetting', array('op' => 'display', 'storeid' => $storeid))?>">账号设置</a>
        </li>
        <li>
            <a href="<?php  echo $this->createWebUrl('businesscenter', array('op' => 'post', 'storeid' => $storeid))?>">申请提现</a>
        </li>
    </ul>
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
	<input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
        <div class="alert alert-info">
            <i class="fa fa-info-circle"></i>注意：
            1.提现账号信息只能设置一次，修改需要联系管理员处理。
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                 提现设置
            </div>
            <div class="panel-body">
                <?php  if($setting['is_verify_mobile']==1 && $_W['role'] == 'operator') { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机号码</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" name="mobile" id="mobile" value="<?php  echo $store['business_mobile'];?>" class="form-control">
                        <span class="input-group-btn">
				            <button class="btn btn-default" type="button" name="btnverify">获取验证码</button>
			            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">验证码</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="verify_code" id="verify_code" value="" class="form-control">
                    </div>
                </div>
                <?php  } else if($setting['is_verify_mobile']==1 && $_W['role'] != 'operator') { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机号码</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="mobile" id="mobile" value="<?php  echo $store['business_mobile'];?>" class="form-control">
                    </div>
                </div>
                <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提现账号</label>
                    <div class="col-sm-9">
                        <label for="business_type1" class="radio-inline"><input type="radio" name="business_type" value="1" id="business_type1" <?php  if($store['business_type']==1 || $store['business_type']==0) { ?>checked<?php  } ?> /> 微信</label>
                        &nbsp;&nbsp;&nbsp;
                        <label for="business_type2" class="radio-inline"><input type="radio" name="business_type" value="2" id="business_type2"  <?php  if($store['business_type']==2) { ?>checked<?php  } ?> /> 支付宝</label>
                    </div>
                </div>
                <div class="form-group wechat" <?php  if($store['business_type']==2) { ?>style="display:none;"<?php  } ?>>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="require">*</span>微信昵称</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="input-group">
                            <input type="text" name="nickname" value="<?php  echo $fans['nickname'];?>" class="form-control" readonly="">
                            <input type="hidden" name="from_user" value="<?php  echo $store['business_openid'];?>">
                        <span class="input-group-btn">
				            <button class="btn btn-default" type="button" onclick="$('#modal-module-menus').modal();" data-original-title="" title="">选择粉丝</button>
			            </span>
                        </div>
                        <div class="input-group cover" style="<?php  if(!empty($fans['headimgurl'])) { ?>margin-top:.5em;<?php  } ?>">
                            <img src="<?php  echo tomedia($fans['headimgurl']);?>" width="150" />
                        </div>
                    </div>
                </div>
                <div class="form-group wechat" <?php  if($store['business_type']==2) { ?>style="display:none;"<?php  } ?>>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微信账号</label>
                    <div class="col-sm-9">
                        <input type="text" name="business_wechat" class="form-control" value="<?php  echo $store['business_wechat'];?>" placeholder=""/>
                        <div class="help-block">
                        </div>
                    </div>
                </div>
                <div class="form-group alipay" <?php  if($store['business_type']==1||$store['business_type']==0) { ?>style="display:none;"<?php  } ?>>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">支付宝</label>
                    <div class="col-sm-9">
                        <input type="text" name="business_alipay" class="form-control" value="<?php  echo $store['business_alipay'];?>" placeholder=""/>
                        <div class="help-block">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">真实姓名</label>
                    <div class="col-sm-9">
                        <input type="text" name="business_username" class="form-control" value="<?php  echo $store['business_username'];?>" placeholder=""/>
                        <div class="help-block">
                            请仔细填写账户信息，如果由于您填写错误导致资金流失，平台概不负责
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-3" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>
<script>
    $(function(){
        $(':radio[name="business_type"]').click(function(){
            if(this.checked) {
                if($(this).val() == '1') {
                    $('.wechat').show();
                    $('.alipay').hide();
                } else {
                    $('.alipay').show();
                    $('.wechat').hide();
                }
            }
        });
    });

    $("button[name=btnverify]").click(function () {
        var mobile = $("#mobile").val();
//        alert('debug');
//        if (confirm("确定要取消选择的订单?")) {
//            var id = new Array();
//            check.each(function (i) {
//                id[i] = $(this).val();
//            });
            var url = "<?php  echo $this->createWebUrl('GetDyCheckCode', array())?>";
            $.post(
                    url,
                    {mobile: mobile},
                    function (data) {
                        alert(data.msg);
//                        alert(data.error);
//                        location.reload();
                    }, 'json'
            );
//        }
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_modal_fans', TEMPLATE_INCLUDEPATH)) : (include template('web/_modal_fans', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>