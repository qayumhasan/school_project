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

                                    <td>

                                        <button type="button" class="btn btn-info viewmodal" data-toggle="modal" data-target="#viewwmodal" data-whatever="{{$row}}"><i class="fas fa-eye"></i></button>
                                        |
                                        <button type="button" class="btn btn-primary editmodal" data-toggle="modal" data-target="#editwmodal" data-whatever="{{$row}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>

                                        | <a id="delete" href="{{ route('admin.admission.enquiry.delete', $row->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>

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


<!-- insert modal start -->
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
<!-- insert modal end -->




<!-- update modal start -->
<div class="modal fade" id="editwmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Admission Enquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">
                <form id="update_admission_enquiry" action="{{route('admin.admission.enquiry.update')}}" method="post">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Name <small class="text-danger">*</small> </b></label>
                            <input type="hidden" id="update_id" class="form-control" required value="" name="id">
                            <input type="text" id="update_name" class="form-control" required value="" name="name">
                            <span class="error_edit name_error_edit"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Phone <small class="text-danger">*</small> </b></label>
                            <input type="text" id="update_phone" class="form-control" required value="" name="phone">
                            <span class="error_edit phone_error_edit"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Email</b></label>
                            <input type="text" id="update_email" class="form-control" value="" name="email">
                            <span class="error_edit"></span>
                        </div>
                    </div>

                    <div class="form-group row">


                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Address</b></label>
                            <textarea class="form-control" id="update_address" name="address" rows="3"></textarea>
                            <span class="error_edit"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Description</b></label>
                            <textarea class="form-control" id="update_description" name="description" rows="3"></textarea>
                            <span class="error_edit"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Note</b></label>
                            <textarea class="form-control" id="update_note" name="note" rows="3"></textarea>
                            <span class="error_edit"></span>
                        </div>

                    </div>


                    <div class="form-group row">


                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Date </b>: </label>
                            <input readonly type="text" id="update_date" placeholder="dd-mm-yyyy" autocomplete="off" class="form-control datepicker" name="date">
                            <span class="error_edit"></span>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Next Date </b>: </label>
                            <input readonly type="text" id="update_next_date" placeholder="dd-mm-yyyy" autocomplete="off" class="form-control datepicker" name="next_date">
                            <span class="error_edit"></span>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label p-0 m-0"><b>Assigned </b>: </label>
                            <input type="text" autocomplete="off" id="update_assigned" class="form-control" name="assigned">
                            <span class="error_edit"></span>
                        </div>


                    </div>


                    <div class="form-group row">


                        <div class="col-sm-3">
                            <label class="col-form-label p-0 m-0"><b>Reference </b>: </label>
                            <select id="update_reference" name="reference" class="form-control">
                                <option disabled selected>Select</option>
                                <option value="Staff">Staff</option>
                                <option value="Parent">Parent</option>
                                <option value="Student">Student</option>
                                <option value="Lower Wing">Lower Wing</option>
                                <option value="Partner School">Partner School</option>
                                <option value="Self">Self</option>
                            </select>
                            <span class="error_edit"></span>
                        </div>

                        <div class="col-sm-3">
                            <label class="col-form-label p-0 m-0"><b>Source <small class="text-danger">*</small></b>: </label>
                            <select id="update_source" required name="source" class="form-control source">
                                <option disabled selected>Select</option>
                                <option value="Front Office">Front Office</option>
                                <option value="Advertisement">Advertisement</option>
                                <option value="Online Front Site">Online Front Site</option>
                                <option value="Google Ads">Google Ads</option>
                                <option value="Admission Campaign">Admission Campaign</option>

                            </select>
                            <span class="error_edit error_edit_source"></span>
                        </div>

                        <div class="col-sm-3">
                            <label class="col-form-label p-0 m-0"><b>Class <small class="text-danger">*</small></b>: </label>
                            <select id="update_class" required name="class" class="form-control">
                                <option disabled selected>Select</option>
                                <option value="Front Office">Front Office</option>
                                <option value="Advertisement">Advertisement</option>
                                <option value="Online Front Site">Online Front Site</option>
                                <option value="Google Ads">Google Ads</option>
                                <option value="Admission Campaign">Admission Campaign</option>

                            </select>
                            <span class="error_edit error_edit_class"></span>
                        </div>

                        <div class="col-sm-3">
                            <label class="col-form-label p-0 m-0"><b>Number Of Child <small class="text-danger">*</small> </b>: </label>
                            <input type="number" id="update_no_of_child" autocomplete="off" class="form-control no_of_child" name="no_of_child">
                            <span class="error_edit error_edit_no_of_child"></span>
                        </div>



                    </div>



                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="button" id="edit_submit_loading" class="btn btn-sm btn-blue ">Loading...</button>

                        <button type="submit" class="btn btn-sm btn-blue submit_button">Update</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- update modal end -->

