<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class KaryawanController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('auth:admin');
        $this->user = $user;
    }
    public function index()
    {
        return view('admin.karyawan.index',['user' => Auth::user(),'karyawan' => $this->getEmployee()]);
    }

    public function getEmployee()
    {
        return User::getEmployee();
    }
    public function destroy(Request $req, $id)
    {
        $find = User::find($id);
        if($find->delete())
        {
            return redirect()->back()->with(['success' => 'Karyawan di hapus']);
        }
        return redirect()->back()->with(['error' => 'Karyawan gagal di hapus']);
    }
    public function cari(Request $req)
    {
        $data = User::where('name','LIKE', '%'.$req->search.'%')->orWhere('email', $req->search)->orWhere('nik', $req->search)->orWhere('jabatan', $req->search)->paginate(10);
        return view('admin.karyawan.index', ['user' => Auth::user(), 'karyawan' => $data]);
    }
    public function showForm()
    {
        return view('admin.karyawan.create',['user' => Auth::user()]);
    }
    public function create(Request $req)
    {
        $validatedData = $req->validate([
            'nik' => 'required|max:16|min:16',
            'nama' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password2' => 'required',
            'jabatan' => 'required'
        ]);
        if($req->password === $req->password2)
        {
            $store = User::create([
                'nik' => $req->nik,
                'name' => $req->nama,
                'dob' => $req->dob,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'jabatan' => $req->jabatan
            ]);
            if($store)
            {
                return redirect()->back()->with(['success' => 'Data di simpan !']);
            }
        }
        return redirect()->back()->with(['error' => 'Password harus sama ']);

    }
}
