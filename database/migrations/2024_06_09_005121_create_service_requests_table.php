<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->float('register_fee', 11, 2)->default(0);
            $table->string('payment_status', 100)->default('pending');
            $table->string('payment_method', 100)->default('cash');
            $table->string('tnx_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('account_type')->default('individual')->comment('individual, business');
            $table->string('status')->default(0);
            $table->unsignedBigInteger('approve_by_id')->nullable();
            $table->timestamp('payment_created_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
