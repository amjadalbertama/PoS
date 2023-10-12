<?php

namespace App\Http\Controllers;


use App\Models\RoleHasPermission;
use App\Models\UserHasRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserHasBranch;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:sanctum', [
            'except' => [
                'index',
                'login',
                'logout',
            ],
        ]);
    }

    public function index()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }

        return view('login');   
    }

    public function login(Request $request)
    {
        // dd("tes");
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $credentials = $request->only('email', 'password');
        try {
            // dd($credentials);
            if (Auth::attempt($credentials)) {
               
                $user = User::where("email", $request->email)
                ->where("password", $request->password)->firstOrFail();
                dd($user);
                // $user = Auth::user();
                $id_cabang = UserHasBranch::where("user_id", $user->id)->get();
                $request->session()->regenerate();
                $request->session()->get('url');

                if(isset($id_cabang)){   
                    if($id_cabang->branch_id == $request->id_cabang){
                        $token = $user->createToken("auth_token")->plainTextToken;
                        return response()->json([
                            'success' => true,
                            'data' => [
                                "access_token" => $token,
                                "type" => "Bearer",
                            ],
                            'prev_url' => isset($request->session()->get('url')['intended']) ? $request->session()->get('url')['intended'] : route('dashboard'),
                        ]);

                    }else{
                        return response()->json([
                            "success" => false,
                            "message" => "Akun anda tidak berada pada cabang yang dipilih, mohon periksa kembali"
                        ]);
                    }
                    // $cek_role = UserHasRoles::where("id_")
                    
                }else{
                    // dd("tes");
                    return response()->json([
                        "success" => false,
                        "message" => "Akun anda tidak memiliki Cabang, mohon periksa kembali"
                    ]);
                }
                
                // // Ambil izin pengguna
                // $permissions = $user->permissions;

                // // Simpan data pengguna dan izin dalam sesi
                // session(['user' => $user, 'permissions' => $permissions]);

                // // Redirect ke halaman setelah login
                // return redirect('/dashboard');
            }else{
                // dd($credentials);
                return response()->json([
                    "success" => false,
                    "message" => "Your username or password is incorrect!",
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error in authentication: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'debug' => $e->getMessage()
            ]);
        }

        // // Jika autentikasi gagal, tampilkan pesan error
        // return back()->withErrors(['email' => 'Kombinasi email dan kata sandi salah.']);
    }

    public function logout(Request $request){
    
        Auth::logout();

        session()->forget(['user', 'permissions']);

        return redirect('/login');
    }
}
