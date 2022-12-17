<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FrontController;

use App\Models\ProductCategories;
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

Route::get('/', [FrontController::class, 'index']);
Route::post('/quick-add-to-cart/{product}', [FrontController::class, 'quickAddToCart']);
Route::post('/add-to-cart/{product}', [FrontController::class, 'addToCart']);
Route::post('/update-minicart', [FrontController::class, 'updateMinicart']);
Route::post('/delete-minicart-item/{item}', [FrontController::class, 'deleteMiniCartItem']);
Route::get('/shop', [FrontController::class, 'shop'])->name('shop');
Route::get('/shop/{slug}', [FrontController::class, 'shopCategory'])->name('shop.category');
Route::post('/quick-view/{product}', [FrontController::class, 'quickView']);

Route::get('/about-us', function () {
    $categories = ProductCategories::all();
    return view('public.bio')->with(array('categories' => $categories));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/customers', function () {
    return view('admin.customers');
})->middleware(['authAdmin'])->name('customers');

Route::get('/orders', function () {
    return view('admin.orders');
})->middleware(['authAdmin'])->name('orders');

Route::get('/categories', [CategoriesController::class, 'index']
)->middleware(['authAdmin'])->name('categories');

Route::get('/categories/list', [CategoriesController::class, 'getCategories']
)->middleware(['authAdmin'])->name('categories.list');

Route::get('/categories/edit/{id}', [CategoriesController::class, 'editCategory']
)->middleware(['authAdmin'])->name('categories.edit');

Route::patch('/categories/edit/{id}', [CategoriesController::class, 'updateCategory']
)->middleware(['authAdmin'])->name('categories.update');

Route::get('/categories/new', [CategoriesController::class, 'newCategory']
)->middleware(['authAdmin'])->name('categories.new');

Route::post('/categories/add', [CategoriesController::class, 'addCategory']
)->middleware(['authAdmin'])->name('categories.add');

Route::get('/categories/delete/{category}', [CategoriesController::class, 'deleteCategory']
)->middleware(['authAdmin'])->name('categories.delete');



Route::get('/products', [ProductsController::class, 'index']
)->middleware(['authAdmin'])->name('products');

Route::get('/products/list', [ProductsController::class, 'getProducts']
)->middleware(['authAdmin'])->name('products.list');

Route::get('/products/edit/{product}', [ProductsController::class, 'editProduct']
)->middleware(['authAdmin'])->name('products.edit');

Route::patch('/products/edit/{product}', [ProductsController::class, 'updateProduct']
)->middleware(['authAdmin'])->name('products.update');


Route::patch('/products/edit/{product}/images', [ProductsController::class, 'updateProductImages']
)->middleware(['authAdmin'])->name('products.updateImages');

Route::get('/products/{product}/images/delete/{image}', [ProductsController::class, 'deleteProductImage']
)->middleware(['authAdmin'])->name('products.deleteImage');


Route::get('/products/new', [ProductsController::class, 'newProduct']
)->middleware(['authAdmin'])->name('products.new');

Route::post('/products/add', [ProductsController::class, 'addProduct']
)->middleware(['authAdmin'])->name('products.add');

Route::get('/products/delete/{product}', [ProductsController::class, 'deleteProduct']
)->middleware(['authAdmin'])->name('products.delete');

Route::get('/users', [UsersController::class, 'index']
)->middleware(['authAdmin'])->name('users');

Route::get('/users/list', [UsersController::class, 'getCustomers']
)->middleware(['authAdmin'])->name('users.list');

Route::get('/users/view', [UsersController::class, 'viewCustomer']
)->middleware(['authAdmin'])->name('users.view');


// Route::get('/categories', function () {
//     return view('admin.categories');
// })->middleware(['authAdmin'])->name('categories');

// Route::get('/product/{id}', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
