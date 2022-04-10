@extends('layouts.main')

@section('css')

@endsection

@section('content')
<div class="row">
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info">
			<div class="inner">
				<h3>{{ $user }}</h3>

				<p>User</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>

			<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-success">
			<div class="inner">
				<h3>{{ $admin }}</h3>

				<p>Admin</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>{{ $role }}</h3>

				<p>Role</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="small-box bg-danger">
			<div class="inner">
				<h3>{{ $permission }}</h3>

				<p>Permission</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
@endsection

@section('javascript')

@endsection