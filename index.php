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
        <input type="number" name="nr1" placeholder="" min="1" max="30">
        <input type="number" name="nr2" placeholder="" min="1" max="30">
        <input type="number" name="nr3" placeholder="" min="1" max="30">
        <input type="number" name="nr4" placeholder="" min="1" max="30">
        <input type="number" name="nr5" placeholder="" min="1" max="30">
        <input type="number" name="nr6" placeholder="" min="1" max="30">
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
                $samoja = true;
            }

            $tyhja = false;
                if (in_array("", $omat)) {
                $tyhja = true;
            }
            
            if (isset($_POST['btn']) && $samoja == false && $tyhja == false) {
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
                    echo '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/ULeDlxa3gyc?start=29" 
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media;
                        gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    } elseif ($osumat == 5) {
                      echo "<p>" . "Sait viisi numeroa oikein!? Onneksi olkoon!" . "</p>";
                    } elseif ($osumat == 4) {
                        echo "<p>" . "Sait neljä numeroa oikein! Olepa onnekas!" . "</p>";
                    } elseif ($osumat == 3) {
                        echo "<p>" . "Sait kolme numeroa oikein! Siistiä!" . "</p>";
                    } elseif ($osumat == 2 ) {
                        echo "<p>" . "Sait kaksi numeroa oikein. Nice!" . "</p>";
                    } elseif ($osumat == 1) {
                        echo "<p>" . "Sait vain yhden oikein... Parempi onni ensi kerralla!" . "</p>";
                    } else {
                        echo "<p>" . "Voi räkä! Ei osumia..." . "</p>";
                        
                    }

            } elseif (isset($_POST['btn']) && $samoja == true && $tyhja == false) {
                echo "<p>" . "Äläpäs yritä huijata!" . "<br>" . "Kaikkien numeroiden pitää olla erilaisia." . "</p>";
            } elseif (isset($_POST['btn']) && $samoja == true && $tyhja == true) {
                echo "<p>" . "Jokaisessa pallossa on oltava yksi numero!" . "</p>";
            }
        ?>
</body>
</html>