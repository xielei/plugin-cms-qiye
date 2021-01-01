{include common/header@xielei/web}
<div class="my-3">{php}echo function_exists('fragment')?fragment('lunbotu'):'';{/php}</div>
<div class="row">
    <div class="col-md-9">
        {php}echo function_exists('fragment')?fragment('gongsijianjie', '请在后台添加gongsijianjie碎片'):'';{/php}
        {php}echo function_exists('fragment')?fragment('chanpintuijian', '请在后台添加chanpintuijian碎片'):'';{/php}
    </div>
    <div class="col-md-3">
        {include common/sidebar@xielei/web}
    </div>
</div>
{php}echo function_exists('fragment')?fragment('youqinglianjie', '请在后台添加youqinglianjie碎片'):'';{/php}
{include common/footer@xielei/web}