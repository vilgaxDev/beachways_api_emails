<?php
require __DIR__.'/vendor/autoload.php';

if (trait_exists('Illuminate\Database\Eloquent\Concerns\HasUuids')) {
    echo "Concerns\\HasUuids exists\n";
} else {
    echo "Concerns\\HasUuids DOES NOT exist\n";
}
