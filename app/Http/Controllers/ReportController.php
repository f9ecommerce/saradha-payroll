<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Salary;

use Carbon\Carbon;

class ReportController extends Controller
{
    public function pay_slip(){
    	$now = Carbon::now();
    	return view('reports.pay_slip', compact('now'));
    }

    public function pay_slip_generate(Request $request){


    	$report_month = $request->input("report_month");
    	$report_year = $request->input("report_year");

    	$salaries = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->orderBy('id', 'asc')->paginate(1000);

        switch ($request->input("report_name")) {
    		case 'pay_slip':
                $title = "Pay Slip";
                $now = Carbon::now();
    			return view('reports.pay_slip_generate', compact('report_month', 'report_year','salaries','now','title'));
    			break;
    		case 'salary_sheet':
                $title = "Salary Sheet";
                $total_salary = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('salary_amount');
                $total_basic = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('basic_pay');
                $total_hra = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('hra');
                $total_washing_allowance = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('washing_allowance');
                $total_leaves = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('no_of_leaves');
                $total_leave_encash = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('leave_encash');
                $total_epf = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('epf_fund');
                $total_esi = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('esi_amount');
                $total_pt = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('prof_tax');
                $total_gross = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('gross_slary');
                $total_ded = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('deductions');
                $total_net = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('net_salary');
    			return view('reports.salary_sheet', compact('report_month', 'report_year','salaries','total_salary','total_basic','total_hra','total_washing_allowance','total_leaves','total_leave_encash','total_epf','total_esi','total_pt','total_gross','total_ded','total_net','title'));
    			break;
    		case 'salary_bill':
                $title = "Salary Bill";
    			return view('reports.salary_bill', compact('report_month', 'report_year','salaries','title'));
    			break;
    		case 'pf_report':
                $title = "PF Report";
                return view('reports.pf_report', compact('report_month', 'report_year','salaries','title'));
    			break;
    		case 'salary_statment':
                $title = "Salary Statement";
                $total_net = Salary::where([['month', '=', $report_month],['year','=',$report_year]])->sum('net_salary');
    			return view('reports.salary_statment', compact('report_month', 'report_year','salaries','total_net','title'));
    			break;
        case 'esi_report':
          $title = "ESI Report";
          return view('reports.esi_report', compact('report_month', 'report_year','salaries','title'));
          break;
    	}

    }
}
