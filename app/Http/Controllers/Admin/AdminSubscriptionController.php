<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Http\Request;
class  AdminSubscriptionController extends Controller
{
      public function index()
    {
        $package=Package::all();
        $subscriptions = Subscription::paginate(10);
        return view('admin.subscription.index', compact('subscriptions','package'));
    }

  
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('subscriptions.show', compact('subscription'));
    }

    public function update(Request $request, $id)
{
    $subscription = Subscription::findOrFail($id);

    $subscription->update([
        'plan_type' => $request->plan_type,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);

    return redirect()->route('subscription.index')->with('success', 'Subscription updated successfully.');
}


    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect()->route('subscription.index')->with('success', 'Subscription deleted successfully.');
    }
}
