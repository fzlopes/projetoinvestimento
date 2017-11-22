<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Auth;
use Exception;

class DashboardController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var UserValidator
     */
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
    	echo "Estamos na index(dashboard.)";
    }

    public function auth(Request $request)
    {
        $data = [
          'email'    => $request->get('email'),
          'password' => $request->get('password')
        ];

        try
        {

        if (env('PASSWORD_HASH'))
        {
        	Auth::attempt($data, false);
        }
        else
        {
        	$user = $this->repository->findWhere(['email' => $request->get('email')])->first();
        	
        	if(!$user)
        		throw new Exception("O e-mail informado é inválido");

        	if($user->password != $request->get('password'))
        		throw new Exception("A senha informada é inválida");


        	Auth::login($user);
        		
        }

    	   		
    		return redirect()->route('user.dashboard');
    	}

    	catch(Exception $e)
    	{
    		return $e->getMessage();
    	}

    }
}
