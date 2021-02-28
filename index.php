<!DOCTYPE html>
<html lang="fi">
    <head>
        <meta charset="utf-8">
        <title>Arvontakone</title> 
        <link rel="stylesheet" href="style.css">
    </head>
<body>
   <h1>Arvontakone</h1>
   <h2>Valitse numerot 1 ja 30 väliltä</h2>
   
   <form method="POST">
        <input type="number" name="nr1" placeholder="X" min="1" max="30">
        <input type="number" name="nr2" placeholder="X" min="1" max="30">
        <input type="number" name="nr3" placeholder="X" min="1" max="30">
        <input type="number" name="nr4" placeholder="X" min="1" max="30">
        <input type="number" name="nr5" placeholder="X" min="1" max="30">
        <input type="number" name="nr6" placeholder="X" min="1" max="30">
        <br>
        <button type="submit" name="btn">Kokeile Onneasi!</button>
    </form>

    <br>
    <br>
    <br>

        <?php
        
            $omat = array ($_POST["nr1"], $_POST["nr2"], $_POST["nr3"], $_POST["nr4"], $_POST["nr5"], $_POST["nr6"]);
            sort($omat);

            $samoja = false;
                if(count($omat) != count(array_unique($omat))) {
                $samoja = true; }


            if (isset($_POST['btn']) && $samoja == false) {
                require("numbergenerator.php");
                
                $osumat = 0;
                foreach ($omat as $arvo) {
                  if (in_array($arvo, $oikeat)) {
                     $osumat++;
                    }
                }
                
                echo "<p>" . "Valitsemasi numerot: " . implode(", ", $omat) . "</p>";
                echo "<p>" . "Arvotut numerot: " . implode(", ", $oikeat) . "</p>";
                echo "<br><br>";                
                if ($osumat == 6) {
                    echo "Jackpot!";
                    } elseif ($osumat == 5) {
                      echo "Sait viisi numeroa oikein!? Onneksi olkoon!"; 
                    } elseif ($osumat == 4) {
                        echo "Sait neljä numeroa oikein! Olepa onnekas!";
                    } elseif ($osumat == 3) {
                        echo "Sait kolme numeroa oikein! Siistiä!";
                    } elseif ($osumat == 2 ) {
                        echo "Sait kaksi numeroa oikein. Nice!";
                    } elseif ($osumat == 1) {
                        echo "Sait vain yhden oikein... Parempi onni ensi kerralla!";
                    } else {
                        echo "Voi räkä! Ei osumia...";
                }
            } elseif (isset($_POST['btn']) && $samoja == true) {
                echo "Eipäs yritetä kusettaa!" . "<br>" . "Kaikkien numeroiden pitää olla erilaisia.";
            }
        ?>
    
</body>
</html>