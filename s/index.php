<?php

class Json
{
    public static function from($data)
    {
        return json_encode($data);
    }
}

class UserRequest
{
    protected static $rules = [
        'name' => 'string',
        'email' => 'string',
    ];

    public static function validate($data)
    {
        foreach (self::$rules as $property => $type) {
            if (gettype($data[$property]) != $type) {
                throw new Exception("Bad Request, User property {$property} must be of type {$type}");
            }
        }
    }
}

class User
{
    public string $name;
    public string $email;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

}

$data = $_GET;
$user = new User($data);
try {
    UserRequest::validate($data);
} catch (Exception $e) {
    echo $e->getMessage();
}
print_r(Json::from($data));