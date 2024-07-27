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
        Schema::create('user_account', function (Blueprint $table) {
            $table->integerIncrements('user_id');
            $table->unsignedSmallInteger('bank_id');
            $table->unsignedBigInteger('account_number');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();;
            $table->foreign('bank_id')->references('id')->on('ref_bank')
                ->cascadeOnUpdate()->cascadeOnDelete();;
            $table->foreign('created_by')->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();;
            $table->foreign('updated_by')->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_account');
    }
};