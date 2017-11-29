<?php 

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Exception;

class GroupService
{
	private $repository;
	private $validator;


	public function __construct(GroupRepository $repository, GroupValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function store($data)
	{
		try 
		{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$group = $this->repository->create($data);

			return [
				'success'  => true,
				'messages' => "Grupo cadastrado.",
				'data'     => $group,

			];
		}
		catch(Exception $e)
		{
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}

	public function update(){}

	public function destroy($id)
	{
		try 
		{
			$this->repository->delete($id);

			return [
				'success' => true,
				'messages' => "Grupo removido.",
				'data'    => null,

			];
		}
		catch(Exception $e)
		{
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}
}
