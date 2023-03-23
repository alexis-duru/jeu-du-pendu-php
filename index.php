<?php
$words = array("chat", "chien", "oiseau", "poisson", "souris", "cheval", "vache", "cochon", "poulet", "lapin");

$wordToGuess = str_split($words[array_rand($words)]);
var_dump($wordToGuess);

$victory = false;
$lettersFound = [];
$win = 5;

$tirets = array();

foreach ($wordToGuess as $lettre) {
    $tirets[] = "_";
}

print_r($tirets);

while (!$victory) {
    $saisie = readline("Donne une lettre : " . implode(' ', $tirets));
    if (in_array($saisie, $wordToGuess) && !in_array($saisie, $lettersFound)) {
        array_push($lettersFound, $saisie);

        foreach ($wordToGuess as $indice => $lettre) {
            if ($lettre == $saisie) {
                $tirets[$indice] = $saisie;
            }
        }

        echo "Tu as trouvé une lettre / ";
    } else {
        if ($win !== 0) {
            echo "Non essaye encore || ";
            $win = $win - 1;
        } else {
            echo "T'es mort";
            exit();
        }
    }

    if (count($lettersFound) === count($wordToGuess)) {
        echo "Bravo ma couille";
        exit();
    }
}
