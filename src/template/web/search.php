{include common/header@xielei/web}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{:$router->buildUrl('/')}">主页</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{:$router->buildUrl('/xielei/cms/web/search')}">搜索</a></li>
    </ol>
</nav>

<div class="my-4">
    <form method="GET">
        <div class="input-group mb-3">
            <input type="text" name="q" value="{:$input->get('q')}" class="form-control" style="max-width: 250px;" placeholder="请输入关键词，最少2个字符！" aria-label="请输入关键词，最少2个字符！" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="button-addon2">搜索</button>
            </div>
        </div>
    </form>
</div>

{foreach $contents as $vo}
<div class="card my-2">
    <div class="card-body">
        <h5 class="card-title"><a class="text-decoration-none stretched-link" href="{:$router->buildUrl('/xielei/cms/web/content', ['id'=>$vo['alias']?:$vo['id']])}">{$vo.title}</a></h5>
        <div class="text-muted text-monospace"><span class="mr-2">更新时间：{:date('Y-m-d H:i', $vo['update_time'])}</span><span>点击量：{$vo.click}</span></div>
    </div>
</div>
{/foreach}
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
{include common/footer@xielei/web}