<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sklep dla uczniów</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
    <?php
        $conn=mysqli_connect("localhost","root","","sklep");
    ?>
    <div class="baner">
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </div>

    <div class="lewy">
        <h2>Taniej o 30%</h2>
        <?php
            $query1=mysqli_query( $conn,"SELECT nazwa FROM towary WHERE promocja = 1");
            echo "<ol>";
            while($row1=mysqli_fetch_array($query1)){
                echo "<li>". $row1["nazwa"]. "</li>";
            }
            echo "</ol>";
        ?>
    </div>

    <div class="środkowy">
        <h2>Sprawdź cenę</h2>
        <form action="index.php" method="POST">
        <select name="produkt">
            <?php
                $sql=mysqli_query( $conn,'SELECT nazwa FROM towary WHERE promocja = 1');
                while($row2=mysqli_fetch_row($sql)){
                    echo "<option value='$row2[0]'>". $row2[0]. "</option>";
                }
            ?>
        </select>
        <input type="submit" value="SPRAWDŹ">
        </form>
        <div class=skrypt2>
            <?php
                if(!isset($_POST['produkt'])){
                    $produkt = "Gumka do mazania";
                }else{
                    $produkt = $_POST['produkt'];
                }
            
                $query2=mysqli_query( $conn,"SELECT cena FROM towary WHERE nazwa like '$produkt'");
                $cena = mysqli_fetch_row($query2);
                $cena_promocja = round(($cena[0]*0.7), 2);

                echo"cena regularna:".$cena[0] ."<br>";
                echo "cena w promocji 30%: ". $cena_promocja;
            ?>
        </div>
    </div>

    <div class="prawy">
        <h2>Kontakt</h2>
        <p>e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a> </p>
        <img src="promocja2.png" alt="promocja">
    </div>

    <div class="stopka">
        <h4>Autor strony: Kajetan Klimasara</h4>
    </div>   
    <?php
        mysqli_close($conn)
    ?>
    </body>
</html>