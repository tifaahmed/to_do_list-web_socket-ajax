<?php

namespace App\Repository\Eloquent;

use App\Models\Task as ModelName;
use App\Repository\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{

	/**
	 * @var Model
	 */
	protected $model;

	/**
	 * BaseRepository  constructor
	 * @param  Model $model
	 */
	public function __construct(ModelName $model)
	{
		$this->model =  $model;
	}




	
}

