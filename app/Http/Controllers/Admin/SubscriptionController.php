<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Subscription;
use Illuminate\Http\Request;
class  SubscriptionController extends Controller
{
      public function index()
    {
        $subscriptions = Subscription::paginate(10);
        return view('admin.subscription.index', compact('subscriptions'));
    }

  
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('subscriptions.show', compact('subscription'));
    }


    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect()->route('subscription.index')->with('success', 'Subscription deleted successfully.');
    }
}
