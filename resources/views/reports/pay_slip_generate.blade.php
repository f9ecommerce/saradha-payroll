@extends('report')

@section('content')
    <div class="row">
        <div class="col-md-12">
          @if($salaries->count())

            @foreach($salaries as $key=>$salary)
              <div class="salary_slip_ind">
                <div class="row">
                  <div class="col-md-2 col-xs-2"><br/>
                    <img src="/images/logo.png" alt="Saradha Nilayam">
                  </div>
                  <div class="col-md-10 col-xs-10 text-center">
                    <h4>SRI SARADA VIDYA NILAYAM EDUCATIONAL SOCIETY</h4>
                    <h4>51-14-29/7, NAKKAVANIPALEM, KRANTHINAGAR, VISAKHAPATNAM-13</h4>
                    <h4>Ph: 0891-2553031</h4>
                    <p>SALARY SLIP FOR THE MONTH OF {{ date("F", mktime(0, 0, 0, $report_month, 1)) }}, {{ $report_year }} </p>
                  </div>
                </div>

                <table class="table table-bordered table-striped table-hover text-center">
                  <tr>
                    <td colspan="2"> Date : {{$now->format('d-m-Y')}} </td>
                    <td colspan="2"> Date of Birth: {{$salary->employee->date_of_brith->format('d-m-Y')}} </td>
                    <td colspan="2"> Date of Joining: {{$salary->employee->date_of_joining->format('d-m-Y')}} </td>
                  </tr>
                  <tr>
                    <td colspan="2"> Code: {{$salary->employee->code}} </td>
                    <td colspan="3"> Name: {{$salary->employee->name}} </td>
                    <td> Design: {{$salary->employee->designation}} </td>
                  </tr>
                  <tr>
                    <td colspan="2"> Total Salary: {{$salary->salary_amount}} </td>
                    <td colspan="2"> PF No: {{$salary->employee->pf_number}} </td>
                    <td> Att: {{cal_days_in_month(CAL_GREGORIAN, $report_month, $report_year)-$salary->no_of_leaves}} Days </td>
                    <td> Leaves: {{$salary->no_of_leaves}} </td>
                  </tr>
                  <tr>
                    <td colspan="2"> ALLOWANCES </td>
                    <td colspan="2"> DEDUCTIONS </td>
                    <td colspan="2"> </td>
                  </tr>
                  <tr>
                    <td> Basic Pay :<br/>
                         H.R.A. :<br/>
                         Washing Allowance :<br/>
                       </td>
                    <td> {{$salary->basic_pay}} <br/>
                         {{$salary->hra}} <br/>
                         {{$salary->washing_allowance}}
                       </td>
                    <td>  E.P.F. Fund :<br/>
                          E.S.I. Amount :<br/>
                          P.T. :<br/>
                          Leave :
                    </td>
                    <td> {{$salary->epf_fund}} <br/>
                         {{$salary->esi_amount}} <br/>
                         {{$salary->prof_tax}} <br/>
                         {{$salary->leave_encash}}
                    </td>
                    <td colspan="2">
                      <img src="{{ Storage::url($salary->employee->profile_pic) }}" width="100px" height="80px"/>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6"> <strong>Gross Salary : {{$salary->gross_slary}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Dedcutions: {{$salary->deductions}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Net Salary: {{$salary->net_salary}} </strong></td>
                  </tr>
                </table>
              </div>
              <br/><br/>
            @endforeach

          {!! $salaries->render() !!}
          @else
            <h3 class="text-center alert alert-info">Empty!</h3>
          @endif
        </div>
    </div>
@endsection
