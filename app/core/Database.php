<?php


trait Database
{

    private function connect()
    {
        $string = "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT;
        $con = new PDO($string, DB_USER, DB_PASS);
        return $con;

    }

    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);

        $check = $stmt->execute(params: $data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array(($result)) && count($result)) {
                return $result;
            }

        } else {
            return false;
        }

    }


    //get one row
    public function get_row($query, $data = [])
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);

        $check = $stmt->execute($data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array(($result)) && count($result)) {
                return $result[0];
            }

        } else {
            return false;
        }

    }


}



?>