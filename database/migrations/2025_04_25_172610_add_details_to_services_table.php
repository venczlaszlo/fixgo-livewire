<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToServicesTable extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('address');
            $table->string('email')->nullable()->after('phone');
            $table->string('website')->nullable()->after('email');
            $table->string('image')->nullable()->after('website');
            $table->decimal('rating', 3, 2)->default(0)->after('image');
            $table->string('opening_hours')->nullable()->after('rating');
            $table->text('features')->nullable()->after('opening_hours');
            $table->decimal('lat', 10, 7)->nullable()->after('features');
            $table->decimal('lng', 10, 7)->nullable()->after('lat');
        });
    }
    

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            //
        });
    }
}

