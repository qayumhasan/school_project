<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-12">
            <div class="first_row">
                <table class="table table-bordered">
                    
                    <tbody>
                        <tr>
                            <th scope="row">To Title :</th>
                            <td>{{$postal->title}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Reference No  :</th>
                            <td>{{$postal->ref_no}}</td>
                            
                        </tr>
                        
                        <tr>
                            <th scope="row">Address  :</th>
                            <td>{{$postal->address}}</td>
                            
                        </tr>
                        
                        <tr>
                            <th scope="row">note  :</th>
                            <td>{{$postal->note}}</td>
                            
                        </tr>
                      

                        <tr>
                            <th scope="row">From Title:</th>
                            <td>{{$postal->from_title}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Date :</th>
                            <td>{{$postal->date}}</td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Preview :</th>
                            <td><iframe src="{{url('storage/app/'.$postal->doc)}}"></iframe></td>
                            
                        </tr>
                    
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>