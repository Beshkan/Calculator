<?php
include "calculator.php";
@Calculator();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<div class="bg">
    <form action="" method="get">
    
        <table>
            <tr>
                <td colspan="5">
                    <label>
                        <input type="text" name="result" value="<?php echo $result ?>" class="text"/>
                    </label>
                </td>
            </tr>
            <tr>
                <td><input name="pin" type="submit" value="(" class="btn"></td>
                <td><input name="pin" type="submit" value=")" class="btn"></td>
                <td><input name="pin" type="submit" value="^" class="btn"></td>
                <td><input name="pin" type="submit" value="/" class="btn"></td>
                <td><input name="pin" type="submit" value="C" class="btn"></td>
            </tr>
            <tr>
                <td><input name="pin" type="submit" value="1" class="btn"></td>
                <td><input name="pin" type="submit" value="2" class="btn"></td>
                <td><input name="pin" type="submit" value="3" class="btn"></td>
                <td><input name="pin" type="submit" value="*" class="btn"></td>
                <td><input name="pin" type="submit" value="CE" class="btn"></td>
            </tr>
            <tr>
                <td><input name="pin" type="submit" value="4" class="btn"></td>
                <td><input name="pin" type="submit" value="5" class="btn"></td>
                <td><input name="pin" type="submit" value="6" class="btn"></td>
                <td><input name="pin" type="submit" value="-" class="btn"></td>
                <td rowspan="3"><input name="pin" type="submit" value="=" class="btn equal"></td>
            </tr>
            <tr>
                <td><input name="pin" type="submit" value="7" class="btn"></td>
                <td><input name="pin" type="submit" value="8" class="btn"></td>
                <td><input name="pin" type="submit" value="9" class="btn"></td>
                <td><input name="pin" type="submit" value="+" class="btn"></td>

            </tr>
            <tr>
                <td><input name="pin" type="submit" value="0" class="btn"></td>
                <td><input name="pin" type="submit" value="00" class="btn"></td>
                <td><input name="pin" type="submit" value="000" class="btn"></td>
                <td><input name="pin" type="submit" value="." class="btn"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
