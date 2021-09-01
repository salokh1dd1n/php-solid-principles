<?php

class UserRequest
{
    /**
     * Rules list
     *
     * @var array
     */
    protected static $rules = [
        'name' => 'string',
        'email' => 'string',
    ];

    /**
     * Validate user data
     *
     * @param $data
     * @return bool
     * @throws Exception
     */
    public static function validate($data): bool
    {
        foreach (self::$rules as $property => $type) {
            if (gettype($data[$property]) != $type) {
                throw new Exception("Bad Request, User property {$property} must be of type {$type}");
            }
        }
        return true;
    }
}