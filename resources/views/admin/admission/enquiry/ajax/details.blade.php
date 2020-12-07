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
                <td>{{$row->next_date}}</td>
                
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