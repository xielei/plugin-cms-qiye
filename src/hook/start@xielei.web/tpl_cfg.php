<?php

use Ebcms\App;
use Xielei\Template;

App::getInstance()->execute(function (
    Template $template
) {
    $template->addPath('xielei/cms', __DIR__ . '/../../template', 50);
    $template->addPath('xielei/web', __DIR__ . '/../../template', 50);
});
