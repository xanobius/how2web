<?php
    // Include the Header for correct HTML Output
$title = 'Lesson 02';
include('html_header.php');
?>

<div class="container">
    <p>
        <?php
        function getGreetingLine($lastname, $gender){
            if($gender == 'm'){
                return "Guten Tag Herr " . $lastname . ". Wir wünschen Ihnen einen tollen Darwin Day am 12. Februar!<br>";
            }else{
                return "Guten Tag Frau " . $lastname . ". Wir wünschen Ihnen einen tollen Darwin Day am 12. Februar!<br>";
            }
        }

        echo getGreetingLine('Teach', 'm');
        echo getGreetingLine('Bonny', 'f');
        echo getGreetingLine('Turing', 'm');
        echo getGreetingLine('Lovelace', 'f');
        echo getGreetingLine('Darwin', 'm');
        echo getGreetingLine('Curie', 'f');
        echo getGreetingLine('Nietzsche', 'm');
        echo getGreetingLine('Luxemburg', 'f');
        echo getGreetingLine('Lovecraft', 'm');
        echo getGreetingLine('Shelley', 'f');
        ?>
    </p>
</div>


<?php
    // Include the Footer, incl. bootstrap javascript
include('html_footer.php');
?>
