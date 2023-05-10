<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('kind');
            $table->string('sci_name');
            $table->string('name');
            $table->string('family');
            $table->string('genus')->nullable();
            $table->longText('trunk')->nullable();
            $table->longText('leaf')->nullable();
            $table->longText('bloom')->nullable();
            $table->longText('fruit')->nullable();
            $table->longText('seed')->nullable();
            $table->longText('property')->nullable();
            $table->string('type')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('picture');
            $table->string('container')->nullable();
            $table->longText('cropping')->nullable();
            $table->longText('care')->nullable();
            $table->longText('belief')->nullable();
            $table->longText('clime')->nullable();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
};
