<?php

namespace app\core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $positon = strpos($path, '?');

        if ($positon === false) {
            return $path;
        }

        return substr($path, 0, $positon);
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function isSameDomain()
    {
        if (!isset($_SERVER['HTTP_REFERER'])) {
            //No referer sent, so can't be same domian
            return false;
        } else {
            $referer_host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            $server_host = $_SERVER['HTTP_HOST'];

            //Uncomment for debugging
            // echo 'Request from: ' . $referer_host . "<br />";
            // echo 'Request to: ' . $server_host . "<br />";

            return($referer_host == $server_host) ? true : false;
        }
    }

    public function getBody()
    {
        $body = [];

        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = \filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = \filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
