<?php

use App\Models\Candidate;
use App\Models\Judge;
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
        Schema::create('formals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Candidate::class)->constrained();
            $table->foreignIdFor(Judge::class)->constrained();
            $table->decimal('score', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formals');
    }
};
