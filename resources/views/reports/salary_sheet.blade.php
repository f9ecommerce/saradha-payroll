@extends('report')

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h2>SRI SARADA VIDYANILAYAM EDUCATIONAL SOCIETY</h2>
            <h3>SALARY SHEET FOR THE MONTH OF {{ date("F", mktime(0, 0, 0, $report_month, 1)) }}, {{ $report_year }} </h3><br/>
          </div>

          @if($salaries->count())
	        <table class="table table-bordered table-condensed table-striped table-hover reports_table">
	          	<thead>
		          	<tr>
			          	<th>SL</th>
			          	<th>Code</th>
			          	<th>Name</th>
			          	<th>Salary</th>
			          	<th>Basic</th>
			          	<th>HRA</th>
			          	<th>WL</th>
			          	<th>LDD</th>
			          	<th>LDA</th>
			          	<th>EPF</th>
			          	<th>ESI</th>
			          	<th>PT</th>
			          	<th>Gross</th>
			          	<th>Deduction</th>
			          	<th>Net</th>
		          	</tr>
	          	</thead>

	          	<tbody>
	          		@foreach($salaries as $key=>$salary)
	                    <tr>
	                        <td>{{$key+1}}</td>
	                        <td>{{$salary->employee->code}}</td>
	                        <td>{{$salary->employee->name}}</td>
	                        <td>{{ $salary->salary_amount}}</td>
	                        <td>{{$salary->basic_pay}}</td>
	                        <td>{{$salary->hra}}</td>
	                        <td>{{$salary->washing_allowance}}</td>
	                        <td>{{$salary->no_of_leaves}}</td>
	                        <td>{{$salary->leave_encash}}</td>
	                        <td>{{$salary->epf_fund}}</td>
	                        <td>{{$salary->esi_amount}}</td>
	                        <td>{{$salary->prof_tax}}</td>
	                        <td>{{$salary->gross_slary}}</td>
	                        <td>{{$salary->deductions}}</td>
	                        <td>{{$salary->net_salary}}</td>
	                    </tr>
	                @endforeach

	                <tr>
	                	<td colspan="3"> <strong>Total</strong> </td>
	                	<td>{{ $total_salary }}</td>
	                	<td>{{ $total_basic }}</td>
	                	<td>{{ $total_hra }}</td>
	                	<td>{{ $total_washing_allowance }}</td>
	                	<td>{{ $total_leaves }}</td>
	                	<td>{{ $total_leave_encash }}</td>
	                	<td>{{ $total_epf }}</td>
	                	<td>{{ $total_esi }}</td>
	                	<td>{{ $total_pt }}</td>
	                	<td>{{ $total_gross }}</td>
	                	<td>{{ $total_ded }}</td>
	                	<td>{{ $total_net }}</td>
	                </tr>
	        	</tbody>
	          </table>
	        {!! $salaries->render() !!}
          @else
            <h3 class="text-center alert alert-info">Empty!</h3>
          @endif
        </div>
    </div>
@endsection
