<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-12">
            <div class="first_row">
                <table class="table table-bordered">
                    
                    <tbody>
                        <tr>
                            <th scope="row">Name :</th>
                            <td>{{$logs->name}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Phone  :</th>
                            <td>{{$logs->phone}}</td>
                            
                        </tr>
                        
                        <tr>
                            <th scope="row">Date  :</th>
                            <td>{{$logs->date}}</td>
                            
                        </tr>
                        
                        <tr>
                            <th scope="row">Description  :</th>
                            <td>{{$logs->details}}</td>
                            
                        </tr>
                      

                        <tr>
                            <th scope="row">Next Follow Up Date:</th>
                            <td>{{$logs->next_date}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Call Duration :</th>
                            <td>{{$logs->call_duration}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Note :</th>
                            <td>{{$logs->note}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Call Type :</th>
                            <td>{{$logs->call_type}}</td>
                            
                        </tr>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>