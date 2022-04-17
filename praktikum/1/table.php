<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellspacing="0" width="100px" height="100px">
        <?php for($row = 0; $row < 3; $row++) : ?>
            <tr>
                <?php for($col = 0; $col < 3; $col++) : ?>
                    <td></td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
</body>
</html>