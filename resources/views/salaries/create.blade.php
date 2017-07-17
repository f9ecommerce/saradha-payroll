@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Salaries / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <form action="{{ route('salaries.store') }}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table class="table table-bordered table-striped table-hover table-condensed">
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Salary</th>
                  <th>Basic Pay</th>
                  <th>HRA</th>
                  <th>WASH ALLO</th>
                  <th>No of Leaves</th>
                </tr>
                @foreach($employees as $employee)
                  <tr>
                    <td>{{ $employee->code }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td>{{ $employee->salary_amount }}</td>
                    <td>{{ $employee->basic_pay }}</td>
                    <td>{{ $employee->hra }}</td>
                    <td>{{ $employee->washing_allowance }}</td>
                    <td><input type="number" min="0" step="0.5" max="31" id="no_of_leaves-field" name="no_of_leaves[]" value="{{ old("no_of_leaves") }}" required/></td>
                  </tr>
                @endforeach
                <tr>
                  <td colspan="7"></td>
                  <td><button type="submit" class="btn btn-primary">Add Salary</button></td>
                </tr>
              </table>
            </form>
          </div>
          <!--
            <form action="{{ route('salaries.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('no_of_leaves')) has-error @endif">
                       <label for="no_of_leaves-field">No_of_leaves</label>
                    <input type="text" id="no_of_leaves-field" name="no_of_leaves" class="form-control" value="{{ old("no_of_leaves") }}"/>
                       @if($errors->has("no_of_leaves"))
                        <span class="help-block">{{ $errors->first("no_of_leaves") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('basic_pay')) has-error @endif">
                       <label for="basic_pay-field">Basic_pay</label>
                    <input type="text" id="basic_pay-field" name="basic_pay" class="form-control" value="{{ old("basic_pay") }}"/>
                       @if($errors->has("basic_pay"))
                        <span class="help-block">{{ $errors->first("basic_pay") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('hra')) has-error @endif">
                       <label for="hra-field">Hra</label>
                    <input type="text" id="hra-field" name="hra" class="form-control" value="{{ old("hra") }}"/>
                       @if($errors->has("hra"))
                        <span class="help-block">{{ $errors->first("hra") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('leave_encash')) has-error @endif">
                       <label for="leave_encash-field">Leave_encash</label>
                    <input type="text" id="leave_encash-field" name="leave_encash" class="form-control" value="{{ old("leave_encash") }}"/>
                       @if($errors->has("leave_encash"))
                        <span class="help-block">{{ $errors->first("leave_encash") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('epf_fund')) has-error @endif">
                       <label for="epf_fund-field">Epf_fund</label>
                    <input type="text" id="epf_fund-field" name="epf_fund" class="form-control" value="{{ old("epf_fund") }}"/>
                       @if($errors->has("epf_fund"))
                        <span class="help-block">{{ $errors->first("epf_fund") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('prof_tax')) has-error @endif">
                       <label for="prof_tax-field">Prof_tax</label>
                    <input type="text" id="prof_tax-field" name="prof_tax" class="form-control" value="{{ old("prof_tax") }}"/>
                       @if($errors->has("prof_tax"))
                        <span class="help-block">{{ $errors->first("prof_tax") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('gross_slary')) has-error @endif">
                       <label for="gross_slary-field">Gross_slary</label>
                    <input type="text" id="gross_slary-field" name="gross_slary" class="form-control" value="{{ old("gross_slary") }}"/>
                       @if($errors->has("gross_slary"))
                        <span class="help-block">{{ $errors->first("gross_slary") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('deductions')) has-error @endif">
                       <label for="deductions-field">Deductions</label>
                    <input type="text" id="deductions-field" name="deductions" class="form-control" value="{{ old("deductions") }}"/>
                       @if($errors->has("deductions"))
                        <span class="help-block">{{ $errors->first("deductions") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('net_salary')) has-error @endif">
                       <label for="net_salary-field">Net_salary</label>
                    <input type="text" id="net_salary-field" name="net_salary" class="form-control" value="{{ old("net_salary") }}"/>
                       @if($errors->has("net_salary"))
                        <span class="help-block">{{ $errors->first("net_salary") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('month')) has-error @endif">
                       <label for="month-field">Month</label>
                    <input type="text" id="month-field" name="month" class="form-control" value="{{ old("month") }}"/>
                       @if($errors->has("month"))
                        <span class="help-block">{{ $errors->first("month") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('year')) has-error @endif">
                       <label for="year-field">Year</label>
                    <input type="text" id="year-field" name="year" class="form-control" value="{{ old("year") }}"/>
                       @if($errors->has("year"))
                        <span class="help-block">{{ $errors->first("year") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('employee_id')) has-error @endif">
                       <label for="employee_id-field">Employee_id</label>
                    <input type="text" id="employee_id-field" name="employee_id" class="form-control" value="{{ old("employee_id") }}"/>
                       @if($errors->has("employee_id"))
                        <span class="help-block">{{ $errors->first("employee_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('salaries.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>
          -->

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
