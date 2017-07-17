@extends('layout')

@section('header')
    <div class="page-header clearfix">

        <div class="col-md-3">

            <h1>
                <i class="glyphicon glyphicon-list"></i> Salaries 
            </h1>

        </div>
           
        <div class="col-md-9">

            <form action="/salaries/delete_current_salaries" class="pull-right delete_salaries" method="get" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="month" value="{{ $now->month-1 }}">
                <input type="hidden" name="year" value="{{ $now->year }}">
                <button type="submit" class="btn btn-danger {{ $salaries->count() == 0 ? 'disabled' : ''}}"><i class="glyphicon glyphicon-trash"></i> Delete</button>
            </form>  

            <a class="btn btn-success pull-right {{ $salaries->count() > 0 ? 'disabled' : ''}}" href="{{ route('salaries.create') }}"><i class="glyphicon glyphicon-plus"></i> Create Salaries of {{ date("F", mktime(0, 0, 0, $now->month-1, 1)) }} Month</a>

        </div>
        
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($salaries->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>CODE</th>
                            <th>NAME</th>
                            <th>NO OF LEAVES</th>
                            <th>SALARY AMOUNT</th>
                            <th>BASIC PAY</th>
                            <th>HRA</th>
                            <th>WASH ALLOW</th>
                            <th>GROSS SLARY</th>
                            <th>DEDUCTIONS</th>
                            <th>NET SALARY</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($salaries as $salary)
                            <tr>
                                <td>{{$salary->employee->code}}</td>
                                <td>{{$salary->employee->name}}</td>
                                <td>{{$salary->no_of_leaves}}</td>                                
                                <td>{{$salary->salary_amount}}</td>
                                <td>{{$salary->basic_pay}}</td>
                                <td>{{$salary->hra}}</td>
                                <td>{{$salary->washing_allowance}}</td>
                                <td>{{$salary->gross_slary}}</td>
                                <td>{{$salary->deductions}}</td>
                                <td>{{$salary->net_salary}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('salaries.show', $salary->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('salaries.edit', $salary->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $salaries->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection