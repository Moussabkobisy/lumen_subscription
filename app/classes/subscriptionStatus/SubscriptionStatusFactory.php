<?php


namespace App\classes\subscriptionStatus;


class SubscriptionStatusFactory
{
    public static function getClass($status){
        switch ($status) {
            case 0 :
                return new SubscribePendingStatus();
                break;
            case 1 :
                return new SubscribeActiveStatus();
                break;
            case 2 :
                return new UnsubscribePendingStatus();
                break;
            case 4 :
                return new UnsubscribeActiveStatus();
                break;
        }
    }
}
