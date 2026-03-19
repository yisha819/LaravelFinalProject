use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
Route::get('/', function () {
    return redirect('/posts');
});
