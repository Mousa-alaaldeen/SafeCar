<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServicesIdToContactsTable extends Migration
{
    public function up()
    {
        Schema::table('contact', function (Blueprint $table) {
            if (!Schema::hasColumn('contact', 'services_id')) {
                $table->unsignedInteger('services_id')->nullable()->after('email');
            }
        });
    }

    public function down()
    {
        Schema::table('contact', function (Blueprint $table) {
            if (Schema::hasColumn('contact', 'services_id')) {
                $table->dropColumn('services_id');
            }
        });
    }
}
