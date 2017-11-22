<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
	.np{padding: 0px;}
</style>
<div class="we7-page-title">用户权限组管理</div>
<ul class="we7-page-tab"></ul>
<div class="clearfix we7-margin-bottom">
    <form action="" method="get">
        <div class="input-group pull-left col-sm-4">
            <input type="hidden" name="c" value="user">
            <input type="hidden" name="a" value="group">
            <input type="text" name="name" id="" value="<?php  echo $_GPC['name'];?>" class="form-control" placeholder="搜索用户权限组" />
            <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
        </div>
    </form>
    <div class="pull-right">
        <a href="<?php  echo url('user/group/post')?>" class="btn btn-primary">+添加用户组</a>
    </div>
</div>
<table class="table we7-table table-hover" id="js-user-group-display" ng-controller="UserGroupDisplay" ng-cloak>
    <col width="120px" />
    <col width="100px" />
    <col width="120px" />
    <col width="120px" />
    <col width="100px" />
    <col/>
    <tr>
        <th class="text-left">用户组</th>
        <th>有限期</th>
        <th>可创建公众号</th>
        <th>可创建小程序</th>
        <th>应用权限套餐</th>
        <th>可用应用</th>
        <th>可用小程序应用</th>
        <th class="text-right">操作</th>
    </tr>
    <tr ng-repeat="list in lists">
        <td class="text-left" ng-bind="list.name"></td>
        <td><span ng-if="list.timelimit != 0" ng-bind="list.timelimit+'天'"></span><span ng-if="list.timelimit == 0">永久有效</span></td>
        <td><span ng-if="list.maxaccount == 0">无权限</span><span ng-if="list.maxaccount != 0" ng-bind="list.maxaccount"></span></td>
        <td><span ng-if="list.maxwxapp == 0">无权限</span><span ng-if="list.maxwxapp != 0" ng-bind="list.maxwxapp"></span></td>
        <td>
            <span ng-if="list.module_nums == -1">全部</span>
            <span ng-if="list.package != 'N;'" class="color-default" ng-bind="list.packages"></span>
            <span ng-if="list.package == 'N;'">无</span>
        </td>
        <td>
            <span ng-if="list.module_nums == -1">全部</span>
            <span ng-if="list.module_nums != -1" ng-bind="list.module_nums"></span>
        </td>
        <td>
            <span ng-if="list.wxapp_nums == -1">全部</span>
            <span ng-if="list.wxapp_nums != -1" ng-bind="list.wxapp_nums"></span>
        </td>
        <td>
            <div class="link-group">
                <a href="javascript:;" ng-click="editGroup(list.id)">编辑</a>
                <a href="javascript:;" ng-click="delGroup(list.id)" class="del">删除</a>
            </div>
        </td>
    </tr>
</table>

<style type="text/css">
	.pricetable>tbody>tr:nth-child(2n){
		/*background-color: #f3f3f3;*/
	}
