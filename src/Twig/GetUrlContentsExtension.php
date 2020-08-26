<?php

declare(strict_types=1);

namespace CodeRhapsodie\GetUrlContentsEzTwigBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GetUrlContentsExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('get_url_contents', [$this, 'getUrlContents']),
        ];
    }

    public function getUrlContents(string $url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $content = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($content === false || $code !== 200) {
            return '';
        }

        return $content;
    }
}
