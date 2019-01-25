<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
        <script src="buttons.js"></script>
        <link href="style.css" rel="stylesheet">
</head>
<body>
        <div class="LCD" id="LCD"></div>
        <div class="user-wrapper">
                <div class="button-wrapper">
                        <div class="canbtnborder"><button class="canbtn" id="N" onmousedown="ButtonPress('N')" onmouseup="ButtonRelease('N')">N</button></div>
                        <div class="canbtnborder"><button class="canbtn" id="S" onmousedown="ButtonPress('S')" onmouseup="ButtonRelease('S')">S</button></div>
                </div><?php
                /*<div class="switch-wrapper">
                        <input type="checkbox" name="F1">
                        <input type="checkbox" name="F2">
                        <input type="checkbox" name="F3">
                        <input type="checkbox" name="F4">
                        <input type="checkbox" name="F5">
                        <input type="checkbox" name="F6">
                        <input type="checkbox" name="F7">
                        <input type="checkbox" name="F8">
                </div>*/?>
                <div class="button-wrapper">
                        <div class="canbtnborder"><button class="canbtn" id="Plus" onmousedown="ButtonPress('+')" onmouseup="ButtonRelease('+')">+</button></div>
                        <div class="canbtnborder"><button class="canbtn" id="Minus" onmousedown="ButtonPress('-')" onmouseup="ButtonRelease('-')">-</button></div>
                </div>
        </div>
        <div class="outputs-wrapper" id="outputs-wrapper"></div>
</body>
</html>