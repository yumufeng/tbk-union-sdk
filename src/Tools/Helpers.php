<?php

namespace TaobaoUnionSdk\Tools;
class Helpers
{
    public static function fpm_curl_post($url, $post_data, $header = [])
    {
        $ch = \curl_init();
        \curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        // https请求 不验证证书和hosts
        \curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        \curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        \curl_setopt($ch, CURLOPT_URL, $url);
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// 要求结果为字符串且输出到屏幕上
        if (!empty($header)) {
            \curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        } else {
            \curl_setopt($ch, CURLOPT_HEADER, 0); // 不要http header 加快效率
        }
        \curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public static function curl_post($url, $post_data, $header = [])
    {
        if (!extension_loaded('swoole')) {
            $output = self::fpm_curl_post($url, $post_data, $header);
        } else {
            if (PHP_SAPI == 'cli') {
                $urlsInfo = \parse_url($url);
                $queryUrl = $urlsInfo['path'];
                $domain = $urlsInfo['host'];
                $port = $urlsInfo['scheme'] = 'https' ? 443 : 80;
                $chan = new \Chan(1);
                go(function () use ($chan, $domain, $queryUrl, $header, $port, $post_data) {
                    $cli = new \Swoole\Coroutine\Http\Client($domain, $port, $port == 443 ? true : false);
                    $cli->setHeaders($header);
                    $cli->set(['timeout' => 15]);
                    $cli->post($queryUrl, $post_data);
                    $output = $cli->body;
                    $chan->push($output);
                    $cli->close();
                });
                $output = $chan->pop();
            } else {
                $output = self::fpm_curl_post($url, $post_data, $header);
            }
        }
        return $output;
    }
}