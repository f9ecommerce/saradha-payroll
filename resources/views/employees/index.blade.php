@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-user"></i> Employees
            <a class="btn btn-success pull-right" href="{{ route('employees.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($employees->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>CODE</th>
                            <th>NAME</th>
                            <th>DESIGNATION</th>
                            <th>SALARY</th>
                            <th>BASIC PAY</th>
                            <th>HRA</th>
                            <th>WASH ALLO</th>
                            <th>PF NUMBER</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->code}}</td>
								<td>{{$employee->name}}</td>
								<td>{{$employee->designation}}</td>
                                <td>{{$employee->salary_amount}}</td>
								<td>{{$employee->basic_pay}}</td>
                                <td>{{$employee->hra}}</td>
								<td>{{$employee->washing_allowance}}</td>
								<td>{{$employee->pf_number}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('employees.show', $employee->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('employees.edit', $employee->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $employees->render() !!}

                <a href="/employees/employee_report" target="_blank" class="btn btn-success pull-right">Employee Report</a>
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection