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
use App\Entities\Moviment;
use Auth;

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
        $user = Auth::user();
        
        $groups     = $user->groups->pluck('name','id');
        $products   = Product::all()->pluck('name', 'id');
        
        return view('moviments.application', compact('groups', 'products'));
    }

    public function storeApplication(Request $request)
    {
        $moviment = Moviment::create([
            'user_id'    => Auth::user()->id,
            'group_id'   => $request->get('group_id'),
            'product_id' => $request->get('product_id'),
            'value'      => $request->get('value'),
            'type'       => 1
        ]);

       
        session()->flash('success', [
                'success' => true,
                'messages' => "Sua aplicação de " . $moviment->value . "no produto " . $moviment->product()->name . " foi realizada com sucesso"

        ]);

        return redirect()->route('moviment.application');
    }
   
}
