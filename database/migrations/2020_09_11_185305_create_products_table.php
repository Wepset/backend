<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("codigo", 32)->nullable(false)->unique();
            $table->string("codigo_interno", 32)->nullable(false)->unique();
            $table->string("tipo", 32)->nullable(false);
            $table->string("sub_descricao", 32)->nullable(false)->unique();
            $table->string("fabricante", 32)->nullable(false);
            $table->string("marca", 32)->nullable(false);
            $table->string("segmento", 32);
            $table->string("obs", 32)->nullable(false);
            $table->string("obs_complementar", 32)->nullable(false)->unique();
            $table->string("ncm", 32)->nullable(false)->unique();
            $table->string("minimo", 32)->nullable(false);
            $table->string("maximo", 32)->nullable(false);
            $table->decimal("preco_entrada", 8, 2);
            $table->decimal("preco_custo", 8, 2);
            $table->decimal("preco_medio", 8, 2);
            $table->decimal("preco_venda", 8, 2);
            $table->decimal("preco_pesquisa", 8, 2);
            $table->string("markup", 32);
            $table->string("coeficiente_markup", 32);
            $table->string("qtd_multipla_compra", 32);
            $table->string("qtd_multipla_venda", 32);
            $table->string("qtd_multipla_aplicacao", 32);
            $table->string("atacado", 32);
            $table->string("varejo", 32);
            $table->string("situacao", 32);
            $table->string("antigo", 32);
            $table->string("cor", 32);
            $table->string("lado", 32);
            $table->string("posicao", 32);
            $table->string("localizacao", 32);
            $table->string("extremidade", 32);
            $table->string("uso", 32);
            $table->string("imagem", 32);
            $table->string("gtin", 32);
            $table->string("gtin_14", 32);
            $table->string("medida", 32);
            $table->string("prazo_garantia", 32);
            $table->string("obs_garantia", 32);
            $table->string("grupo_item", 32);
            $table->string("sub_grupo_item", 32);
            $table->string("fornecedor_referencial", 32);
            $table->string("un", 32);
            $table->string("referencia", 32);
            $table->string("cst_icms", 32);
            $table->decimal("preco_promocao", 8, 2);
            $table->string("cod_importacao_xml", 32);
            $table->string("base_calculo_icms_ret", 32);
            $table->string("perc_icms_ret", 32);
            $table->string("icms_ret", 32);
            $table->string("icms_substituto", 32);
            $table->string("pis_cofins", 32);
            $table->string("chave_nfe", 44);
            $table->string("ranking_curva_abc_geral_item", 32);
            $table->string("curva_abc_geral_item", 32);
            $table->string("valor_curva_abc_geral_item", 32);
            $table->string("registro_abc_geral_item", 32);
            $table->string("codigo_curva_abc_fornecedor", 32);
            $table->string("valor_curva_abc_fornecedor", 32);
            $table->string("registro_curva_abc_fornecedor", 32);
            $table->string("uf_curva_abc_fornecedor", 32);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
