<?php

namespace App\Http\Controllers;


use App\classes\subscriptionStatus\SubscriptionStatusFactory;
use App\Models\Partner;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function subscribe(Partner $partner)
    {
        try {
            // get the authenticated user
            $user =  User::where('.......');

            $subscription = new Subscription();
            if ($subscription->subscribe($user,$partner)){
                return response()->json([
                    'success' => true,
                    'message' => 'subscription request sent'
                ],200);
            }
            return response()->json([
                'success' => false,
                'message' => 'subscription request failed'
            ],400);
        }
        catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => 'internal server error'
            ],500);
        }
    }

    public function unsubscribe(Partner $partner)
    {
        try {
            $user = new User();
            $subscription = new Subscription();
            if ($subscription->unsubscribe($user, $partner)) {
                return response()->json([
                    'success' => true,
                    'message' => 'unsubscription request sent'
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => 'unsubscription request failed'
            ], 400);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'internal server error'
            ], 500);
        }
    }

    public function subscriptionCallback(Request $request)
    {
        // the partner result will be stored in $request
        // this function will access the result and update the database field as needed
        $subscription = new Subscription();
        $subscriptionStatus = SubscriptionStatusFactory::getClass($request->status);
        $subscription->setStatus($subscriptionStatus);
    }
}
