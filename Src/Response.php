<?php 
namespace Src;

class Response
{
    public static function response(array $aAttrs)
    {
        return json_encode($aAttrs);
    }
}
