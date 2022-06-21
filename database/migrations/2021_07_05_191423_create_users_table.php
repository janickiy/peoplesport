<?php

use App\Models\User;
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
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password');

            $table->string('name');
            $table->date('birthday')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('education')->nullable();
            $table->text('biography')->nullable();

            $table->unsignedBigInteger('occupation_id')->nullable();
            $table->unsignedBigInteger('activity_type_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();

            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('seen_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table->foreign('occupation_id')
                ->references('id')
                ->on('occupations')
                ->onDelete('cascade');
            $table->foreign('activity_type_id')
                ->references('id')
                ->on('activity_types')
                ->onDelete('cascade');
            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onDelete('cascade');
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
