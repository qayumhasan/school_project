@if(count($enquiry) > 0)
<div class="">
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

                    |  <a id="delete" href="{{ route('admin.admission.enquiry.delete', $row->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
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


