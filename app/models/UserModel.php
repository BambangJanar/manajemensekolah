<?php

class UserModel
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE username = ?");
        $this->db->bind('s', $username);
        return $this->db->single();
    }
}
