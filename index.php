<?php
$words = array("chat", "chien", "oiseau", "poisson", "souris", "cheval", "vache", "cochon", "poulet", "lapin");

$wordToGuess = str_split($words[array_rand($words)]);

$lettersFound = [];
$win = 5;

$tirets = array();

foreach ($wordToGuess as $lettre) {
    $tirets[] = "_";
}

while (true) {
    $saisie = readline("Donne une lettre : " . implode(' ', $tirets));
    if (in_array($saisie, $wordToGuess) && !in_array($saisie, $lettersFound)) {
        $lettersFound[] = $saisie;
        foreach ($wordToGuess as $indice => $lettre) {
            if ($lettre == $saisie) {
                $tirets[$indice] = $saisie;
            }
        }

        echo "Tu as trouvé une lettre / ";
    } else {
        if (!$win) {
            echo "T'es mort";
            exit;
        }

        echo "Non essaye encore || ";
        $win--;
    }

    if (count($lettersFound) === count($wordToGuess)) {
        echo "Bravo ma couille";
        exit;
    }
}
