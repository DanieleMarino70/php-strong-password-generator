<?php
// ** Descrizione
// Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
// L'esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.


// TODO Milestone 1
// ** Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale 
// ** (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all'utente.
// Scriviamo tutto (logica e layout) in un unico file *index.php*

// Milestone 2
// Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale


$password_lenght = $_GET["lenght"] ?? "";
$is_password_valid = true;
if (!empty($_GET)) {
    if ((!empty($password_lenght)) && ($password_lenght <= 0)) {
        $is_password_valid = false;
    }
}

$password_lenght = (int) $password_lenght;

$random_password = randomPassword($password_lenght);

var_dump($random_password);

function randomPassword($password_lenght)
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@.-_,';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $password_lenght; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


// <?= if($is_password_valid) ? '' : 'is-invalid' ?>
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <form class="row g-3" method="GET">
            <h1>Generatore Password</h1>

            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">Lunghezza</label>
                <input type="number" class="form-control " id="inputPassword2"
                    placeholder="Lunghezza Password" name="lenght">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Invia</button>
            </div>

        </form>
    </div>
</body>

</html>