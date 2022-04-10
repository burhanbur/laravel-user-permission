@extends('layouts.main')

@section('content')
<style>
  .modal-xl {
    max-width: 1240px;
  }
</style>

<div class="container-fluid">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <form method="POST" action="{{ route('update.role', $data->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body"> 
          	
	          <label>Role</label>
	          <div class="form-group">
	            <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
	          </div>

	          <label>Guard</label>
	          <div class="form-group">
	            <input type="text" name="guard_name" class="form-control" value="{{ $data->guard_name }}" required>
	          </div>

            <label>Permission</label>
            <div class="form-group">
              @foreach($permissions as $permission)
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" @if (in_array($permission->id, $myPermission)) checked @endif> {{ $permission->name }}
              @endforeach
            </div>
            
          </div>

          <div class="card-footer">
            <div class="form-group" style="float: right;">
              <button class="btn btn-primary" type="submit">Submit</button>
              <button class="btn btn-default" type="button" data-dismiss="modal">Back</button>
            </div>
          </div>
        </form>
      </div>

    </div>

  </div>

</div>

<script>  
      //Initialize Select2 Elements
      $('.select2').select2({
        theme: 'bootstrap4'
      });
</script>
@endsection