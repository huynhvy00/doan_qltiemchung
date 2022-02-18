<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Service\PhuHuynhService;
use Illuminate\Http\Request;

class MainUserController extends Controller
{
    protected $homeService;
    protected $semesterService;
    protected $studentService;
    protected $vehicleService;
    protected $contractService;
    public function __construct(PhuHuynhService $phuhuynhService)
    {
        $this->phuhuynhService = $phuhuynhService;
    }

    public function index(){
        return view('index',
        [   'title'=>'Quản lý tiêm chủng Đà Nẵng',

        ]);
    }
    public function getLogin(){
        // dd(fsdffd);
        return view('/loginUser',['title'=>'Đăng nhập Quản trị viên']);
    }
    public function login(Request $request){
        $this->phuhuynhService->postLogin($request);
        return redirect()->route('home1');
    }

    public function logout(){
        if (session()->has('phuhuynh')){
            session()->pull('phuhuynh');
            session()->pull('tenPH');
        }
        return redirect('');
    }


}
