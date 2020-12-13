<form class="form-horizontal" action="{{ route('admin.visitor.update',$visitor->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Purpose <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <select class="form-control" name="purpose" required id="exampleFormControlSelect1">

            @foreach($propose as $row)
                                <option selected disabled>Select</option>
                                <option value="{{$row->name}}">{{$row->name}}</option>
                            @endforeach

            </select>
            @error('purpose')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <input required type="text" class="form-control form-control -sm" value="{{$visitor->name}}" name="name" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <input required type="text" class="form-control form-control -sm" value="{{$visitor->phone}}" name="phone" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">ID Card:</label>
        <div class="col-sm-8">
            <input required type="text" class="form-control form-control -sm" value="{{$visitor->id_card}}" name="id_card" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Number Of Person:</label>
        <div class="col-sm-8">
            <input type="number" class="form-control form-control -sm" value="{{$visitor->no_of_person}}" name="no_of_person" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control -sm datepicker" value="{{$visitor->date}}" name="date" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">In Time:</label>
        <div class="col-sm-8">
            <input type="time" class="form-control form-control -sm" value="{{$visitor->intime}}" name="in_time" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Out Time:</label>
        <div class="col-sm-8">
            <input type="time" class="form-control form-control -sm" value="{{$visitor->out_time}}" name="out_time" required>
        </div>
    </div>


    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
        <div class="col-sm-8">
            <textarea rows="3" name="description" class="form-control form-control -sm"  require>{{$visitor->note}}</textarea>

        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Attach Document:</label>
        <div class="col-sm-8">
            <input accept=".jpg, .jpeg, .png, .gif" type="file" id="photo" name="doc" id="input-file-now" class="form-control form-control-sm dropify" size="20" />
        </div>
        <div class="col-sm-8">
            <img src="" >
        </div>

    </div>

    <div class="form-group text-right mr-5">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
        <button type="submit" class="btn btn-blue">Update</button>
    </div>
</form>