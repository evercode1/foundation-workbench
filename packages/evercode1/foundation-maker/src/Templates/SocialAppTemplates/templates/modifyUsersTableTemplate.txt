<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsSubscribedAndStatusIdAndIsAdminToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function(Blueprint $table)
        {

        $table->boolean('is_subscribed')->default(false)->after('email');
        $table->integer('status_id')->default(10)->unsigned()->after('is_subscribed');
        $table->boolean('is_admin')->default(false)->after('status_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', function ($table) {
            $table->dropColumn('is_admin');
            $table->dropColumn('status_id');
            $table->dropColumn('is_subscribed');
        });
    }
}
