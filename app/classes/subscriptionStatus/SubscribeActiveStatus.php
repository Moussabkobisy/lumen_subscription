<?php


namespace App\classes\subscriptionStatus;


class SubscribeActiveStatus implements SubscriptionStatusInterface
{
    protected $status = 1;

    public  function getStatus()
    {
        return $this->status;
    }
}
