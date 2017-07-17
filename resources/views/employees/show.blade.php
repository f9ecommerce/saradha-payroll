@extends('layout')
@section('header')
<div class="page-header">
        <h1>Employees / Show : {{$employee->name}}</h1>
        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('employees.edit', $employee->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                     <label for="code">CODE</label>
                     <p class="form-control-static">{{$employee->code}}</p>
                </div>
                    <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$employee->name}}</p>
                </div>
                <div class="form-group">
                     <label for="qualification">QUALIFICATION</label>
                     <p class="form-control-static">{{$employee->qualification}}</p>
                </div>
                    <div class="form-group">
                     <label for="designation">DESIGNATION</label>
                     <p class="form-control-static">{{$employee->designation}}</p>
                </div>
                    <div class="form-group">
                     <label for="date_of_brith">DATE OF BIRTH</label>
                     <p class="form-control-static">{{$employee->date_of_brith->format('d-m-Y')}}</p>
                </div>
                    <div class="form-group">
                     <label for="date_of_joining">DATE OF JOINING</label>
                     <p class="form-control-static">{{$employee->date_of_joining->format('d-m-Y')}}</p>
                </div>
                    <div class="form-group">
                     <label for="salary_amount">SALARY AMOUNT</label>
                     <p class="form-control-static">{{$employee->salary_amount}}</p>
                </div>
                <div class="form-group">
                     <label for="basic_pay">BASIC PAY</label>
                     <p class="form-control-static">{{$employee->basic_pay}}</p>
                </div>
                    <div class="form-group">
                     <label for="hra">HRA</label>
                     <p class="form-control-static">{{$employee->hra}}</p>
                </div>

                <div class="form-group">
                     <label for="washing_allowance">Washing Allowance</label>
                     <p class="form-control-static">{{$employee->washing_allowance}}</p>
                </div>

                    <div class="form-group">
                     <label for="pf_number">PF NUMBER</label>
                     <p class="form-control-static">{{$employee->pf_number}}</p>
                </div>

                <div class="form-group">
                     <label for="esi_number">ESI NUMBER</label>
                     <p class="form-control-static">{{$employee->esi_number}}</p>
                </div>

                <div class="form-group">
                     <label for="bank_account_no">BANK ACCOUNT NO</label>
                     <p class="form-control-static">{{$employee->bank_account_no}}</p>
                </div>
				<div class="form-group">
                     <label for="profile_pic">Profile Picture</label>
                     <p class="form-control-static"><img src="{{ $storagePath }}" width="200px" height="200px"/></p>
                </div>
                <div class="form-group">
                     <label for="mobile">Mobile</label>
                     <p class="form-control-static">{{$employee->mobile}}</p>
                </div>
                <div class="form-group">
                     <label for="address">Address</label>
                     <p class="form-control-static">{{$employee->address}}</p>
                </div>
                    <div class="form-group">
                     <label for="status">STATUS</label>
                     <p class="form-control-static">{{$employee->status == 1 ? 'Active' : 'Deactive'}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('employees.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection