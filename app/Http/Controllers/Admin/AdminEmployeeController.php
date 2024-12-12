<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminEmployeeController extends Controller
{
    public function index()
    {
        $services = Services::all();
        $employees = Employee::paginate(20);
        return view('admin.employees.index', compact('employees', 'services'));
    }

    public function show(string $id): JsonResponse
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json([
                'success' => false,
                'message' => 'Employee not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'employee' => $employee
        ], 200);
    }


    public function store(EmployeeRequest $request)
{
    $validatedData = $request->validated();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->storeAs('employees', $imageName, 'public');
        $validatedData['image'] = 'employees/' . $imageName;
    }

    // Create the employee record
    Employee::create($validatedData);

    // Redirect back with a success message
    return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
}

    




public function update(EmployeeRequest $request, string $id)
{
    $validatedData = $request->validated();
    $employee = Employee::findOrFail($id);
    
   
    $employee->name = $validatedData['name'];
   
    $employee->salary = $validatedData['salary'];
    $employee->email = $validatedData['email'];
    $employee->phone = $validatedData['phone'];
    $employee->service_id = $validatedData['service_id']; 
    

    if ($request->hasFile('image')) {
   
        if ($employee->image && file_exists(storage_path('app/public/employees/' . $employee->image))) {
            unlink(storage_path('app/public/employees/' . $employee->image));
        }

     
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/employees', $imageName);
        $employee->image = $imageName;
    }
    $employee->save();
    return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
}

    public function destroy(string $id)
    {

        $employee = Employee::findOrFail($id);

        if (!$employee) {

            return redirect()->back()->with('error', 'Employee not found.');
        }
        $employee->delete();
        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }

}