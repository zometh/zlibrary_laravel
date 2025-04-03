<?php

use App\Models\User;
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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->decimal('total_amount', 10, 2);
            $table->enum('statut', ['en attente', 'en préparation', 'expédiée', 'payée'])->default('en attente');
            $table->timestamp('date_paiement')->nullable();
            $table->string('moyen_paiement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
