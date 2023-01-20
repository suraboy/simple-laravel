<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use DB;

/**
 * Class ProductController
 * @package App\Http\Controllers\Web
 * @author mr.sirichai janpan (13_oy@hotmail.co.th)
 */
class DashboardController extends Controller
{

    public function index()
    {
        $pie_chart = [];
        $products = Product::orderBy('stock_total', 'desc')->get();

        collect($products)->map(function ($val) {
            $val['color'] = $this->random_color();
            return $val;
        });

        /* set footer report */
        $product_cost = 0;
        $product_profit = 0;
        foreach ($products as $item) {
            $pie_chart['group_name'][] = $item['name'];
            $pie_chart['group_stock_total'][] = $item['stock_total'];
            $pie_chart['group_color'][] = $item['color'];
            $product_cost += ($item->base_price * $item->stock_total);
            $product_profit += ($item->sale_price * $item->stock_total);
        }

        $array_summary = [
            'product_stocks' => $products->sum('stock_total'),
            'product_cost' => $product_cost,
            'product_profit' => $product_profit == 0 ? $product_cost : $product_profit
        ];

        return view('pages.dashboard.index')->with(['products' => $products, 'pie_chart' => $pie_chart, 'summary' => $array_summary]);
    }

    private function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    private function random_color()
    {
        return '#' . $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }
}
