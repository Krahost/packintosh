<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wallet_id')->index('wallet_transactions_wallet_id_foreign');
            $table->enum('type', ['deposit', 'withdrawal', 'payment']);
            $table->decimal('amount', 10);
            $table->text('description')->nullable();
            $table->string('payment_reference')->nullable()->unique();
            $table->timestamps();
            $table->string('reference')->nullable()->unique();
            $table->unsignedBigInteger('book_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
