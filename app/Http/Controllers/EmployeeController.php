<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;
use Illuminate\Http\Request;

use DateTime;
use Storage;
use File;

class EmployeeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$employees = Employee::orderBy('id', 'asc')->paginate(20);

		return view('employees.index', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Employee::all()->last() != null)
			$employee_id = Employee::max('id')+1;
		else
			$employee_id = 1;
		return view('employees.create', compact('employee_id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'designation' => 'required',
			'date_of_brith' => 'required',
			'date_of_joining' => 'required',
			'salary_amount' => 'required',
			'basic_pay' => 'required',
			'hra' => 'required',
			'pf_number' => 'required',
			'bank_account_no' => 'required',
			'washing_allowance' => 'required',
			'esi_number' => 'required',
			'status' => 'required',
		]);

		$employee = new Employee();
		$employee->code = $request->input("code");
        $employee->name = $request->input("name");
        $employee->qualification = $request->input("qualification");
        $employee->designation = $request->input("designation");
        $employee->date_of_brith = date("Y-m-d", strtotime($request->input("date_of_brith")));
        $employee->date_of_joining = date("Y-m-d", strtotime($request->input("date_of_joining")));
        $employee->salary_amount = $request->input("salary_amount");
        $employee->basic_pay = $request->input("basic_pay");
        $employee->hra = $request->input("hra");
        $employee->washing_allowance = $request->input("washing_allowance");
        $employee->pf_number = $request->input("pf_number");
        $employee->esi_number = $request->input("esi_number");
        $employee->bank_account_no = $request->input("bank_account_no");
        $employee->status = $request->input("status");
        $employee->mobile = $request->input("mobile");
        $employee->address = $request->input("address");

		// Profile Pic storage
		$file = $request->file('profile_pic');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('public')->put($employee->code.'.'.$extension,  File::get($file));

		$employee->profile_pic = $employee->code.'.'.$extension;

		$employee->save();

		return redirect()->route('employees.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$employee = Employee::findOrFail($id);

		$storagePath  = Storage::url($employee->profile_pic);
		return view('employees.show', compact('employee','storagePath'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$employee = Employee::findOrFail($id);

		return view('employees.edit', compact('employee'));
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
		$employee = Employee::findOrFail($id);

		$this->validate($request, [
			'name' => 'required',
			'designation' => 'required',
			'date_of_brith' => 'required',
			'date_of_joining' => 'required',
			'basic_pay' => 'required',
			'hra' => 'required',
			'pf_number' => 'required',
			'esi_number' => 'required',
			'bank_account_no' => 'required',
			'status' => 'required',
			'washing_allowance' => 'required',
		]);

		$employee->code = $request->input("code");
        $employee->name = $request->input("name");
        $employee->qualification = $request->input("qualification");
        $employee->designation = $request->input("designation");
        $employee->date_of_brith = date("Y-m-d", strtotime($request->input("date_of_brith")));
        $employee->date_of_joining = date("Y-m-d", strtotime($request->input("date_of_joining")));
        $employee->salary_amount = $request->input("salary_amount");
        $employee->basic_pay = $request->input("basic_pay");
        $employee->hra = $request->input("hra");
        $employee->washing_allowance = $request->input("washing_allowance");
        $employee->pf_number = $request->input("pf_number");
        $employee->esi_number = $request->input("esi_number");
        $employee->bank_account_no = $request->input("bank_account_no");
        $employee->status = $request->input("status");
        $employee->mobile = $request->input("mobile");
        $employee->address = $request->input("address");

		// Profile Pic storage
		if ($request->file('profile_pic')) {
			$file = $request->file('profile_pic');
			$extension = $file->getClientOriginalExtension();
			Storage::disk('public')->put($employee->code.'.'.$extension,  File::get($file));

			$employee->profile_pic = $employee->code.'.'.$extension;
		}

		$employee->save();

		return redirect()->route('employees.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$employee = Employee::findOrFail($id);
		$employee->delete();

		return redirect()->route('employees.index')->with('message', 'Item deleted successfully.');
	}

	public function employee_report(){

		$employees = Employee::orderBy('id', 'asc')->paginate(1000);

		return view('employees.employee_report', compact('employees'));
	}
}
