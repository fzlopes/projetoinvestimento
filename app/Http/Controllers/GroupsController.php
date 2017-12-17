<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Services\GroupService;
use App\Repositories\UserRepository;
use App\Repositories\InstitutionRepository;


class GroupsController extends Controller
{

    /**
     * @var GroupRepository
     */
    protected $repository;

    /**
     * @var GroupValidator
     */
    protected $service;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var InstitutionRepository
     */
    protected $institutionRepository;

    public function __construct(GroupRepository $repository, GroupService $service, UserRepository $userRepository, InstitutionRepository $institutionRepository)
    {
        $this->repository            = $repository;
        $this->service               = $service;
        $this->userRepository        = $userRepository;
        $this->institutionRepository = $institutionRepository;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $groups        = $this->repository->all();
        $users         = $this->userRepository->selectBoxList();
        $institutions  = $this->institutionRepository->selectBoxList();

       
       return view('groups.index', compact('groups', 'users', 'institutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(GroupCreateRequest $request)
    {

       $request = $this->service->store($request->all());
       $group = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages'], 
        ]);


        return redirect()->route('group.index');
        
    }

    public function userStore(Request $request, $group_id)
    {
       $request = $this->service->userStore($group_id, $request->all());
       
        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages'], 
        ]);


        return redirect()->route('group.show', [$group_id]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = $this->repository->find($id);
        $users = $this->userRepository->selectBoxList();

        return view('groups.show', compact('group', 'users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $group = $this->repository->find($id);

        return view('groups.edit', compact('group'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  GroupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(GroupUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $group = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Group updated.',
                'data'    => $group->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = $this->service->destroy($id);
       
        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages'], 
        ]);


        return redirect()->route('group.index');
    }
}
