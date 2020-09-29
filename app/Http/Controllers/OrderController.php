<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $order = new \App\Models\Order();

        $products = $order->leftJoin('products', 'products.id', '=', 'orders.product_id')->get();

        foreach ($products as $product) {
            $product->total_venda = $product->quantity * $product->preco_venda;

            $product->preco_venda = $this->price($product, 3);
        }

        return response()->json($products);
    }

    /**
     * Price.
     * 
     * @param float $price
     * 
     * @return array $arr
     */
    public function price(\Illuminate\Database\Eloquent\Model $product, int $n): array
    {
        $arr = [];

        for ($i = 0; $i < $n; $i++) {
            $arr[] = [
                "value" => round($product->preco_venda * (1 - $i * 0.04), 2),
                "label" => round($product->preco_venda * (1 - $i * 0.04), 2) . " -> " . (1 - $i * 0.04) . "%",
                "selected" => ($i === 0) ? true : false,
            ];
        }

        $arr[] = [
            "value" => $product->preco_promocao,
            "label" => $product->preco_promocao . " -> " . "PROM",
            "selected" => false,
        ];

        return $arr;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::where('product_id', $request->id)->first();

        if ($order) {
            $order->quantity += 1;
        } else {
            $order = new Order();
            $order->product_id = $request->id;
            $order->quantity = 1;
        }

        $order->save();

        $product = Product::find($order->product_id);

        $product->quantity = $order->quantity;
        $product->total_venda = $product->quantity * $product->preco_venda;
        $product->preco_venda = $this->price($product, 3);

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $order = Order::where('product_id', $id)->first();
        $order->delete();
    }
}
