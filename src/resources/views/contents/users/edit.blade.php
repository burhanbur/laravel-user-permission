@extends('layouts.main')

@section('content')

<style>
  .modal-xl {
    max-width: 1240px;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">

      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 src="
                   {{ asset('assets/images/contents/default.jpg') }}
                 "
                 alt="User profile picture">
          </div>
          <br>
          <h3 class="profile-username text-center" style="font-size: 16px;"><strong>{{ $data->name }}</strong></h3>
          <p class="text-muted text-center">{{ $data->email }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-9">
      <div class="card">
        <form method="POST" action="{{ route('update.user', $data->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body"> 

	          <label>Name</label>
	          <div class="form-group">
	            <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
	          </div>

	          <label>Email</label>
	          <div class="form-group">
	            <input type="email" name="email" class="form-control" value="{{ $data->email }}" required>
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