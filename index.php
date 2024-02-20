<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple Calculator</title>

<!-- Blending PHP + Javascript-->

    <style>
        /*Instead of a .css file, we will add the style straight away*/
        .calculator-body {
            background-color: linear-gradient(to bottom right, #F0F0F0, #aaffaa);
            max-width: 250px;
            margin: 0 auto;
            margin-top: 50px;
            /* After the 0 auto to keep all margins, we add the margin-top*/
            padding: 20px;
            border: 2px solid black;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-size: 200% 200%;
            /* NEW SKILL GAIN! Here we make the gradient bigger to cover the whole container*/
            animation: gradientTransition 2s infinitive alternate;
            /* NEW SKILL GAIN! Here, I think is is obvious :D */
        }

        @keyframes gradientTransition {
            0% {
                background-position: top left;
                /* Gradient transition starts from top left*/
            }

            100% {
                background-position: bottom right;
                /* Gradient transition ends at top left*/
            }
        }

        .calculator-buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-top: 10px;
            width: 250px;
            flex: content;
            justify-content: center;
            border-radius: 8px;
        }

        .operators {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-top: 10px;
            width: 250px;
            height: 120;
        }

        .operators button {
            background-color: #fdf7ef;
            font-size: 16px;
            cursor: pointer;
            /* I love this option */
        }

        .operators button:hover {
            background-color: #E9967A;
            font-size: 16px;
            cursor: pointer;
        }

        .calculator-buttons button {
            padding: 10px;
            font-size: 18px;
            border: none;
            background-color: #fdf7ef;
            cursor: pointer;
            border: 1px solid black;
        }

        .calculator-body:hover {
            background-color: #deb887;
        }

        .calculator-buttons button:hover {
            background-color: #deb887;
        }

        #screen {
            /* Lets mold the screen*/
            width: 90%;
            padding: 10px;
            font-size: 20px;
            margin-right: 10px;
            margin-bottom: 10px;
            text-align: right;
        }
    </style>
</head>

<body>
        <div class="calculator-body">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" id="screen" name="screen" value="<?php echo isset($_POST['screen']) ? $_POST['screen'] : ''; ?> " readonly>

                <h2 style="text-align: center">LOGO HERE</h2>

                <div class="calculator-buttons">
                    <?php for ($i = 1; $i <= 9; $i++) : ?>
                        <button type="button" name="number" value="<?php echo $i; ?>)"><?php echo $i; ?></button> <!-- This line is a thing to understand (at least for me)-->
                    <?php endfor; ?><br>
                    <button type="button" name="number" value="0" onclick="addToScreen(0)">0</button> <!-- This is the way I did to fit 0 where I wanted it -->
                </div>

                <div class="subs">
                    <button type="button" name="operator" value="+" onclick="addToScreen('+')">+</button>
                    <button type="button" name="operator" value="+" onclick="addToScreen('+')">-</button>
                    <button type="button" name="operator" value="*" onclick="addToScreen('*')">*</button>
                    <button type="button" name="operator" value="/" onclick="addToScreen('/')">/</button>
                    <button type="button" name="decimal" value="." onclick="addToScreen('.')">.</button>
                    <button type="submit" name="calculate" value="=">=</button><br>
                    <button type="button" onclick="clearScreen()">C</button>
                </div>

            </form>
        </div>

        <script>
            /* I could only make it work adding some javascript */
            function addToScreen(value) {
                /* Now this function add to screen the value we pass */
                document.getElementById('screen').value += '';
            }

            function clearScreen() {
                /* Here we get the function to clear the screen */
                document.getElementById('screen').value = '';
            }
        </script>

        <?php
        if (isset($_POST['calculate'])) {
            $expression = $_POST['screen'];

            $result = eval('return ' . $expression . ';'); // I have been advice that "eval" is not good praxis, however it is what worked for me
            echo '<script>document.getElementById("screen").value = "' . $result . '";</script>';
        }
        ?>

</body>

</html>