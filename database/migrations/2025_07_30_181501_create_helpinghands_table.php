<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Helpinghands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('gemeinde_id')->constrained('gemeindes');
            $table->string('title');
            $table->string('title_slug');
            $table->string('type')->nullable();
            $table->string('canton');
            $table->text('description');
            $table->boolean('is_active')->default(true);
            
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helpinghands');
    }
};
