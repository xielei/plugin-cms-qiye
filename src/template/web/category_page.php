<?php
$meta = [
    'title' => $category['title'],
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
        <h1 class="h1 mt-3">{$category.title}</h1>
        <hr>
        <div class="body">
            {$category.body}
        </div>
    </div>
    <div class="col-md-3">
        {include common/sidebar@xielei/web}
    </div>
</div>
{include common/footer@xielei/web}