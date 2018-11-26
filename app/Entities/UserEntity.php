<?php

namespace App\Entities;

use Panther\Entity\EntityController;
use Panther\Http\Request;
use Panther\Router\Router;

use App\Models\User;

class UserEntity extends EntityController {

    public function routes(Router $router){	
        $router->get('/login', 'UserEntity@index');
        $router->post('/authenticate', 'UserEntity@authenticate');
    }

    public function index(){	
        return $this->view('login');
    }

    public function authenticate(Request $request)
    {
    	$token = User::authenticate($request->email, $request->password);
    	if($token)
    	{
    		return $this->toJson([
	    		'status' => true,
	    		'message' => 'Logged in successfully!'
	    	]);
    	}
    	return $this->toJson([
    		'status' => false,
    		'message' => 'Invalid Username or Password!'
    	]);
    }

}