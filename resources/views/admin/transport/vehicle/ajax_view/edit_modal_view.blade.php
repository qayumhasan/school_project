<form id="edit_vehicle_form" action="{{ route('admin.vehicle.update', $vehicle->id) }}" method="POST">
    @csrf
   
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="vehicle_number"><b>Vehicle Number :</b>  </label>
            <input type="text" class="form-control"  placeholder="Vehicle number" value="{{ $vehicle->vehicle_number }}" name="vehicle_number" id="e_vehicle_number">
            <span class="error e_error_vehicle_number"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="vehicle_model"><b>Vehicle Model :</b></label>
            <input type="text" class="form-control" id="e_vehicle_model" placeholder="Vehicle model" value="{{$vehicle->vehicle_model}}" name="vehicle_model">
            <span class="error e_error_vehicle_model"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="year_made"><b>Year Made :</b></label>
            <input type="text" class="form-control" id="e_year_made" placeholder="year Made" value="{{$vehicle->year_made}}" name="year_made" >
            <span class="error e_error_year_made"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="year_made"><b>Sit Quantity :</b></label>
            <input type="number" class="form-control" id="e_sit_quantity" placeholder="Sit quantity" value="{{$vehicle->sit_quantity}}" name="sit_quantity" required>
            <span class="error e_error_sit_quantity"></span>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-sm loading_button btn-blue">Loading...</button>
        @if (json_decode($userPermits->transport_module, true)['vehicle']['edit'] == 1)
            <button type="submit" class="btn btn-sm submit_button btn-blue">Update</button>
        @endif
    </div>
</form>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.loading_button').hide();
        });
    </script>
