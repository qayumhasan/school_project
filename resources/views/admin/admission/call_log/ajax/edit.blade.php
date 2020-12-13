<form class="form-horizontal" action="{{ route('admin.call.log.update',$logs->id) }}" enctype="multipart/form-data" method="POST">
    @csrf


    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control -sm" value="{{$logs->name}}" placeholder="Enter Name" name="name" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control -sm" value="{{$logs->phone}}" placeholder="Enter Phone" name="phone" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control -sm datepicker" value="{{$logs->date}}" placeholder="Enter Date" name="date" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
        <div class="col-sm-8">
            <textarea rows="3" class="form-control form-control -sm"  name="description" name="description" require>{{$logs->details}}</textarea>

        </div>
    </div>



    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Next Follow Up Date:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control -sm datepicker" value="{{$logs->next_date}}" placeholder="Enter Next Follow Up Date" name="next_date" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Call Duration <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <input required type="text" class="form-control form-control -sm" value="{{$logs->call_duration}}"  placeholder="Enter Call Duration" name="call_duration" required>
        </div>
    </div>


    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Note:</label>
        <div class="col-sm-8">
            <textarea rows="3" class="form-control form-control -sm"  name="note" name="note" require>{{$logs->note}}</textarea>

        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Call Type :</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="call_type" id="gridRadios1" value="Incoming" @if($logs->call_type == 'Incoming') checked @endif>
                    <label class="form-check-label" for="gridRadios1">
                        Incoming
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="call_type" id="gridRadios2" value="Outgoing" @if($logs->call_type == 'Outgoing') checked @endif>
                    <label class="form-check-label" for="gridRadios2">
                    Outgoing
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