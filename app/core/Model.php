<?php


trait Model
{
    use Database;

    protected $limit = 5;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";



    public function findAll(){


        $query = " SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";
        return $this->query($query);

        
    }


    public function where($data, $data_not = [])
    {

        $query = "SELECT * FROM $this->table where ";
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);


        foreach ($keys as $key) {
            $query .= $key . ' = :' . $key . ' AND ';
        }


        foreach ($keys_not as $key) {
            $query .= $key . ' != :' . $key . ' AND ';
        }



        $query = trim($query, " AND ");

        $query .= " ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";
        $data = array_merge($data_not, $data);
        return $this->query($query, $data);

    }


    public function first($data, $data_not = [])
    {

        $query = "SELECT * FROM $this->table where ";
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);


        foreach ($keys as $key) {
            $query .= $key . ' = :' . $key . ' AND ';
        }


        foreach ($keys_not as $key) {
            $query .= $key . ' != :' . $key . ' AND ';
        }



        $query = trim($query, " AND ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data_not, $data);

        $result = $this->query($query, $data);
        if ($result) {
            return $result[0];
        }





    }



    public function insert($data)
    {

        if(!empty($this->allowedCloums)){
            foreach($data as $key=>$value){
                if(!in_array($key,$this->allowedColums)){
                    unset($data[$key]);
                    
                }

            }
        }

        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ") ";

        return $this->query($query, $data);





    }

    public function update($id, $data, $id_column = 'id')
    {

        
        if(!empty($this->allowedCloums)){
            foreach($data as $key=>$value){
                if(!in_array($key,$this->allowedColums)){
                    unset($data[$key]);
                    
                }

            }
        }

        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";


        foreach ($keys as $key) {
            $query .= $key . ' = :' . $key . ', ';
        }



        $query = trim($query, ", ");

        $query .= " WHERE $id_column = :$id_column";
        $data[$id_column] = $id;


        $result = $this->query($query, $data);
        return $result;

    }




    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;

        $query = " DELETE FROM $this->table WHERE $id_column = :$id_column";
        return $this->query($query, $data);


    }

}




?>