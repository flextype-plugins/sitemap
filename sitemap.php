<?php

/**
 *
 * Flextype Sitemap Plugin
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Url;
use Arr;
use Response;
use Request;

if (Url::getUriSegment(0) == 'sitemap.xml') {
    Events::addListener('onPageBeforeRender', function () {
        Response::status(200);
        Request::setHeaders('Content-Type: text/xml; charset=utf-8');

        $_pages = Pages::getPages('', false, 'date');

        foreach ($_pages as $page) {
            if ($page['slug'] !== '404') {
                $pages[] = $page;
            }
        }

        include 'views/sitemap.php';

        Request::shutdown();
    });
}
