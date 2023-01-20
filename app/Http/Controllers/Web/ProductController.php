<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers\Web
 * @author mr.sirichai janpan (13_oy@hotmail.co.th)
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $response = $this->productRepository->get();

        return view('pages.products.list')->with(['products' => $response]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function insert(Request $request)
    {
        $params = [
            'name' => $request->product_name ?? "",
            'base_price' => number_format($request->base_price ?? 0, 2),
            'sale_price' => number_format($request->sale_price ?? 0, 2),
            'stock_total' => (int)$request->stock_total ?? 0,
        ];
        $this->productRepository->create($params);
        return back()->with(['notification' => ['alert_type' => 'success', 'message' => 'Your product has been saved.']]);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function info(Request $request)
    {
        $response = $this->productRepository->find($request->id);
        return view('pages.products.info')->with(['products' => $response]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request)
    {
        $params = collect($request->all())->filter(function ($value, $key) {
            return $value != null;
        });

        $response = $this->productRepository->update($params->all(), $request->_id);

        return back()->with(['notification' => ['alert_type' => 'success', 'message' => 'Your product has been deleted.', 'products' => $response]]);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function destroy(Request $request)
    {
        $response = $this->productRepository->delete($request->id);

        return back()->with(['notification' => ['alert_type' => 'success', 'message' => 'Your product has been deleted.', 'products' => $response]]);
    }
}
