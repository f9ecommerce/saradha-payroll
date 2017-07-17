@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-indent-right"></i> Report Generation
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        	<form class="form-horizontal" target="_blank" action="/reports/pay_slip_generate" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="report_month" class="col-sm-2 control-label">Month</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="report_month" name="report_month">
                            <option value="1" {{ $now->month-1 == 1 ? 'selected' : '' }}>January</option>
                            <option value="2" {{ $now->month-1 == 2 ? 'selected' : '' }}>February</option>
                            <option value="3" {{ $now->month-1 == 3 ? 'selected' : '' }}>March</option>
                            <option value="4" {{ $now->month-1 == 4 ? 'selected' : '' }}>April</option>
                            <option value="5" {{ $now->month-1 == 5 ? 'selected' : '' }}>May</option>
                            <option value="6" {{ $now->month-1 == 6 ? 'selected' : '' }}>June</option>
                            <option value="7" {{ $now->month-1 == 7 ? 'selected' : '' }}>July</option>
                            <option value="8" {{ $now->month-1 == 8 ? 'selected' : '' }}>August</option>
                            <option value="9" {{ $now->month-1 == 9 ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $now->month-1 == 10 ? 'selected' : '' }}>October</option>
                            <option value="11" {{ $now->month-1 == 11 ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $now->month-1 == 12 ? 'selected' : '' }}>December</option>
                        </select>
                    </div>

                    <label for="report_year" class="col-sm-2 control-label">Year</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="report_year" name="report_year">
                            <option value="2017" {{ $now->year == 2017 ? 'selected' : '' }}>2017</option>
                            <option value="2018" {{ $now->year == 2018 ? 'selected' : '' }}>2018</option>
                            <option value="2019" {{ $now->year == 2019 ? 'selected' : '' }}>2019</option>
                            <option value="2020" {{ $now->year == 2020 ? 'selected' : '' }}>2020</option>
                            <option value="2021" {{ $now->year == 2021 ? 'selected' : '' }}>2021</option>
                            <option value="2022" {{ $now->year == 2022 ? 'selected' : '' }}>2022</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="report_name" class="col-sm-2 control-label">Report</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="report_name" name="report_name">
                            <option value="pay_slip">Pay Slip</option>
                            <option value="salary_sheet">Salary Sheet</option>
                            <option value="salary_bill">Salary Bill</option>
                            <option value="pf_report">PF Report</option>
                            <option value="salary_statment">Salary Statement</option>
                            <option value="esi_report">ESI Report</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Generate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
