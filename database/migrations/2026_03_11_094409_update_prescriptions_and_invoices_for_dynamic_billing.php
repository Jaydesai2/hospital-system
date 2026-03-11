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
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->foreignId('appointment_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
            $table->decimal('cost', 10, 2)->default(0)->after('duration');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('consultation_fee', 10, 2)->default(0)->after('doctor_id');
            $table->decimal('prescription_fee', 10, 2)->default(0)->after('consultation_fee');
            $table->decimal('additional_charges', 10, 2)->default(0)->after('prescription_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prescriptions', function (Blueprint $table) {
            $table->dropForeign(['appointment_id']);
            $table->dropColumn(['appointment_id', 'cost']);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['consultation_fee', 'prescription_fee', 'additional_charges']);
        });
    }
};
