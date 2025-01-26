<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__) . '/wordpress/wp-content/themes/twentytwentyfive/functions.php';

class Test extends TestCase {
    //test domyslnie przechodzacy
    public function testExample() {
        $this->assertTrue(true);
    }
    // Test funkcji mytheme_generate_excerpt
    public function testGenerateExcerpt() {
        $text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
        
        // Skrót krótszy niż cały tekst
        $excerpt = mytheme_generate_excerpt($text, 20);
        $this->assertEquals("Lorem ipsum dolor s...", $excerpt);

        // Skrót równy tekstowi
        $excerpt = mytheme_generate_excerpt($text, 100);
        $this->assertEquals($text, $excerpt);

        // Skrót pustego tekstu
        $excerpt = mytheme_generate_excerpt("", 10);
        $this->assertEquals("", $excerpt);
    }

    // Test funkcji mytheme_format_price
    public function testFormatPrice() {
        // Poprawne formatowanie
        $formattedPrice = mytheme_format_price(1234.56);
        $this->assertEquals("1 234,56 zł", $formattedPrice);

        // Formatowanie liczby całkowitej
        $formattedPrice = mytheme_format_price(1000);
        $this->assertEquals("1 000,00 zł", $formattedPrice);

        // Formatowanie wartości zero
        $formattedPrice = mytheme_format_price(0);
        $this->assertEquals("0,00 zł", $formattedPrice);

        // Niepoprawny typ danych
        $formattedPrice = mytheme_format_price("abc");
        $this->assertFalse($formattedPrice);
    }
}
