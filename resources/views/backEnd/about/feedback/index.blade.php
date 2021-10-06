@extends('layouts.backEndMater')

@section('title', 'Index - Feedback -')

@section('content')
	<div class="content-page">
		<div class="content">

			<!-- Start Content-->
			<div class="container-fluid">

				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box">
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item active">Feedback</li>
								</ol>
							</div>
							<h4 class="page-title">Feedback</h4>
						</div>
					</div>
				</div>
				<!-- end page title -->

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h4 class="header-title mb-5">
									Feedback Index :) Click here for Create New -
									<a class="btn btn-success" href="{{ route('feedback.create') }}">Create</a>
								</h4>
								<br>
								@include('backEnd.inc.errors')

								<div class="table-responsive">
									<table class="table table-dark mb-0">
										<thead>
										<tr>
											<th>Image</th>
											<th>Name</th>
											<th>Dignity</th>
											<th>Message</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
										@foreach($feedbackIndex as $data)
											<tr>
												<td><img style="width: 90px; height: 50px;" src="{{ asset('storage/feedback/' . $data->image) }}" alt="{{ $data->name }}"></td>
												<td>{{ $data->name }}</td>
												<td>{{ $data->dignity }}</td>
												<td>{{ str_limit($data->message, 90) }}</td>
												<td>
													<a href="{{ route('feedback.edit', $data->id) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
													<form action="{{ route('feedback.destroy', $data->id) }}" method="post">
														@csrf
														@method('DELETE')
														<button class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-window-close"></i></button>
													</form>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
								<!-- end row-->

							</div> <!-- end card-body -->
						</div> <!-- end card -->
					</div><!-- end col -->
				</div>

			</div> <!-- container -->

		</div> <!-- content -->

		<!-- Footer Start -->
		<footer class="footer">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="javascript: void(0)" class="text-black-50">Coderthemes</a> & Developed by <a target="_blank" href="https://hstradinginternational.com/" class="text-black-50">Sagor Islam</a>
					</div>
					<div class="col-md-6">
						<div class="text-md-right footer-links d-none d-sm-block">
							<a href="javascript:void(0);">About Us</a>
							<a href="javascript:void(0);">Help</a>
							<a href="javascript:void(0);">Contact Us</a>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- end Footer -->
	</div>

@endsection

@push('js')

@endpush