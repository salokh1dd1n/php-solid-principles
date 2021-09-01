<?php

class Json
{
    /**
     * Encode to json
     *
     * @param $data
     * @return false|string
     */
    public static function from($data): false|string
    {
        return json_encode($data);
    }
}