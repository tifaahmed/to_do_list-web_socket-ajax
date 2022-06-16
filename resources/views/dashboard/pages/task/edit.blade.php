<!-- Modal -->
<div class="modal fade" id="Modal{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row" id="TaskUpdate{{$task->id}}" method="post" action="{{route('task.update' , $task->id)}}" enctype="multipart/form-data" >  
        {{ csrf_field() }}              
        <div class="mb-3">
                <label for="status_id" class="form-label">status</label>
                <select name="status_id" id="status_id" class="form-control">
                @foreach ($all_statuses as $status)
                    <option value="{{$status->id}}"  {{($status->id ==  $task->status_id)  ?  'selected' : ''}} >{{$status->name}}</option>
                @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="name{{$task->id}}" class="form-label">name</label>
                <input type="name" name="name" class="form-control" id="name{{$task->id}}" placeholder="task name" value="{{$task->name}}">
            </div>
            <div class="mb-3">
                <label for="description{{$task->id}}" class="form-label">description</label>
                <textarea class="form-control" name="description" id="description{{$task->id}}" rows="3">
                    {{$task->description}}
                </textarea>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-success" type="submit">submit</button>
            </div>
        </form>


        <script type="text/javascript">
            jQuery(function ($) {
        
            $('#TaskUpdate{{$task->id}}').validate({
                rules: {
                name:    {required: true, maxlength: 50},   
                status_id:    {required: true},   
                description:    {required: true},   
            },
            submitHandler: function (form, e) {
                e.preventDefault();
                var form = $(form);
                var dataString = form.serialize();
                $.ajax(
                {
                    type: "POST",
                    url: form.attr('action'),
                    data: dataString,
                    dataType: "text",
                    success: function(data)
                    {
                        $("#Modal{{$task->id}}").modal('toggle');
                        var url = "{{route('task.collection')}}";
                        $("#tasks_collection").load(url);
                    },
                    error: function(data)
                    {
                        alert('error try again later');
                    },
                }
                );
            }
            }); 
        });
        </script> 


      </div>

    </div>
  </div>
</div>