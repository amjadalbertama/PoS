<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $dataDisIn = [
            [
                'id' => 1,
                'code' => 'BA001',
                'date' => '10/12/2023',
                'name' => 'Natadecoco',
                'branch' => 'Toko A',
                'address' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 31,
            ],
            [
                'id' => 2,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch' => 'Toko B ',
                'address' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 3,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch' => 'Toko C',
                'address' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 4,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch' => 'Toko D',
                'address' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 5,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch' => 'Toko E',
                'address' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 6,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'branch' => 'Toko F',
                'address' => 'Jakarta',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($dataDisIn, $startIndex, $perPage);
    
        $paginator = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.inventory.distributin')->with([
            "dataDisIn" => $dataDisIn,
            'pagiDistriIn' => $paginator,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }

    public function formAddDistributOut(Request $request)
    {
        return view('pages.product.addmaster');
    }

    public function reportInventory(Request $request)
    {
        $inventory = [
            [
                'id' => 1,
                'code' => 'BA001',
                'date' => '10/12/2023',
                'name' => 'Natadecoco',
                'unit' => 'bungkus',
                'stock' => 31,
            ],
            [
                'id' => 2,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 3,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 4,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 5,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            [
                'id' => 6,
                'code' => 'BA002',
                'date' => '10/12/2023',
                'name' => 'Mie Instan',
                'unit' => 'bungkus',
                'stock' => 11,
            ],
            // Add more dummy data here
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($inventory, $startIndex, $perPage);
    
        $paginator = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.reports.inventory')->with([
            "inventory" => $inventory,
            'pagiInventory' => $paginator,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }
}
