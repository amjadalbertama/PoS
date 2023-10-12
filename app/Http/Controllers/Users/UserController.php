<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = [
            [
                'id' => 1,
                'name' => 'Mukidi',
                'email' => 'mukidi@gmail.com',
                'phone' => '092828373',
                'address' => 'Jakarta',
                'role' => 'Admin',
            
            ],
            [
                'id' => 2,
                'name' => 'Guntur',
                'email' => 'guntur@gmail.com',
                'phone' => '083938223',
                'address' => 'Bogor',
                'role' => 'Casier',
            
            ],
            [
                'id' => 3,
                'name' => 'Harun',
                'email' => 'harun@gmail.com',
                'phone' => '083938223',
                'address' => 'Bandung',
                'role' => 'Casier',
            
            ],
        ];

        $perPage = 3; // Jumlah item per halaman

        $currentPage = max(1, $request->query('page', 1));
    
        $startIndex = ($currentPage - 1) * $perPage;
        $slicedData = array_slice($user, $startIndex, $perPage);
    
        $userview = new Paginator(
            $slicedData,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('pages.employeer.index')->with([
            "user" => $user,
            'userview' => $userview,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'request' => $request,
            'startIndex' => $startIndex,
        ]);
    }

    public function formAddUser(Request $request)
    {
        return view('pages.employeer.add');
    }
}
