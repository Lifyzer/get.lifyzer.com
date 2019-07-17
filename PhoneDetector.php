<?php
/**
 * @author         Pierre-Henry Soria <hi@ph7.me>
 * @link           https://lifyzer.com
 * @copyright      (c) 2019, Pierre-Henry Soria. All Rights Reserved.
 * @license        GNU General Public License; <https://www.gnu.org/licenses/gpl-3.0.en.html>
 */

declare(strict_types=1);

namespace Lifyzer\Utility;

class PhoneDetector
{
    private const REGEX_IOS = '#(iPhone|iPad)#i';
    private const REGEX_ANDROID = '#android#i';

    private string $userAgent;

    public function __construct()
    {
        $this->userAgent = $this->getUserAgent();
    }

    public function isIos(): bool
    {
        return $this->testUserAgentWith(self::REGEX_IOS);
    }

    public function isAndroid(): bool
    {
        return $this->testUserAgentWith(self::REGEX_ANDROID);
    }

    private function testUserAgentWith(string $regex): bool
    {
        return (bool)preg_match($regex, $this->userAgent);
    }

    private function getUserAgent(): string
    {
        return (string)$_SERVER['HTTP_USER_AGENT'];
    }
}
