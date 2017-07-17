@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Employees / Edit of {{$employee->name}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('code')) has-error @endif">
                       <label for="code-field">Code</label>
                    <input type="text" id="code-field" name="code" class="form-control" value="{{ is_null(old("code")) ? $employee->code : old("code") }}" readonly />
                       @if($errors->has("code"))
                        <span class="help-block">{{ $errors->first("code") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $employee->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('qualification')) has-error @endif">
                       <label for="qualification-field">Qualification</label>
                    <input type="text" id="qualification-field" name="qualification" class="form-control" value="{{ is_null(old("qualification")) ? $employee->qualification : old("qualification") }}"/>
                       @if($errors->has("qualification"))
                        <span class="help-block">{{ $errors->first("qualification") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('designation')) has-error @endif">
                       <label for="designation-field">Designation</label>
                    <input type="text" id="designation-field" name="designation" class="form-control" value="{{ is_null(old("designation")) ? $employee->designation : old("designation") }}"/>
                       @if($errors->has("designation"))
                        <span class="help-block">{{ $errors->first("designation") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('date_of_brith')) has-error @endif">
                       <label for="date_of_brith-field">Date of brith</label>
                    <input type="text" id="date_of_brith-field" name="date_of_brith" class="form-control date-picker" value="{{ is_null(old("date_of_brith")) ? $employee->date_of_brith->format('m/d/Y') : old("date_of_brith") }}"/>
                       @if($errors->has("date_of_brith"))
                        <span class="help-block">{{ $errors->first("date_of_brith") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('date_of_joining')) has-error @endif">
                       <label for="date_of_joining-field">Date of joining</label>
                    <input type="text" id="date_of_joining-field" name="date_of_joining" class="form-control date-picker" value="{{ is_null(old("date_of_joining")) ? $employee->date_of_joining->format('m/d/Y') : old("date_of_joining") }}"/>
                       @if($errors->has("date_of_joining"))
                        <span class="help-block">{{ $errors->first("date_of_joining") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('salary_amount')) has-error @endif">
                       <label for="salary_amount-field">Salary Amount</label>
                    <input type="text" id="salary_amount-field" name="salary_amount" class="form-control" value="{{ is_null(old("salary_amount")) ? $employee->salary_amount : old("salary_amount") }}"/>
                       @if($errors->has("salary_amount"))
                        <span class="help-block">{{ $errors->first("salary_amount") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('basic_pay')) has-error @endif">
                       <label for="basic_pay-field">Basic pay</label>
                    <input type="number" id="basic_pay-field" name="basic_pay" class="form-control" value="{{ is_null(old("basic_pay")) ? $employee->basic_pay : old("basic_pay") }}" readonly/>
                       @if($errors->has("basic_pay"))
                        <span class="help-block">{{ $errors->first("basic_pay") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('hra')) has-error @endif">
                       <label for="hra-field">Hra</label>
                    <input type="number" id="hra-field" name="hra" class="form-control" value="{{ is_null(old("hra")) ? $employee->hra : old("hra") }}" readonly/>
                       @if($errors->has("hra"))
                        <span class="help-block">{{ $errors->first("hra") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('washing_allowance')) has-error @endif">
                        <label for="washing_allowance-field">Washing Allowance</label>
                        <input type="number" id="washing_allowance-field" name="washing_allowance" class="form-control" value="{{ is_null(old("washing_allowance")) ? $employee->washing_allowance : old("washing_allowance") }}" readonly/>
                        @if($errors->has("washing_allowance"))
                          <span class="help-block">{{ $errors->first("washing_allowance") }}</span>
                        @endif
                    </div>

                    <div class="form-group @if($errors->has('pf_number')) has-error @endif">
                       <label for="pf_number-field">Pf number</label>
                    <input type="text" id="pf_number-field" name="pf_number" class="form-control" value="{{ is_null(old("pf_number")) ? $employee->pf_number : old("pf_number") }}"/>
                       @if($errors->has("pf_number"))
                        <span class="help-block">{{ $errors->first("pf_number") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('esi_number')) has-error @endif">
                       <label for="esi_number-field">ESI Number</label>
                    <input type="text" id="esi_number-field" name="esi_number" class="form-control" value="{{ is_null(old("esi_number")) ? $employee->esi_number : old("esi_number") }}"/>
                       @if($errors->has("esi_number"))
                        <span class="help-block">{{ $errors->first("esi_number") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('bank_account_no')) has-error @endif">
                       <label for="bank_account_no-field">Bank Account No</label>
                    <input type="text" id="bank_account_no-field" name="bank_account_no" class="form-control" value="{{ is_null(old("bank_account_no")) ? $employee->bank_account_no : old("bank_account_no") }}"/>
                       @if($errors->has("bank_account_no"))
                        <span class="help-block">{{ $errors->first("bank_account_no") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('mobile')) has-error @endif">
                       <label for="mobile-field">Mobile</label>
                    <input type="text" id="mobile-field" name="mobile" class="form-control" value="{{ is_null(old("mobile")) ? $employee->mobile : old("mobile") }}"/>
                       @if($errors->has("mobile"))
                        <span class="help-block">{{ $errors->first("mobile") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <textarea id="address-field" name="address" class="form-control">{{ is_null(old("address")) ? $employee->address : old("address") }}</textarea>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
					
					<div class="form-group @if($errors->has('profile_pic')) has-error @endif">
						<label for="profile_pic-field">Profile Picture</label>
						
						<input type="file" id="profile_pic-field" name="profile_pic" class="form-control">
						
						@if($errors->has("profile_pic"))
							<span class="help-block">{{ $errors->first("profile_pic") }}</span>
						@endif
                    </div>
					
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                       <label for="status-field">Status</label>
                    <div class="btn-group" data-toggle="buttons"><label class="btn btn-primary"><input type="radio" value="1" name="status" id="status-field" autocomplete="off"> True</label><label class="btn btn-primary active"><input type="radio" name="status" value="0" id="status-field" autocomplete="off"> False</label></div>
                       @if($errors->has("status"))
                        <span class="help-block">{{ $errors->first("status") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('employees.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>

    jQuery(document).ready(function($){
      $('#salary_amount-field').change(function(){

        var js_salary_amount = document.getElementById('salary_amount-field').value;
        if (js_salary_amount>29411) {
          $('#basic_pay-field').val(15000);
          var js_washing = (js_salary_amount*10)/100;
          $('#washing_allowance-field').val(js_washing);
          $('#hra-field').val(js_salary_amount - 15000 - js_washing);
        }else{
          $('#basic_pay-field').val((js_salary_amount*51)/100);
          $('#hra-field').val((js_salary_amount*39)/100);
          $('#washing_allowance-field').val((js_salary_amount*10)/100);
        }
      });
    });

    $('.date-picker').datepicker({
		format: 'mm/dd/yyyy'
    });
  </script>
@endsection
