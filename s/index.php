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
     * @throws Exception
     */
    public static function validate($data): Exception
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
    /**
     * @var string
     */
    public string $name;
    /**
     * @var string
     */
    public string $email;

    /**
     * User constructor
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

}


// Output

$data = $_GET;
$user = new User($data);

try {
    UserRequest::validate($data);
} catch (Exception $e) {
    echo $e->getMessage();
}

print_r(Json::from($data));