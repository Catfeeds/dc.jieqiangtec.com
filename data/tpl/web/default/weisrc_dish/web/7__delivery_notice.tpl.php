<?php defined('IN_IA') or exit('Access Denied');?><script>
    function CheckDeliveryOrder() {
        $.post("<?php  echo $this->createWebUrl('CheckDeliveryOrder', array('storeid' => $storeid));?>", function(data){
                setTimeout(CheckDeliveryOrder, 60000);
        });
    }
    $(function(){
        CheckDeliveryOrder();
    });
</script>