<?php

class Home extends Controller
{
    public function index()
    {
        
    
          $model = new Model;
            $arr = [
                'nom' => 'John Doe',
                'email' => 'johndoe@example.com'
            ];

        
  
    
          $result = $model->where($arr);

           show($result);

       
   

        $this->view(name: 'home');
    }

    

}


?>