<?php
/**
 * Created by PhpStorm.
 * User: luv.sharma
 * Date: 2/12/18
 * Time: 6:38 PM
 */
// Array with names
session_start();

$a[] = "James Joyce";
$a[] = "Richard Wright";
$a[] = "Virginia Woolf";
$a[] = "Marilynne Robinson";
$a[] = "Emily Dickinson";
$a[] = "David Sedaris";
$a[] = "Elena Ferrante";
$a[] = "Tana French";
$a[] = "Carla Speed McNeil";
$a[] = "Joseph Campbell";
$a[] = "J K Rowling";
$a[] = "J R R Tolkein";
$a[] = "Ta-Nehisi Coates";
$a[] = "Noam Chomsky";
$a[] = "Ijeoma Oluo";
$a[] = "Lindy West";
$a[] = "Karl Marx";
$a[] = "John Hodgeman";
$a[] = "Munshi Premchand";
$a[] = "Ursula K Le Guin";
$a[] = "Octavia Butler";
$a[] = "Norman Finkelstein";
$a[] = "Bertrand Russel";
$a[] = "Samuel Beckett";
$a[] = "Czesław Miłosz";
$a[] = "F Scott Fitzgerald";
$a[] = "Aldous Huxley";
$a[] = "John Steinbeck";
$a[] = "George Orwell";
$a[] = "James Baldwin";
$a[] = "Silvia Fedurici";



// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>