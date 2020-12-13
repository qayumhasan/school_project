<form class="form-horizontal" action="{{ route('admin.complaint.update',$complain->id) }}" enctype="multipart/form-data" method="POST">
    @csrf


    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Complain Type <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <select class="form-control" name="type" id="exampleFormControlSelect1" required>
            <option selected disabled >Select</option>
                                @foreach($types as $row)
                                
                                <option value="{{$row->name}}" >{{$row->name}}</option>
                                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right" >Source <small class="text-danger">*</small>:</label>
        <div class="col-sm-8">
            <select class="form-control" name="source" id="exampleFormControlSelect1" required>
            <option selected disabled >Select</option>
                                @foreach($sources as $row)
                                
                                <option value="{{$row->name}}" >{{$row->name}}</option>
                                @endforeach
            </select>
        </div>
    </div>




    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Complain By:</label>
        <div class="col-sm-8">

            <input type="text" class="form-control form-control -sm" value="{{$complain->complain_by}}" name="complain_by" required/>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone:</label>
        <div class="col-sm-8">

            <input type="text" class="form-control form-control -sm" placeholder="Enter Phone" name="Phone" value="{{$complain->phone}}" required/>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control -sm datepicker" placeholder="Enter Date" name="date" value="{{$complain->date}}" required>
        </div>
    </div>




    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
        <div class="col-sm-8">

            <textarea class="form-control form-control -sm" placeholder="Enter Description" name="details">{{$complain->description}}</textarea>
        </div>
    </div>


    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Action Taken:</label>
        <div class="col-sm-8">

            <input type="text" class="form-control form-control -sm" placeholder="Enter Action Taken" value="{{$complain->action_taken}}" name="action_taken" required />
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Assigned:</label>
        <div class="col-sm-8">

            <input type="text" class="form-control form-control -sm" placeholder="Enter Assigned" name="assigned" value="{{$complain->assingned}}" required />
        </div>
    </div>


    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">note:</label>
        <div class="col-sm-8">
            <textarea rows="3" class="form-control form-control -sm" name="note" name="description" require>{{$complain->note}}</textarea>

        </div>
    </div>










    <div class="form-group text-right mr-5">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
        <button type="submit" class="btn btn-blue">Submit</button>
    </div>
</form>