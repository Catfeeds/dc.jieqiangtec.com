<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
    <div class="panel panel-default">
        <div class="panel-body">
            <a class="btn btn-warning" href="<?php  echo $this->createWebUrl('goods', array('op' => 'display', 'storeid' => $storeid))?>">返回商品管理
            </a>
        </div>
    </div>

    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <input type="hidden" name="storeid" value="<?php  echo $storeid;?>" />
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="#tab_basic" aria-controls="tab_basic" role="tab" data-toggle="pill">基本设置</a></li>
                    <li role="presentation" class=""><a href="#tab_content" aria-controls="tab_content" role="tab"
                                                        data-toggle="pill">商品详情</a></li>
                    <li role="presentation" class=""><a href="#tab_commission" aria-controls="tab_commission" role="tab" data-toggle="pill">佣金设置</a></li>
                    <!--<li role="presentation" class=""><a href="#tab_options" aria-controls="tab_options" role="tab" data-toggle="pill">规格设置</a></li>-->
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/goods_tab_basic', TEMPLATE_INCLUDEPATH)) : (include template('web/goods_tab_basic', TEMPLATE_INCLUDEPATH));?>
            <div class="tab-pane" id="tab_content">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        商品详情
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品介绍</label>
                            <div class="col-sm-9">
                                <textarea style="height:200px;" class="form-control richtext" name="content" cols="70" id="reply-add-text"><?php  echo $item['content'];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/goods_tab_commission', TEMPLATE_INCLUDEPATH)) : (include template('web/goods_tab_commission', TEMPLATE_INCLUDEPATH));?>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-3" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>
<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
    require(['util', 'clockpicker'], function(u, $){
        u.editor($('.richtext')[1]);
    });
</script>
<script type="text/javascript">
    <!--
    var category = <?php  echo json_encode($children)?>;
    //-->
</script>