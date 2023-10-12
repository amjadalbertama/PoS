<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class DistributoutController extends Controller
{
    public function index(Request $request)
    {
        $dataDisOut = [
            [
                'id' => 1,
                'code' => 'BA001',
                'date' => '10/12/2023',
                'name' => 'Natadecoco',
                'branch_des' => 'Toko A',
                'address_des' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 31,
            ],
            [
                'id' => 2,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch_des' => 'Toko B ',
                'address_des' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 3,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch_des' => 'Toko C',
                'address_des' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 4,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch_des' => 'Toko D',
                'address_des' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 5,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch_des' => 'Toko E',
                'address_des' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 6,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch_des' => 'Toko F',
                'address_des' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($dataDisOut, $startIndex, $perPage);
    
        $arrayDisOut = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.inventory.distributout')->with([
            "dataDisOut" => $arrayDisOut,
            'pagiDistriOut' => $dataDisOut,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    
    }

    public function formAdd(Request $request)
    {
        return view('pages.inventory.form_add_dis_out');
    }
}
