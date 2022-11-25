<?php
$langue = parse_ini_file('fr.ini');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>accueil</title>
</head>

<body>
    <?php
    include "./navbar.php";
    ?>
    <main>
        <?php
        echo '<h3>' . 'Dictionaire français vers latin' . '</h3>';
        foreach ($langue as $l => $v) {
            echo $l . ' ' . '="' . $v;
            echo "<br/>";
        };
        echo '<form>';
        echo '<input type="button" value="Go back!" onclick="history.back()">';
        echo '</form>';
        ?>
    </main>
   
</body>

</html>