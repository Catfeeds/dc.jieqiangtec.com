<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('user/user-header', TEMPLATE_INCLUDEPATH)) : (include template('user/user-header', TEMPLATE_INCLUDEPATH));?>
<form action="" method="post" class="we7-form" id="js-registerset" ng-controller="RegistersetCtrl" ng-cloak>
	<div class="form-group">
		<label for="" class="control-label col-sm-2" style="width: 150px;">是否开启用户注册</label>
		<div class="form-controls col-sm-8">
			<input id='open-radio-1' type="radio" name='open' value="1" ng-checked="settings.open == 1" >
			<label for="open-radio-1">是 </label>
			<input id='open-radio-2' type="radio" name='open' value="0" ng-checked="settings.open == 0">
			<label for="open-radio-2">否</label>
			<span class="help-block"></span>
		</div>
	</div>

	<div class="form-group">
		<label for="" class="control-label col-sm-2"  style="width: 150px;">是否审核新用户</label>
		<div class="form-controls col-sm-8">
			<input id='verify-radio-1' type="radio" name='verify' value="1" ng-checked='settings.verify == 1'>
			<label for="verify-radio-1">是 </label>
			<input id='verify-radio-2' type="radio" name='verify' value="0" ng-checked="settings.verify == 0">
			<label for="verify-radio-2">否</label>
			<span class="help-block"></span>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-sm-2"  style="width: 150px;">启用注册验证码</label>
		<div class="form-controls col-sm-8">
			<input id='code-radio-1' type="radio" name='code' value="1" ng-checked="settings.code == 1">
			<label for="code-radio-1">是 </label>
			<input id='code-radio-2' type="radio" name='code' value="0" ng-checked="settings.code == 0">
			<label for="code-radio-2">否</label>
			<span class="help-block"></span>
		</div>
	</div>

	<div class="form-group">
		<label for="" class="control-label col-sm-2"  style="width: 150px;">默认所属用户组</label>
		<div class="form-controls col-sm-8">
			<select name="groupid" class="we7-select">
				<option value="0">请选择所属用户组</option>
				<option ng-repeat="row in groups" value="{{row.id}}" ng-bind="row.name" ng-selected="settings.groupid == row.id"></option>
			</select>
			<span class="help-block"> 当开启用户注册后，新注册用户将会分配到该用户组里，并直接拥有该组的模块操作权限。</span>
		</div>
	</div>
	<input type="submit" name="submit" value="提交" class="btn btn-primary" ng-style="{'padding': '6px 50px'}">
	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
</form>
<script>
	angular.module('userManageApp').value('config', {
		settings: <?php echo !empty($settings) ? json_encode($settings) : 'null'?>,
		groups: <?php echo !empty($groups) ? json_encode($groups) : 'null'?>,
	});
	angular.bootstrap($('#js-registerset'), ['userManageApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>