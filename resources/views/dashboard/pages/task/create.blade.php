<h1>add task</h1>
<form class="row" id="TaskStore" method="post" action="{{route('task.store')}}" enctype="multipart/form-data" >  
  {{ csrf_field() }}              
  <div class="mb-3">
        <label for="status_id" class="form-label">status</label>
        <select name="status_id" id="status_id" class="form-control">
          @foreach ($all_statuses as $val)
            <option value="{{$val->id}}">{{$val->name}}</option>
          @endforeach

        </select>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="name" name="name" class="form-control" id="name" placeholder="task name">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-success" type="submit">submit</button>
    </div>
</form>


  <script type="text/javascript">
    jQuery(function ($) {
  
      $('#TaskStore').validate({
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
              var url = "{{route('task.collection')}}";
              $("#tasks_collection").load(url);
            },
            error: function(data)
            {
              alert('error try again layer');
            },
          }
        );
      }
    }); 
  });
</script> 

