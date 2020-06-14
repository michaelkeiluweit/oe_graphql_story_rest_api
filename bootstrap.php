<?php

require_once '../bootstrap.php';

// 05848170643ab0deb9914566391c0c63 // Trapez
// 0584e8b766a4de2177f9ed11d1587f55 // Klebeband


// fc7e7bd8403448f00a363f60f44da8f2 // Zubehoer // Klebeband
// oia9ff5c96f1f29d527b61202ece0829 // Downloads // leer


function displayResult(array $items) : void
{
    echo '<pre>';
    echo json_encode($items, JSON_PRETTY_PRINT);
    echo '</pre>';
}