<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Get the employee ID from the route as a string
        $employeeId = $this->route('employee');
    
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                "unique:employees,email,$employeeId",
            ],
            'phone' => 'required|string|max:15',
            
            'salary' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'service_id' => 'required|exists:services,id',

        ];
    }
    

    public function messages()
    {
        return [
            'name.required' => 'Employee name is required',
            'email.required' => 'Email address is required',
            'email.unique' => 'This email is already registered',
            'phone.required' => 'Phone number is required',
           
            'salary.required' => 'Salary is required',
            'salary.min' => 'Salary cannot be negative',
            'image.image' => 'File must be an image',
            'image.mimes' => 'Image must be jpeg, png, or jpg format',
            'image.max' => 'Image size cannot exceed 2MB'
        ];
    }
}