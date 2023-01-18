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

        foreach ($products as $item) {
            $pie_chart['group_name'][] = $item['name'];
            $pie_chart['group_stock_total'][] = $item['stock_total'];
            $pie_chart['group_color'][] = $item['color'];
        }

        return view('pages.dashboard.index')->with(['products' => $products, 'pie_chart' => $pie_chart]);
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
