<?php


class Model
{
    use Database;

    protected $table = 'utilisateurs';
    protected $limit = 5;
    protected $offset = 0;


   
    public function where($data,$data_not=[]){

        $query = "SELECT * FROM $this->table where ";
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
   

        foreach($keys as $key){
            $query .= $key . ' = :' . $key . ' AND ';
        }

        
        foreach($keys_not as $key){
            $query .= $key . ' != :' . $key . ' AND ';
        }

        
  
        $query = trim($query, " AND ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data_not,$data);
        return $this->query($query,$data);
        
    }


    public function first($data,$data_not = []){

    }

    

    public function insert($data){

    }

    public function update($id ,$data){
        
    }

    public function delete($id){
        
    }
   
}




?>