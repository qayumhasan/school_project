<form class="form-horizontal" action="{{ route('admin.postal.receives.update',$postal->id) }}" enctype="multipart/form-data" method="POST">
    @csrf


    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">To Title <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <input type="text" value="{{$postal->title}}" class="form-control form-control -sm" placeholder="Enter Title" name="title" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Reference No <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <input type="text" value="{{$postal->ref_no}}" class="form-control form-control -sm" placeholder="Enter Reference No" name="ref_no" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Address:</label>
        <div class="col-sm-8">

            <textarea class="form-control form-control -sm"  placeholder="Enter Address" name="address">{{$postal->address}}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">note:</label>
        <div class="col-sm-8">
            <textarea rows="3" class="form-control form-control -sm" name="note" name="description" require>{{$postal->note}}</textarea>

        </div>
    </div>



    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">From Title:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control -sm" placeholder="Enter From Title" value="{{$postal->from_title}}" name="form_title" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control -sm datepicker" placeholder="Enter Date" value="{{$postal->date}}" name="date" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">File <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <input type="file" class="form-control form-control -sm" placeholder="Enter Call Duration" name="doc" accept="application/pdf">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Preview <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
        
            <iframe src="{{url('storage/app/'.$postal->doc)}}"></iframe>
        </div>
    </div>












    <div class="form-group text-right mr-5">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
        <button type="submit" class="btn btn-blue">Submit</button>
    </div>
</form>