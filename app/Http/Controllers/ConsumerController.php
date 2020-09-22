<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ConsumerController extends Controller
{
    /**
     * Get a listing of products with some conditions.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $consumer = Consumer::query();

        $args = $request->all();

        $id = isset($args['id']) ? (int) $args['id'] : 0;

        if ($id > 0) {
            $consumer->where('id', $id);
        } else {
            foreach ($request->all() as $key => $arg) {
                $consumer->where(strtolower("consumers.{$key}"), 'like', "%{$arg}%");
            }
        }

        if ($consumer->count() === 1) {
            $data = $consumer->first();

            if ($interno = \App\Models\Consumer::find($data->vendedor_interno)) {
                $data->interno = $interno;
                $data->interno->status = true;
            } else {
                $data->interno = [
                    'status' => false
                ];
            }

            return response()->json([$data]);
        }

        return response()->json($consumer->get());
    }
}
