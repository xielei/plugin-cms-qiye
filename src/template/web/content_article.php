<?php
$meta = [
    'title' => $content['title'],
    'keywords' => $content['keywords'],
    'description' => $content['description'] ?: mb_substr(str_replace(["\r", "\n", "\t"], '', trim(strip_tags($content['body']['body'] ?? ''))), 0, 250),
];
?>
{include common/header@xielei/web}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{:$router->buildUrl('/')}">主页</a></li>
        {foreach $category_model->pdata($content['category_id']) as $vo}
        <li class="breadcrumb-item"><a href="{:$router->buildUrl('/xielei/cms/web/category', ['id'=>$vo['alias']?:$vo['id']])}">{$vo.title}</a></li>
        {/foreach}
        <li class="breadcrumb-item" aria-current="page"><a href="{:$router->buildUrl('/xielei/cms/web/content', ['id'=>$content['alias']?:$content['id']])}">{$content.title}</a></li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <h1 class="h1 mt-3">{$content.title}</h1>
        <hr>
        <div class="mb-3 text-muted text-monospace"><span class="mr-2">更新时间：{:date('Y-m-d H:i', $content['update_time'])}</span><span>浏览：{$content.click}</span></div>
        <div class="my-3">
            {php}if(isset($content['body']['body'])){ echo htmlspecialchars_decode($content['body']['body']);}{/php}
        </div>
        <?php
        $relations = [];
        if ($tags = explode(',', $content['tags'])) {
            if ($content_ids = $tag_model->select('content_id', [
                'tag' => $tags,
                'content_id[!]' => $content['id'],
                'LIMIT' => 10,
            ])) {
                $relations = $content_model->select('*', [
                    'state' => 1,
                    'id' => $content_ids,
                ]);
            }
        }
        ?>
        {if $relations}
        <div class="bg-light p-3">
            <div class="h4">相关内容</div>
            <ol class="list-unstyled" style="margin-bottom: 0;">
                {foreach $relations as $vo}
                <li><a href="{:$router->buildUrl('/xielei/cms/web/content', ['id'=>$vo['alias']?:$vo['id']])}">{$vo.title}</a></li>
                {/foreach}
            </ol>
        </div>
        {/if}
    </div>
    <div class="col-md-3">
        {include common/sidebar@xielei/web}
    </div>
</div>
{include common/footer@xielei/web}