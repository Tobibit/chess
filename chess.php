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
            $value = 0;

            for($col = 0; $col < 8; $col++){
                echo "<tr>";
                $value = $col;

                for($row = 0; $row < 8; $row++){
                    if($value % 2 == 0){
                        echo "<td class='black'></td>";
                        $value++;
                    } else {
                        echo "<td class='white'></td>";
                        $value++;
                    }
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>