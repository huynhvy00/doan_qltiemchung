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
    // public function __construct(HomeService $homeService, SemesterService $semesterService,
    // StudentService $studentService, VehicleService $vehicleService, RoomRegistrationFormService $contractService)
    // {
    //     $this->homeService = $homeService;
    //     $this->semesterService = $semesterService;
    //     $this->studentService = $studentService;
    //     $this->vehicleService   = $vehicleService;
    //     $this->contractService = $contractService;

    // }

    public function index(){
        return view('index',
        [   'title'=>'Ký túc xá Đại học Sư phạm Kỹ thuật Đà Nẵng',
            // 'intros'=>$this->homeService->getIntros(),
            // 'aF'=>$this->homeService->getRoomsFirst('A'),
            // 'aL'=>$this->homeService->getRoomsLast('A'),
            // 'bF'=>$this->homeService->getRoomsFirst('B'),
            // 'bL'=>$this->homeService->getRoomsLast('B'),
            // 'cF'=>$this->homeService->getRoomsFirst('C'),
            // 'cL'=>$this->homeService->getRoomsLast('C'),
            // 'notes'=>$this->homeService->getNotes(),
            // 'semester'=>$this->homeService->getSemester(),
        ]);
    }

    public function login(Request $request){
        $this->phuhuynhService->postLogin($request);
        return redirect()->back();
    }

    public function logout(){
        if (session()->has('phuhuynh')){
            session()->pull('phuhuynh');
            session()->pull('tenPH');
        }
        return redirect('index');
    }


}
