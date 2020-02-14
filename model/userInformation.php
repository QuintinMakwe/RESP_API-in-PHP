<?php

class UserInformation
{
    //DB stuff
    private $table = 'UserInformation';
    private $conn;

    //userInformation properties
    public $id;
    public $structureName;
    public $structureOwner;

    //read all the data
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

    //read a single data
    public function readSingle()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id =' . $this->id . ' LIMIT 0,1';

        //execute the query
        $result = $this->conn->query($query);

        return $result;
    }

    //create a new record
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (id, structureName, structureOwner ) VALUES(NULL, \'' . $this->structureName . '\',\'' . $this->structureOwner . '\')';

        //execute the query
        $this->conn->query($query);

        if ($this->conn->affected_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

}
