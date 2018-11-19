<?php

namespace Flextype;

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

use Flextype\Component\{Event\Event, Http\Http, Arr\Arr};

//
// Add listner for onCurrentPageAfterProcessed event
//
Event::addListener('onCurrentPageBeforeLoaded', function () {
    if (Http::getUriSegment(0) == 'sitemap.xml') {
        Http::setResponseStatus(200);
        Http::setRequestHeaders('Content-Type: text/xml; charset=utf-8');

        $_pages = Content::getPages('', false, 'date');

        foreach ($_pages as $page) {
            if ($page['slug'] !== '404') {
                $pages[] = $page;
            }
        }

        include 'views/sitemap.php';
        Http::requestShutdown();
    }
});
