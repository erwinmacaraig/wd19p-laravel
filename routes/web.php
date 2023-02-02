<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Test\TestController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts-show');
Route::get('/createUser', [TestController::class, 'insertUser'])->name('create-usesr');
Route::get('/view-all-users', [TestController::class, 'retrieveAllUsers'])->name('allUsers');
Route::get('/edit-user/{member}', [TestController::class, 'editUser'])->name('edit-user-form');
Route::post('/edit-user-save', [TestController::class, 'updateUser'])->name('edit-save-user');

Route::get('/company/{name?}', function ($name = null) {
    if ($name) {
        return "<h1>Company: " .  $name . "</h1>";
    }
    return "<h1>Showing All Companies</h1>";
})->name('companies');

Route::get('/contacts/{id}', function ($contactId) {

    $contacts = ["Erwin", "Len", "Pauee", "John", "Rachel"];
    $results = null;

    if ((sizeof($contacts) - 1) >= $contactId) {
        $results = $contacts[$contactId];
    }
    return view('contacts.find-results-contact')->with('results', $results);
})->name('find-contacts');

Route::get('/links', function () {
    $html = "<h1>Navigation</h1>
        <ul>
            <li><a href='" . route('contacts-show') . "'> Show All Contacts </a></li>
            <li><a href='" . route('companies') . "'>Comapny</a></li>
            <li><a href='" . route('find-contacts', 4) . "'>Find Contact</a></li>
        </ul>    
    ";

    return $html;
});

Route::get('/templates', function () {
    $student_juan = [
        "Math" => 80,
        "Science" => 82,
        "Spelling" => 79,
        "History" => 85,
    ];
    return view('sample')->with('grades', $student_juan);
    //return view('sample', ['grades' => $student_juan]);
});

Route::get('/products',  function () {

    $products = array(
        ['product_id' => 1, 'product_name' => 'Keyboard'],
        ['product_id' => 2, 'product_name' => 'Mouse'],
        ['product_id' => 3, 'product_name' => 'CPU'],
        ['product_id' => 4, 'product_name' => 'Monitor'],
        ['product_id' => 5, 'product_name' => 'Tablet'],
        ['product_id' => 6, 'product_name' => 'RAM'],
        ['product_id' => 7, 'product_name' => 'Fan'],
        ['product_id' => 8, 'product_name' => 'Camera'],
    );
    return view('products.index', compact('products'));
})->name('products');

Route::fallback(function () {
    return "<h1>Sorry, the page you are accessing does not exist!</h1>";
});
