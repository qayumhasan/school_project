@extends('admin.master')
@push('css')
    <style>
        td {line-height: 18px;width: 20%;}
    </style>    
@endpush
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Assigned Class Teacher</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->academic_module,true)['assign_class_teacher']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Assign Class teacher</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                        <thead>
                            <tr class="text-left">
                                <th>Class</th>
                                <th>Section</th>
                                <th>Teacher</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classSections as $classSection)

                                <tr class="text-left">
                                    <td>{{ $classSection['class'] }}</td>
                                    <td>{{ $classSection['section'] }}</td>
                                    <td class="text-left">
                                        @foreach ($classSection['classTeachers'] as $teacher)
                                            <b>- {{ $teacher['name'] }}</b> <br/>
                                        @endforeach
                                    </td>

                                    <td class="text-center">
                                        <a class="edit_assigned_teacher btn btn-sm btn-blue text-white" data-id="{{ $classSection['id'] }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> 
                                        
                                        @if (json_decode($userPermits->academic_module,true)['assign_class_teacher']['delete'] == 1)
                                            | <a id="delete" href="{{ route('academic.assign.class.teacher.delete', $classSection['id']) }}" class="btn btn-danger btn-sm text-white" title="Delete">
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
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Assign Teacher To Class</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form id="assign_class_teacher_form" class="form-horizontal" action="{{ route('admin.academic.assign.class.teacher.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right"><b>Class</b> :</label>
                            <select class="form-control select_class class_id" name="class_id">
                                <option value="">Select class</option>
                                @foreach ($formClasses as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            <span class="error class_id_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right"><b>Select Section</b> :</label>
                            <select class="form-control section_id" id="sections" name="section_id">
                                <option value="">Select section</option>
                            </select>
                            <span class="error section_id_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right"><b>Select teacher</b> :</label>
                            <select class="select2" multiple="multiple" name="teachers[]" data-placeholder="Section" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                <option value="">----Select Teacher----</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->adminname }}</option>  
                                @endforeach
                            </select>
                            <span class="error teacher_ids_error"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close </button>
                        <button type="submit" class="btn loading_button btn-sm btn-blue">Loading...</button>
                        <button type="submit" class="btn submit_button btn-sm btn-blue">Submit</button>
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
                <h6 class="modal-title" id="exampleModalLabel">Update Assigned Class Teacher</h6>
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
            $('.select_class').on('change', function () {
                var classId = $(this).val();
                $.ajax({
                    url:"{{ url('admin/ajax/class/sections/') }}"+"/"+classId,
                    type:'get',
                    dataType:'json',
                    success:function(data){
                        //console.log(data);
                        $('#sections').empty();
                        $('#sections').append(' <option value="">--Select Section--</option>');
                        $.each(data,function(key, val){
                            $('#sections').append(' <option value="'+ val.section_id +'">'+ val.section.name +'</option>');
                        })
                    }
                })
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            //Initialize Select2 Elements
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.modal_close_button').on('click', function(){
                $('.error').html('');
                $('.form-control').removeClass('is-invalid');
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.edit_assigned_teacher', function(){
                var class_section_id = $(this).data('id');
                $.ajax({
                    url:"{{ url('admin/academic/assign/class/teachers/edit') }}" + "/" + class_section_id,
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#assign_class_teacher_form', function(e){
                e.preventDefault();
                $('.submit_button').hide();
				$('.loading_button').show();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){

                        if(!$.isEmptyObject(data.error)){
                            $('.submit_button').show();
						    $('.loading_button').hide();
                            toastr.error(data.error);
                        }else{
                            $('.submit_button').show();
						    $('.loading_button').hide();
                            $('.error').html('');
                            $('#assign_class_teacher_form')[0].reset();
                            $('#myModal1').modal('hide');
                            window.location = "{{ url()->current() }}";
                        }
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        $('.submit_button').show();
						$('.loading_button').hide();
                        if(err.responseJSON.errors.class_id){
                            $('.class_id_error').html('Class field is required.');
                            $('.class_id').addClass('is-invalid');
                        }else{
                            $('.class_id_error').html('');
                            $('.class_id').removeClass('is-invalid');
                        }

                        if(err.responseJSON.errors.section_id){
                            $('.section_id_error').html('Section field is required.');
                            $('.section_id').addClass('is-invalid');
                        }else{
                            $('.section_id_error').html('');
                            $('.section_id').removeClass('is-invalid');
                        }
                        
                        if(err.responseJSON.errors.teachers){
                            $('.teacher_ids_error').html('Teacher field is required.');
                            $('.teacher_ids').addClass('is-invalid');
                        }else{
                            $('.teacher_ids_error').html('');
                            $('.teacher_ids').removeClass('is-invalid');
                        }
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

			$(document).on('submit', '#edit_assign_teacher_form', function(e){
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
