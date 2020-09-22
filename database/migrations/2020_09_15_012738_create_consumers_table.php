<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->id();
            $table->string("codigo", 32);
            $table->string("razao_social_nome", 64);
            $table->string("imagem", 32);
            $table->string("fantasia", 32);
            $table->string("cnpj_cpf", 32);
            $table->string("ie", 32);
            $table->string("endereco", 32);
            $table->string("num", 32);
            $table->string("bairro", 32);
            $table->string("cidade", 32);
            $table->string("uf", 32);
            $table->string("telefone", 32);
            $table->string("cep", 32);
            $table->string("primeira_venda", 32);
            $table->string("ultima_venda", 32);
            $table->string("limite_credito", 32);
            $table->string("grupo_economico", 32);
            $table->string("vendedor_interno", 32)->unique();
            $table->string("vendedor_externo", 32)->unique();
            $table->string("email", 64);
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
        Schema::dropIfExists('consumers');
    }
}
