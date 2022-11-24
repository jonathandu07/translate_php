<?php
// function t(){
//     $langue = parse_ini_file('fr.ini');
    
//         foreach ($langue as $l) {
//             print $l;
//             print "<br/>";
//         };

//     return $l;
// }

$langue = parse_ini_file('fr.ini');
    
foreach ($langue as $l) {
    print $l;
    print "<br/>";
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>accueil</title>
</head>

<body>
    <?php
    include "./navbar.php";
    ?>
    <article>

    </article>
    <article>
        <form action="POST">
            <button type="submit" form="original" value="original" name="original">
                Version originale
            </button>

            <button type="submit" form="fr" value="francais">
                Français
            </button>


            <button type="submit" form="en" value="anglais">
                Anglais
            </button>
        </form>

    </article>

    <article>
        <?php
        if (isset($_POST['original'])) {
            echo t();
        };
        ?>
    </article>
</body>

</html>