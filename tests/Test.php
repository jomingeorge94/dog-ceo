<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

use DogCeo\DogCeoAPI;

echo "Return list of all breeds :\n";
echo print_r(DogCeoAPI::getAllBreeds(),true);
echo "\n";

echo "Return random image path from all dog collection :\n";
echo DogCeoAPI::random();
echo "\n";

echo "Returns an array of all the images from a breed :\n";
echo print_r(DogCeoAPI::getImageByBreed('pointer'),true);
echo "\n";

echo "Returns an array of all the sub-breeds from a breed :\n";
echo print_r(DogCeoAPI::getImageBySubBreed('pointer', 'german'),true);
echo "\n";