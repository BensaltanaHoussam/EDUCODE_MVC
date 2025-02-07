<?php

class Home extends Controller
{
    public function index()
    {
        
          // Create an instance of the Model class
          $model = new Model;
          $arr = ['email' => 'johndoe@example.com' , 'Password' => '123'];
  
    
          $result = $model->where($arr);

          show($result);

       
  

        $this->view(name: 'home');
    }

}


?>