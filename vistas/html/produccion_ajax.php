<?php
session_start();
if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
    header("location: ../../login.php");
    exit;
}

// Verificar si es una solicitud AJAX
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Lógica para manejar la solicitud AJAX
    // Obtener los datos de la solicitud AJAX
	var_dump($_POST[]);
	$totalMPPHP = $_POST['totalMPPHP'] ?? 0;
	$totalMODPHP = $_POST['totalMODPHP'] ?? 0;
	$totalDiarioDTPHP = $_POST['totalDiarioDTPHP'] ?? 0;

   // Crear el HTML resultante
	$htmlResultante = '<div>';
	$htmlResultante .= '<p>Total de Materia Prima: Gs. ' . $totalMPPHP . '</p>';
	$htmlResultante .= '<p>Total MOD: Gs. ' . $totalMODPHP . '</p>';
	$htmlResultante .= '<p>Sumatoria Total Diario según DT: Gs. ' . $totalDiarioDTPHP . '</p>';
	$htmlResultante .= '</div>';

    // Devolver el HTML resultante
	echo $htmlResultante;
    exit;
} else {
    // Si no es una solicitud AJAX, puedes manejarlo de acuerdo a tus necesidades
    // Por ejemplo, redireccionar o devolver un mensaje de error
    echo "Acceso denegado";
    exit;
}
?>
