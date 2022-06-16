
<div class="container" id = "tasks_collection">
  <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">status</th>
          <th scope="col">name</th>
          <th scope="col">description</th>
          <th scope="col">controller</th>
        </tr>
      </thead>
      <tbody >
        @foreach ($tasks_collection as $task)
  
          <tr>
            <th scope="row">{{$task->id}}</th>
            <td>{{$task->status->name}}</td>
            <td>{{$task->name}}</td>
            <td>{{$task->description}}</td>
            <td>
              <a class="btn btn-danger  btn-sm" >
                  <i style="font-size: 15px;" class="bi bi-trash-fill" id="delete{{$task->id}}" ></i>
              </a>
              @include('dashboard.pages.task.delete', ['task' => $task  ])

              <a class="btn btn-info     btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_show{{$task->id}}">
                  <i style="font-size: 15px;" class="bi bi-eye"></i>
              </a>
              @include('dashboard.pages.task.show', ['task' => $task  ])

              <a class="btn btn-primary  btn-sm" data-bs-toggle="modal" data-bs-target="#Modal{{$task->id}}">
                <i style="font-size: 15px;" class="bi bi-pencil-square"></i>
              </a>
              @include('dashboard.pages.task.edit', ['task' => $task , 'all_statuses' => $all_statuses ])

          </td>
          </tr>
        @endforeach
  
      </tbody>
  </table>
  
  
  
  </div>
  





























