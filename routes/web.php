<?php

    use App\Http\Controllers\BackEnd\AboutUsController;
    use App\Http\Controllers\BackEnd\ContactController;
    use App\Http\Controllers\BackEnd\FactController;
    use App\Http\Controllers\BackEnd\FeedbackController;
    use App\Http\Controllers\BackEnd\HeadingController;
    use App\Http\Controllers\BackEnd\HomeController;
    use App\Http\Controllers\BackEnd\Portfolio\CategoryController;
    use App\Http\Controllers\BackEnd\Portfolio\ItemController;
    use App\Http\Controllers\BackEnd\ResumeController;
    use App\Http\Controllers\BackEnd\ServiceController;
    use App\Http\Controllers\BackEnd\SkillController;
    use App\Http\Controllers\BackEnd\UserController;
    use App\Http\Controllers\FrontEnd\FrontContactController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\FrontEnd\MainController;
    use App\Http\Controllers\BackEnd\DashboardController;
    use App\Http\Controllers\Auth\LoginController;

    Auth::routes();

    //FrontEnd Controllers
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/resume', [MainController::class, 'resume'])->name('resume');
    Route::get('/services', [MainController::class, 'services'])->name('services');
    Route::get('/portfolio', [MainController::class, 'portfolio'])->name('portfolio');
    Route::get('/portfolio-details/{slug}', [MainController::class, 'portfolioDetails'])->name('portfolio-details');

    Route::get('/contact', [FrontContactController::class, 'index'])->name('contact');
    Route::post('/contact', [FrontContactController::class, 'store'])->name('front-contact-store');

    //BackEnd Controllers
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('/home', HomeController::class);
        Route::resource('/headings', HeadingController::class);
        Route::resource('/about/about-us', AboutUsController::class);
        Route::resource('/about/skill', SkillController::class);
        Route::resource('/about/fact', FactController::class);
        Route::resource('/about/feedback', FeedbackController::class);
        Route::resource('/resume', ResumeController::class);
        Route::resource('/service', ServiceController::class);
        Route::resource('/portfolio/category', CategoryController::class);
        Route::resource('/portfolio/item', ItemController::class);
        Route::resource('/contact', ContactController::class);
        Route::resource('/user', UserController::class);
    });
