<?php

namespace App\Models;

use App\classes\subscriptionStatus\SubscribePendingStatus;
use App\classes\subscriptionStatus\SubscriptionStatusInterface;
use App\classes\subscriptionStatus\UnsubscribePendingStatus;

class Subscription extends Model
{


    public function subscribe(User $user, Partner $partner)
    {
        // get partner base url and send subscribe request
        // get the response from partner if ok or failure
        // if response is ok :
        $subscriptionStatus = new SubscribePendingStatus();
        $subscription = $this->create([
            'partnerId' =>  $partner->id,
            'userId'    =>  $user->id,
            'status'    =>  $subscriptionStatus->getStatus()
        ]);
        return true;

        // in case of failure response , then return false
    }
    public function unsubscribe(User $user, Partner $partner)
    {
        // get partner base url and send unsubscribe request
        // get the response from partner if ok or failure
        // if response is ok :
        $subscription = $this->where('partnerId',$partner->id)->where('userId',$user->id)->first();
        $subscription->delete();
        return true;
        // in case of failure response , then return false
    }

    public function setStatus(SubscriptionStatusInterface $subscriptionStatus)
    {
        return $this->update([
            'status' => $subscriptionStatus->getStatus()
        ]);
    }
}
