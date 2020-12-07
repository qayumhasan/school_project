    <style>
        th{line-height: 14px;}
        td{line-height: 11px; width: 25%;}
    </style>

    <div class="text-left">
        <div class="row">
            <div class="col-md-12">
                <h6 style="color:black; border-bottom:1px solid;"><b>Financial balance report</b></h6>
            </div>
           
        </div>
    </div>
   
    <table  class="table table-bordered mb-2">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Amount name</th>
                <th>Dabit</th>
                <th>Cradit</th>
            </tr>
        </thead>
        <tbody>
           <tr>
               <td>1</td>
               <td>Expanse</td>
               <td>0</td>
               <td>{{ $totalExpanse }}</td>
           </tr>

           <tr>
               <td>2</td>
               <td>Income</td>
               <td>{{ $totalIncome }}</td>
               <td>0</td>
           </tr>
           
           <tr>
               <td>3</td>
               <td>Paid salary</td>
               <td>0</td>
               <td>{{ $totalPaidSalary }}</td>
           </tr>
           
           <tr>
               <td>4</td>
               <td>Due salary</td>
               <td>0</td>
               <td>{{ $totalDueSalary }}</td>
           </tr> 
           
           <tr>
               <td>5</td>
               <td>Paid fees</td>
               <td>{{ $totalPaidFees }}</td>
               <td>0</td>
           </tr>
           
           <tr>
               <td>6</td>
               <td>Due fees</td>
               <td>{{ $totalDueFees }}</td>
               <td>0</td>
           </tr>

        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="2"><b>Grand Total</b> </th>
                <th><b>{{ $totalIncome + $totalPaidFees + $totalDueFees }}</b></th>
                <th><b>{{ $totalExpanse + $totalPaidSalary + $totalDueFees }}</b></th>
            </tr>   
        </tfoot>
    </table>

