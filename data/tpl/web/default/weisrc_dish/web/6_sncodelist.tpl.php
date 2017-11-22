<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <div class="panel panel-default">
        <div class="panel-body">
            <a class="btn btn-warning" href="<?php  echo $this->createWebUrl('coupon', array('op' => 'display', 'storeid' => $storeid))?>">返回优惠管理
            </a>
        </div>
    </div>
    <form action="" method="post" class="form-horizontal form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php  echo $coupon['title'];?> (满<?php  echo $coupon['gmoney'];?>可用)
            </div>
            <div class="table-responsive panel-body">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:25%;">SN码</th>
                        <th style="width:25%;">用户</th>
                        <th style="width:25%;">派发时间</th>
                        <th style="width:25%;">状态</th>
                    </tr>
                    </thead>
                    <tbody id="level-list">
                    <?php  if(is_array($list)) { foreach($list as $item) { ?>
                    <tr>
                        <td><?php  echo $item['sncode'];?></td>
                        <td>
                            <img src="<?php  echo tomedia($item['headimgurl']);?>" width="50" style="border-radius: 3px;"/>
                            <br/>
                            <span class="label label-warning"><?php  echo $item['nickname'];?></span>
                        </td>
                        <td style="white-space:normal;"><?php  echo date('Y-m-d H:i:s', $item['dateline'])?></td>
                        <td><?php  if($item['status'] == 0) { ?><span class="label label-danger">未使用</span><?php  } else { ?><span
                                class="label label-success">已使用</span><?php  } ?></td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <?php  echo $pager;?>
    <div id="modal-module-menus-recharge"  class="modal fade" tabindex="-1">
        <div class="modal-dialog" style='width: 520px;'>
            <div class="modal-content">
                <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>SN码操作</h3></div>
                <div class="modal-body">
                    <form id="frmPrice" action="<?php  echo $this->createWebUrl('UseSncodeAdmin')?>" method="post" class="form-horizontal">
                        <input type="hidden" name="pid" value="<?php  echo $pid;?>">
                        <input type="hidden" name="type" value="<?php  echo $type;?>">
                        <input type="hidden" id="snid" name="snid" value="0">
                        <?php  if($type != 3) { ?>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">消费金额</label>
                            <div class="col-sm-9">
                                <div class="input-append">
                                    <input type="text" placeholder="金额" name="money" id="money" class="form-control" data-rule-required="true" data-rule-number="true">
                                    <span class="add-on"><i class="icon-cny"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">消费类型</label>
                            <div class="col-sm-9">
                                <select name="paytype" id="paytype" class="form-control" >
                                    <option value="0">请选择消费类型</option>
                                    <option value="1">现金消费</option>
                                    <option value="2">余额消费</option>
                                </select>
                            </div>
                        </div>
                        <?php  } ?>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(function () {
        $("tr").delegate(".use", "click", function () {
            $("#price").val("");
            $("#snid").val($(this).attr("data-codeid"));
            $("#modal-module-menus-recharge").modal();
        });
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>