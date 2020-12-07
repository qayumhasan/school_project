@extends('admin.master')
@push('css')
    <style>
        .loading {margin: 0px;padding: 0px;background: white;padding-bottom: 1px;}
        .loading h4 {margin-left: 24px;}
        td {line-height: 11px;}
        a.report_menu_link {: 100%;display: block;padding: 4px 7px;color: #444;margin-left: 19px;}
        li.report_menu_list {display: block;margin-top: 4px;}
        .list_background{background: #dceeff;}
        li.report_menu_list a:hover {color:black;}
        a.report_menu_link svg {font-size: 16px;}
        .report_list_area {box-shadow: 0 2px 10px rgba(0, 0, 0, .2);background-color: #fff;}
    </style>
@endpush
@section('content')
    <div class="middle_content_wrapper">
        <section class="page_content">
            <!-- panel -->
            <div class="panel mb-0">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                        <span>Select criteria for finance report</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="report_list_area">
                            <div class="report_list">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="report_menu_ul">
                                            <li class="report_menu_list">
                                                <a data-value="income_report" class="report_menu_link text-dark income_report" href="#">
                                                    <i class="fas fa-file-alt"></i>  
                                                    <b>Income report</b> 
                                                </a>
                                            </li>

                                            <li class="report_menu_list">
                                                <a data-value="income_group_report" class="report_menu_link text-dark income_group_report" href="#">
                                                    <i class="fas fa-file-alt"></i> 
                                                    <b>Income group report</b> 
                                                </a>
                                            </li>
                                            
                                            <li class="report_menu_list">
                                                <a class="report_menu_link text-dark expanse_report" data-value="expanse_report"  href="#">
                                                    <i class="fas fa-file-alt"></i>  
                                                    <b>Expanse report</b>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="report_menu_ul">
                                            <li class="report_menu_list">
                                                <a data-value="expanse_group_report" class="report_menu_link text-dark expanse_group_report" href="#">
                                                    <i class="fas fa-file-alt"></i>  
                                                    <b>Expanse group report</b> 
                                                </a>
                                            </li>
                                            
                                            <li class="report_menu_list">
                                                <a data-route="{{ route('admin.reports.finance.report.account.report') }}" class="report_menu_link text-dark  account_balance_report" href="#">
                                                    <i class="fas fa-file-alt"></i> 
                                                    <b>Account balance report</b> </a>
                                            </li>

                                            <li class="report_menu_list">
                                                <a data-value="salary_report" class="report_menu_link text-dark salary_report" href="#">
                                                    <i class="fas fa-file-alt"></i>  
                                                    <b>Salary report</b> 
                                                </a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="report_menu_ul">
                                           
                                            <li class="report_menu_list">
                                                <a data-value="fees_report" class="report_menu_link text-dark fees_report" href="#">
                                                    <i class="fas fa-file-alt"></i>  
                                                    <b>Fees report</b> 
                                                </a>
                                            </li>
                                            
                                            <li class="report_menu_list">
                                                <a data-value="financial_balance_report" class="report_menu_link text-dark financial_balance_report" href="#">
                                                    <i class="fas fa-file-alt"></i> 
                                                    <b>Financial balance</b> 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        
                        <div class="panel_body form_field_body">
                            <form class="report_form income_report_form pb-2" action="{{ route('admin.reports.finance.report.income') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Income report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="m-0">Search Type :</label>
                                        <select name="select_type" id="select_type"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select Type ---</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option>
                                            <option value="period">Period</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>

                                    <div class="col-md-1">
                                        <button style="margin-top: 26px;" type="submit" class="btn btn-sm btn-blue float-left">Search</button>
                                    </div>
                                </div>
                            </form>
                            
                            <form class="report_form income_group_report_form pb-2" action="{{ route('admin.reports.finance.report.income.group') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Income group report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select Type ---</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option>
                                            <option value="period">Period</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input readonly type="text" class="form-control readonly_field form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>
                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="m-0">Income Header :</label>
                                        <select required name="header_id" id="header_id"
                                            class="form-control form-control-sm header_id">
                                            <option value="">--- Select income header ---</option>
                                            @foreach ($incomeHeaders as $incomeHeader)
                                                <option value="{{ $incomeHeader->id }}">{{ $incomeHeader->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                            
                            <form class="report_form expense_report_form pb-2" action="{{ route('admin.reports.finance.report.expense') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Expanse report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select Type ---</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option>
                                            <option value="period">Period</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>
                                </div>
                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                            
                            <form class="report_form expense_group_report_form pb-2" action="{{ route('admin.reports.finance.report.expense.group') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Expanse Group report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm">
                                            <option value="">--- Select Type ---</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option>
                                            <option value="period">Period</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="m-0">Expanse Header :</label>
                                        <select required name="header_id" id="header_id"
                                            class="form-control form-control-sm header_id">
                                            <option value="">--- Select expanse header ---</option>
                                            @foreach ($expanseHeaders as $expanseHeader)
                                                <option value="{{ $expanseHeader->id }}">{{ $expanseHeader->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                            
                            <form class="report_form salary_report_form pb-2" action="{{ route('admin.reports.finance.report.salary.report') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Salary report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm">
                                            <option value="">--- Select Type ---</option>
                                            <option value="month_wise">Month-wise</option>
                                            <option value="period">Period-wise</option> 
                                        </select>
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>

                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input readonly type="text" class="form-control form-control-sm date_picker readonly_field" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>

                                    <div class="col-md-3 month_wise_year_or_month">
                                        <label class="m-0">Year :</label>
                                        <select  name="year" id="year"
                                            class="form-control form-control-sm ">
                                            <option disabled value="">--- Select year ---</option>
                                            @foreach ($years as $year)
                                            <option value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3 month_wise_year_or_month">
                                        <label class="m-0">Month :</label>
                                        <select name="month" id="month" class="form-control form-control-sm">
                                            <option disabled value="">--- Select month ---</option>
                                            <option value="January">January</option>
                                            <option value="Fabruary">Fabruary</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="m-0">Paid status :</label>
                                        <select required name="paid_status" id="paid_status" class="form-control form-control-sm">
                                            <option value="">--- Select paid status ---</option>
                                            <option value="all">All</option>
                                            <option value="paid">Paid</option>
                                            <option value="no_paid">No-Paid/Due</option>
                                        </select>
                                    </div>
                                </div>
                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                            
                            <form class="report_form fees_report_form pb-2" action="{{ route('admin.reports.finance.report.fees.report') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Salary report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm">
                                            <option value="">--- Select Type ---</option>
                                            <option value="month_wise">Month-wise</option>
                                            <option value="year_wise">Year-wise</option> 
                                        </select>
                                    </div>

                                    <div class="col-md-3 fees_month_wise month_wise">
                                        <label class="m-0">Month-year :</label>
                                        <input readonly type="text" value="{{date('Y-F')}}" name="year_month" class="form-control year_month_picker form-control-sm readonly_field">
                                    </div>
                                    
                                    <div class="col-md-3 fees_year_wise year_wise">
                                        <label class="m-0">Year :</label>
                                        <select name="year" id="year"
                                            class="form-control form-control-sm ">
                                            <option disabled value="">--- Select Month ---</option>
                                            @foreach ($years as $year)
                                            <option value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   
                                    <div class="col-md-3">
                                        <label class="m-0">Paid status :</label>
                                        <select required name="paid_status" id="paid_status" class="form-control form-control-sm">
                                            <option value="all">All</option>
                                            <option value="paid">Paid</option>
                                            <option value="no_paid">No-Paid/Due</option>
                                        </select>
                                    </div>
                                </div>
                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>

                            <form class="report_form financial_balance_report_form pb-2" action="{{ route('admin.reports.finance.report.financial.balance.report') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Financial balance report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm">
                                            <option value="">--- Select Type ---</option>
                                            <option value="month_wise">Month-wise</option>
                                            <option value="year_wise">Year-wise</option> 
                                        </select>
                                    </div>

                                    <div class="col-md-3 fees_month_wise month_wise">
                                        <label class="m-0">Month-year :</label>
                                        <input readonly type="text" value="{{date('Y-F')}}" name="year_month" class="form-control year_month_picker form-control-sm readonly_field">
                                    </div>
                                    
                                    <div class="col-md-3 fees_year_wise year_wise">
                                        <label class="m-0">Year :</label>
                                        <select name="year" id="year"
                                            class="form-control form-control-sm ">
                                            <option disabled value="">--- Select Month ---</option>
                                            @foreach ($years as $year)
                                            <option value="{{ $year->year }}">{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                        </div>

                        <div class="panel_body table_body mt-3">
                            <div class="loading"><h4>Loading...</h4> </div>
                            <div class="table_area">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')

    <script>
        var menu = '';
        $('.fees_year_wise').hide();
        $('.fees_month_wise').hide();
        $('.report_form').hide();
        $('.table_body').hide();
        $('.form_field_body').hide();
        $('.period_field_area').hide();

        $(document).ready(function () {
            $('.income_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.income_report_form')[0].reset();
                $('.income_report_form').show();
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });

            $('.income_group_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide();
                $('.income_group_report_form')[0].reset();
                $('.income_group_report_form').show();
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            }); 
            
            $('.expanse_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.expense_report_form')[0].reset();
                $('.expense_report_form').show();
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });
            
            $('.expanse_group_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.expense_group_report_form')[0].reset();
                $('.expense_group_report_form').show(100);
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });
            
            $('.salary_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.salary_report_form')[0].reset();
                $('.salary_report_form').show(100);
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.month_wise_year_or_month').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });
            
            $('.fees_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.fees_report_form')[0].reset();
                $('.fees_report_form').show(100);
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.month_wise_year_or_month').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });
            
            $('.financial_balance_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.financial_balance_report_form')[0].reset();
                $('.financial_balance_report_form').show(100);
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.month_wise_year_or_month').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });
            
            $('.account_balance_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.report_form')[0].reset();
                $('.form_field_body').hide(100);
                $('.table_area').empty();
                $('.table_body').show(100);
                $('.loading').show(100);
                var url = $(this).data('route');
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show(100);
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide(100);
                            
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show(100);
                        }
                    },
                });
            });

            $(document).on('click', '.report_menu_link', function (e){
                menu = $(this).data('value');
            });

            $(document).on('change', '#select_type',function(){
                var value = $(this).val();
                if(value === 'period'){
                    $('.period_field_area').show();
                    $('.month_wise_year_or_month').hide();
                }else if(value === 'month_wise'){
                    $('.month_wise_year_or_month').show();
                    $('.month_wise').show();
                    $('.year_wise').hide();
                    $('.period_field_area').hide();
                }else if(value === 'year_wise'){
                    $('.month_wise').hide();
                    $('.year_wise').show();
                }
                else{
                    $('.period_field_area').hide(); 
                }
            });
        });
    </script> 

    <script>
        $(document).ready(function () {
            $('.income_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script>  

    <script>
        $(document).ready(function () {
            $('.income_group_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                            
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script>   
    
    <script>
        $(document).ready(function () {
            $('.expense_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                            
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script> 
    
    <script>
        $(document).ready(function () {
            $('.expense_group_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                            
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script> 
    
    <script>
        $(document).ready(function () {
            $('.salary_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script>
    
    <script>
        $(document).ready(function () {
            $('.fees_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script>
    
    <script>
        $(document).ready(function () {
            $('.financial_balance_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script>  

    <script type="text/javascript">
        $('.loading').hide(200);
        $(document).ready(function () {
            $(document).on('change','.select_class', function () {
                var classId = $(this).val();
                //console.log(menu);
                $.ajax({
                    url: "{{ url('admin/attendance/current/day/by/date/get/sections/by/') }}" + "/" + classId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if(menu == "student_report"){
                            //console.log(menu);
                            $('#sections').empty();
                            $('#sections').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            });
                        }

                        if(menu == "sibling_report"){
                            $('#sibling_sections').empty();
                            $('#sibling_sections').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#sibling_sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            });
                        }
                        
                        if(menu == "guardian_report"){
                            $('#guardian_sections').empty();
                            $('#guardian_sections').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#guardian_sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            });
                        }
                        if(menu == "class_subject_report"){
                            $('#class_subject_sections').empty();
                            $('#class_subject_sections').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#class_subject_sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            });
                        }
                    }
                })
            })
        });
    </script>   

    <script>
        $(document).ready(function () {
            $('.report_menu_list').on('click', function(){
                $('.report_menu_list').removeClass('list_background');
                $(this).addClass('list_background');
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.date_picker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true
            });
        });
    </script>
    
    <script>
        $(document).ready(function(){
            $('.year_month_picker').datepicker({
                format: "yyyy-MM",
                viewMode: "months", 
                minViewMode: "months",
                autoclose:true
            });
        });
    </script>

@endpush