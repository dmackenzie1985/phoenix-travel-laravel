<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Main migration file to create all the tables and releations in database for Phoenix Travel
 * File: create_phoenixV2.php
 * Updated By: David Mackenzie
 * Updated: 03/06/2017
 */

class CreatePhoenixV2 extends Migration
{
    public function up()
    {

        Schema::create('vehicles',function(Blueprint $table){
            $table->string('rego_no',6)->primary();
            $table->string('vin',20);
            $table->string('make',20);
            $table->string('model',35);
            $table->integer('year');
            $table->integer('capacity');
            $table->string('fuel_type',8)->nullable();
            $table->string('equipment',100)->nullable();
            $table->string('licence_required',2);
            $table->timestamps();
        });

        Schema::create('tours',function(Blueprint $table){
            $table->integer('tour_no',true);
            $table->string('tour_name',70);
            $table->string('description',100);
            $table->float('duration',24,2)->nullable();
            $table->string('route_map',256)->nullable();
            $table->timestamps();
        });

        Schema::create('trips',function(Blueprint $table){
            $table->integer('trip_id',true);
            $table->integer('tour_no');
            $table->string('rego_no',6);
            $table->date('departure_date');
            $table->integer('booked_passengers');
            $table->integer('max_passengers');
            $table->float('standard_amount',6,2);
            $table->float('concession_amount',6,2);
            $table->foreign('tour_no')->references('tour_no')->on('tours')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rego_no')->references('rego_no')->on('vehicles')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('itineraries',function(Blueprint $table){
            $table->integer('itinerary_no',true);
            $table->integer('tour_no');
            $table->integer('day_no');
            $table->string('hotel_booking_no',6);
            $table->string('activities',150)->nullable();
            $table->string('meals',150)->nullable();
            $table->foreign('tour_no')->references('tour_no')->on('tours')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('trip_bookings',function(Blueprint $table){
            $table->integer('trip_booking_no',true);
            $table->integer('trip_id');
            $table->date('booking_date')->nullable();
            $table->float('deposit_amount',6,2)->nullable();
            $table->foreign('trip_Id')->references('trip_id')->on('trips')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('customers',function(Blueprint $table){
            $table->integer('customer_id',true);
            $table->string('first_name',35);
            $table->string('middle_initial',1)->nullable();
            $table->string('last_name',35);
            $table->integer('street_no')->unsigned();
            $table->string('street_name',50);
            $table->string('suburb',35);
            $table->integer('postcode')->unsigned();
            $table->string('email',150);
            $table->string('phone',10)->nullable();
            $table->integer('enabled')->unsigned();
            $table->string('akey',60);
            $table->timestamps();
        });

        Schema::create('customer_bookings',function(Blueprint $table){
            $table->integer('customer_booking_id',true);
            $table->integer('trip_booking_no');
            $table->integer('customer_id');
            $table->integer('num_concessions');
            $table->integer('num_adults');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('trip_booking_no')->references('trip_booking_no')->on('trip_bookings')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('customer_reviews',function(Blueprint $table){
            $table->integer('customer_review_no',true);
            $table->integer('trip_id');
            $table->integer('tour_no');
            $table->integer('customer_id');
            $table->tinyInteger('rating');
            $table->string('general_feedback',256)->nullable();
            $table->string('likes',256)->nullable();
            $table->string('dislikes',256)->nullable();
            $table->foreign('trip_id')->references('trip_id')->on('trips')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('customer_reviews');
        Schema::dropIfExists('customer_bookings');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('trip_bookings');
        Schema::dropIfExists('itineraries');
        Schema::dropIfExists('trips');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('vehicles');
    }
}
