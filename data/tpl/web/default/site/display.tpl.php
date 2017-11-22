<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="we7-page-title">微官网</div>
<ul class="we7-page-tab">
	<li class="active"><a href="<?php  echo url('site/multi')?>" >微官网列表</a></li>
	<li><a href="<?php  echo url('site/style')?>">微官网模板</a></li>
	<li><a href="<?php  echo url('site/article')?>">文章管理</a></li>
	<li><a href="<?php  echo url('site/category')?>">文章分类管理</a></li>
	<li><a href="index.php?c=site&a=entry&do=post&m=we7_diyspecial">专题页面管理</a></li>
</ul>
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-bullhorn alert-link"></i> 【温馨提示】:导航菜单是区别于文章分类菜单的（如果预览首页发现图片不显示，说明导航菜单的图标没有设置自定义图片！）
</div>
<div id="js-wesite-display" ng-controller="WesiteDisplay" ng-cloak>
	<div class="we7-page-search we7-padding-bottom clearfix">
		<form action="./index.php" method="get" class="form-horizontal ng-pristine ng-valid" role="form">
			<input type="hidden" name="c" value="site">
			<input type="hidden" name="a" value="multi">
			<div class="input-group col-sm-4 pull-left">
				<input name="keyword" id="" value="<?php  echo $_GPC['keyword'];?>" class="form-control" placeholder="搜索关键字" type="text">
				<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
			</div>
		</form>
		<div class="pull-right">
			<a href="<?php  echo url('site/multi/post')?>" class="btn btn-primary we7-padding-horizontal">+新建微官网</a>
		</div>
	</div>
	<div class="alert alert-info">
		<p><i class="fa fa-exclamation-circle"></i> 默认微站默认开启，不可关闭</p>
	</div>
	<table class="table we7-table table-hover site-list">
		<col width="140px"/>
		<col width=""/>
		<col width="160px"/>
		<col width="140px"/>
		<col width="285px"/>
		<tr>
			<th colspan="2" class="text-left">名称/模板</th>
			<th class="text-left">入口</th>
			<th>是否启用</th>
			<th class="text-left">操作</th>
		</tr>
		<tr ng-repeat="multi in multis">
			<td class="text-left vertical-middle">
				<div class="site-item-img">
					<img ng-src="{{multi.preview_thumb}}">
					<div class="cover-dark">
						<a href="javascript:void(0);" ng-click="preview(multi.id)"></a>
					</div>
				</div>
			</td>
			<td class="text-left"> 
				<div class="we7-margin-vertical">
					<p class="color-gray">名称</p> 
					<span class="color-dark" ng-bind="multi.title"></span>
				</div>
				<div class="we7-margin-bottom">
					<p class="color-gray">模板风格</p>
					<a href="javascript:;" class="color-dark" ng-bind="multi.style.name"></a>
				</div>
			</td>
			<td class="text-left">
				<div class="we7-margin-vertical">
					<p class="color-gray">触发关键字</p> 
					<span class="color-dark" ng-bind="multi.site_info.keyword"></span>
				</div>
				<div class="we7-margin-bottom">
					<p class="color-gray">链接地址</p>
					<div class="link-group text-left" style="min-width: 100px;">
						<a href="javascript:;" id="copy-{{multi.id}}" class="color-default" clipboard supported="supported" text="multi.copyLink" on-copied="success(multi.id)">点击复制</a>
					</div>
				</div>
			</td>
			<td class="vertical-middle">
				<div ng-if="default_site == multi.id">默认开启</div>
				<label>
					<input name="" id="" class="form-control" type="checkbox"  style="display: none;">
					<div class="switch" ng-class="{'switchOn' : multi.status == 1}" ng-click="switchOn(multi, multi.id)" ng-if="default_site != multi.id"></div>
				</label>
			</td>
			<td class="text-left">
				<div class="we7-margin-vertical">
					<p class="color-gray">基础操作</p>
					<span class="link-group text-left">
						<a ng-href="{{links.post}}multiid={{multi.id}}" class="we7-margin-right">编辑</a>
						<a ng-href="{{links.copy}}multiid={{multi.id}}" class="we7-margin-right">复制站点</a>
						<a ng-href="{{links.del}}id={{multi.id}}" class="del" ng-if="default_site != multi.id" onclick="if(!confirm('删除后将不可恢复,确定删除吗?')) return false;">删除</a>
					</span>
					<a href="javascript:;" class="label label-success" ng-if="default_site == multi.id">默认微站</a>
				</div>
				<div class="we7-margin-bottom">
					<p class="color-gray">内容设置</p>
					<div class="link-group text-left">
						<a href="{{links.post}}multiid={{multi.id}}&clicktype=slide" class="we7-margin-right">幻灯片</a>
						<a href="{{links.post}}multiid={{multi.id}}&clicktype=homemenu" class="we7-margin-right">导航菜单</a>
						<a href="{{links.post}}multiid={{multi.id}}&clicktype=quickmenu">快捷菜单</a>
					</div>
				</div>
			</td>
		</tr>
	</table>
	<div class="text-right we7-padding-top">
		<?php  echo $pager;?>
	</div>
</div>
<script>
require(['underscore'], function(){
	angular.module('wesiteApp').value('config', {
		default_site: <?php echo !empty($default_site) ? json_encode($default_site) : '0'?>,
		multis: <?php echo !empty($multis) ? json_encode($multis) : 'null'?>,
		links: {
			post: "<?php  echo url('site/multi/post')?>",
			del: "<?php  echo url('site/multi/del')?>",
			copy: "<?php  echo url('site/multi/copy')?>",
			switch: "<?php  echo url('site/multi/switch')?>",
			appHome: "<?php  echo murl('home', array(), true, true)?>",
		},
	});

	angular.bootstrap($('#js-wesite-display'), ['wesiteApp']);
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>