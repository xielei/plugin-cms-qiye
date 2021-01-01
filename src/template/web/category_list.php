<?php
$meta = [
    'title' => ($input->has('get.type') ? $input->get('type') . ' - ' : '') . $category['title'],
    'keywords' => $category['keywords'],
    'description' => $category['description'],
];
?>
{include common/header@xielei/web}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{:$router->buildUrl('/')}">主页</a></li>
        {foreach $category_model->pdata($category['id']) as $vo}
        <li class="breadcrumb-item"><a href="{:$router->buildUrl('/xielei/cms/web/category', ['id'=>$vo['alias']?:$vo['id']])}">{$vo.title}</a></li>
        {/foreach}
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <ul class="list-unstyled">
            {foreach $contents as $vo}
            <li class="border-bottom py-2">
                <span class="text-muted float-right d-none d-sm-block">{:date('Y-m-d H:i', $vo['create_time'])}</span>
                <a class="text-decoration-none" href="{:$router->buildUrl('/xielei/cms/web/content', ['id'=>$vo['alias']?:$vo['id']])}">▪ {$vo.title}</a>
            </li>
            {/foreach}
        </ul>
        <nav class="my-3">
            <ul class="pagination">
                {foreach $pagination as $v}
                {if $v=='...'}
                <li class="page-item disabled"><a class="page-link" href="javascript:void(0);">{$v}</a></li>
                {elseif isset($v['current'])}
                <li class="page-item active"><a class="page-link" href="javascript:void(0);">{$v.page}</a></li>
                {else}
                <li class="page-item"><a class="page-link" href="{:$router->buildUrl('/xielei/cms/web/category', array_merge($_GET, ['page'=>$v['page']]))}">{$v.page}</a></li>
                {/if}
                {/foreach}
            </ul>
        </nav>
    </div>
    <div class="col-md-3">
        {include common/sidebar@xielei/web}
    </div>
</div>
{include common/footer@xielei/web}