@extends('layouts.app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Brand</h3>
	</div>
	<div class="title_right">
		<a href="user/add" class="btn btn-primary btn-sm  pull-right">Add New</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Manage Brand</h2>
				<div class="clearfix"></div>
			</div>	
			<div class="x_content">
				@if($message != "")
				<div class="alert alert-success alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>{{ $message }}</strong>
				</div>
				@endif
				@if($error != "")
				<div class="alert alert-danger alert-dismissable">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>{{ $error }}</strong>
				</div>
				@endif
				<table id="brand-table" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					
				</table>
			</div>	
		</div>
	</div>
</div>

<div class="modal fade" id="zoomImage" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Image</h4>
			</div>
			<div class="modal-body">
				<img id="get-image" src="" style="width: 100%; object-fit:contain;">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
$(function() {
    $('#brand-table').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: '{!! route('userdata') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ],
		"columnDefs": [
// 			{
//                 "targets": 2,
//                 "render": function ( data, type, row ) {
//     				return "<img src='/images/brand_image/"+row.logo+" ' height='50px' class='image' data-toggle='modal' data-target='#zoomImage' style='object-fit: contain' />";
//                 }
//             },
            {
                "targets": 4,
                "render": function ( data, type, row ) {
    				return "<a href='user/edit/"+row.id+"' style='text-decoration:underline;'> Edit </a> &nbsp; "
    						+ "<a href='user/delete/"+row.id+"' class='text-danger deleteConfirmation' style='text-decoration:underline;'> Delete </a>";
                }
            },
         ],
         "language": {
             "emptyTable": "No records found"
         }
    });

	$( "#brand-table " ).on( "click", ".deleteConfirmation", function(event) {
  		  return confirm("Are you sure you want to delete?");
	});

	$('#brand-table').on('click', '.image', function(){
		$('#get-image').attr('src', $(this).attr('src'));
	});

});
</script>


@endpush
