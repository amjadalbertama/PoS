<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
class MasterController extends Controller
{
    public function index(Request $request)
    {
        $dataMaster = [
            [
                'id' => 1,
                'code' => 'BA001',
                'name' => 'Natadecoco',
                'category' => 'Minuman',
                'unit' => 'bungkus',
                'price' => 15000,
                'stock' => 31,
            ],
            [
                'id' => 2,
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'category' => 'Makanan Cepat Saji',
                'unit' => 'bungkus',
                'price' => 5000,
                'stock' => 11,
            ],
            [
                'id' => 3,
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'category' => 'Makanan Cepat Saji',
                'unit' => 'bungkus',
                'price' => 5000,
                'stock' => 11,
            ],
            [
                'id' => 4,
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'category' => 'Makanan Cepat Saji',
                'unit' => 'bungkus',
                'price' => 5000,
                'stock' => 11,
            ],
            [
                'id' => 5,
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'category' => 'Makanan Cepat Saji',
                'unit' => 'bungkus',
                'price' => 5000,
                'stock' => 11,
            ],
            [
                'id' => 6,
                'code' => 'BA002',
                'name' => 'Mie Instan',
                'category' => 'Makanan Cepat Saji',
                'unit' => 'bungkus',
                'price' => 5000,
                'stock' => 11,
            ],
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($dataMaster, $startIndex, $perPage);
    
        $paginator = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.product.datamaster')->with([
            "datamaster" => $dataMaster,
            'pagination' => $paginator,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }

    public function addDataMaster(Request $request)
    {
        return view('pages.product.addmaster');
    }

    public function addCategory(Request $request)
    {
        return view('pages.product.addcategory');
    }

    public function addUnit(Request $request)
    {
        return view('pages.product.addunit');
    }

    public function addItem(Request $request)
    {
        return view('pages.product.additem');
    }

}
