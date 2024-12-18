<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAllUsersController extends Controller
{
    public function destroy(string $id)
{
    $user = User::findOrFail($id);

    if (!$user) {
        return redirect()->back()->with('error', 'user not found.');
    }
    $user->delete();
    return redirect()->back()->with('success', 'user deleted successfully.');
}


public function index()
{
    
    $users = User::paginate(5);
   
    return view('admin.users.index',compact('users'));
}
public function search(Request $request)
{
    $query = $request->input('query');
    $users = User::where('name', 'like', "%$query%")
                 ->orWhere('email', 'like', "%$query%")
                 ->paginate(5)
                 ->appends(['query' => $query]);

    return view('admin.users.index', compact('users', 'query'));
}

}
