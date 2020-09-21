<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /** @var string */
    private const URL = "https://raw.githubusercontent.com/MagicalStrangeQuark/JSON/master/JSON/Colors.JSON";

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(static::URL));

        for ($i = 0; $i < 25; $i++) {
            DB::table('products')->insert([
                "codigo" => rand(1, 10000),
                "codigo_interno" => rand(1, 10000),
                "tipo" => strtoupper(\Illuminate\Support\Str::random(10)),
                "sub_descricao" => strtoupper(\Illuminate\Support\Str::random(10)),
                "fabricante" => strtoupper(\Illuminate\Support\Str::random(10)),
                "marca" => strtoupper(\Illuminate\Support\Str::random(15)),
                "segmento" => strtoupper(\Illuminate\Support\Str::random(15)),
                "obs" => strtoupper(\Illuminate\Support\Str::random(10)),
                "obs_complementar" => strtoupper(\Illuminate\Support\Str::random(10)),
                "ncm" => "8511.1000",
                "minimo" => rand(1, 100),
                "maximo" => rand(1, 100),
                "preco_entrada" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_custo" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_medio" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_venda" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_pesquisa" => (rand(1, 100) + (rand(1, 100) / 100)),
                "markup" => "80%",
                "coeficiente_markup" => (rand(1, 100) + (rand(1, 100) / 100)),
                "qtd_multipla_compra" => rand(1, 100),
                "qtd_multipla_venda" => rand(1, 100),
                "qtd_multipla_aplicacao" => rand(1, 100),
                "atacado" => false,
                "varejo" => false,
                "situacao" => "ATIVO",
                "antigo" => strtoupper(\Illuminate\Support\Str::random(10)),
                "cor" => $this->randomColor($data),
                "lado" => "DIREITO",
                "posicao" => "DIREITO",
                "localizacao" => strtoupper(\Illuminate\Support\Str::random(10)),
                "extremidade" => strtoupper(\Illuminate\Support\Str::random(10)),
                "uso" => strtoupper(\Illuminate\Support\Str::random()),
                "imagem" => strtoupper(\Illuminate\Support\Str::random(10)),
                "gtin" => $this->randomNumber(13),
                "gtin_14" => $this->randomNumber(14),
                "medida" => strtoupper(\Illuminate\Support\Str::random(2)),
                "prazo_garantia" => rand(1, 100),
                "obs_garantia" => strtoupper(\Illuminate\Support\Str::random()),
                "grupo_item" => strtoupper(\Illuminate\Support\Str::random()),
                "sub_grupo_item" => strtoupper(\Illuminate\Support\Str::random()),
                "fornecedor_referencial" => strtoupper(\Illuminate\Support\Str::random()),
                "un" => strtoupper(\Illuminate\Support\Str::random(3)),
                "referencia" => strtoupper(\Illuminate\Support\Str::random()),
                "cst_icms" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_promocao" => (rand(1, 100) + (rand(1, 100) / 100)),
                "cod_importacao_xml" => rand(1, 1000),
                "base_calculo_icms_ret" => 0.00,
                "perc_icms_ret" => (rand(1, 100) + (rand(1, 100) / 100)),
                "icms_ret" => (rand(1, 100) + (rand(1, 100) / 100)),
                "icms_substituto" => (rand(1, 100) + (rand(1, 100) / 100)),
                "pis_cofins" => (rand(1, 100) + (rand(1, 100) / 100)),
                "chave_nfe" => $this->randomNumber(44),
                "ranking_curva_abc_geral_item" => rand(1, 100),
                "curva_abc_geral_item" => "B",
                "valor_curva_abc_geral_item" => (rand(1, 100) + (rand(1, 100) / 100)),
                "registro_abc_geral_item" => 10.67,
                "codigo_curva_abc_fornecedor" => rand(1, 100),
                "valor_curva_abc_fornecedor" => (rand(1, 100) + (rand(1, 100) / 100)),
                "registro_curva_abc_fornecedor" => rand(1, 100),
                "uf_curva_abc_fornecedor" => "RS",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }

    /**
     * randomNumber.
     * 
     * @param void
     * 
     * @return string
     */
    private function randomNumber(int $n): string
    {
        return substr(rand(1, 100000000) . rand(1, 100000000) . rand(1, 100000000) . rand(1, 100000000) . rand(1, 100000000) . rand(1, 100000000), 0, $n);
    }

    /**
     * randomColor.
     * 
     * @param stdClass $o
     * 
     * @return string
     */
    private function randomColor(\stdClass $o): string
    {
        $keys = array_keys((array)$o);

        $rand = $keys[rand(0, count((array) $o) - 1)];

        return !empty($o->{$rand}->cor) ? strtoupper($o->{$rand}->cor) : $this->randomColor($o);
    }
}
