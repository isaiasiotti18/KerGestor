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

        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('telefone', 20);
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->decimal('valor_pedido');
            $table->decimal('custos_pedido');
            $table->decimal('valor_liquido');
            $table->date('data_do_pedido');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
        });

        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 35);
            $table->decimal('valor');
            $table->decimal('custo_producao');
            $table->integer('estoque');
            $table->timestamps();
        });

        Schema::create('suprimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 25);
            $table->integer('quantidade');
            $table->timestamps();
        });

        Schema::create('produtos_do_pedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('produto_id');
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('produtos');
        Schema::dropIfExists('suprimentos');
        Schema::dropIfExists('produtos_do_pedido');
        Schema::enableForeignKeyConstraints();
    }
};
