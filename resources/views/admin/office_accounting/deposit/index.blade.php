@extends('admin.master')
@section('content')
   
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Deposits</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->office_accounts_module, true)['deposit']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Deposit</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel_body">
                <div class="table-responsive all_deposits">
                    
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Bank Deposit Entire</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="deposit_add_form" class="form-horizontal" action="{{ route('admin.office.account.deposit.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="direction" class="direction">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0">Invoice No  :</label>
                            <input type="text" class="form-control invoice_no form-control-sm" value="BD{{ $invoiceId }}" name="invoice_no">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0">Date  :</label>
                            <input readonly type="text" autocomplete="off" placeholder="dd-mm-yyyy" class="form-control readonly_field add_dipo_date_picker date form-control-sm" name="date" id="date">
                            <span class="error error_date"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0">  Voucher Header  :</label>
                            <select name="voucher_id" id="voucher_id" class="form-control voucher_id form-control-sm">
                                <option value="">Select voucher header</option>
                                @foreach ($voucherHeaders as $voucherHeader)
                                    <option value="{{ $voucherHeader->id }}">{{ $voucherHeader->name }}</option>
                                @endforeach
                            </select>
                            <span class="error error_voucher_id"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12"> 
                            <label  class="col-form-label p-0 m-0"> Bank :</label>
                            <select name="bank_id" id="bank_id" class="form-control bank_id banks form-control-sm">
                                <option value=""> Select Bank </option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                            <span class="error error_bank_id"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"> Account :</label>
                            <select name="account_id" id="account_id" class="form-control account_id bank_accounts form-control-sm">
                                <option value=""> Select Account </option>

                            </select>
                            <span class="error error_account_id"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"> Account No :</label>
                            <input readonly type="text" placeholder="Account number" class="form-control form-control-sm account_number" id="account_number" value="" name="account_no">
                            <span class="error error_account_number"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"> Pay Amount :</label>
                            <input type="text" placeholder="Deposit amount" class="form-control amount form-control-sm" value="" name="amount" id="amount">
                            <span class="error error_amount"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"> Remarks (Optional) :</label>
                            <input type="text" name="remarks" class="form-control remarks form-control-sm">
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-sm loading_button btn-blue">Loading...</button>
                        <input type="submit" name="save" value="Save" class="btn save submit_button btn-sm btn-blue">
                        <input type="submit" name="save_and_print" value="Save & Print" class="btn save_and_print button submit_button btn-sm btn-blue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Deposit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">

            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script src="{{ asset('public/admins/plugins/print_this/printThis.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.loading_button').hide();
            $('.banks').on('change', function(){
                var bank_id = $(this).val();
                $.ajax({
                    url:"{{ url('admin/office/accounts/deposits/get/account/by') }}" + "/" + bank_id,
                    type:'get',
                    success:function(data){
                        $('.bank_accounts').empty();
                        $('.bank_accounts').append(' <option value="">Select account</option>');
                        $.each(data, function (key, val) {
                            $('.bank_accounts').append(' <option value="' + val.id + '">' + val.holder_name + '</option>');
                        })
                    }
                });
            }) 
        }) 
    </script>

    <script>
        $(document).ready(function () {
            $('.bank_accounts').on('change', function(){
                var account_id = $(this).val();
                $.ajax({
                    url:"{{ url('admin/office/accounts/deposits/get/account/number/by') }}" + "/" + account_id,
                    type:'get',
                    success:function(data){
                        $('.account_number').empty();
                        $('.account_number').val(data.account_no);
                    }
                });
            }) 
        }) 
    </script>

    <script>
        function allDeposits (){
            $.ajax({
                url:"{{ url('admin/office/accounts/deposits/all') }}",
                type:'get',
                success:function(data){
                    $('.all_deposits').empty();
                    $('.all_deposits').html(data);
                }
            });
        }
        allDeposits();
    </script>

    <script>
        $(document).ready(function () {
            
            $('.save_and_print').on('click', function(){
                var value = $(this).val();
                $('.direction').val(value);
            })

            $('.save').on('click', function(){
                var value = $(this).val();
                $('.direction').val(value);
            })
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#deposit_add_form').on('submit', function (e) {
                e.preventDefault();
                $('.submit_button').hide();
				$('.loading_button').show();
                var url = $(this).attr('action');
                var type = $(this).attr('method');

                var invoice_no = $('.invoice_no').val();
                var date = $('.date').val();
                var voucher_id = $('.voucher_id').val();
                var bank_id = $('.bank_id').val();
                var account_id = $('.account_id').val();
                var amount = $('.amount').val();
                var remarks = $('.remarks').val();
                var direction = $('.direction').val();
                
                $.ajax({
                    url: url,
                    type: type,
                    data: {
                        invoice_no:invoice_no,
                        date:date,
                        voucher_id:voucher_id,
                        bank_id:bank_id,
                        account_id:account_id,
                        amount:amount,
                        remarks:remarks,
                        direction:direction,
                    },
                    success: function (data) {
                        $('.submit_button').show();
                        $('.loading_button').hide();
                        $('.error').html('');
                        $('.form-control').removeClass('is-invalid');
                        if(!$.isEmptyObject(data.success)){
                            toastr.success(data.success);
                            Swal.fire({
                                position: 'middle',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            }); 
                            $('#deposit_add_form')[0].reset();
                            $('#myModal1').modal('hide');
                            allDeposits();
                        }else{
                            toastr.success('Deposit added successfully.');
                            Swal.fire({
                                position: 'middle',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#deposit_add_form')[0].reset();
                            $('#myModal1').modal('hide');
                            allDeposits();
                            $(data).printThis({
                                debug: true,                   
                                importCSS: true,                
                                importStyle: false,             
                                printContainer: true,           
                                loadCSS: "",      
                                pageTitle: "Bank Deposit Invoice",                  
                                removeInline: true,            
                                removeInlineSelector: "body *",  
                                printDelay: 333,                
                                header: null,                   
                                footer: null,
                                base: true,                    
                                formValues: true,              
                                canvas: true,                  
                                doctypeString: '...',           
                                removeScripts: true,          
                                copyTagClasses: true,       
                                beforePrintEvent: null,         
                                beforePrint: null,              
                                afterPrint: null  
                            });
                        }
                    },
                    error:function(err){
                        $('.submit_button').show();
						$('.loading_button').hide();
						toastr.error('Please check again all form field.','Some thing want wrong.');
						$('.error').html('');
                        $('.form-control').removeClass('is-invalid');
						$.each(err.responseJSON.errors,function(key, error){
                            //console.log(key);
                            toastr.success(error[0]);
							$('.error_'+key).html(error[0]);
							$('#'+key).addClass('is-invalid');
						});
                    }
                })
            });
        }) 
        
    </script>

    <script>

        $(document).ready(function () {
            $(document).on('click', '.edit_deposit', function(){
                var deposit_id = $(this).data('id');
                var id = $(this).closest('td').data('id');
                $('.previous-'+id).hide();
                $('.button_loader-'+id).show();
                $.ajax({
                    url:"{{ url('admin/office/accounts/deposits/edit') }}" + "/" + deposit_id,
                    type:'get',
                    success:function(data){
                        $('.edit_modal_body').empty();
                        $('.edit_modal_body').append(data);
                        $('#editModal').modal('show');
                        $('.previous-'+id).show();
                        $('.button_loader-'+id).hide();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () { 
            $(document).on('submit', '#deposit_update_form', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var date = $('.edit_date').val();
                var remarks = $('.edit_remarks').val();
                var voucher_id = $('.edit_voucher_id').val();
                $.ajax({
                    url: url,
                    type: type,
                    data: {
                        date:date,
                        remarks:remarks,
                        voucher_id:voucher_id,
                    },
                    success: function (data) {
                        
                        if(!$.isEmptyObject(data.success)){
                            toastr.success(data.success);
                            $('#deposit_update_form')[0].reset();
                            $('#editModal').modal('hide');
                            allDeposits();
                        }
                    },
                    error:function(error){
                        console.log(error);
                    }
                })
            });
        })   
    </script>

    <script>
        $(document).ready(function(){
            $(document).on('click', '#chenge_status_button', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        toastr.success(data);
                        allDeposits();
                    }
                });
            })
        });
    </script>

    <script>
        $(document).ready(function(){
            $(document).on('click', '#delete_deposit', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                swal({
                    title: "Are you sure to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest('tr').remove();
                        $.ajax({
                            url:url,
                            type:'get',
                            success:function(data){
                                toastr.success(data);
                            }
                        });
                    } else {
                        swal("Safe Data!");
                    }
                });

                
            })
        });
    </script>

    <script>
        $(document).ready(function(){
            $(".add_dipo_date_picker").datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true
            });
        });
    </script>

@endpush