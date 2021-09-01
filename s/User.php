<?php

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