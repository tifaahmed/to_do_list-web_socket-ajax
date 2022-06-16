<?php

namespace App\Http\Controllers\Web\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Interfaces
use App\Repository\TaskRepositoryInterface as MainInterface;
use App\Repository\StatusRepositoryInterface as StatusInterface;

// Request
use App\Http\Requests\Task\TaskInsertRequest as InsertRequest;
use App\Http\Requests\Task\TaskIUpdateRequest as UpdateRequest;

// event
use App\Events\ToDoListEvent ;


class TaskController extends Controller
{
    private $Repository;
    public function __construct(MainInterface $MainRepository,StatusInterface $StatusRepository)
    {
        $this->MainRepository = $MainRepository;
        $this->StatusRepository = $StatusRepository;
    }

    public function all(){
        $tasks_collection   =  $this->MainRepository->all()   ;
        $all_statuses       =  $this->StatusRepository->all() ;
        return view('dashboard.pages.task.index',compact('all_statuses','tasks_collection'));
    }

    public function store(InsertRequest $request) {
        $this->MainRepository->create( Request()->all() );
        return event(new ToDoListEvent());
    } 

    public function update(UpdateRequest $request ,$id) {
        $this->MainRepository->update( $id,Request()->all() ) ;
        return event(new ToDoListEvent());
    }

    public function destroy($id) {
        try {
            $this->MainRepository->deleteById($id);
            return event(new ToDoListEvent());
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }


    public function collection(){
        $tasks_collection   =  $this->MainRepository->all()   ;
        $all_statuses       =  $this->StatusRepository->all() ;
        return view('dashboard.pages.task.all',compact('all_statuses','tasks_collection'));
    }
}
