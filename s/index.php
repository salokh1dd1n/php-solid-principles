<?php

class User
{
    public string $name;
    public string $email;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function formatJson()
    {
        return json_encode(['name' => $this->name, 'email' => $this->email]);
    }

    /**
     * @throws Exception
     */
    public function validate($data)
    {
        if (!isset($data['name'])) {
            throw new Exception("Bad Request, User requires a name");
        }
        if (!isset($data['name'])) {
            throw new Exception("Bad Request, User email required");
        }
    }
}

$data = $_GET;
$user = new User($data);
try {
    $user->validate($data);
} catch (Exception $e) {
    echo $e->getMessage();
}
print_r($user->formatJson());