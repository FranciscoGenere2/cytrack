<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$productId = $_GET['id'];
if($_POST) {
	
	$productName 		= $_POST['editProductName']; 
  $quantity 			= $_POST['editQuantity'];
  $rate 					= $_POST['editRate'];
  $brandName 			= $_POST['editBrandName'];
  $categoryName 	= $_POST['editCategoryName'];
  $productStatus 	= $_POST['editProductStatus'];
  $mrp 	= $_POST['mrp'];
  $bno 	= $_POST['bno'];
  $expdate 	= $_POST['expdate'];

				
	$sql = "UPDATE producto SET producto = '$productName', idMarca = '$brandName', idCategoria = '$categoryName', cantidad = '$quantity', cantXunidad = '$rate', fechaExp = '$expdate', estado = '$productStatus', estado = 'Disponible' WHERE idProducto = $productId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
		header('location:../product.php');
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
