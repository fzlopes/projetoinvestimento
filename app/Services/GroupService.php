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

	public function userStore($group_id, $data)
	{
		try {
			$group   = $this->repository->find($group_id);
			$user_id = $data['user_id'];
			
			$group->users()->attach($user_id);

			return [
				'success' => true,
				'messages' => "Grupo relacionado com sucesso.",
				'data' => null,

			];
		} catch (Exception $e) {
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}

	public function update($data, $id)
	{
		try {
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
			$group = $this->repository->update($data, $id);

			return [
				'success' => true,
				'messages' => "Grupo Alterado.",
				'data' => $group,

			];
		} catch (Exception $e) {
			return [
				'success' => false,
				'messages' => $e->getMessage(),
			];
		}
	}

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
