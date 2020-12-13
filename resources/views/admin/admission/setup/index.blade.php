@extends('admin.master')
@section('content')
<style>
    nav>.nav.nav-tabs {

        border: none;
        color: #fff;
        background: #26ABE2;
        border-radius: 0;

    }

    nav>div a.nav-item.nav-link,
    nav>div a.nav-item.nav-link.active {
        border: none;
        padding: 18px 25px;
        color: #fff;
        background: #26ABE2;
        border-radius: 0;
    }

    nav>div a.nav-item.nav-link.active:after {
        content: "";
        position: relative;
        bottom: -55px;
        left: -10%;
        border: 15px solid transparent;
        border-top-color: #e74c3c;
    }

    .tab-content {
        background: #fdfdfd;
        line-height: 25px;
        border: 1px solid #ddd;
        border-top: 5px solid #e74c3c;
        border-bottom: 5px solid #e74c3c;
        padding: 30px 25px;
    }

    nav>div a.nav-item.nav-link:hover,
    nav>div a.nav-item.nav-link:focus {
        border: none;
        background: #e74c3c;
        color: #fff;
        border-radius: 0;
        transition: background 0.20s linear;
    }
</style>
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
                                    <span>Front In Setup</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel_body">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Purpose</a>

                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Complain Type</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Source</a>
                                <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Reference</a>
                            </div>
                        </nav>
                    </div>





                    <div class="panel_body table_body mt-3" id="table_data">
                        <div class="row">
                            <div class="col-md-12">


                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="propuse" style="padding: 15px;">
                                                    <div class="card p-4">
                                                        <h6>Add Purpose</h6>
                                                        <hr>
                                                        <form action="{{route('admin.setup.store')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Purpose *</label>
                                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Purpose">
                                                                @error('name')
                                                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                                                                @enderror
                                                            </div>


                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="propuse_show" style="padding: 15px;">
                                                    <div class="card">
                                                        <table class="table table-striped p-4">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">SL</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            
                                                                @foreach($fronts['propuse'] as $row)
                                                                <tr>
                                                                    <th scope="row">{{$loop->iteration}}</th>
                                                                    <td>{{$row->name}}</td>
                                                                    <td>
                                                                        <a class="edit_route btn btn-sm btn-blue text-white editmodal" data-action="{{route('admin.setup.update',$row->id)}}" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal" data-whatever="{{$row}}"><i class="fas fa-pencil-alt"></i></a> |
                                                                        <a id="delete" href="{{route('admin.front.office.setup.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="propuse" style="padding: 15px;">
                                                    <div class="card p-4">
                                                        <h6>Add Complain Type</h6>
                                                        <hr>
                                                        <form action="{{route('admin.complain.store')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Complain Type *</label>
                                                                <input required type="text" name="name" class="form-control" placeholder="Enter Complain Type">
                                                                @error('name')
                                                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="propuse_show" style="padding: 15px;">
                                                    <div class="card">
                                                        <table class="table table-striped p-4">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">SL</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            @if(isset($fronts['complain']))
                                                            <tbody>
                                                                @foreach($fronts['complain'] as $row)
                                                                <tr>
                                                                    <th scope="row">{{$loop->iteration}}</th>
                                                                    <td>{{$row->name}}</td>
                                                                    <td>
                                                                        <a class="edit_route btn btn-sm btn-blue text-white editmodal" data-action="{{route('admin.setup.complain.update',$row->id)}}" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal" data-whatever="{{$row}}"><i class="fas fa-pencil-alt"></i></a> |
                                                                        <a id="delete" href="{{route('admin.front.office.setup.complain.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            @endif

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="propuse" style="padding: 15px;">
                                                    <div class="card p-4">
                                                        <h6>Add Source</h6>
                                                        <hr>
                                                        <form method="post" action="{{route('admin.sources.store')}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Source *</label>
                                                                <input required type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Enter Sources">
                                                                @error('name')
                                                                    <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                                                                @enderror
                                                            </div>


                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="propuse_show" style="padding: 15px;">
                                                    <div class="card">
                                                        <table class="table table-striped p-4">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">SL</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            @if(isset($fronts['sources']))
                                                            <tbody>
                                                                @foreach($fronts['sources'] as $row)
                                                                <tr>
                                                                    <th scope="row">{{$loop->iteration}}</th>
                                                                    <td>{{$row->name}}</td>
                                                                    <td>
                                                                        <a class="edit_route btn btn-sm btn-blue text-white editmodal" data-action="{{route('admin.setup.sources.update',$row->id)}}" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal" data-whatever="{{$row}}"><i class="fas fa-pencil-alt"></i></a> |
                                                                        <a id="delete" href="{{route('admin.front.office.setup.sources.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            @endif

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="propuse" style="padding: 15px;">
                                                    <div class="card p-4">
                                                        <h6>Add Reference</h6>
                                                        <hr>
                                                        <form action="{{route('admin.reference.store')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Reference *</label>
                                                                <input required type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Reference">
                                                                @error('name')
                                                                    <small id="emailHelp" class="form-text text-danger">{{$message}}.</small>
                                                                @enderror
                                                            </div>



                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="propuse_show" style="padding: 15px;">
                                                    <div class="card">
                                                        <table class="table table-striped p-4">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">SL</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            @if(isset($fronts['reference']))
                                                            <tbody>
                                                                @foreach($fronts['reference'] as $row)
                                                                <tr>
                                                                    <th scope="row">{{$loop->iteration}}</th>
                                                                    <td>{{$row->name}}</td>
                                                                    <td>
                                                                        <a class="edit_route btn btn-sm btn-blue text-white editmodal" data-action="{{route('admin.setup.reference.update',$row->id)}}" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal" data-whatever="{{$row}}"><i class="fas fa-pencil-alt"></i></a> |
                                                                        <a id="delete" href="{{route('admin.front.office.setup.sources.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            @endif
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="heading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="updateform" id="add_update_form" action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Purpose :</label>
                        <input type="text" class="form-control" name="name" id="name">
                        <small class="text-danger" id="header_error"></small>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".editmodal").click(function() {
            var modal = $(this)
            var data = modal.data('whatever');
            var action = modal.data('action');
            document.updateform.action = action;
            document.getElementById('heading').innerHTML = 'UPDATE  ' + data.type.toUpperCase();
            document.getElementById('name').value = data.name;
        });
    });
</script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit', '#add_update_form', function(e) {
            e.preventDefault();


            var url = $(this).attr('action');
            var type = $(this).attr('method');
            var request = $(this).serialize();
            $.ajax({
                url: url,
                type: type,
                data: request,
                success: function(data) {

                    toastr.success(data.successMsg);
                    $('#editModal').modal('hide');
                    setInterval(function() {
                        window.location = "{{ url()->current() }}";
                    }, 2000);

                },
                error: function(err) {
                    console.log(err.responseJSON.errors);

                    if (err.responseJSON.errors.name) {
                        $('#header_error').html('Propuse Name is required');

                        $('.header').addClass('is-invalid');
                    } else {
                        $('.header_error').html('');
                        $('.header').removeClass('is-invalid');
                    }
                }
            });
        });
    });
</script>

@endsection