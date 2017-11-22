<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ol class="breadcrumb we7-breadcrumb">
	<a href="<?php  echo url('site/article')?>"><i class="wi wi-back-circle"></i> </a>
	<li><a href="<?php  echo url('site/article')?>">文章管理</a></li>
	<li><a href="<?php  echo url('site/article/post')?>">文章编辑</a></li>
</ol>
<form action="./index.php?c=site&a=article&do=post" method="post" class="article-post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
	<div class="we7-form" id="js-wesite-article-post" ng-controller="WesiteArticlePost" ng-cloak>
		<div class="form-group" ng-if="item && item.linkurl == '' && id > 0">
			<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label col-sm-2">访问地址</label>
			<div class="col-sm-8 col-xs-12">
				<p class="form-control-static"><a href="<?php  echo $_W['siteroot'];?>app/index.php?c=site&a=site&do=detail&id={{item.id}}&i=<?php  echo $_W['uniacid'];?>" target="_blank"><?php  echo $_W['siteroot'];?>app/index.php?c=site&a=site&do=detail&id={{item.id}}&i=<?php  echo $_W['uniacid'];?></a></p>
				<div class="help-block">您可以根据此地址，添加回复规则，设置访问。</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">排序</label>
			<div class="form-controls col-sm-8">
				<input type="text" class="form-control" name="displayorder" ng-model="item.displayorder">
				<span class="help-block">文章的显示顺序，越大则越靠前 </span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">标题</label>
			<div class="form-controls col-sm-8">
				<input type="text" class="form-control" name="title" ng-model="item.title">
				<span class="help-block">文章标题 </span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">文章触发关键字</label>
			<div class="form-controls col-sm-8">
				<input type="text" class="form-control" name="keyword" ng-model="keywords">
				<span class="help-block">添加关键字以后,系统将生成一条图文规则,用户可以通过输入关键字来阅读文章。多个关键字请用英文“,”隔开 </span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">自定义属性</label>
			<div class="form-controls form-control-static col-sm-8">
				<input id='option[hot]' type="checkbox" name='option[hot]' value="1" ng-model="item.ishot" ng-checked='item.ishot == 1' />
				<label for="option[hot]">头条[h] </label>
				
				<input id='option[commend]' type="checkbox" name='option[commend]' value="1" ng-model="item.iscommend" ng-checked="item.iscommend == 1"/>
				<label for="option[commend]">推荐[c]</label>
				<span class="help-block">自定义属性</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">文章来源</label>
			<div class="form-controls col-sm-8">
				<input type="text" class="form-control" name="source" ng-model="item.source">
				<span class="help-block">文章来源 </span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">文章作者</label>
			<div class="form-controls col-sm-8">
				<input type="text" class="form-control" id="writer" name="author" ng-model="item.author">
				<span class="help-block">文章作者 </span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">缩略图</label>
			<div class="form-controls col-sm-8">
				<div class="we7-input-img input-more input-img" ng-class="{'active': item.thumb}">
					<img src="{{item.thumb}}" ng-if="item.thumb">
					<a href="javascript:;" class="input-addon" ng-click="uploadImage()" ng-hide="category.icon"><span>+</span></a>
					<input type="text" name="thumb" ng-model="item.thumb" ng-style="{'display' : 'none'}">
					<div class="cover-dark">
						<a href="" class="cut" ng-click="uploadImage()">更换</a>
						<a href="" class="del" ng-click="delImage()"><i class="fa fa-times text-danger"></i></a>
					</div>
				</div>
				<div class="help-block">封面（大图片建议尺寸：360像素 * 200像素）</div>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2"></label>
			<div class="form-controls col-sm-8">
				<input type="checkbox" id="incontent" name="incontent" ng-model="item.incontent" value="1" ng-checked="item.incontent == 1">
				<label for="incontent">封面图片显示在正文中</label>
			</div>
		</div>
		<div class="form-group form-inline">
			<label class="control-label col-sm-2">文章类别</label>
			<div class="form-controls col-sm-4">
				<?php  echo tpl_form_field_category_2level('category', $parent, $children, $pcate, $ccate)?>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">选择内容模板</label>
			<div class="form-controls col-sm-8">
				<select name="template" class="form-control">
					<option value="">使用默认设置</option>
					<?php  if(is_array($template)) { foreach($template as $v) { ?>
					<option value="<?php  echo $v['name'];?>"<?php  if($item['template'] == $v['name']) { ?> selected<?php  } ?>><?php  echo $v['title'];?></option>
					<?php  } } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">简介</label>
			<div class="form-controls col-sm-8">
				<textarea class="form-control" name="description" rows="5" ng-bind="item.description"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2"></label>
			<div class="form-controls col-sm-8">
				<input type="checkbox" name="autolitpic" value="1" ng-checked="!item.thumb" id="autolitpic">
			 	<label for="autolitpic">提取内容的第一个图片为缩略图  </label>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">内容</label>
			<div class="form-controls col-sm-8">
				<?php  echo tpl_ueditor('content', $item['content']);?> 
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">直接链接</label>
			<div class="form-controls col-sm-8">
				<?php  echo tpl_form_field_link('linkurl', $item['linkurl']);?>
			</div>
		</div>
		<div class="form-group ">
			<label for="" class="control-label col-sm-2">阅读次数</label>
			<div class="form-controls col-sm-8">
				<input class="form-control" type="text" name="click" ng-model="item.click">
				<span class="help-block">默认为0。您可以设置一个初始值,阅读次数会在该初始值上增加。</span>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">是否赠送积分</label>
			<div class="form-controls col-sm-8">
				<input type="radio" name="credit[status]" value="1" ng-model="item.credit.status" ng-checked="item.credit.status == 1" id="credit1">
				<label for="credit1">赠送</label>
				<input type="radio" name="credit[status]" value="0" ng-model="item.credit.status" ng-checked="item.credit.status == 0 || item.credit == ''" id="credit0">
				<label for="credit0">不赠送</label>
				<span class="help-block">设置赠送积分后,粉丝在分享时赠送积分.粉丝的好友在点击阅读时,也会赠送积分</span>
			</div>
			
		</div>
		<div class="form-group" ng-show="item.credit.status == 1">
			<label for="" class="control-label col-sm-2">赠送积分上限</label>
			<div class="form-controls col-sm-8">
				<input type="text" class="form-control" name="credit[limit]" ng-model="item.credit.limit">
				<span class="help-block">设置赠送积分的上限,到达上限后将不再赠送积分</span>
				<span class="help-block" ng-if="id">已经赠送了<strong class="text-danger"> <?php echo $credit_num ? $credit_num : 0?> </strong>积分,还可以赠送<strong class="text-danger"> <?php echo $credit_yu ? $credit_yu : 0?> </strong>积分</span>
			</div>
		</div>
		<div class="form-group" ng-show="item.credit.status == 1">
			<label for="" class="control-label col-sm-2">转发赠送积分</label>
			<div class="form-controls col-sm-8">
				<input type="text" class="form-control"  name="credit[share]" ng-model="item.credit.share">
				<span class="help-block">设置转发时赠送积分</span>
			</div>
		</div>
		<div class="form-group" ng-show="item.credit.status == 1">
			<label for="" class="control-label col-sm-2">阅读赠送积分</label>
			<div class="form-controls col-sm-8">
				<input type="text" class="form-control" name="credit[click]" ng-model="item.credit.click">
				<span class="help-block">设置阅读时赠送给分享人的积分</span>
			</div>
		</div>
		<input name="submit" value="发布" class="btn btn-primary btn-submit" type="submit">
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	</div>
</form>
<script>
	angular.module('wesiteApp').value('config', {
		item: <?php echo !empty($item) ? json_encode($item) : 'null'?>,
		keywords: <?php echo !empty($keywords) ? json_encode($keywords) : 'null'?>,
		id: <?php echo !empty($id) ? json_encode($id) : 'null'?>,
		template: <?php echo !empty($template) ? json_encode($template) : 'null'?>
	});
	angular.bootstrap($('#js-wesite-article-post'), ['wesiteApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>