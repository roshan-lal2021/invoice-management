<?php

use GoApptiv\InvoiceManagement\Services\Constants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceManagementLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('invoice_management_mysql')->create('invoice_management_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_number')->unique();
            $table->string('invoice_management_id')->nullable()->unique();
            $table->longText('payload');
            $table->enum('registration_status', Constants::$REGISTRATION_STATUS)->default(Constants::$PENDING);
            $table->enum('processing_status', Constants::$PROCESSING_STATUS)->default(Constants::$PENDING);
            $table->longText('errors')->nullable();
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
        Schema::connection('invoice_management_mysql')->dropIfExists('invoice_management_logs');
    }
}
