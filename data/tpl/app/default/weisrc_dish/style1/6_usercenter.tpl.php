<?php defined('IN_IA') or exit('Access Denied');?><html ng-app="diandanbao" class="ng-scope">
<head>
    <style type="text/css">@charset "UTF-8";
    [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide:not(.ng-hide-animate) {
        display: none !important;
    }

    ng\:form {
        display: block;
    }</style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="telephone=no" name="format-detection">

    <link rel="stylesheet" href="<?php echo RES;?>/plugin/light7/light7.min.css">
    <link rel="stylesheet" type="text/css" href="<?php  echo $this->cur_mobile_path?>/css/common.css?v=7"/>
    <link rel="stylesheet" type="text/css" href="<?php  echo $this->cur_mobile_path?>/css/iconfont.css"/>
    <link rel="stylesheet" href="<?php echo RES;?>/mobile/<?php  echo $this->cur_tpl?>/assets/diandanbao/weixin.css">
    <script src="<?php  echo $this->cur_mobile_path?>/script/jquery-1.8.3.min.js"></script>
    <title><?php  echo $setting['title'];?></title>
    <style type="text/css">
        @media screen {  .smnoscreen {  display: none  }  }
        @media print {  .smnoprint {  display: none  }  }
    </style>
    <style type="text/css">
        .grayshare,.qgimg-ing {
            position:fixed;
            width:100%;
            background-color:rgba(0,0,0,0.7);
            display:none;
            z-index:99998;
            top:0;
            text-align: center;
        }
        .grayshare img{width:70%;margin-top:50px; }
    </style>
    <style type="text/css">
        .Leftback {
            width:50px;
            height:50px;
            border-radius:50%;
            background-color:rgba(0,0,0,0.5);
            display:inline-block;
            font-size:24px;
            line-height:48px;
            text-align:center;
            position:fixed;
            bottom:16%;
            color:#E34F63;
            z-index:1000;
        }
        .kefu {
            width:27px;
            height:22px;
            display:inline-block;
            line-height:22px;
            font-size:24px;
            margin-top:2px;
        }
        .link-KF2 {
            width:352px;
            height:380px;
            position:fixed;
            left:50%;
            margin-left:-190px;
            display:none;
            z-index:99999;
            text-align:center;
            overflow:hidden;
        }
        .con-ma {
            width:80%;
            height:auto;
            margin-left:14%;
            border-radius:8px;
            background-color:#E8E8E8;
            padding-bottom:15px;
            -webkit-box-sizing:border-box;
        }
        .link-KF2 p {
            height:50px;
            line-height:50px;
            font-size:18px;
            font-weight:none;
            color:#080808;
        }
        .link-KF2 img {
            max-width:203px !important;
            max-height:203px !important;
            width:100%;
            height:100%;
            margin-top:0px;
        }
        .gray3,.qgimg-ing {
            position:fixed;
            width:100%;
            background-color:rgba(0,0,0,0.7);
            display:none;
            z-index:99998;
            top:0;
        }
        .qgimg-ing {
            background:#fff !important;
        }
    </style>
    <style>
        .ddb-secondary-nav-header .filter-switch{
            color:#28a267;
            border: 1px solid #28a267;
        }

        .ddb-secondary-nav-header .filter-switch .filter-tab {
            border-right: 1px solid #28a267;
            display: table-cell;
            width: 1%;
            text-align: center
        }
        .ddb-secondary-nav-header .filter-switch .filter-tab.active {
            background-color: #28a267;
            color: #fff
        }
        #user-profile-page .user-nav-section .user-nav-item i{
            font-size: 16px;
        }

        .text, .filter-tab{
            font-size: 14px;
        }
        .my-favorite-button {
            font-size: 14px;
        }
    </style>
</head>
<body>
<?php  include $this->template($this->cur_tpl.'/_pop');?>
<div class="gray3" style="display: none;"></div>
<div class="link-KF2">
    <div class="con-ma">
        <p style="padding-bottom: 0px;margin-bottom: 0px;">长按保存您的推广二维码</p>
        <img src="<?php  echo $this->createMobileUrl('GetQrcode',array('url'=>$agent_url))?>"/>
    </div>
</div>
<div class="grayshare" style="display: none;">
    <img src="<?php echo RES;?>images/share.png">
