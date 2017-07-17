@extends('report')

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h2>SRI SARADA VIDYANILAYAM EDUCATIONAL SOCIETY</h2>
            <h3>STAFF SALARY PARTICULARS FOR THE MONTH OF {{ date("F", mktime(0, 0, 0, $report_month, 1)) }}, {{ $report_year }} </h3><br/>
          </div>

          @if($salaries->count())
	        <table class="table table-bordered table-condensed table-striped table-hover reports_table">
	          	<thead>
		          	<tr>
			          	<th>SL</th>
			          	<th>Name</th>
			          	<th>Bank Account No</th>
			          	<th>Net</th>
		          	</tr>
	          	</thead>

	          	<tbody>
	          		@foreach($salaries as $key=>$salary)
	                    <tr>
	                        <td>{{$key+1}}</td>
	                        <td>{{$salary->employee->name}}</td>
	                        <td>{{$salary->employee->bank_account_no}}</td>
	                        <td>{{$salary->net_salary}}</td>
	                    </tr>
	                @endforeach
	                <tr>
                        <td colspan="2"></td>
                        <td><strong>Total</strong></td>
                        <td><strong>{{$total_net}}</strong></td>
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
