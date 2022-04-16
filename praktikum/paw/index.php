<?php
function jumlah($x, $y)
{
    return $x + $y;
}
function kali($x, $y)
{
    return $x * $y;
}
function bagi($x, $y)
{
    return $x / $y;
}

print("X + Y = " . jumlah(2, 3));
print("<br>");
print("X + Y = " . jumlah(9, 3));
print("<br>");
print("X * Y = " . kali(1, 3));
print("<br>");
print("X * Y = " . kali(5, 3));
print("<br>");
print("X / Y = " . bagi(6, 3));
print("<br>");
print("X / Y = " . bagi(9, 3));
?>