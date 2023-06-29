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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug');
            $table->text('description');
            $table->tinyInteger('rooms');
            $table->tinyInteger('beds');
            $table->tinyInteger('bathrooms');
            $table->smallInteger('square_meters');
            $table->string('address');
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 9, 6);
            $table->boolean('visible');
            $table->decimal('price', 7, 2);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('apartments');
    }
};

// public function up()
// {
//     Schema::table('projects', function (Blueprint $table) {
//         $table->unsignedBigInteger('type_id')->nullable();
//         $table->foreign('type_id')->references('id')->on('types');

//     });
// }

// /**
//  * Reverse the migrations.
//  *
//  * @return void
//  */
// public function down()
// {
//     Schema::table('projects', function (Blueprint $table) {
//         $table->dropForeign('projects_type_id_foreign');
//         $table->dropColumn('type_id');
//     });
// }
