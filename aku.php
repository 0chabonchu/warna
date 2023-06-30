<?php

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Colors {
    // previous code
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

$name = readline("Masukkan nama: ");
$address = readline("Masukkan alamat lengkap: ");
$birthdate = readline("Masukkan tanggal lahir (format YYYY-MM-DD): ");
$birthplace = readline("Masukkan kota lahir: ");
$gender = readline("Masukkan jenis kelamin: ");
$last_education = readline("Masukkan pendidikan terakhir: ");

$data = [
    'Nama' => $name,
    'Alamat' => $address,
    'Tanggal Lahir' => $birthdate,
    'Kota Lahir' => $birthplace,
    'Jenis Kelamin' => $gender,
    'Pendidikan Terakhir' => $last_education
];

$file = fopen("data.txt", "w");
fwrite($file, json_encode($data));
fclose($file);

$mail = new PHPMailer(true);

try {
    $mail->setFrom('ytpremio2023@gmail.com', 'Mailer');
    $mail->addAddress('eko@et.co.id', 'Eko');     // Add a recipient

    $mail->isHTML(true);                            // Set email format to HTML
    $mail->Subject = 'Data Pengguna';
    $mail->Body    = 'Berikut data pengguna: <pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
