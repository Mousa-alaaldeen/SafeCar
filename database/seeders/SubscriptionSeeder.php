<?php
namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        $subscriptions = [
            ['users_id' => 3, 'plan_type' => 'Monthly', 'start_date' => now(), 'end_date' => now()->addMonth()],
            ['users_id' => 4, 'plan_type' => 'Yearly', 'start_date' => now(), 'end_date' => now()->addYear()],
       
        ];

        foreach ($subscriptions as $subscription) {
            Subscription::create($subscription);
        }
    }
}
