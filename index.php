<?php
/**
 * Redirects users to the correct app store depending of their phone's OS.
 *
 * @author         Pierre-Henry Soria <hi@ph7.me>
 * @link           https://lifyzer.com
 * @copyright      (c) 2019, Pierre-Henry Soria. All Rights Reserved.
 * @license        MIT License; <https://opensource.org/licenses/MIT>
 */

require 'vendor/autoload.php';

use PierreHenry\PhoneDetector\PhoneDetector;

/**
 * @internal As of PHP 5.3, 'const' keyword can be used outside of classes.
 */
const ANDROID_STORE_URL = 'https://play.google.com/store/apps/details?id=com.lifyzer';
const IOS_STORE_URL = 'https://apps.apple.com/app/longer-life-lifyzer-food-scan/id1466196809';
const WEBSITE_URL = 'https://lifyzer.com';

function getLifyzerUrl(): string
{
    $phoneDetector = new PhoneDetector();

    switch (true) {
        case $phoneDetector->isAndroid():
            $url = ANDROID_STORE_URL;
            break;

        case $phoneDetector->isIos():
            $url = IOS_STORE_URL;
            break;

        default:
            $url = WEBSITE_URL;
    }

    return $url;
}

header('Location: ' . getLifyzerUrl());
