<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->string('category')->default('Makanan')->after('name')->index();
            $table->boolean('is_spicy')->default(false)->after('stock');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->string('note')->nullable()->after('quantity');
        });
    }

    public function down(): void
    {
        Schema::table('menus', fn (Blueprint $t) => $t->dropColumn(['category', 'is_spicy']));
        Schema::table('carts', fn (Blueprint $t) => $t->dropColumn('note'));
    }
};