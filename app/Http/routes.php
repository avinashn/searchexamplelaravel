<?php
use App\User;
use Illuminate\Support\Facades\Input;

Route::get ( '/', function () {
	return view ( 'welcome' );
} );
Route::post ( '/search', function () {
	$q = Input::get ( 'q' );
	if($q != ""){
		$user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
		if (count ( $user ) > 0)
			return view ( 'welcome' )->withDetails ( $user )->withQuery ( $q );
		else
			return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
	}
	return view ( 'search-functionality-in-laravel/welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );
