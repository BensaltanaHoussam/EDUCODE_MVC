<?php 

class Utilisateur {

    use Model ;

    protected $table = 'utilisateurs' ;
    protected $allowedCloums = [ 
        'email',
        'password',
        'mot_de_passe',
        'role',
        'status',
    ];




}

?>