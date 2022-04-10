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
        <form method="POST" action="{{ route('store.user') }}" enctype="multipart/form-data">
          @csrf
          <div class="card-body"> 
          	
	          <label>Name</label>
	          <div class="form-group">
	            <input type="text" name="name" class="form-control" required>
	          </div>

	          <label>Email</label>
	          <div class="form-group">
	            <input type="email" name="email" class="form-control" required>
	          </div>

	          <label>Password</label>
	          <div class="form-group">
	            <input type="password" name="password" class="form-control" required>
	          </div>

	          <label>Password Confirmation</label>
	          <div class="form-group">
	            <input type="password" name="password_confirmation" class="form-control" required>
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