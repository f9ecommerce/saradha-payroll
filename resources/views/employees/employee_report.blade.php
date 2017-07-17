@extends('report')

@section('content')
    <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h2>SRI SARADA VIDYANILAYAM EDUCATIONAL SOCIETY</h2>
            <h3>TOTAL EMPLOYEES REPORT </h3><br/>
          </div>

          @if($employees->count())
	        <table class="table table-bordered table-condensed table-striped table-hover reports_table">
	          	<thead>
		          	<tr>
			          	<th>SL</th>
			          	<th>Name</th>
			          	<th>Qualification</th>
			          	<th>Designation</th>
			          	<th>Mobile</th>
		          	</tr>
	          	</thead>

	          	<tbody>
	          		@foreach($employees as $key=>$employee)
	                    <tr>
	                        <td>{{$key+1}}</td>
	                        <td>{{$employee->name}}</td>
	                        <td>{{$employee->qualification}}</td>
	                        <td>{{$employee->designation}}</td>
	                        <td>{{$employee->mobile}}</td>
	                    </tr>
	                @endforeach
	        	</tbody>
	          </table>
	        {!! $employees->render() !!}
          @else
            <h3 class="text-center alert alert-info">Empty!</h3>
          @endif
        </div>
    </div>
@endsection
