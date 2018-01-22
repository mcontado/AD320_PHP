<?php

$loremIntro1 = <<< INTRO1
"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
INTRO1;

$loremIntro2 = <<< INTRO2
"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."
INTRO2;


$loremIpsumDefinition = <<< LOREM
Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
It has survived not only five centuries, but also the leap into electronic typesetting, 
remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker 
including versions of Lorem Ipsum.
LOREM;

$whyWeUseLorem = <<< WHY
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 
'Content here, content here', making it look like readable English. Many desktop publishing packages 
and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' 
will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, 
sometimes on purpose (injected humour and the like).
WHY;

$origin1 = <<< ORIGIN
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
ORIGIN;

$origin2 = <<< ORIGIN2
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
ORIGIN2;


$whereToGet = <<< WHERETOGET
There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
WHERETOGET;



/* This sets the $time variable to the current hour in the 24 hour clock format */
$time = date("H");
/* If the time is less than 1200 hours, show good morning */
if ($time < "12") {
    $greetings = "Mornin' mate";
} else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time > "12" && $time < "17") {
        $greetings = "Good Afternoon, Ma'am";
    } else {
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time > "17" && $time < "19") {
            $greetings = "'Evening, Sir";
        } else {
            /* Finally, show good night if the time is greater than or equal to 1900 hours */
            $greetings = "Good night.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP PROGRAMMING</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <span><?php echo date("F j, Y, g:i a"); ?></span><br>
    <span><?php echo $greetings ?></span><br>

    <main>
        <h1>Lorem Ipsum</h1>

        <?php echo $loremIntro1 ?> <br>
        <p style="color:dodgerblue"> <strong> <?php echo $loremIntro2 ?>  </strong> </p> <br>

        <b> What is Lorem Ipsum? </b> <br>
        <?php echo $loremIpsumDefinition ?>

        <br><br><b> Why do we use it? </b> <br>
        <?php echo $whyWeUseLorem ?>

        <br><br><b> Where does it come from? </b> <br>
        <?php echo $origin1 ?> <br>
        <?php echo $origin2 ?> <br>

        <br><br><b> Where can I get some? </b> <br>
        <?php echo $whereToGet ?>
    </main>

</body>
</html>

