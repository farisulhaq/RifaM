<?php
if (isset($_POST['submit'])) {
    if (empty($_POST['check'])) {
        echo "Anda belum memilih";
    } else {
        echo "Anda memilih";
    }
}
?>
<form action="" method="post">
    <input type="checkbox" id="vehicle1" name="check[]" value="Bike">
    <label for="vehicle1"> I have a bike</label><br>
    <input type="checkbox" id="vehicle2" name="check[]" value="Car">
    <label for="vehicle2"> I have a car</label><br>
    <input type="checkbox" id="vehicle3" name="check[]" value="Boat">
    <label for="vehicle3"> I have a boat</label>
    <br>
    <input type="submit" value="Submit" name="submit">
</form>