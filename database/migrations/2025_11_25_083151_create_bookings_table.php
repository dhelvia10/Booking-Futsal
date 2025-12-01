<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
           

            // Relasi ke tabel fields
            $table->unsignedBigInteger('field_id');

            // Data customer
            $table->string('customer_name');
            $table->string('customer_phone');

            // Status booking
            $table->enum('status', ['pending', 'paid', 'cancelled'])
                  ->default('pending');

            // Waktu booking
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');

            // Harga total
            $table->integer('total_price')->default(0);

            $table->timestamps();

            // Foreign key
            $table->foreign('field_id')
                  ->references('id')
                  ->on('fields')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
