@extends('report')

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="text-center report_heading">
            <h2>SRI SARADA VIDYANILAYAM EDUCATIONAL SOCIETY</h2>
            <h3>SALARY BILL FOR THE MONTH OF {{ date("F", mktime(0, 0, 0, $report_month, 1)) }}, {{ $report_year }} </h3><br/>
          </div>
          <br/>
          @if($salaries->count())
          		@foreach($salaries as $key=>$salary)
          			<table class="table borderless table-condensed sbill_ind" border="0" cellspacing="0" cellpadding="0">
			      		<tr>
			      			<td colspan="2"></td>
			      			<td>{{$salary->employee->code}}</td>
			      			<td>Name</td>
			      			<td>: <strong>{{$salary->employee->name}}</strong></td>
			      		</tr>
			      		<tr>
			      			<td>Basic Pay</td>
			      			<td>HRA</td>
			      			<td>WL</td>
			      			<td>LDA</td>
			      			<td>Gross</td>
			      			<td>PF</td>
			      			<td>ESI</td>
			      			<td>PT</td>
			      			<td>Deductions</td>
			      			<td>Net Salary</td>
			      		</tr>
			      		<tr>
			      			<td>{{$salary->basic_pay}}</td>
			      			<td>{{$salary->hra}}</td>
			      			<td>{{$salary->washing_allowance}}</td>
			      			<td>{{$salary->leave_encash}}</td>
			      			<td>{{$salary->gross_slary}}</td>
			      			<td>{{$salary->epf_fund}}</td>
			      			<td>{{$salary->esi_amount}}</td>
			      			<td>{{$salary->prof_tax}}</td>
			      			<td>{{$salary->deductions}}</td>
			      			<td>{{$salary->net_salary}}</td>
			      		</tr>
			      		<tr>
			      			<td colspan="9"></td>
			      			<td><br/><br/><br/>{{$salary->employee->name}}</td>
			      		</tr>
			      	</table><br/>
                @endforeach
	        	{!! $salaries->render() !!}
          @else
            <h3 class="text-center alert alert-info">Empty!</h3>
          @endif
        </div>
    </div>
@endsection
