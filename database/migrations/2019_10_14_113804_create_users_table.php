<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('company_name')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('company_code')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('role')->default(0);
            $table->string('user_profile_image')->nullable();
            $table->integer('login_status')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamp('last_login');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
