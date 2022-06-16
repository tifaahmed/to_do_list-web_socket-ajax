<script>
    $("#delete{{$task->id}}").click(function(){
        $.ajax({
            type: 'delete',
            url: "{{route('task.destroy' , $task->id)}}",
            data: {
            "_token": "{{ csrf_token() }}",
            },
            dataType: "text",
            success: function(data)
            {
                var url = "{{route('task.collection')}}";
                $("#tasks_collection").load(url);
            },
            error: function(data)
            {
                alert('error try again later');
            },
        
        });

    });
</script>