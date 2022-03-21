<?php


namespace App\classes\subscriptionStatus;


class UnsubscribeActiveStatus implements SubscriptionStatusInterface
{
    protected $status = 3;

    public  function getStatus()
    {
        return $this->status;
    }
}
