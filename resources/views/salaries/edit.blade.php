@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Salaries / Edit #{{$salary->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('no_of_leaves')) has-error @endif">
                   <label for="no_of_leaves-field">No of leaves</label>
                <input type="number" step="0.5" id="no_of_leaves-field" name="no_of_leaves" class="form-control" value="{{ is_null(old("no_of_leaves")) ? $salary->no_of_leaves : old("no_of_leaves") }}"/>
                   @if($errors->has("no_of_leaves"))
                    <span class="help-block">{{ $errors->first("no_of_leaves") }}</span>
                   @endif
                </div>

                <input type="hidden" name="salary_amount" value="{{ $salary->salary_amount }}"/>

                <input type="hidden" name="basic_pay" value="{{ is_null(old("basic_pay")) ? $salary->basic_pay : old("basic_pay") }}"/>
                
                <input type="hidden" name="hra" value="{{ is_null(old("hra")) ? $salary->hra : old("hra") }}"/>

                <input type="hidden" name="washing_allowance" value="{{ is_null(old("washing_allowance")) ? $salary->washing_allowance : old("washing_allowance") }}"/>
                
                <input type="hidden" name="leave_encash" value="{{ is_null(old("leave_encash")) ? $salary->leave_encash : old("leave_encash") }}"/>
                
                <input type="hidden" name="epf_fund" value="{{ is_null(old("epf_fund")) ? $salary->epf_fund : old("epf_fund") }}"/>
                
                <input type="hidden" name="esi_amount" value="{{ is_null(old("esi_amount")) ? $salary->esi_amount : old("esi_amount") }}"/>
                
                <input type="hidden" name="prof_tax" value="{{ is_null(old("prof_tax")) ? $salary->prof_tax : old("prof_tax") }}"/>
                
                <input type="hidden" name="gross_slary" value="{{ is_null(old("gross_slary")) ? $salary->gross_slary : old("gross_slary") }}"/>
                
                <input type="hidden" name="deductions" value="{{ is_null(old("deductions")) ? $salary->deductions : old("deductions") }}"/>
                
                <input type="hidden" name="net_salary" value="{{ is_null(old("net_salary")) ? $salary->net_salary : old("net_salary") }}"/>
                
                <input type="hidden" name="month" value="{{ is_null(old("month")) ? $salary->month : old("month") }}"/>
                
                <input type="hidden" name="year" value="{{ is_null(old("year")) ? $salary->year : old("year") }}"/>
                
                <input type="hidden" name="employee_id" value="{{ is_null(old("employee_id")) ? $salary->employee_id : old("employee_id") }}"/>
               
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('salaries.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
