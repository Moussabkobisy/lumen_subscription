<?php


namespace App\classes\subscriptionStatus;


class SubscribePendingStatus implements SubscriptionStatusInterface
{
    protected $status = 0;

    public  function getStatus()
    {
        return $this->status;
    }
}