</div>
<div  style="height: 100%;overflow:auto;overflow-y:scroll;-webkit-overflow-scrolling:touch;">
    <div class="ddb-nav-header ng-scope" common-header="">
        <div class="nav-left-item" onclick="location.href='<?php  echo $this->createMobileUrl('waprestlist', array(), true)?>';"><i class="fa fa-angle-left"></i></div>
        <div class="header-title ng-binding">用户中心</div>
    </div>
    <div id="user-profile-page" class="main-view ng-scope" style="padding-bottom: 60px;">
        <div id="top-user-avatar">
            <div class="avatar-section">
                <div class="avatar">
                    <img class="ng-scope" src="<?php  echo tomedia($fans['headimgurl'])?>">
                </div>
                <div class="favorite-nav-item">
                <span class="my-favorite-button">
                    <a href="<?php  echo $this->createMobileUrl('collection', array(), true)?>" class="ng-binding">
                        <i class="fa fa-star"></i> 我的收藏 (<?php  echo $count;?>)
                    </a>
                </span>
                </div>
                <div class="name overflow-ellipsis ng-binding">
                    <?php  if($fans['is_commission']==2) { ?><?php  echo $commission_tip;?><?php  } ?><?php  echo $fans['nickname'];?>
                </div>
            </div>
            <div class="user-nav-section">
                <div class="user-nav-item">
                    <a href="#/addresses">
                        <i class="fa fa-yen"></i>
                        <div class="text">余额:<?php  echo $coin;?></div>
                    </a>
                </div>
                <div class="user-nav-item">
                    <a href="#/wechat_share_records">
                        <i class="fa fa-money"></i>
                        <div class="text">积分:<?php  echo $score;?></div>
                    </a>
                </div>
                <div class="user-nav-item">
                    <a href="<?php  if(!empty($setting['link_sign'])) { ?><?php  echo $setting['link_sign'];?><?php  } else { ?>index.php?i=<?php  echo $weid;?>&c=mc&a=card&do=credit<?php  } ?>">
                        <i class="fa fa-tag"></i>
                        <div class="text"><?php  if(!empty($setting['link_sign_name'])) { ?><?php  echo $setting['link_sign_name'];?><?php  } else { ?>每日签到<?php  } ?></div>
                    </a>
                </div>
                <?php  if(!empty($setting['link_recharge_name'])) { ?>
                <div class="user-nav-item ng-scope">
                    <a href="<?php  if(!empty($setting['link_recharge'])) { ?><?php  echo $setting['link_recharge'];?><?php  } else { ?>#<?php  } ?>">
                        <i class="fa fa-plus"></i>
                        <div class="text"><?php  echo $setting['link_recharge_name'];?></div>
                    </a>
                </div>
                <?php  } ?>
            </div>
        </div>
        <div class="space-12"></div>
        <div class="section promotion-nav-section">
            <!--<a ng-click="go_to_pay_code()" class="arrow-right">-->
                <!--<i class="fa fa-qrcode label-orange"></i> 会员付款码-->
            <!--</a>-->
            <a href="<?php  echo $this->createMobileUrl('order', array(), true)?>" class="arrow-right">
                <i class="fa fa-money label-green"></i> 订单中心
            </a>
            <a href="<?php  echo $this->createMobileUrl('mycoupon', array(), true)?>" class="arrow-right">
                <i class="fa fa-money label-red"></i> 优惠券
            </a>
            <a href="<?php  if(!empty($setting['link_card'])) { ?><?php  echo $setting['link_card'];?><?php  } else { ?><?php  if(IMS_VERSION == '0.8') { ?>index.php?i=<?php  echo $weid;?>&c=mc&a=card&do=mycard<?php  } else { ?>index.php?i=<?php  echo $weid;?>&c=mc&a=bond&do=card<?php  } ?><?php  } ?>" class="arrow-right">
                <i class="fa fa-credit-card label-orange"></i> <?php  if(!empty($setting['link_card_name'])) { ?><?php  echo $setting['link_card_name'];?><?php  } else { ?>会员卡<?php  } ?>
            </a>
            <?php  if($is_savewine==1) { ?>
            <a href="<?php  echo $this->createMobileUrl('savewinelist', array(), true)?>" class="arrow-right">
                <i class="fa fa-ge label-blue"></i> 酒水寄存
            </a>
            <?php  } ?>
            <?php  if($is_commission == 1) { ?>
            <a href="#" class="arrow-right yaoqing">
                <i class="fa fa-mail-forward label-pink"></i> 邀请好友获取佣金
            </a>
            <a href="#" class="arrow-right linkKeFu2">
                <i class="fa fa-qrcode label-green"></i> 我的推广二维码
            </a>
            <a href="<?php  echo $this->createMobileUrl('mymemberlist', array(), true)?>" class="arrow-right">
                <i class="fa fa-users label-orange"></i> 我邀请的好友
            </a>
            <?php  } ?>
        </div>
        <div class="space-12"></div>
        <div class="section copy-right-section">
            <?php  if($is_permission == true) { ?>
            <a class="arrow-right" href="<?php  echo $this->createMobileUrl('adminorder', array(), true)?>">
                <i class="fa fa-cog label-red"></i> 商家订单管理
            </a>
            <?php  } ?>
            <?php  if($deliveryuser) { ?>
            <a class="arrow-right" href="<?php  echo $this->createMobileUrl('deliveryorder', array(), true)?>">
                <i class="fa fa-cog label-orange"></i> 配送订单管理
            </a>
            <?php  } ?>

            <!--<a href="#/contact_us" class="arrow-right">-->
                <!--<i class="fa fa-headphones label-blue"></i>-->
                <!--联系我们-->
            <!--</a>-->
            <a class="arrow-right ng-binding ng-scope" href="<?php  if(!empty($config['copyright_url'])) { ?><?php  echo $config['copyright_url'];?><?php  } else { ?>#<?php  } ?>">
            <?php  if(!empty($config['copyright_name'])) { ?>
            <i class="fa fa-globe label-green"></i> 技术支持: <?php  echo $config['copyright_name'];?>
            <?php  } else { ?>
            <i class="fa fa-globe label-green"></i> 技术支持: <?php  echo $_W['account']['name'];?>
            <?php  } ?>
            </a>
        </div>
        <!--<div class="version space-64">-->
            <!--Build version 5.1-->
            <!--<br>-->
            <!--<span class="ng-scope">迷失卍国度</span>-->
        <!--</div>-->
    </div>
