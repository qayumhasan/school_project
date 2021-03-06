@extends('admin.master')
@section('content')
@php
date_default_timezone_set('Asia/Dhaka');
@endphp
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">

            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel_header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel_title">
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                    <span>Select Criteria For Exam Attendance</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" action="{{ route('admin.attendance.exam.attendance.search') }}"
                            method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="p-0 m-0"><b>Exam Name :</b></label>
                                    <select required name="exam_id" id="exams" class="form-control form-control-sm">
                                        <option value="">Select Exam Name</option>
                                        @foreach ($exams as $exam)
                                           <option value="{{ $exam->id }}">{{ $exam->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="p-0 m-0"><b>Class :</b></label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">--- Select Class ---</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="p-0 m-0"><b>Section :</b></label>
                                    <select required name="section_id" id="sections"
                                        class="form-control form-control-sm select_section section_id">
                                        <option value="">--- Select section ---</option>
                                    </select>
                                    <small class="text-danger is_subjects"> </small>
                                </div>
                                
                                <div class="col-md-3">
                                    <label class="p-0 m-0"><b>Subject :</b> </label>
                                    <select required name="subject_id" id="subjects"
                                        class="form-control form-control-sm select_subject subject_id">
                                        <option value="">--- Select subject ---</option>
                                    </select>
                                </div>
 
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>

                    <div class="panel_body table_body mt-3">
                        
                        <div class="loading"><h4>Loading...</h4> </div>
                        <div class="table_area">
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@push('js')
    <script type="text/javascript">
        $('.loading').hide();
        $('.table_body').hide();
        $(document).ready(function () {
            $('.select_class').on('change', function () {
                var classId = $(this).val();
                $.ajax({
                    url: "{{ url('admin/ajax/class/sections/') }}" + "/" + classId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        $('#sections').empty();
                        $('#sections').append(' <option value="">--Select Section--</option>');
                        $.each(data, function (key, val) {
                            $('#sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                        })
                    }
                })
            })
        });

    </script> 

    <script type="text/javascript">
        
        $(document).ready(function () {
            $('.select_section').on('change', function () {
                var classId = $('.class_id').val();
                var sectionId = $(this).val();
                $.ajax({
                    url: "{{ url('admin/attendance/exam/attendance/get/subjects/by/class/section/id/') }}" + "/" + classId + "/" + sectionId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        $('#subjects').empty();
                        $('#subjects').append(' <option value="">--Select Section--</option>');
                        $.each(data, function (key, val) {
                            $('#subjects').append(' <option value="' + val.subject_id + '">' + val.subject.name + '</option>');
                        })
                    }
                })
            })
        });

    </script>

    <script>
      
        $(document).ready(function () {

            $('.search_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
    
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                            
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
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
    
            $(document).on('submit', '.exam_attendance_from', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: type,
                    data: request,
                    success: function (data) {
                        if (!$.isEmptyObject(data.successMsg)) {
                            toastr.success(data.successMsg);
                            $('.table_area').empty(); 
                            $('.table_area').html('<span class="alert alert-success mt-3 float-left w-100 d-block">' + data.successMsg + '</span>'); 
                        }else{
                            toastr.error(data.errorMsg); 
                        }
                    }
                })
            });
        }) 
        
    </script>



@endpush