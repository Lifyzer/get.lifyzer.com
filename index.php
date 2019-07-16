<?php
/**
 * @author         Pierre-Henry Soria <hi@ph7.me>
 * @link           https://lifyzer.com
 * @copyright      (c) 2019, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; <https://www.gnu.org/licenses/gpl-3.0.en.html>
 */

/**
 * Redirects users to the correct app store depending of their phone's OS.
 */


/**
 * @internal As of PHP 5.3, 'const' keyword can be used outside of classes.
 */
const ANDROID_STORE_URL = 'https://play.google.com/store/apps/details?id=com.lifyzer';
const IOS_STORE_URL = 'https://apps.apple.com/app/longer-life-lifyzer-food-scan/id1466196809';
const WEBSITE_URL = 'https://lifyzer.com';

$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('#android#i', $userAgent)) {
    $url = ANDROID_STORE_URL;
} elseif (preg_match('#(iPhone|iPad)#i', $userAgent)) {
    $url = IOS_STORE_URL;
} else {
    $url = WEBSITE_URL;
}

header('Location: ' . $url);
