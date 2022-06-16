<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskInsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              =>  [ 'required' ,'max:50'] ,
            'description'       =>  [ 'required' ] ,
            'status_id'         =>  [ 'required' ,'exists:statuses,id'] ,
        ];
    }
}
