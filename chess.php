<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='style.css' />
    <title>Document</title>
</head>
<body>
    <table class="boardTable">
        <?php
        include_once("./classFunctions.php");

            for($row = 0; $row < 8; $row++){
                echo "<tr>";

                for($col = 0; $col < 8; $col++){

                    $squareClass = ($row + $col) % 2 == 0 ? "white" : "black";
                    echo "<td class='$squareClass'>";
                    echo "";
                    echo "</td>";
                }

                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>