<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MovimentCreateRequest;
use App\Http\Requests\MovimentUpdateRequest;
use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
use App\Entities\Group;
use App\Entities\Product;

class MovimentsController extends Controller
{

    /**
     * @var MovimentRepository
     */
    protected $repository;

    /**
     * @var MovimentValidator
     */
    protected $validator;

    public function __construct(MovimentRepository $repository, MovimentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function application()
    {
        $groups     = Group::all()->pluck('name', 'id');
        $products   = Product::all()->pluck('name', 'id');
        
        return view('moviments.application', compact('groups', 'products'));
    }
   
}
