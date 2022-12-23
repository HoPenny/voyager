<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 100);
            $table->text('content');
            // $table->bigInteger('cgy_id')->unsigned();
            $table->foreignId('cgy_id')->constrained();
            $table->boolean('enabled')->default(true);
            $table->integer('sort')->default(0);
            $table->timestamp('enabled_at')->nullable();
            $table->string('tags', 100)->nullable();
            $table->string('pic', 255);
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
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['cgy_id']);
        });
        Schema::dropIfExists('articles');
    }
};
