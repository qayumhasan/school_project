@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Hostel Room List</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Hostel Room</span></a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('hostelroom.multidelete')}}" method="post">
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
                                        <input type="checkbox" id="check_all">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>Room Number</th>
                                <th>Hostel Name</th>
                                <th>Room Type</th>
                                <th>No.Of Bed </th>
                                <th>Cost Per Bed </th>
                                <th>status </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hostelroom as $data)
                            <tr>
                                <td>
                                    <label class="chech_container mb-4">
                                        <input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>{{$data->room_number}}</td>
                                <td>{{$data->hostel->hostel_name}}</td>
                                <td>{{$data->room->room_type}}</td>
                                <td>{{$data->num_of_bed}}</td>
                                <td>{{$data->cost_per_bed}}</td>
                                <td>
                                    @if($data->status==1)
                                    <span class="btn btn-success">Active</span>
                                    @else
                                    <span class="btn btn-danger">DeActive</span>
                                    @endif
                                </td>
                                <td>
                                @if($data->status==1)
                                    <a href="{{url('admin/hostel/hostelroom/deactive/'.$data->id)}}" class="btn btn-success btn-sm text-white" title="Active"><i class="far fa-thumbs-up"></i></a>
                                @else
                                    <a href="{{url('admin/hostel/hostelroom/active/'.$data->id)}}" class="btn btn-danger btn-sm text-white" title="DeActive"><i class="fas fa-thumbs-down"></i></a>
                                @endif

                                | <a class="edit btn btn-sm btn-blue text-white" data-id="{{$data->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |

                                <a id="delete" href="{{url('admin/hostel/hostelroom/delete/'.$data->id)}}" class="btn btn-danger btn-sm text-white" title="Delete"><i class="far fa-trash-alt"></i></a>
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
                <h4 class="modal-title">Add Hostel Room</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('hostelroom.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Room Number<span>*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Hostel Name" name="room_number" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Hostel</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="hostel_type" id="exampleFormControlSelect1">
                                <option selected disabled>Select</option>
                                @foreach($hostel as $host)
                                <option value="{{$host->id}}">{{$host->hostel_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Room Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="room_type" id="exampleFormControlSelect1">
                                <option selected disabled>Room Type</option>
                                @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->room_type}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Number Of Bed<span>*</span></label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" placeholder="Hostel Address" name="num_of_bed" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Cost Per Bed <span>*</span></label>
                        <div class="col-sm-8">
                            <input  type="number" class="form-control"  name="cost_per_bed" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" require></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
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
                <h5 class="modal-title" id="exampleModalLabel">Update Hostel Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="{{ route('hostelroom.update') }}" method="POST">
                    @csrf
                       <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Room Number<span>*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Hostel Name" name="room_number" id="room_number">
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Hostel</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="hostel_type" id="hostel_type">
                                <option selected disabled>Select</option>
                                @foreach($hostel as $host)
                                <option value="{{$host->id}}">{{$host->hostel_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Room Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="room_type" id="room_type">
                                <option selected disabled>Room Type</option>
                                @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->room_type}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Number Of Bed<span>*</span></label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" placeholder="Hostel Address" name="num_of_bed" id="num_of_bed">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Cost Per Bed <span>*</span></label>
                        <div class="col-sm-8">
                            <input  type="number" class="form-control"  name="cost_per_bed" id="cost_per_bed">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
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
        $('.edit').on('click', function() {
            var id = $(this).data('id');
           // alert(id);
            if (id) {
                $.ajax({
                    url: "{{ url('admin/hostel/hostelroom/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){

                        $("#room_number").val(data.room_number);
                        $("#id").val(data.id);
                        $("#room_type").val(data.room_type).select;
                        $("#hostel_type").val(data.hostel_type).select;
                        $("#num_of_bed").val(data.num_of_bed);
                        $("#num_of_bed").val(data.num_of_bed);
                        $("#cost_per_bed").val(data.cost_per_bed);
                        $("#description").val(data.description); 
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>

@endpush