<?php
// Create the database connection at the start
include('database_connection.php');

// Include the Header for correct HTML Output
$title = 'Mediendatenbank';
include('html_header.php');

// include the functions used in the script below
include('functions.php');

// include all the root data
include('media_data.php');
?>
<div class="container">
    <!-- In case there is some Request data - display it here -->
    <!-- Stop display these things. It's getting annoing -->
    <?php if($_POST){
        // print '<div><pre>' . print_r($_POST, true) . '</pre></div>';
    } ?>

    <!-- Display all Medias stored  -->
    <div class="row">
        <?php
        foreach($categories as $category_key => $category_name){
            echo getCategory($category_key, $category_name);
        }
        ?>
    </div>
    <?php
    include('media_item_mask.php');
    ?>
</div>

<?php
// Include the Footer, incl. bootstrap javascript
include('html_footer.php');
?>
