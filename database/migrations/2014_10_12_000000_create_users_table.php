<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('role',100)->default('user');
            $table->string('name',100)->nullable();
            $table->string('surname',200)->nullable();
            $table->string('nick',200)->nullable();
            $table->string('image')->default('untitled.jpg');
            $table->string('email')->unique();
            $table->date('created_at')->useCurrent();
            $table->date('updated_at')->useCurrentOnUpdate();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

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
