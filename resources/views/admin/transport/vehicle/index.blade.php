@extends('admin.master')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Vehicle List</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->transport_module, true)['vehicle']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Vehicle</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.vehicle.multiple.delete') }}" id="multiple_delete" method="post">
                @csrf
                <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <label class="chech_container mb-1 p-0">
                                            Select all
                                            <input type="checkbox" id="check_all">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Vehicle Number</th>
                                    <th>Vehicle Model</th>
                                    <th>Year Made</th>
                                    <th>Driver</th>
                                    <th>Driver Contract</th>
                                    <th>Sit Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteId[]" class="checkbox"
                                                value="{{$vehicle->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $vehicle->vehicle_number }}</td>
                                    <td>{{ $vehicle->vehicle_model }}</td>
                                    <td>{{ $vehicle->year_made }}</td>
                                    <td>{{ $vehicle->driver_id ? $vehicle->driver->adminname : 'N/A'  }}</td>
                                    <td>{{ $vehicle->driver_id ? $vehicle->driver->phone : 'N/A'  }}</td>
                                    <td>{{ $vehicle->sit_quantity }}</td>
                                    @if($vehicle->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if (json_decode($userPermits->transport_module, true)['vehicle']['edit'] == 1)
                                            @if($vehicle->status==1)
                                                <a href="{{ route('admin.vehicle.status.update', $vehicle->id) }}" class="btn btn-success btn-sm ">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.vehicle.status.update', $vehicle->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-thumbs-down"></i>
                                                </a>
                                            @endif
                                            |
                                        @endif
                                        <a data-id="{{ $vehicle->id }}" title="edit" 
                                        class="edit_vehicle btn btn-sm btn-blue text-white">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> 
                                        @if (json_decode($userPermits->transport_module, true)['vehicle']['delete'] == 1)
                                            | <a id="delete" href="{{ route('admin.vehicle.delete', $vehicle->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add Vehicle</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="add_vehicle_form" action="{{ route('admin.vehicle.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Vehicle Number :</b></label>
                            <input type="text" class="form-control" name="vehicle_number" placeholder="Vehicle Number" id="vehicle_number">
                            <span class="error error_vehicle_number"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Vehicle Model :</b></label>
                            <input type="text" class="form-control" name="vehicle_model" placeholder="Vehicle Model" id="vehicle_model">
                            <span class="error error_vehicle_model"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Made Year :</b></label>
                            <input type="text" class="form-control" name="made_year" placeholder="Made year" id="made_year">
                            <span class="error error_made_year"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Sit qunatity :</b></label>
                            <input type="number" class="form-control" placeholder="Sit quantity" name="sit_quantity" id="sit_quantity">
                            <span class="error error_sit_quantity"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close </button>
                        <button type="submit" class="btn btn-sm loading_button btn-blue">Loading...</button>
                        <button type="submit" class="btn btn-sm submit_button btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Vehicle</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">

            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('.loading_button').hide();
        @if (Session::has("successMsg"))
            toastr.success('{{ session('successMsg') }}', 'Successfull');
        @endif
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.modal_close_button').on('click', function(){
                $('.error').html('');
                $('.form-control').removeClass('is-invalid');
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#check_all').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.edit_vehicle', function(){
                var vehicle_id = $(this).data('id');
                $.ajax({
                    url:"{{ url('admin/transport/vehicles/edit/') }}" + "/" + vehicle_id,
                    type:'get',
                    success:function(data){
                        $('.edit_modal_body').empty();
                        $('.edit_modal_body').append(data);
                        $('#editModal').modal('show');
                    }
                });
            });
        });
    </script>

    <script>
		$(document).ready(function () {
			$('.loading_button').hide();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(document).on('submit', '#add_vehicle_form', function(e){
				e.preventDefault();
				var url = $(this).attr('action');
                var type = $(this).attr('method');
                var data = $(this).serialize();
				$('.submit_button').hide();
				$('.loading_button').show();
				//var form = document.querySelector('#employee_add_form');
				//var formData = new URLSearchParams(Array.from(new FormData(form))).toString();
				$.ajax({
					url:url,
					type:type,
					data:data,
					success:function(data){
						$('.form-control').removeClass('is-invalid');
						$('.error').html('');
						$('.submit_button').show();
						$('.loading_button').hide();
						$('#editModal').modal('hide');
						window.location = "{{ url()->current() }}";
					},
					error:function(err){
						$('.submit_button').show();
						$('.loading_button').hide();
						toastr.error('Please check again all form field.','Some thing want wrong.');
						$('.error').html('');
                        $('.form-control').removeClass('is-invalid');
						$.each(err.responseJSON.errors,function(key, error){
							//console.log(key);
							$('.error_'+key).html(error[0]);
							$('#'+key).addClass('is-invalid');
						});
					}
				});
			});
		});
    </script> 
    
    <script>
		$(document).ready(function () {
			$('.loading_button').hide();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(document).on('submit', '#edit_vehicle_form', function(e){
				e.preventDefault();
				var url = $(this).attr('action');
                var type = $(this).attr('method');
                var data = $(this).serialize();
				$('.submit_button').hide();
				$('.loading_button').show();
				//var form = document.querySelector('#employee_add_form');
				//var formData = new URLSearchParams(Array.from(new FormData(form))).toString();
				$.ajax({
					url:url,
					type:type,
					data:data,
					success:function(data){
						$('.form-control').removeClass('is-invalid');
						$('.error').html('');
						$('.submit_button').show();
						$('.loading_button').hide();
						$('#editModal').modal('hide');
						window.location = "{{ url()->current() }}";
					},
					error:function(err){
						$('.submit_button').show();
						$('.loading_button').hide();
						toastr.error('Please check again all form field.','Some thing want wrong.');
						$('.error').html('');
                        $('.form-control').removeClass('is-invalid');
						$.each(err.responseJSON.errors,function(key, error){
							//console.log(key);
							$('.e_error_'+key).html(error[0]);
							$('#e_'+key).addClass('is-invalid');
						});
					}
				});
			});
		});
	</script> 
@endpush
