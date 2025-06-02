<?php
$host = 'smtp.gmail.com';
$port = 465 ;

$connection = @fsockopen($host, $port, $errno, $errstr, 10);

if (!$connection) {
    echo "Erro ao conectar: $errstr ($errno)";
} else {
    echo "Conectado com sucesso ao servidor SMTP!";
    fclose($connection);
}