<!-- follow up date -->

<div class="modal fade" id="viewwmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Follow Up Admission Enquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <form method="post" action="{{route('admin.admission.enquiry.update')}}">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="staticEmail">Follow Up Date <small class="text-danger">*</small></label>
                                        <input type="text" id="follow_up_update" required name="follow_date" class="datepicker form-control form-control-sm" value="{{  date('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                                        <input type="hidden" name="id" value="" id="view_id">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Next Follow Up Date <small class="text-danger">*</small></label>
                                        <input type="text" required name="next_date" class="datepicker form-control form-control-sm" value="{{  date('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label>Response <small class="text-danger">*</small></label>
                                        <textarea name="response" required class="form-control"></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Note <small class="text-danger">*</small></label>
                                        <textarea name="note" required class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <label>Status <small class="text-danger">*</small></label>
                                        <select  class="form-control" name="status" required>
                                            

                                            <option value="active">Active</option>

                                            <option value="passive">Passive</option>

                                            <option value="dead">Dead</option>

                                            <option value="won">Won</option>

                                            <option value="lost">Lost</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6 ml-auto">
                            <div class="bg-primary">
                                <div class="summary_title text-center p-3 text-light">
                                    <h6>Summary</h6>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <b class="d-inline">Created By:</b>
                                        <span class="text-right d-inline mr-auto" style="float: right;" id="createdby"></span>
                                    </li>

                                    <li class="list-group-item">
                                        <b class="d-inline">Phone:</b>
                                        <span class="text-right d-inline mr-auto" style="float: right;" id="view_phone"> </span>
                                    </li>

                                    <li class="list-group-item">
                                        <b class="d-inline">Address:</b>
                                        <span class="text-right d-inline mr-auto" style="float: right;" id="view_address"> </span>
                                    </li>

                                    <li class="list-group-item">
                                        <b class="d-inline">Reference:</b>
                                        <span class="text-right d-inline mr-auto" style="float: right;" id="view_reference"> </span>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="d-inline">Class:</b>
                                        <span class="text-right d-inline mr-auto" style="float: right;" id="view_class"> </span>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="d-inline">No of child:</b>
                                        <span class="text-right d-inline mr-auto" style="float: right;" id="view_no_of_child"> </span>
                                    </li>
                                    
                                    
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@push('js')


<!-- show modal -->
<script>
    $(document).ready(function() {
        $(".viewmodal").click(function() {

            var modal = $(this)
            var data = modal.data('whatever');
            console.log(data)
            document.getElementById('view_id').value = data.id;
            document.getElementById('createdby').innerHTML = data.assigned;
            document.getElementById('view_phone').innerHTML = data.phone;
            
            document.getElementById('view_address').innerHTML = data.email;
            // document.getElementById('update_address').value = data.address;
            // document.getElementById('update_description').value = data.description;
            // document.getElementById('update_note').value = data.note;
            // document.getElementById('update_date').value = data.date;
            // document.getElementById('update_next_date').value = data.next_date;
            // document.getElementById('update_assigned').value = data.assigned;
            document.getElementById('view_reference').innerHTML = data.ref;
            document.getElementById('view_class').innerHTML = data.class;
            // document.getElementById('update_source').value = data.source;
            // document.getElementById('update_class').value = data.class;
            document.getElementById('view_no_of_child').innerHTML = data.no_of_child;
            document.getElementById('follow_up_update').value = data.next_date;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#submit_loading').hide();
        $('#edit_submit_loading').hide();

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
                    console.log(data);

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


<!-- update  -->

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('submit', '#update_admission_enquiry', function(e) {

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

<script>
    $(document).ready(function() {
        $(".editmodal").click(function() {

            var modal = $(this)
            var data = modal.data('whatever');

            document.getElementById('update_id').value = data.id;
            document.getElementById('update_name').value = data.name;
            document.getElementById('update_phone').value = data.phone;
            document.getElementById('update_email').value = data.email;
            document.getElementById('update_address').value = data.address;
            document.getElementById('update_description').value = data.description;
            document.getElementById('update_note').value = data.note;
            document.getElementById('update_date').value = data.date;
            document.getElementById('update_next_date').value = data.next_date;
            document.getElementById('update_assigned').value = data.assigned;
            document.getElementById('update_reference').value = data.ref;
            document.getElementById('update_source').value = data.source;
            document.getElementById('update_class').value = data.class;
            document.getElementById('update_no_of_child').value = data.no_of_child;


        });
    });
</script>




@endpush