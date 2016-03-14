<?php
// Create the database connection at the start
include('database_connection.php');

// Include the Header for correct HTML Output
$title = 'Daten werden persistiert';
$redirect_to = 'index.php';
include('html_header.php');

// include the functions used in the script below
include('functions.php');

// save a new item, if there is need to
processSavings();
?>

    <div class="container">
        <br>
        <div class="alert alert-success" role="alert">
            Ihre Anfrage wird bearbeitet. Sie werden gleich weitergeleitet
        </div>
    </div>

<?php
// Include the Footer, incl. bootstrap javascript
include('html_footer.php');
?>