</style>
<div class="page-header">
  <h1><small>用户组续费价格管理</small></h1>
  <table class="pricetable table we7-table table-hover">
	<thead>
		<tr>
			<th width="30%">标题</th>
			<th width="40%">描述</th>
			<th width="20%"></th>
			<th width="10%">开启</th>
			<th width="10%">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php  if(is_array($pricelist)) { foreach($pricelist as $item) { ?>
		<form action="" method="post" enctype="multipart/form-data">
			<tr>
				<td>
					<input type="hidden" name="vipprice" id="" class="form-control" value="update" pattern="" title="">
					<input type="hidden" name="gpid" id="inputGpid" class="form-control" value="<?php  echo $item['gpid'];?>" pattern="" title="">
					
					
					<div class="row">
						<div class="col-xs-3 np">
							<label for="orderby">用户组</label>
						</div>
						<div class="col-xs-9 np">
							<select name="ugid" class="" style="width: 100%;">
								<?php  if(is_array($usergrouplist)) { foreach($usergrouplist as $item1) { ?>
									<option <?php  if($item['ugid'] == $item1['id']) { ?>selected="selected"<?php  } ?> value="<?php  echo $item1['id'];?>"><?php  echo $item1['name'];?></option>
								<?php  } } ?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-top: 5px;">
						<div class="col-xs-3 np">
							<label for="orderby">标&nbsp;&nbsp;&nbsp;题</label>
						</div>
						<div class="col-xs-9 np">
							<input type="text" name="title" id="input" class="form-control" value="<?php  echo $item['title'];?>" required="required" title="">
						</div>
					</div>
				</td>
				<td>
					<div class="row">
						<div class="col-xs-3">
							<label for="orderby">排序：</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="orderby" id="orderby" class="form-control" value="<?php  echo $item['orderby'];?>" required="required" title="">
						</div>
					</div>
					<textarea name="desc" id="input" style="margin-top: 5px;" class="form-control" rows="3" required="required"><?php  echo $item['desc'];?></textarea> </td>
				<td>
					时间（天）：
					<input type="text" name="day" id="input" class="form-control" value="<?php  echo $item['day'];?>" required="required" title="">
					价格：
					<input type="text" name="price" id="input" class="form-control" value="<?php  echo $item['price'];?>" required="required" title="">
				</td>
				<td><select name="status" class="">
					<option value="1" <?php  if($item['status'] == '1') { ?>selected="selected"<?php  } ?>>是</option>
					<option value="0" <?php  if($item['status'] == '0') { ?>selected="selected"<?php  } ?>>否</option>
				</select></td>
				<td>
					<button type="submit" class="btn btn-info">保存</button>
					<br><br>
					<button onclick="javascript:if(confirm('删除当前价格?')){window.location.href='/web/index.php?c=user&a=group&do=display&vipprice=delete&gpid=<?php  echo $item['gpid'];?>';return false;}else{return false;}" type="button" class="btn btn-danger">删除</button>
				</td>
			</tr>
		</form>
		<?php  } } ?>
		<form action="" method="post" enctype="multipart/form-data">
			<tr>
				<td>
					<input type="hidden" name="vipprice" id="" class="form-control" value="save" pattern="" title="">
					<div class="row" style="">
						<div class="col-xs-3 np">
							<label for="orderby">用户组</label>
						</div>
						<div class="col-xs-9 np">
							<select name="ugid" class="" style="width: 100%;">
								<?php  if(is_array($usergrouplist)) { foreach($usergrouplist as $item1) { ?>
									<option value="<?php  echo $item1['id'];?>"><?php  echo $item1['name'];?></option>
								<?php  } } ?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-top: 5px;">
						<div class="col-xs-3 np">
							<label for="orderby">标&nbsp;&nbsp;&nbsp;题</label>
						</div>
						<div class="col-xs-9 np">
							<input type="text" name="title" id="input" class="form-control" value="" required="required" title="">
						</div>
					</div>
				</td>
				<td>
					<div class="row">
						<div class="col-xs-3">
							<label for="orderby">排序：</label>
						</div>
						<div class="col-xs-9">
							<input type="text" name="orderby" id="orderby" class="form-control" value="" required="required" title="" placeholder="越小越靠前">
						</div>
					</div>
					<textarea name="desc" id="input" style="margin-top: 5px;" class="form-control" rows="3" required="required" placeholder="描述"></textarea> </td>
				<td>
					时间（天）：
					<input type="text" name="day" id="input" class="form-control" value="" required="required" title="" placeholder="天数">
					价格：
					<input type="text" name="price" id="input" class="form-control" value="" required="required" title="" placeholder="价格">
				</td>
				<td><select name="status" class="">
					<option value="1">是</option>
					<option value="0">否</option>
				</select></td>
				<td><button type="submit" class="btn btn-info">新增</button></td>
			</tr>
		</form>
	</tbody>
  </table>
</div>



<script>
	angular.module('userGroup').value('config', {
		lists: <?php echo !empty($lists) ? json_encode($lists) : 'null'?>,
		links: {
			groupPost: "<?php  echo url('user/group/post')?>",
			groupDel: "<?php  echo url('user/group/del')?>",
		}
	});
	angular.bootstrap($('#js-user-group-display'), ['userGroup']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>