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
            $table->id()->unsigned()->comment('ID');;
            $table->string('name_family',40)->nullable()->comment('姓');
            $table->string('name_first',40)->nullable()->comment('名');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->comment('メールアドレス変更日');
            $table->string('password')->comment('パスワード');
            $table->integer('telnumber')->nullable()->comment('電話番号');
            $table->integer('postalcode')->nullable()->comment('郵便番号');
            $table->integer('address')->nullable()->comment('住所');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes()->comment('削除日時 : 削除・退会を行った日時  この値がnullでなかったら、削除・退会を行ったとみなす');
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
