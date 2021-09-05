<?php

namespace Flextype;

use Flextype\Plugin\Sitemap\Controllers\SitemapController;

app()->get('/' . registry()->get('plugins.sitemap.settings.route'), SitemapController::class . ':index')->setName('sitemap.index');
