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
        Schema::create('audiencepolls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('response');
            $table->bigInteger('questionid')->foreignkey('questionid')->references('id')->on('audiencepolls');
            $table->bigInteger('attachmentid')->foreignkey('attachmentid')->references('id')->on('attachments')->onDelete('cascade');
             $table->bigInteger('attachmenttype_id')->foreignkey('attachmenttype_id')->references('id')->on('attachment_types');
             $table->text('IP_users');
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('userid')->foreignkey('userid')->references('id')->on('users');
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
        Schema::dropIfExists('audiencepolls');
    }
};
