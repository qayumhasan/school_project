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
                                    <span>Select Criteria for Admission Enquiry</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-plus"></i> Add Enquiry</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" onsubmit="event.preventDefault();searchAdmissionEnquiry(this);" action="{{ route('admin.admission.enquiry.search') }}" method="get">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="m-0 p-0"><b>Date :</b> </label>
                                    <input type="text" required name="date" class="datepicker form-control form-control-sm" value="{{  date('d-m-Y') }}" data-date-format="dd-mm-yyyy">

                                </div>

                                <div class="col-md-6">
                                    <label class="m-0 p-0"><b>Source :</b> </label>
                                    <select id="source" name="source" class="form-control source_search">
                                        <option selected disabled>Select</option>
                                        <option value="Front Office">Front Office</option>
                                        <option value="Advertisement">Advertisement</option>
                                        <option value="Online Front Site">Online Front Site</option>
                                        <option value="Google Ads">Google Ads</option>
                                        <option value="Admission Campaign">Admission Campaign</option>
                                    </select>
                                    <span class="error error_source_search"></span>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>


                    <div style="display:none;" class="panel_body table_body mt-3">

                        <div style="display:none;" class="loading">
                            <h4>Loading...</h4>
                        </div>
                        <div class="table_area">

                        </div>


                    </div>


                    @if(count($enquiry) > 0)
                    <div class="panel_body table_body mt-3" id="table_data">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div class="message_area">
                    <span class="alert alert-primary d-block">Attendance has been taken in this date. Now you can edit these.</span>
                </div> -->

                                <div class="heading_area">
                                    <h6 class="text-left text-dark"><b>Admission Enquiry</b></h6>
                                    <hr class="p-0 m-0 mb-3">
                                </div>
                            </div>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Source</th>
                                    <th scope="col">Enquiry Date</th>
                                    <th scope="col">Next Follow Up Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($enquiry as $row)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->source}}</td>
                                    <td>{{$row->date}}</td>
                                    <td>{{$row->next_date}}</td>
                                    <td>{{$row->next_date}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    @else

                    <table class="table table-striped">

                        <tbody>

                            <tr class="text-center">
                                <th>No data available in table</th>
                            </tr>

                        </tbody>
                    </table>

                    @endif
                </div>
            </div>
        </div>
    </section>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Admission Enquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
                <form id="add_admission_enquiry" action="{{route('admin.admission.enquiry.create')}}" method="post">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Name <small class="text-danger">*</small> </b></label>
                            <input type="text" class="form-control" required value="" name="name">
                            <span class="error name_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Phone <small class="text-danger">*</small> </b></label>
                            <input type="text" class="form-control" required value="" name="phone">
                            <span class="error phone_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Email</b></label>
                            <input type="text" class="form-control" value="" name="email">
                            <span class="error"></span>
                        </div>
                    </div>

                    <div class="form-group row">


                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Address</b></label>
                            <textarea class="form-control" name="address" rows="3"></textarea>
                            <span class="error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Description</b></label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                            <span class="error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Note</b></label>
                            <textarea class="form-control" name="note" rows="3"></textarea>
                            <span class="error"></span>
                        </div>

                    </div>


                    <div class="form-group row">


                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Date </b>: </label>
                            <input readonly type="text" placeholder="dd-mm-yyyy" autocomplete="off" class="form-control datepicker" name="date">
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Next Date </b>: </label>
                            <input readonly type="text" placeholder="dd-mm-yyyy" autocomplete="off" class="form-control datepicker" name="next_date">
                            <span class="error"></span>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Assigned </b>: </label>
                            <input type="text" autocomplete="off" class="form-control" name="assigned">
                            <span class="error"></span>
                        </div>


                    </div>


                    <div class="form-group row">


                        <div class="col-sm-3">
                            <label class="col-form-label p-0 m-0"><b>Reference </b>: </label>
                            <select name="reference" class="form-control">
                                <option disabled selected>Select</option>
                                <option value="Staff">Staff</option>
                                <option value="Parent">Parent</option>
                                <option value="Student">Student</option>
                                <option value="Lower Wing">Lower Wing</option>
                                <option value="Partner School">Partner School</option>
                                <option value="Self">Self</option>
                            </select>
                            <span class="error"></span>
                        </div>

                        <div class="col-sm-3">
                            <label class="col-form-label p-0 m-0"><b>Source <small class="text-danger">*</small></b>: </label>
                            <select required name="source" class="form-control source">
                                <option disabled selected>Select</option>
                                <option value="Front Office">Front Office</option>
                                <option value="Advertisement">Advertisement</option>
                                <option value="Online Front Site">Online Front Site</option>
                                <option value="Google Ads">Google Ads</option>
                                <option value="Admission Campaign">Admission Campaign</option>

                            </select>
                            <span class="error error_source"></span>
                        </div>

                        <div class="col-sm-3">
                            <label class="col-form-label p-0 m-0"><b>Class <small class="text-danger">*</small></b>: </label>
                            <select required name="class" class="form-control">
                                <option disabled selected>Select</option>
                                <option value="Front Office">Front Office</option>
                                <option value="Advertisement">Advertisement</option>
                                <option value="Online Front Site">Online Front Site</option>
                                <option value="Google Ads">Google Ads</option>
                                <option value="Admission Campaign">Admission Campaign</option>

                            </select>
                            <span class="error error_class"></span>
                        </div>

                        <div class="col-sm-3">
                            <label class="col-form-label p-0 m-0"><b>Number Of Child <small class="text-danger">*</small> </b>: </label>
                            <input type="number" autocomplete="off" class="form-control no_of_child" name="no_of_child">
                            <span class="error error_no_of_child"></span>
                        </div>



                    </div>



                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="button" id="submit_loading" class="btn btn-sm btn-blue ">Loading...</button>

                        <button type="submit" class="btn btn-sm btn-blue submit_button">Submit</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
@push('js')

<script type="text/javascript">
    $(document).ready(function() {

        $('#submit_loading').hide();

    });
</script>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('submit', '#add_admission_enquiry', function(e) {

            e.preventDefault();

            var url = $(this).attr('action');
            var type = $(this).attr('method');
            $('.submit_button').hide();
            $('#submit_loading').show();
            $.ajax({
                url: url,
                type: type,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);

                    $('.error').html('');
                    $('#add_admission_enquiry')[0].reset();
                    $('#submit_loading').hide();
                    
                    $('.submit_button').show();
                    $('#exampleModal').modal('hide');

                    toastr.success(data.successMsg);
                    setInterval(function() {
                        window.location = "{{ url()->current() }}";
                    }, 700);

                },

                error: function(err) {
                    // console.log(err.responseJSON.errors.no_of_child);

                    if (err.responseJSON.errors.no_of_child) {
                        $('.error_no_of_child').html(err.responseJSON.errors.no_of_child[0]);
                        $('.no_of_child').addClass('is-invalid');
                    } else {
                        $('.error_no_of_child').html('');
                        $('.no_of_child').removeClass('is-invalid');
                    }
                    if (err.responseJSON.errors.source) {
                        $('.error_source').html(err.responseJSON.errors.source[0]);
                        $('.source').addClass('is-invalid');
                    } else {
                        $('.error_source').html('');
                        $('.source').removeClass('is-invalid');
                    }
                    if (err.responseJSON.errors.class) {
                        $('.error_class').html(err.responseJSON.errors.class[0]);
                        $('.class_area').addClass('is-invalid');
                    } else {
                        $('.error_class').html('');
                        $('.class_area').removeClass('is-invalid');
                    }


                    $('#submit_loading').hide();
                    $('.submit_button').show();
                }
            });
        });
    });
</script>


<script>
    function searchAdmissionEnquiry(data) {


        $('.table_area').empty();
        $('.table_body').show();
        $('.loading').show(100);
        var url = $(data).attr('action');
        var type = $(data).attr('method');
        var request = $(data).serialize();
        $.ajax({
            url: url,
            type: type,
            data: request,
            success: function(data) {
                console.log(data);

                if (!$.isEmptyObject(data)) {
                    $('.table_area').html(data);
                    $('.loading').hide(100);
                    $('#table_data').hide();
                }

            },
            error: function(err) {
                // console.log(err.responseJSON.errors);

                $('.loading').hide(100);
                if (err.responseJSON.errors.source) {
                    $('.error_source_search').html(err.responseJSON.errors.source[0]);
                    $('.source_search').addClass('is-invalid');
                } else {
                    $('.error_source_search').html('');
                    $('.source_search').removeClass('is-invalid');
                }



                $('#submit_loading').hide();
                $('.submit_button').show();
            }
        })
    }
</script>




<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    })
</script>

@endpush