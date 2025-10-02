<?php


use lib\Route;
use app\controllers\CreditoController;

Route::get("/", [CreditoController::class,"index"]);
Route::post("/calcular", [CreditoController::class,"calcular"]);

Route::dispatch();


?>
