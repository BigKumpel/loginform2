<?php
class User {
    private int $id;
    private mysqli $db;
    private string $login;
    private string $password;
    private string $firstName;
    private string $lastName;

    public function __construct(string $login, string $password) {
        $this->login = $login;
        $this->password = $password;
        $this->firstName = "";
        $this->lastName = "";
        global $db;
        $this->db = &$db;
    }
?>