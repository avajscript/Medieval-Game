<?php

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../styles/main.css">
        <script type = 'module' src = '../../scripts/webcomponents/ColorPalette.js' ></script>
        <script defer type="module" src = '../../scripts/tools/draw.js'></script>
        <title>Draw</title>
    </head>
    <body>
        <?php
        include ('../../components/header.php');
        ?>
        <div class="flex justify-center draw-content">
            <div class="color-palette">
                <color-palette color = '#ffaffa'>

                </color-palette>
                <h5 class="mar-bottom-8">Color Palette</h5>
                <input type="color" id = 'colorInput' class="mar-bottom-8" >
                <div id="palette" >
                    <div class="palette-box" style="background-color: rgb(185, 166, 166);"></div>
                    <div class="palette-box" style="background-color: rgb(70, 166, 70);"></div>
                    <div class="palette-box" style="background-color: rgb(120, 30, 60);"></div>
                    <div class="palette-box" style="background-color: rgb(185, 166, 166);"></div>
                    <div class="palette-box" style="background-color: rgb(70, 166, 70);"></div>
                    <div class="palette-box" style="background-color: rgb(120, 30, 60);"></div>      <div class="palette-box" style="background-color: rgb(185, 166, 166);"></div>
                    <div class="palette-box" style="background-color: rgb(70, 166, 70);"></div>
                    <div class="palette-box" style="background-color: rgb(120, 30, 60);"></div>
                    <div class="palette-box" style="background-color: rgb(120, 30, 60);"></div>      <div class="palette-box" style="background-color: rgb(185, 166, 166);"></div>
                    <div class="palette-box" style="background-color: rgb(70, 166, 70);"></div>

                </div>
            </div>

            <canvas class = 'canvas' id = 'canvas' width = '400' height = '400'></canvas>
        </div>

    </body>
</html>
