<?php
	// Generowanie skrótu tekstu o określonej długości
	function mytheme_generate_excerpt($text, $length = 100) {
		if (strlen($text) <= $length) {
			return $text;
		}
		return substr($text, 0, $length) . '...';
	}

	// Formatowanie ceny w walucie PLN
	function mytheme_format_price($price) {
		if (!is_numeric($price)) {
			return false;
		}
		return number_format($price, 2, ',', ' ') . ' zł';
	}
?>