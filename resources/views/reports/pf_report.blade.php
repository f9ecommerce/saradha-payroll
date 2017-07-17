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
			          	<th>Code</th>
			          	<th colspan="2">Name</th>
			          	<th>BASIC</th>
			          	<th>3.67%</th>
			          	<th>8.33%</th>
			          	<th>EPF Amount (12%)</th>
		          	</tr>
	          	</thead>

	          	<tbody>
	          		<?php
	          			$total_basic=0;
	          			$total_epf_3=0;
	          			$total_epf_8=0;
	          			$total_epf_12=0;
	          		?>
	          		@foreach($salaries as $key=>$salary)
	                    <tr>
	                        <td>{{$key+1}}</td>
	                        <td>{{$salary->employee->code}}</td>
	                        <td colspan="2">{{$salary->employee->name}}</td>
	                        <?php
	                        	$round_basic = round($salary->basic_pay);
	                        	$total_basic = $total_basic + $round_basic;
	                        ?>
	                        <td>{{ $round_basic }}</td>
	                        <?php
	                        	$total_epf_3 = $total_epf_3 + round(($salary->basic_pay*3.67)/100,2);
	                        	$total_epf_8 = $total_epf_8 + round(($salary->basic_pay*8.33)/100,2);
	                        	$total_epf_12 = $total_epf_12 + round(($salary->basic_pay*12)/100);
	                        ?>
	                        <td>{{ round(($salary->basic_pay*3.67)/100,2) }}</td>
	                        <td>{{ round(($salary->basic_pay*8.33)/100,2) }}</td>
	                        <td>{{ round(($salary->basic_pay*12)/100) }}</td>
	                    </tr>
	                @endforeach
	                <tr>
	                	<td colspan="4"><strong>Total</strong></td>
	                	<td><strong>{{ $total_basic }}</strong></td>
	                	<td><strong>{{ $total_epf_3 }}</strong></td>
	                	<td><strong>{{ $total_epf_8 }}</strong></td>
	                	<td><strong>{{ $total_epf_12 }}</strong></td>
	                </tr>
	        	</tbody>
	          </table>
	        {!! $salaries->render() !!}
	        <div class="text-center">
	        	<strong>DETAILED SUMMARY OF EMPLOYEE PROVIDENT FUND DEDUCTIONS/CONTRIBUTIONS</strong><br/>
	        	<strong>ACCOUNT NO.1 EMPLOYEES SHARE @ 12%		:	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INR {{ $total_epf_12 }}/-</strong><br/>
	        	<strong>ACCOUNT NO.1 EMPLOYEES SHARE @ 8.33%	:	&nbsp;&nbsp;&nbsp;&nbsp;INR {{ $total_epf_8 }}/-</strong><br/>
	        	<strong>ACCOUNT NO.1 EMPLOYEES SHARE @ 3.67%	:	&nbsp;&nbsp;&nbsp;&nbsp;INR {{ $total_epf_3 }}/-</strong>
	        </div>
          @else
            <h3 class="text-center alert alert-info">Empty!</h3>
          @endif
        </div>
    </div>
@endsection
