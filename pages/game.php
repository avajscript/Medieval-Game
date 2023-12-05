<?php
$char_data_file = file_get_contents('../data/character_data.json');
$char_json = json_decode($char_data_file, false);
$classes = $char_json->classes;
$attributes = $char_json->classDetails;




?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../styles/main.css">

        <?php

        // returns an html element for character classes

        function renderClassesSelect(): string {
            global $classes;
            $stringElement = "<select name = 'class' id = 'class'> <option value=''>Choose a class</option>";
            foreach($classes as $class) {
                $stringElement .= "<option value  ='$class'> $class </option>";
            }
            $stringElement .= "</select>";

            return $stringElement;
        }


        ?>
        <title>File Writer</title>
    </head>
    <body>
        <?php
        include ('../components/header.php');
        ?>
        <h1>Create Your Character</h1>
        <form action="filewriter.php" method = "post">
            <label for="">
                Character name
                <input type="text" id="name" name = 'name'>
            </label>
            <br>
            <br>
            <div class="input-field">
                <label >
                    Character Class
                    <br>
                    <?php
                    echo renderClassesSelect();
                    ?>
                </label>
            </div>
            <div class = 'mar-bottom-16'>
                <p id = 'hp'>HP: </p>
                <p id = 'sneak'>sneak: </p>
                <p id = 'melee'>melee: </p>
                <p id = 'range'>range: </p>
                <p id = 'mage'>mage: </p>
                <p id = 'defense'>defense: </p>
            </div>

            <div>
                <h3>Description: </h3>
                <p id="description">

                </p>
            </div>
        </form>
        <script type = 'module'>
            // get character data
            const response = await fetch('../../data/character_data.json');
            const character_data = await response.json();
            const classDetails = character_data.classDetails

            const hp = document.getElementById('hp');
            const sneak = document.getElementById('sneak');
            const melee = document.getElementById('melee');
            const range = document.getElementById('range');
            const mage = document.getElementById('mage');
            const defense = document.getElementById('defense');
            const descriptionElem = document.getElementById('description');

            const updateStats = (charClass) => {
                const stats = classDetails[charClass].stats;
                const description = classDetails[charClass].description;
                hp.innerHTML = `HP: ${stats.hitpoints}`;
                sneak.innerHTML = `sneak: ${stats.sneak}`;
                melee.innerHTML = `melee: ${stats.melee}`;
                range.innerHTML = `range: ${stats.range}`;
                mage.innerHTML = `mage: ${stats.mage}`;
                defense.innerHTML = `mage: ${stats.defense}`;
                descriptionElem.innerHTML = description;
            }
            // add function listener to render stats on class change
            document.getElementById('class').addEventListener('change', (e) => updateStats(e.target.value));
        </script>
    </body>
</html>
