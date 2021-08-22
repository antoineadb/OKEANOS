<?php


namespace App\Services;


class Tools
{
    public static function hash(string $message):? string
    {
        return hash('sha256',$message);
    }

    public static function isJson($string): bool {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public static function generateSalt():? string {
        return Tools::hash(substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10));
    }
}