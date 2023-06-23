
<!-- 
    Optiflow testoppgave

    Oppgaven er å lage en side som inneholder et skjema.
    Skjemaet skal inneholde et tekstfelt hvor brukeren kan taste inn et postnr. og få tilbake poststedet ved å gjøre et oppslag mot API'et til Posten/Bring.
    Bruk gjerne OOP i koden som angår utveksling av data mellom applikasjonen din og API'et.

    Posten/Brings API: https://developer.bring.com/api/postal-code/

    Du må gjerne legge koden ut på Github når du er ferdig.
-->

<?php
require 'bring_api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $api_key = '9593f1da-be5a-4596-bbd5-a38121427e59';
    $bringAPI = new BringAPI($api_key);

    $postnummer = $_POST['postnr'];
    $poststed = $bringAPI->getPoststed($postnummer);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Optiflow testoppgave</title>
        <link rel="stylesheet" href="../www/assets/CSS/style.css"
    </head>
    <body>
        <div class="tittel">
            <?php echo '<p>Optiflow testoppgave</p>'; ?>
        </div>
        <div class="inputfield">
            <form method="POST">
                <label for="postnr">Postnummer:</label>
                <br>
                <input type="number" id="postnr" name="postnr" value="<?php if(isset($_REQUEST['postnr'])) echo $_REQUEST['postnr']; ?>" required>
                <br>
                <input type="submit" value="Sjekk poststed">
            </form>
        </div>
        <div class="madeby">
            <p>
                Applikasjon laget av: Marius Sørensen Bakken
            </p>
        </div>
    </body>
</html>      

<?php if (isset($poststed)):?>
    <div class="result">
        <p>Poststed for postnummer "<?php echo $postnummer; ?>" er:</p>
        <p><?php echo $poststed; ?></p>
    </div>
        <?php endif;?>