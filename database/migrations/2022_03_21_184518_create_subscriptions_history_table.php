<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partnerId');
            $table->foreignId('user_id');
            $table->tinyInteger('action')
                ->comment('0:pending subscribe , 1: subscribe, 2:pending unsubscribe, 3: unsubscribe');
            $table->json('partner_response')->nullable()->comment('complete partner response in json format');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions_history');
    }
}
