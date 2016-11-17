<?php  
	include('phpqrcode/qrlib.php');

	class GeneradorQR{
		public static function generarQR($mensaje,$nombre){
			$nombreArchivo = $nombre.date("Ymd").date("H_i_s");
			QRcode::png($mensaje, '../images/qr/'.$nombreArchivo.'.png', QR_ECLEVEL_L,15);
			return "images/".$nombreArchivo.".png";
		}
	}
?>