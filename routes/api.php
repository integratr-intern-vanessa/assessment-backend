<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}',[ProductController::class, 'show']);
Route::put('/products/{id}',[ProductController::class, 'update']);
Route::delete('/products/{id}',[ProductController::class, 'delete']);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$sname = $data['productId'];
$sage = $data['product_name'];
$scity = $data['quantity'];

include 'connect.php';

$sql = "insert into products (productId, product_name, quantity) values ('$productId', '$product_name', '$quantity')";

if (mysqli_query($conn, $sql)) {
  echo json_encode(['msg' => 'Data Inserted Successfully!', 'status' => true]);
} else {
  echo json_encode(['msg' => 'Data Failed to be Inserted!', 'status' => false]);
}
?>


