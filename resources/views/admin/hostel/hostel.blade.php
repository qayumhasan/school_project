@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Hostel List</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Hostel</span></a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('hostel.multidelete')}}" method="post">
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
                                <th>Hostel Name</th>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Intake </th>
                                <th>Details </th>
                                <th>status </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>


                        @foreach($hostels as $hostel)
                            <tr>
                                <td>
                                    <label class="chech_container mb-4">
                                        <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$hostel->id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>{{$hostel->hostel_name}}</td>
                                @if($hostel->type == 1)
                                    <td>Boys Hostel</td>
                                @elseif($hostel->type == 2)
                                    <td>Grils Hostel</td>
                                @endif
                                <td>{{$hostel->address}}</td>
                                <td>{{$hostel->intake}}</td>
                                <td>{{$hostel->description}}</td>
                                
                                <td>

                                    @if($hostel->status == 1)
                                    <a href="{{ route('hostel.status.update', $hostel->id) }}" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>
                                    @else

                                    <a href="{{ route('hostel.status.update', $hostel->id) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif

                                </td>

                                <td>
                                    | <a class="editotion btn btn-sm btn-blue text-white" data-id="{{$hostel->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" href="{{route('hostel.destroy',$hostel->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Add Hostel</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('hostel.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Hostel Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Hostel Name" name="hostel_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Hostel Type:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="type" id="exampleFormControlSelect1">
                                <option selected disabled>Hostel Type</option>
                                <option value="1">Boys Hostel</option>
                                <option value="2">Grils Hostel</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Address:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Hostel Address" name="address" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">InTake:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="In Take" name="intake" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Hostel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="{{ route('hostel.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Hostel Name:</label>
                        <div class="col-sm-8">
                            <input required type="hidden" class="form-control" id="id" name="id">
                            <input required type="text" class="form-control" id="hostel_name" name="hostel_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Hostel Type:</label>
                        <div class="col-sm-8">
                          
                                <select class="form-control" name="type" id="type">
                                <option selected disabled>Hostel Type</option>
                                <option value="1">Boys Hostel</option>
                                <option value="2">Grils Hostel</option>
                            </select>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Address:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">InTake:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" id="intake" name="intake" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" id="description" require></textarea>
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
        $('.editotion').on('click', function() {
            var id = $(this).data('id');

            if (id) {
                $.ajax({
                    url: "{{ url('admin/hostel/edit') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#hostel_name").val(data.hostel_name);
                        $("#address").val(data.address);
                        $("#intake").val(data.intake);
                        $("#description").val(data.description);
                        $("#id").val(data.id);
                        $('#type').val(data.type).selecte;
                       
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>

@endpush