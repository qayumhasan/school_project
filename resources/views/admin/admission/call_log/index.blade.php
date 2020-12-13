@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Phone Call Log</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Phone Call Log</span></a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('admin.call.log.multi.delete')}}" method="post">
            @csrf
            <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> Delete all</button>
            <div class="panel_body">

                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr>
                                <th>
                                    <label class="chech_container mb-1 p-0">
                                        Select all
                                        <input type="checkbox" id="check_all">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                            
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Next Follow Up Date</th>
                                <th>Call Type</th>
                              
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($logs as $row)
                            <tr>
                                <td>
                                    <label class="chech_container mb-4">
                                        <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$row->id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>{{$row->name}}</td>
                                
                                <td>{{$row->phone}}</td>
                                <td>{{$row->date}}</td>
                                <td>{{$row->next_date}}</td>
                                <td>{{$row->call_type}}</td>
                              
                                



                                <td>

                                
                                    @if($row->status == 1)
                                    <a href="{{ route('admin.call.log.status', $row->id) }}" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>

                                    @else
                                    <a href="{{ route('admin.call.log.status', $row->id ) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif

                                </td>

                                <td>
                                <a class="view_route btn btn-sm btn-blue text-white" data-action="{{route('admin.call.log.view',$row->id)}}" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#viewmodal"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                    | <a class="edit_route btn btn-sm btn-blue text-white" data-action="{{route('admin.call.log.edit',$row->id)}}" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" href="{{route('admin.call.log.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach




                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <!--/ panel body -->
    </div>
    <!--/ panel -->
</section>
<!--/ page content -->



<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Phone Call Log</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.call.log.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name <small class="text-danger">*</small>:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control -sm" placeholder="Enter Name" name="name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone <small class="text-danger">*</small>:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control -sm" placeholder="Enter Phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control -sm datepicker" placeholder="Enter Date" name="date" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control form-control -sm" name="description" name="description" require></textarea>

                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Next Follow Up Date:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control -sm datepicker" placeholder="Enter Next Follow Up Date" name="next_date" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Call Duration <small class="text-danger">*</small>:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control form-control -sm" placeholder="Enter Call Duration" name="call_duration" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Note:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control form-control -sm" name="note" name="note" require></textarea>

                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Call Type :</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="call_type" id="gridRadios1" value="Incoming" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Incoming
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="call_type" id="gridRadios2" value="Incoming">
                                    <label class="form-check-label" for="gridRadios2">
                                        Incoming
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>









                    <div class="form-group text-right mr-5">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Phone Call Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="edit_data">

            </div>
        </div>
    </div>
</div>




<!--view Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Phone Call Log</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="view_data">
        
      </div>
      
    </div>
  </div>
</div>




@endsection

@push('js')
<script>
    function tostsuccess(el) {
        toastr.success(el);
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.edit_route').on('click', function() {
            var id = $(this).data('id');
            var action = $(this).data('action');





            if (action) {
                $.ajax({
                    url: action,
                    type: "GET",

                    success: function(data) {


                        $("#edit_data").html(data);

                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>


<!-- viwe modal -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.view_route').on('click', function() {
            var id = $(this).data('id');
            var action = $(this).data('action');





            if (action) {
                $.ajax({
                    url: action,
                    type: "GET",

                    success: function(data) {


                        $("#view_data").html(data);

                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>

@endpush