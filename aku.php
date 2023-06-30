<?php

class Colors {
    private $foreground_colors = array();

    public function __construct() {
        $this->foreground_colors = array(
            '0' => '0;30', '1' => '1;30', // Black - Dark Gray
            '2' => '0;34', '3' => '1;34', // Blue - Light Blue
            '4' => '0;32', '5' => '1;32', // Green - Light Green
            '6' => '0;36', '7' => '1;36', // Cyan - Light Cyan
            '8' => '0;31', '9' => '1;31', // Red - Light Red
            '10' => '0;35', '11' => '1;35', // Purple - Light Purple
            '12' => '0;33', '13' => '1;33', // Brown - Yellow
            '14' => '0;37', '15' => '1;37'  // Light Gray - White
        );
    }

    // Returns colored string
    public function getColoredString($string, $foreground_color = null) {
        $colored_string = "";

        if (isset($this->foreground_colors[$foreground_color])) {
            $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
        }

        $colored_string .=  $string . "\033[0m";

        return $colored_string;
    }
}

// Create new Colors class
$colors = new Colors();

echo "Daftar warna:\n";
echo "0: Black, 1: Dark Gray, 2: Blue, 3: Light Blue\n";
echo "4: Green, 5: Light Green, 6: Cyan, 7: Light Cyan\n";
echo "8: Red, 9: Light Red, 10: Purple, 11: Light Purple\n";
echo "12: Brown, 13: Yellow, 14: Light Gray, 15: White\n";

$text = readline("Masukkan teks yang ingin diubah warnanya: ");
$color_number = readline("Masukkan nomor warna (0-15): ");

echo $colors->getColoredString($text, $color_number);
?>
