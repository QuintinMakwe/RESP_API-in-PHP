<?php

class UserInformation
{
    private $table = 'UserInformation';
    private $conn;

    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ';

        //exectute the query
        $result = $this->conn->query($query);
        return $result;

    }

    //constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

};
