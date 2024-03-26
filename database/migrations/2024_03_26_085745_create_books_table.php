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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('books_user_id_foreign');
            $table->string('institution');
            $table->string('hostel');
            $table->date('pickup')->nullable();
            $table->date('return')->nullable();
            $table->mediumText('duration')->nullable();
            $table->decimal('jute_boxes');
            $table->integer('months');
            $table->decimal('total_amount');
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('description');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('location_address')->nullable();
            $table->enum('Status', ['pending', 'pickedup', 'stored', 'return'])->default('pending');
            $table->enum('payment', ['pending', 'paid', 'failed'])->default('pending');
            $table->timestamps();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
