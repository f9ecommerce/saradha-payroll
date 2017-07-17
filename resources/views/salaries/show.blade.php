@extends('layout')
@section('header')
<div class="page-header">
        <h1>Salary of {{$salary->employee->name}}</h1>
        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('salaries.edit', $salary->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                     <label for="no_of_leaves">EMPLOYEE CODE</label>
                     <p class="form-control-static">{{$salary->employee->code}}</p>
                </div>
                <div class="form-group">
                     <label for="no_of_leaves">EMPLOYEE NAME</label>
                     <p class="form-control-static">{{$salary->employee->name}}</p>
                </div>
                <div class="form-group">
                     <label for="no_of_leaves">NO OF LEAVES</label>
                     <p class="form-control-static">{{$salary->no_of_leaves}}</p>
                </div>
                <div class="form-group">
                     <label for="salary_amount">SALARY AMOUNT</label>
                     <p class="form-control-static">{{$salary->salary_amount}}</p>
                </div>
                    <div class="form-group">
                     <label for="basic_pay">BASIC PAY</label>
                     <p class="form-control-static">{{$salary->basic_pay}}</p>
                </div>
                    <div class="form-group">
                     <label for="hra">HRA</label>
                     <p class="form-control-static">{{$salary->hra}}</p>
                </div>
                <div class="form-group">
                     <label for="washing_allowance">WASHING ALLOWANCE</label>
                     <p class="form-control-static">{{$salary->washing_allowance}}</p>
                </div>
                    <div class="form-group">
                     <label for="leave_encash">LEAVE ENCASH</label>
                     <p class="form-control-static">{{$salary->leave_encash}}</p>
                </div>
                    <div class="form-group">
                     <label for="epf_fund">EPF FUND</label>
                     <p class="form-control-static">{{$salary->epf_fund}}</p>
                </div>
                <div class="form-group">
                     <label for="esi_amount">ESI AMOUNT</label>
                     <p class="form-control-static">{{$salary->esi_amount}}</p>
                </div>
                    <div class="form-group">
                     <label for="prof_tax">PROFESSIONAL TAX</label>
                     <p class="form-control-static">{{$salary->prof_tax}}</p>
                </div>
                    <div class="form-group">
                     <label for="gross_slary">GROSS SLARY</label>
                     <p class="form-control-static">{{$salary->gross_slary}}</p>
                </div>
                    <div class="form-group">
                     <label for="deductions">DEDUCTIONS</label>
                     <p class="form-control-static">{{$salary->deductions}}</p>
                </div>
                    <div class="form-group">
                     <label for="net_salary">NET SALARY</label>
                     <p class="form-control-static">{{$salary->net_salary}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('salaries.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection