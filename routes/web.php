 <?php

    use App\Http\Controllers\admin\BenhController;
    use App\Http\Controllers\user\LoginController;
    use App\Http\Controllers\user\PhuHuynhController;
    use App\Http\Controllers\admin\TreEmController;
    use App\Http\Controllers\admin\LoginAdController;
    use App\Http\Controllers\admin\MainController;
    use App\Http\Controllers\admin\PhieuDangKyTiemController;
    use App\Http\Controllers\admin\UserController;
    use App\Http\Controllers\admin\VaccineController;
    use App\Http\Controllers\admin\ChiTietMuiTiemController;
use App\Http\Controllers\user\MainUserController;
use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Hash;


    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    // Route::get('/test',function (){
    //     return view('admin.users.disable',['title'=>'employee']);
    // });

    Route::get('/admin/login', [LoginAdController::class, 'index'])->name('login');
    Route::post('/admin/login/store', [LoginAdController::class, 'store']);
    Route::get('/pass', [LoginAdController::class, 'create']);
    Route::get('/logout', [LoginAdController::class, 'getLogout']);


    Route::middleware(['auth'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [MainController::class, 'index']);
            Route::get('main', [MainController::class, 'index'])->name('admin');
            Route::prefix('phuhuynh')->group(function () {
                Route::get('list', [PhuHuynhController::class, 'index']);
                Route::get('create', [PhuHuynhController::class, 'create']);
                Route::post('create', [PhuHuynhController::class, 'store']);
                Route::get('edit/{phuhuynh}', [PhuHuynhController::class, 'show']);
                Route::post('edit/{phuhuynh}', [PhuHuynhController::class, 'update']);
                Route::get('delete/{id}', [PhuHuynhController::class, 'destroy']);
                Route::get('detail/{phuhuynh}', [PhuHuynhController::class, 'detail']);
                // Route::get('active/{phuhuynh}',[PhuHuynhController::class,'getActive']);
                Route::get('active/{phuhuynh}', [PhuHuynhController::class, 'postActive']);
            });

            Route::prefix('nhanvien')->group(function () {
                Route::get('list', [UserController::class, 'index']);
                Route::get('create', [UserController::class, 'create']);
                Route::post('create', [UserController::class, 'store']);
                Route::get('edit/{nhanvien}', [UserController::class, 'show']);
                Route::post('edit/{nhanvien}', [UserController::class, 'update']);
                Route::get('detail/{nhanvien}', [UserController::class, 'detail']);
                Route::get('active/{nhanvien}', [UserController::class, 'postActive']);
                Route::get('delete/{id}', [UserController::class, 'destroy']);
            });
            Route::prefix('benh')->group(function () {
                Route::get('list', [BenhController::class, 'index']);
                Route::get('create', [BenhController::class, 'create']);
                Route::post('create', [BenhController::class, 'store']);
                Route::get('edit/{benh}', [BenhController::class, 'show']);
                Route::post('edit/{benh}', [BenhController::class, 'update']);
                Route::get('delete/{id}', [BenhController::class, 'destroy']);
            });
            Route::prefix('vaccine')->group(function () {
                Route::get('list', [VaccineController::class, 'index']);
                Route::get('create', [VaccineController::class, 'create']);
                Route::post('create', [VaccineController::class, 'store']);
                Route::get('edit/{vaccine}', [VaccineController::class, 'show']);
                Route::post('edit/{vaccine}', [VaccineController::class, 'update']);
                Route::get('detail/{vaccine}', [VaccineController::class, 'detail']);
                Route::get('delete/{id}', [VaccineController::class, 'destroy']);
            });
            Route::prefix('treem')->group(function () {
                Route::get('list', [TreEmController::class, 'index']);
                Route::get('create', [TreEmController::class, 'create']);
                Route::post('create', [TreEmController::class, 'store']);
                Route::get('edit/{treem}', [TreEmController::class, 'show']);
                Route::post('edit/{treem}', [TreEmController::class, 'update']);
                Route::get('detail/{treem}', [TreEmController::class, 'detail']);
                Route::get('delete/{id}', [TreEmController::class, 'destroy']);
            });
            Route::prefix('phieutiem')->group(function () {
                Route::get('list', [PhieuDangKyTiemController::class, 'index']);
                Route::get('create', [PhieuDangKyTiemController::class, 'create']);
                Route::post('create', [PhieuDangKyTiemController::class, 'store']);
                Route::get('detail/{phieudk}', [PhieuDangKyTiemController::class, 'show']);
                Route::post('detail/{phieudk}', [PhieuDangKyTiemController::class, 'update']);
                Route::post('detail/delete/{phieudk}', [PhieuDangKyTiemController::class, 'postHidden']);

                // Route::get('delete/{id}',[PhieuDangKyTiemController::class,'destroy']);
            });
            Route::prefix('phieutiem/chitietmuitiem')->group(function () {
                Route::get('list', [ChiTietMuiTiemController::class, 'index']);
                // Route::get('create',[ChiTietMuiTiemController::class,'create']);
                // Route::post('create',[ChiTietMuiTiemController::class,'store']);
                Route::get('detail/{chitiet}', [ChiTietMuiTiemController::class, 'show']);
                Route::post('detail/{chitiet}', [ChiTietMuiTiemController::class, 'update']);
                // Route::post('detail/delete/{phieudk}',[ChiTietMuiTiemController::class,'postHidden']);

                // Route::get('delete/{id}',[ChiTietMuiTiemController::class,'destroy']);
            });
        });
    });
    //login user
    Route::group(['prefix'=>''],function(){
        Route::get('/',[MainUserController::class,'index'])->name('home');
        Route::get('home',[MainUserController::class,'index']);
       // Route::get('login', [MainUserController::class, 'login']);
        Route::post('login/store', [MainUserController::class, 'login']);
        Route::get('logout',[PhuHuynhController::class,'logout']);
        Route::get('vaccines',[VaccineController::class,'getVaccine']);
        Route::get('dang-ky-tiem',[PhuHuynhController::class,'getAllDangKy']);

        Route::get('contract/{room}',[MainIndexController::class,'getRegist']);
        Route::post('contract/{room}',[MainIndexController::class,'postRegist']);
        Route::get('vehicle',[MainIndexController::class,'getRegistVehicle']);
        Route::post('vehicle',[MainIndexController::class,'postRegistVehicle']);
    });



    // //login ad
    // Route::get('/login', [LoginAdController::class,'index'])->name('login_ad');
    // Route::post('login/store', [LoginAdController::class,'store']);


    // Route::get('/', function () {
    //     return view('index');
    // })->name('index');
    Route::get('/pass', function () {
        $p = Hash::make('123');
        return $p;
    });
    // Route::get('/phieudangky', function () {
    //     return view('phieudangky');
    // });
    // Route::get('/dang-ky-tiem', function () {
    //     return view('dangkytiem');
    // });
    // Route::get('/login', function () {
    //     return view('admin/login');
    // });
    // Route::get('/header', function () {
    //     return view('admin.header');
    // });
    // Route::get('/vaccines', function () {
    //     return view('vaccines');
    // });

    Route::get('/gioi-thieu', function () {
        return view('gioi-thieu');
    });
    Route::get('/benh-hoc', function () {
        return view('benh-hoc');
    });
    Route::get('/tin-tuc', function () {
        return view('tin-tuc');
    });
    Route::get('/lich-trinh', function () {
        return view('lich-trinh');
    });
    // Route::get('/cap-nhat-tai-khoan-ca-nhan', function () {
    //     return view('capnhattk');
    // });
    // Route::get('/main', function () {
    //     return view('admin/main');
    // });
    // Route::get('/create', function () {
    //     return view('admin/phuhuynh/create');
    // });
