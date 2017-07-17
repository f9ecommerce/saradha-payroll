<?php namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Salary;
use App\Employee;
use Illuminate\Http\Request;


class SalaryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$now = Carbon::now();

		$salaries = Salary::where([['month', '=', $now->month-1],['year','=',$now->year]])->orderBy('id', 'asc')->paginate(20);

		return view('salaries.index', compact('salaries','now'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$employees = Employee::where('status', '=', 1)->orderBy('id', 'asc')->get();
		return view('salaries.create', compact('employees'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$employees = Employee::where('status', '=', 1)->orderBy('id', 'asc')->get();

		$now = Carbon::now();

		$no_of_days_in_month = cal_days_in_month(CAL_GREGORIAN, $now->month-1, $now->year);

		for ($i = 0; $i < sizeof($employees); $i++) {

			$salary = new Salary();
			$salary->no_of_leaves = $request->input("no_of_leaves")[$i];

			$salary->salary_amount = $employees[$i]->salary_amount;

			$basic_pay_leave = ( $employees[$i]->basic_pay / $no_of_days_in_month ) * $salary->no_of_leaves;
	        $salary->basic_pay = $employees[$i]->basic_pay - $basic_pay_leave;

	        $hra_leave = ( $employees[$i]->hra / $no_of_days_in_month ) * $salary->no_of_leaves;
	        $salary->hra = $employees[$i]->hra - $hra_leave;

	        $washing_leave = ( $employees[$i]->washing_allowance / $no_of_days_in_month ) * $salary->no_of_leaves;
	        $salary->washing_allowance = ($employees[$i]->washing_allowance) - $washing_leave;

	        $sal_stat = $employees[$i]->basic_pay + $employees[$i]->hra + $employees[$i]->washing_allowance;

	        $salary->leave_encash = $basic_pay_leave +  $hra_leave + $washing_leave;
	        $salary->epf_fund = ($salary->basic_pay * 12)/100;
	        $salary->esi_amount = $salary->salary_amount>21000 ? 0 : (( ( $salary->basic_pay + $salary->hra ) * 1.75)/100);

	        if ( $salary->salary_amount > 15000 && $salary->salary_amount <= 20000) {
	        	$salary->prof_tax = 150;
	        }elseif ($sal_stat > 20000) {
	        	$salary->prof_tax = 200;
	        }

	        $salary->gross_slary = $salary->basic_pay + $salary->hra + $salary->washing_allowance;
	        $salary->deductions =  $salary->epf_fund + $salary->prof_tax + $salary->esi_amount;
	        $salary->net_salary =$salary->gross_slary - $salary->deductions;
	        $salary->month = $now->month-1;
	        $salary->year = $now->year;
	        $salary->employee_id = $employees[$i]->id;

			$salary->save();

		}

		return redirect()->route('salaries.index')->with('message', 'Salaries created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$salary = Salary::findOrFail($id);

		return view('salaries.show', compact('salary'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$salary = Salary::findOrFail($id);

		return view('salaries.edit', compact('salary'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$salary = Salary::findOrFail($id);

		$now = Carbon::now();

		$no_of_days_in_month = cal_days_in_month(CAL_GREGORIAN, $now->month-1, $now->year);

		$salary->no_of_leaves = $request->input("no_of_leaves");

		$salary->salary_amount = $request->input("salary_amount");

        $basic_pay_leave = ( $request->input("basic_pay") / $no_of_days_in_month ) * $salary->no_of_leaves;
        $salary->basic_pay = $request->input("basic_pay") - $basic_pay_leave;

        $hra_leave = ( $request->input("hra") / $no_of_days_in_month ) * $salary->no_of_leaves;
        $salary->hra = $request->input("hra") - $hra_leave;

        $washing_leave = ( $request->input("washing_allowance") / $no_of_days_in_month ) * $salary->no_of_leaves;
        $salary->washing_allowance = $request->input("washing_allowance") - $washing_leave;

        $salary->leave_encash = $basic_pay_leave +  $hra_leave + $washing_leave;

        $salary->epf_fund = ($salary->basic_pay * 12)/100;
        $salary->esi_amount = $salary->salary_amount>21000 ? 0 : (( ( $salary->basic_pay + $salary->hra ) * 1.75)/100);

        $salary->prof_tax = $request->input("prof_tax");
        $salary->gross_slary = $salary->basic_pay + $salary->hra + $salary->washing_allowance;
        $salary->deductions =  $salary->epf_fund + $salary->prof_tax + $salary->esi_amount;

        $salary->net_salary = $salary->gross_slary - $salary->deductions;
        $salary->month = $request->input("month");
        $salary->year = $request->input("year");
        $salary->employee_id = $request->input("employee_id");

		$salary->save();

		return redirect()->route('salaries.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$salary = Salary::findOrFail($id);
		$salary->delete();

		return redirect()->route('salaries.index')->with('message', 'Item deleted successfully.');
	}

	public function delete_current_salaries(Request $request){

		$cur_salaries = Salary::where([['month', '=', $request->input("month")],['year','=',$request->input("year")]]);

		$cur_salaries->delete();

		return redirect()->route('salaries.index')->with('message', 'Current Salaries are deleted successfully.');
	}
}
