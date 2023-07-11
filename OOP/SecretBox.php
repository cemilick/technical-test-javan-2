<?php

//Diberikan potongan kode di bawah ini:

class SecretBox
{
  // Dilakukan sedikit perubahan hanya untuk menyesuaikan penulisan variable pada bahasa pemrograman PHP
    public int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function check(int $x)
    {
        if ($x == $this->number)
            return 'pas';
        else if ($x < $this->number)
            return 'kurang';
        else
            return 'lebih';
    }
}


class Person
{

    // OTHERS CODE IF NECESSARY
    public $low = 1;
    public $high = 100;
    
    public function __construct(int $low = 1, int $high = 100)
    {
        $this->low = $low;
        $this->high = $high;
    }
    public function guess()
    {
        // Menebak angka dengan metode ngasal, tergantung hoki
        $number = ($this->low + $this->high) / 2;

        return intval($number);
    }

    public function acceptResponse(string $response)
    {
        if ($response == 'kurang') {
            $this->low = $this->guess();
        } else if ($response == 'lebih') {
            $this->high = $this->guess();
        }
    }

    // OTHERS CODE IF NECESSARY
}


// Test Script
$low = 1;
$high = 100;
$secretNumber = rand($low, $high);
$box = new SecretBox($secretNumber);
$bayu = new Person($low, $high);

echo ("Secret Number: " . $secretNumber . "\n \n");

$finish = false;
$i = 1;


while (!$finish) {
    $guess = $bayu->guess();

    $response = $box->check($guess);

    // HINT: Seharusnya bayu bisa memanfaatkan response 
    // untuk bisa menghasilkan tebakan yang lebih baik
    // jadi tidak sekedar asal tebak secara random.
    // Contohnya, jika response-nya adalah "kurang", maka tentu tebakan selanjutnya seharusnya tidak lebih kecil dari tebakan sekarang
    $bayu->acceptResponse($response);

    $finish = ($response === 'pas');

    echo ("Tebakan " . ($i++) . ": " . $guess);
    echo ("\n");
    echo ("Response: " . $response);
    echo ("\n \n");
}

// Silakan perbaiki kode di atas agar Person bisa menebak dengan lebih jitu, dengan ketentuan:

// * Class SecretBox tidak boleh diubah
// * Class Person boleh diubah
// * Test script boleh diubah
// * Semakin sedikit jumlah tebakan semakin baik

#### Bonus
// Manfaatkan Strategy Pattern sehingga class Person bisa gonta-ganti metode untuk menebak angka saat runtime. Beberapa strategy yang bisa diterapkan: tebak 100% random, tebak iteratif naik/turun satu angka, dan tebak ambil nilai tengah.
