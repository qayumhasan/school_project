@extends('admin.master')
@push('css')
    <style>
        .radio_input {padding: 2px;}
        .red_border{border: 1px solid red;}
        td {width: 20%;}
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Subjects</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->academic_module,true)['subject']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Subject</span>
                                </a>
                            @endif        
                        </div>
                    </div>
                </div>
            </div>
            <form id="multiple_delete" action="{{ route('admin.academic.subject.multiple.delete') }}" method="post">
                @csrf
                {{--  <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>  --}}
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>Subject Name</th>
                                    <th>Subject Type</th>
                                    <th>Subject Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                <tr class="text-center">
                                   
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->type == 1 ? 'Theory' : 'Practical'}}</td>
                                    <td>{{$subject->code}}</td>
                                    @if($subject->status==1)
                                        <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                        <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        
                                        @if (json_decode($userPermits->academic_module,true)['subject']['edit'] == 1)    
                                            @if($subject->status==1)
                                            <a href="{{ route('admin.academic.subject.status.update', $subject->id ) }}"
                                                class="btn btn-success btn-sm ">
                                                <i class="fas fa-thumbs-up"></i></a>
                                            @else
                                            <a href="{{ route('admin.academic.subject.status.update', $subject->id ) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                            @endif
                                            |
                                        @endif

                                        <a href="#" class="edit_subject btn btn-sm btn-blue text-white"
                                        data-id="{{ $subject->id }}" title="edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        @if (json_decode($userPermits->academic_module,true)['subject']['delete'] == 1) 
                                            | <a id="delete" href="{{ route('admin.academic.subject.delete', $subject->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h6 class="modal-title">Add Subject</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="subject_add_form" class="form-horizontal" action="{{ route('admin.academic.subject.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label"><b>Subject Name</b> :</label>
                            <input type="text" class="form-control name" value="{{ old('name') }}" placeholder="Subject Name" name="name">
                            <span class="span error name_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 is-invalid">
                            <label class="col-form-label p-0 m-0"><b>Subject Type</b> :</label><br>
                            <div class="radio_input">
                                <input type="radio" value="1" class="mr-1" name="type">  Theory &ensp;
                                <input type="radio"  value="2" class="mr-1" name="type"> Practical 
                            </div>
                            <span class="span error type_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label"><b>Subject Code </b> :</label>
                            <input type="text" class="form-control code" value="{{ old('code') }}" placeholder="Subject Code" name="code">
                            <span class="span error code_error"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close</button>
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
                <h6 class="modal-title" id="exampleModalLabel">Update Subject</h6>
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
                $('.radio_input').removeClass('red_border');
            });
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
            $(document).on('click', '.edit_subject', function(e){
                e.preventDefault();
                var subject_id = $(this).data('id');
                $.ajax({
                    url:"{{ url('admin/academic/subject/edit/') }}" + "/" + subject_id,
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

            $(document).on('submit', '#subject_add_form', function(e){
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
                        $('.submit_button').show();
				        $('.loading_button').hide();
                        $('.error').html('');
                        $('#subject_add_form')[0].reset();
                        $('#myModal1').modal('hide');
                        window.location = "{{ url()->current() }}";  
                    },
                    error:function(err){
                        $('.submit_button').show();
				        $('.loading_button').hide();
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.name){
                            $('.name_error').html(err.responseJSON.errors.name[0]);
                            $('.name').addClass('is-invalid');
                        }else{
                            $('.name_error').html('');
                            $('.name').removeClass('is-invalid');
                        }

                        if(err.responseJSON.errors.type){
                            $('.type_error').html(err.responseJSON.errors.type[0]);
                            $('.radio_input').addClass('red_border');
                        }else{
                            $('.type_error').html('');
                            $('.radio_input').removeClass('red_border');
                        } 
                        
                        if(err.responseJSON.errors.code){
                            $('.code_error').html(err.responseJSON.errors.type[0]);
                            $('.code').addClass('is-invalid');
                        }else{
                            $('.code_error').html('');
                            $('.code').removeClass('is-invalid');
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

			$(document).on('submit', '#edit_subject_form', function(e){
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
