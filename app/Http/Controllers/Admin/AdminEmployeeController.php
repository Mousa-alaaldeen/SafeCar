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
    
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '-' . preg_replace('/[^a-zA-Z0-9\.\-_]/', '', $image->getClientOriginalName());
                $image->storeAs('employees', $imageName, 'public');
                $validatedData['image'] = 'employees/' . $imageName;
            }
    
            $validatedData['start_date'] = $validatedData['start_date'] ?? '2020-01-01';
            Employee::create($validatedData);
    
            return redirect()->back()->with('success', 'Employee added successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add employee: ' . $e->getMessage());
        }
    }

    public function update(EmployeeRequest $request, string $id)
    {
        
        $validatedData = $request->validated();

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '-' . preg_replace('/[^a-zA-Z0-9\.\-_]/', '', $image->getClientOriginalName());
                $image->storeAs('employees', $imageName, 'public');
                $validatedData['image'] = 'employees/' . $imageName;
            }
    
            $validatedData['start_date'] = $validatedData['start_date'] ?? '2020-01-01';
            $employee = Employee::findOrFail($id);
            $employee->update($validatedData);
    
            return redirect()->back()->with('success', 'Employee updated successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update employee: ' . $e->getMessage());
        }
      
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