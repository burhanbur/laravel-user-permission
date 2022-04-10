@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<style>
  .center {
    text-align: center;
  }
</style>
@endsection

@section('content')
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="modalMdTitle"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="modalError"></div>
              <div id="modalMdContent"></div>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="modalCreateTitle"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="modalError"></div>
              <div id="modalCreateContent"></div>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="modalEditTitle"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <div class="modalError"></div>
              <div id="modalEditContent"></div>
          </div>
      </div>
  </div>
</div>

<div class="row">
	<div class="col-md-12">
      <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">ALL ROLES</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          	<div style="padding-bottom: 15px">
		      	<a href="#" value="{{ route('create.role') }}" title="Add Role" class="btn btn-success modalCreate" data-target="#modalCreate" data-toggle="modal"><i class="fas fa-user-plus"></i> &nbsp;Add Role</a>
          	</div>

            <table id="table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 5%" class="center">No</th>
                  <th class="center">Role</th>
                  <th class="center">Guard</th>
                  <th class="center"></th>
                </tr>
              </thead>
              <tbody>
              	@php $no = 1 @endphp
              	@foreach($data as $row)
              	<tr>
              		<td class="center">{{ $no++ }}</td>
              		<td>{{ $row->name }}</td>
              		<td>{{ $row->guard_name }}</td>
              		<td class="center">
                    	<a href="#" value="{{ route('edit.role', $row->id) }}" class="btn btn-info btn-xs modalEdit" title="Edit Role" data-toggle="modal" data-target="#modalEdit"><span class="fas fa-pencil-alt"></span></a>
                    	<form style="display: inline;" method="POST" action="{{ route('delete.role', $row->id) }}">
                    		@csrf
                    		@method('DELETE')
                    		<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete this data?'">
                    			<span class="fa fa-trash"></span>
                    		</button>
                    	</form>
              		</td>
              	</tr>
              	@endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
  <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#table').DataTable();
  });

  $('.modalMd').off('click').on('click', function () {
      $('#modalMd').modal({backdrop: 'static', keyboard: false}) 
      
        $('#modalMdContent').load($(this).attr('value'));
        $('#modalMdTitle').html($(this).attr('title'));

    });

    $('.modalCreate').off('click').on('click', function () {
      $('#modalCreate').modal({backdrop: 'static', keyboard: false}) 
      
        $('#modalCreateContent').load($(this).attr('value'));
        $('#modalCreateTitle').html($(this).attr('title'));

    });

    $('.modalEdit').off('click').on('click', function () {
      $('#modalEdit').modal({backdrop: 'static', keyboard: false}) 
      
        $('#modalEditContent').load($(this).attr('value'));
        $('#modalEditTitle').html($(this).attr('title'));

    });
  </script>
@endsection