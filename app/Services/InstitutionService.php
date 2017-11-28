<?php 

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\InstitutionRepository;
use App\Validators\InstitutionValidator;
use Exception;

class InstitutionService
{
	private $repository;
	private $validator;


	public function __construct(InstitutionRepository $repository, InstitutionValidator $validator)
	{
		$this->repository = $repository;
		$this->validator  = $validator;
	}

	public function store($data)
	{
		try 
		{
			$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
			$institution = $this->repository->create($data);

			return [
				'success'  => true,
				'messages' => "Instituição cadastrada.",
				'data'     => $institution,

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
				'messages' => "Instituição removida.",
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
