<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4ONE</title>
</head>
<body>

    <h2>PHP</h2>

    <form action="/" method="get">
        <input type="text" name="q" placeholder="Sök">
        <input type="submit" value="Sök">
    </form>

    <h2>
        <a href="/?q=computers">Computers</a>
    </h2>
    
    <?php 
        // Hämta värde från queryString

        //$q = $_GET['q'] ?? "NOTHING";

   /*      if(isset($_GET['q'])  && $_GET['q']!=null ){
            $q = $_GET['q'];
            echo("<h4>Du sökte efter $q </h4>");
        } */

        if(!empty($_GET['q']) ){
            $q = $_GET['q'];
            echo("<h4 class = 'seek'>Du sökte efter $q </h4>");
        }
        $user = "Noor";

    ?>


    <h5><?= $user; ?></h5>


</body>
</html>