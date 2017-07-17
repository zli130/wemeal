<?php

namespace App\Helpers;

class Strings
{
    public static function random(int $length)
    {
        $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';

        $str ='';

        $max = mb_strlen($keyspace, '8bit') -1;

        for ($i=0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }

        return $str;
    }

    public static function generateFileName($file)
    {
         return str_random(32).'.'.$file->extension();
    }
}
