<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /** @var string */
    private const URL = "https://raw.githubusercontent.com/MagicalStrangeQuark/JSON/master/JSON/Colors.JSON";

    /** @var string */
    private const PRODUCTS = "Product.JSON";

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . static::PRODUCTS));

        foreach ($data as $dt) {
            $preco_venda = (rand(1, 100) + (rand(1, 100) / 100));

            DB::table('products')->insert([
                "codigo" => $dt->CODIGO,
                "codigo_interno" => $dt->CODIGO_INTERNO,
                "tipo" => $dt->TIPO,
                "sub_descricao" => $dt->SUB_DESCRICAO,
                "fabricante" => $dt->FABRICANTE,
                "marca" => $dt->MARCA,
                "segmento" => $dt->SEGMENTO,
                "obs" => substr($dt->OBS, 0, 30),
                "obs_complementar" => $dt->OBS_COMPLEMENTAR,
                "ncm" => $dt->NCM,
                "minimo" => rand(1, 100),
                "maximo" => rand(1, 100),
                "preco_entrada" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_custo" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_medio" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_venda" => $preco_venda,
                "preco_pesquisa" => (rand(1, 100) + (rand(1, 100) / 100)),
                "markup" => $dt->MARKUP,
                "coeficiente_markup" => (rand(1, 100) + (rand(1, 100) / 100)),
                "qtd_multipla_compra" => rand(1, 100),
                "qtd_multipla_venda" => rand(1, 100),
                "qtd_multipla_aplicacao" => rand(1, 100),
                "atacado" => $dt->ATACADO,
                "varejo" => $dt->VAREJO,
                "situacao" => $dt->SITUACAO,
                "antigo" => strtoupper(\Illuminate\Support\Str::random(10)),
                "cor" => $dt->COR,
                "lado" => $dt->LADO,
                "posicao" => $dt->POSICAO,
                "localizacao" => $dt->LOCALIZACAO,
                "extremidade" => $dt->EXTREMIDADE,
                "uso" => $dt->USO,
                "imagem" => $dt->IMAGEM,
                "gtin" => $dt->GTIN,
                "gtin_14" => $dt->GTIN_14,
                "medida" => $dt->MEDIDA,
                "prazo_garantia" => $dt->PRAZO_GARANTIA,
                "obs_garantia" => $dt->OBS_GARANTIA,
                "grupo_item" => $dt->GRUPO_ITEM,
                "sub_grupo_item" => $dt->SUB_GRUPO_ITEM,
                "fornecedor_referencial" => $dt->FORNECEDOR_REFERENCIAL,
                "un" => $dt->UN,
                "referencia" => $dt->REFERENCIA,
                "cst_icms" => (rand(1, 100) + (rand(1, 100) / 100)),
                "preco_promocao" => $preco_venda * 0.85,
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
                "uf_curva_abc_fornecedor" => $dt->UF_CURVA_ABC_FORNECEDOR,
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
