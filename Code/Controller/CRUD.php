<?php

include '../DB/dbHelper.php';

class crud extends dbHelper
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            echo "Error: Get data not completed";
            return false;
        }
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function execute($query)
    {
        $result = $this->connection->query($query);
        if ($result == false) {
            echo "Error on execute";
            return false;
        }
        return true;
    }

    public function delete($table, $id)
    {
        $query = "Delete from $table WHERE id=$id";
        $result = $this->connection->query($query);
        if ($result == false) {
            echo "Error on delete";
            return false;
        }
        return true;
    }

    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }


}