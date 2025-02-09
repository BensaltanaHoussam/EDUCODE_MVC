<?php

class Home extends Controller
{
    public function index()
    {
        
    
          $user = new Utilisateur;
       

        
  
    
          $result = $user->findAll();

          show($result);

    

        $this->view(name: 'home');
    }

    

}


?>