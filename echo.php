<?php

$output = "";
$stopdisplay = false;



if(in_array("-h", $argv) || in_array("--help", $argv)) {
    help();
    $stopdisplay = true;
}

if(in_array("-v", $argv) || in_array("--version", $argv)) {
    if($stopdisplay == false) {
        version();
        $stopdisplay = true;
    }
    
}


for ($index = 1; $index < sizeof($argv); $index++) {
    $argument = $argv[$index];
    if($stopdisplay == false) {
        switch($argument) {
            case "--no-space":
            case "-s":
                $output = nstr_replace(" ","", $output);
                break;
            case "--newline":
            case "--n":
                $output = str_replace("\\n", "\n", $output);
                break;
            case "--escape":
            case "-e":
                $output = stripcslashes($output);
                break;
            default:
                $output.=$argument." ";
        } 
    }
}

echo $output;

function help() {
    echo "\n";
    echo "Utilisation : php echo.php [--] [args...]\n";
    echo "\n";
    echo "-v, --version     Afficher la version du programme ainsi que l'auteur\n";
    echo "-s, --no-space    Afficher tout les arguments sans séparation\n";
    echo "--n, --newline    Afficher tous les arguments en interprétant le caractère d'échappement \\n\n";
    echo "-e, --escape      Afficher tous les arguments en interprétant toutes les séquences d'échappement\n";
}

function version() {
    echo "\n";
    echo "Version Premium ++ Ultra pack 4.0 Gold prestige edition\n";
    echo "Auteur : AZARKANE Issam 1ESGI3 main Yuumi\n";
}