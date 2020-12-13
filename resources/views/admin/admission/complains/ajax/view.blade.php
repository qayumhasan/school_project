<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-12">
            <div class="first_row">
                <table class="table table-bordered">
                    
                    <tbody>
                        <tr>
                       <th scope="row">Complain Type :</th>
                            <td>{{$complain->type}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Source  :</th>
                            <td>{{$complain->source}}</td>
                            
                        </tr>
                        
                        <tr>
                            <th scope="row">Complain By  :</th>
                            <td>{{$complain->complain_by}}</td>
                            
                        </tr>
                        
                        <tr>
                            <th scope="row">Phone  :</th>
                            <td>{{$complain->phone}}</td>
                            
                        </tr>
                      

                        <tr>
                            <th scope="row">Date:</th>
                            <td>{{$complain->date}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Description :</th>
                            <td>{{$complain->description}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Action Taken :</th>
                            <td>{{$complain->action_taken}}</td>
                            
                        </tr>
                    
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>