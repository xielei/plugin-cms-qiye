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
        <div class="row">
            {foreach $category_model->all() as $vo}
            {if $vo['pid'] == $category['id'] && $vo['type']=='list'}
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="{:$router->buildUrl('/xielei/cms/web/category', ['id'=>$vo['alias']?:$vo['id']])}">{$vo.title}</a>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php $contents = $content_model->select('*', [
                            'category_id' => $vo['id'],
                            'ORDER' => [
                                'id' => 'DESC',
                            ],
                            'LIMIT' => 5,
                        ]); ?>
                        {foreach $contents as $c}
                        <a class="list-group-item list-group-item-action" href="{:$router->buildUrl('/xielei/cms/web/content', ['id'=>$c['alias']?:$c['id']])}">{$c.title}</a>
                        {/foreach}
                    </div>
                </div>
            </div>
            {/if}
            {/foreach}
        </div>
    </div>
    <div class="col-md-3">
        {include common/sidebar@xielei/web}
    </div>
</div>
{include common/footer@xielei/web}