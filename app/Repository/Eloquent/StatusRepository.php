<?php

namespace App\Repository\Eloquent;

use App\Models\Status as ModelName;
use App\Repository\StatusRepositoryInterface;

class StatusRepository extends BaseRepository implements StatusRepositoryInterface
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

