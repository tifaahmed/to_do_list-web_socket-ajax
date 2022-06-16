<!-- Modal -->
<div class="modal fade" id="Modal_show{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal show</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card"  >
                <div class="card-body">
                    <p> <b>id :             </b> {{$task->id}} </p> 
                </div>
            </div> <br>
            <div class="card"  >
                <div class="card-body">
                    <p> <b>status :         </b> {{$task->status->name}} </p> 
                </div>
            </div> <br>
            <div class="card"  >
                <div class="card-body">
                    <p> <b>name :           </b> {{$task->name}} </p> 
                </div>
            </div> <br>
            <div class="card"  >
                <div class="card-body">
                    <p> <b>description :    </b> {{$task->description}} </p> 
                </div>
            </div>

        </div>
        
      </div>
    </div>
  </div>