</div>
<?php  include $this->template($this->cur_tpl.'/_nave');?>
<script src="<?php echo RES;?>/mobile/<?php  echo $this->cur_tpl?>/assets/diandanbao/jquery-1.11.3.min.js"></script>
<script>
    $(function () {
        $(".yaoqing").click(function () {
            $(".grayshare").show();
            $(".grayshare").css("height", $(document).height());
        });
        $(".grayshare,.con-ma").click(function () {
            $(".grayshare").hide();
        });
    });

    $(function () {
        $(".linkKeFu2").click(function () {
            $(".gray3").show();
            $(".gray3").css("height", $(document).height());
            $(".link-KF2").css("top", $(window).height() / 2 - 178);
            $(".link-KF2").show();
        });
        $(".gray3,.con-ma").click(function () {
            $(".link-KF2").hide();
            $(".gray3").hide();
        });
    });
</script>
<script type="text/javascript" src="http://api.map.baidu.com/api?ak=qen1OGw9ddzoDQrTX35gote2&v=2.0&services=false"></script>
<input type="hidden" name="lat" id="lat" value="<?php  echo $fans['lat'];?>">
<input type="hidden" name="lng" id="lng" value="<?php  echo $fans['lng'];?>">
<script type="text/javascript">
    $(document).ready(function(){
//        window.onload = distance;
//        function distance() { //定位当前地址
//            var geolocation = new BMap.Geolocation();
//            geolocation.getCurrentPosition(function (r) {
//                if (this.getStatus() == BMAP_STATUS_SUCCESS) {
//                    var position = {
//                        lng: r.point.lng,
//                        lat: r.point.lat
//                    }
//                    positions(position); //当前经纬度
//                } else {
//                    alert('获取当前位置失败,请确定您开启了定位服务');
//                }
//                setTimeout(distance, 5000);
//            }, {enableHighAccuracy: true});
//        }
//        function positions(position) {
//            $("#lng").val(position.lng);
//            $("#lat").val(position.lat);
//
//            var url = "<?php  echo $this->createMobileUrl('UpdateUserPoint', array(), true)?>";
//            var lng = $("#lng").val();
//            var lat = $("#lat").val();
//
//            $.ajax({
//                url: url, type: "post", dataType: "json", timeout: "10000",
//                data: {
//                    "type": "add",
//                    "lat":lat,
//                    "lng":lng
//                },
//                success: function (data) {
//
//                },error: function () {
//
//                }
//            });
//
//        }
    });

</script>
<?php  echo register_jssdk(false);?>
<script>
    wx.ready(function () {
        sharedata = {
            title: '<?php  echo $share_title;?>',
            desc: '<?php  echo $share_desc;?>',
            link: '<?php  echo $share_url;?>',
            imgUrl: '<?php  echo $share_image;?>',
            success: function(){

            },
            cancel: function(){

            }
        };
        wx.onMenuShareAppMessage(sharedata);
        wx.onMenuShareTimeline(sharedata);
    });
</script>
<?php  include $this->template($this->cur_tpl.'/_statistics');?>
</body>
</html>