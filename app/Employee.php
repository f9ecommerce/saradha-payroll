<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
	protected $dates = ['date_of_brith','date_of_joining'];

	public function salaries(){
		return $this->hasMany('App\Salary');
	}

	// this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($employee) { // before delete() method call this
             $employee->salaries()->delete();
        });
    }
}
