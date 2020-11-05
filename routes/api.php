<?php

$coreUiApiEnabled = env('COREUI_API_ENABLED', false);
$cloudRunExecApiEnabled = env('CLOUD_RUN_EXEC_API_ENABLED', false);

// Core UI Core APIs
if($coreUiApiEnabled) {
	Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
	    Route::apiResource('permissions', 'PermissionsApiController');
	    Route::apiResource('roles', 'RolesApiController');
	    Route::apiResource('users', 'UsersApiController');
	    Route::apiResource('products', 'ProductsApiController');
	});
}

// Cloud Run Execution
if($cloudRunExecApiEnabled) {
	Route::group(['prefix' => 'exec', 'as' => 'exec.', 'namespace' => 'Api\Exec'], function () {
	    Route::apiResource('composer', 'ComposerController');
	    Route::apiResource('keyandcache', 'KeyAndCacheController');
	    Route::apiResource('dbmigrate', 'DBMigrateController');
	    Route::apiResource('dbseed', 'DBSeedController');
	});
}
