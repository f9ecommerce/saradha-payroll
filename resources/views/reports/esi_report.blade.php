@extends('report')

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h2>SRI SARADA VIDYANILAYAM EDUCATIONAL SOCIETY</h2>
            <h3>ESI REPORT FOR THE MONTH OF {{ date("F", mktime(0, 0, 0, $report_month, 1)) }}, {{ $report_year }} </h3><br/>
          </div>

          @if($salaries->count())
	        <table class="table table-bordered table-condensed table-striped table-hover reports_table">
	          	<thead>
		          	<tr>
			          	<th>SL</th>
			          	<th>Code</th>
			          	<th colspan="2">Name</th>
			          	<th>BASIC</th>
			          	<th>HRA</th>
			          	<th>ESI Amount (1.75%)</th>
		          	</tr>
	          	</thead>

	          	<tbody>
	          		<?php
	          			$total_esi=0;
	          		?>
	          		@foreach($salaries as $key=>$salary)
	                    <tr>
	                        <td>{{$key+1}}</td>
	                        <td>{{$salary->employee->code}}</td>
	                        <td colspan="2">{{$salary->employee->name}}</td>
	                        <td>{{ $salary->basic_pay }}</td>
	                        <td>{{ $salary->hra }}</td>
                          <?php
                            $total_esi = $total_esi + round($salary->esi_amount);
                           ?>
	                        <td>{{ round($salary->esi_amount) }}</td>
	                    </tr>
	                @endforeach
	                <tr>
	                	<td colspan="4"><strong>Total</strong></td>
	                	<td><strong></strong></td>
	                	<td><strong></strong></td>
	                	<td><strong>{{ $total_esi }}</strong></td>
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
