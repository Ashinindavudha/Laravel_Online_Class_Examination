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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
            $table->string('name');
            $table->string('email');
            $table->string('password')->nullable();
            // $table->integer('role_id')->unsigned()->nullable();
            // $table->foreign('role_id', 'fk_253_role_role_id_user')->references('id')->on('roles');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('academic_year_id')->nullable();
            $table->unsignedBigInteger('course_semester_id')->nullable();
            $table->unsignedBigInteger('student_register_id')->nullable();
            $table->unsignedBigInteger('student_roll_id')->nullable();

            //$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->string('remember_token')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
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
