<!DOCTYPE html>
<html>
<head>
    <?php include "com/head.php" ?>


    <title>
        Codegen | MiticaSoftware
    </title>
    <meta name="description" content="Random code and password generator.">
    <meta name="keywords" content="code, password, generate passowrd, random passowrd, random code">
    <meta name="author" content="George Mitica">
    <meta name="robots" content="index, nofollow">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Codegen | MiticaSoftware" />
    <meta property="og:description" content="Random code and password generator" />
    <meta property="og:image" content="https://codegen.miticasoftware.com/img/MSCodeGenLogo.png" />
    <meta property="og:url" content="https://codegen.miticasoftware.com/" />



    <style>
        * {
            font-size: 18px;
            font-family: "Lucida Console", Arial, "Helvetica";
        }

        body {
            margin: 0 auto;
            background: #2271b3;



        }

        .tooltipa {
            position: relative;
            display: inline-block;
        }

        .tooltipa .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltipa .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltipa:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .btn:focus,
        .btn:active {
            outline: none !important;
            box-shadow: none;
        }

        #page-container {
            position: relative;
            min-height: 100vh;
        }

        #content-wrap {
            padding-bottom: 2.5rem;
            /* Footer height */
        }

        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 2.5rem;
            /* Footer height */
            background: lightgray;
        }
    </style>
    <script>
        function myFunction() {
            var copyText = document.getElementById("codeText");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");


            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copied";
        }

        function outFunc() {
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copy to clipboard";
        }

        function generateCode() {
            if (document.getElementById("isNumber").checked || document.getElementById("isCharacters").checked || document.getElementById("isSymbols").checked) {
                var symbol = "!@#€%&/()?¿*[]{};,:.-_";

                var dicUpper = (document.getElementById("isUpper").checked) ? "ABCDEFGHIJKLMNOPQRSTUVWXTZ" : "";
                var dicLower = (document.getElementById("isLower").checked) ? "abcdefghiklmnopqrstuvwxyz" : "";



                var characters = dicLower.concat(dicUpper);


                var result = "";

                for (var i = 0; i < document.getElementById("myRange").value; i++) {
                    var ok = false;
                    do {
                        switch (Math.floor((Math.random() * 3) + 0)) {
                            case 0:
                                if (document.getElementById("isNumber").checked) {
                                    result = result.concat(Math.floor((Math.random() * 10) + 0).toString());
                                    ok = true;
                                }
                                break;
                            case 1:
                                if (document.getElementById("isCharacters").checked) {
                                    result = result.concat(characters.charAt(Math.floor((Math.random() * characters.length) + 0)));
                                    ok = true;
                                }
                                break;
                            case 2:
                                if (document.getElementById("isSymbols").checked) {
                                    result = result.concat(symbol.charAt(Math.floor((Math.random() * symbol.length) + 0)));
                                    ok = true;
                                }
                                break;
                        }
                    } while (!ok);



                }

                document.getElementById("codeText").value = result;
            }
        }
    </script>

</head>

<body>

    <div id="page-container">
        <div id="content-wrap">
            <div class="container text-center mb-5 mt-3">
                <h2 style="color: white"><img src="img/MSCodeGenLogo.png" alt="logo" width="45px" />Codegen</h2>
            </div>
            <div class="container mt-5">
                <div class="row">

                    <div class="col-md-10 mb-3" id="conTextGenerated">
                        <input type="text" value="" id="codeText" class="form-control text-center font-weight-bold" style="font-size: 26px;">
                    </div>


                    <div class="col-md-2 mb-3" style="display:none;" id="buttonStop">
                        <div class="tooltipa" style="width: 100%;">
                            <button onclick="stopAutoGenerate()" class="btn btn-danger btn-lg" style="width: 100%;">
                                STOP
                            </button>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <div class="tooltipa" style="width: 100%;">
                            <button onclick="myFunction()" onmouseout="outFunc()" class="btn btn-dark btn-lg" style="width: 100%;">
                                <span class="tooltiptext" id="myTooltip">Copy to clipboard</span> <i class="far fa-copy"></i>
                                Copy
                            </button>
                        </div>
                    </div>



                    <div class="col-md-12 mb-3">
                        <button onclick="generateCode()" class="btn btn-dark" style="width: 100%">
                            GENERATE CODE
                        </button>
                    </div>


                </div>



                <div class="row mr-1 ml-1 mb-3" style="background: darkgray; border-radius: 20px">

                    <div class="col-md-6 mb-3">
                        <div class="text-center">TOTAL LENGHT
                            <br>
                            <input type="range" min="1" value="8" style="width: 100%" class="custom-range text-center" id="myRange">
                            <span id="totalRange">Value: </span>
                        </div>

                    </div>


                    <div class="col-md-2 mb-3 mt-3">
                        <div class="text-center">NUMBERS
                            <input type="checkbox" id="isNumber" onclick="generateCode()" checked>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3 mt-3">
                        <div class="text-center">CHARACTERS
                            <input type="checkbox" id="isCharacters" onclick="generateCode()">
                        </div>
                    </div>
                    <div class="col-md-2 mb-3 mt-3">
                        <div class="text-center">SYMBOLS
                            <input type="checkbox" id="isSymbols" onclick="generateCode()">
                        </div>
                    </div>
                </div>



                <div id="accordion" class="mb-5">

                    <div class="card" style="background: darkgray">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0 text-center">
                                <button class="btn collapsed" data-toggle="collapse" data-target="#collapseAdvancedOption" aria-expanded="false" aria-controls="collapseAdvancedOption" style="width: 100%">
                                    ADVANCED OPTIONS
                                </button>

                            </h5>
                        </div>
                        <div id="collapseAdvancedOption" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="m-3">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        UPPER CHARACTERS
                                        <input type="checkbox" id="isUpper" onclick="generateCode()" checked>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        LOWER CHARACTERS
                                        <input type="checkbox" id="isLower" onclick="generateCode()" checked>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        GENERATE CODE EVERY
                                        <input type="checkbox" id="autoGenerate" onclick="autoGenerateEvery()">
                                        <br>
                                        <input type="number" id="numberEvery" min=1 value=3 class="text-center" onchange="autoGenerateEvery()">
                                        <br>
                                        SECONDS
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
    </div>


            </div>
        </div>
        <footer id="footer" class="text-center">MSCodegen</footer>

    </div>

    <script>
        var i;

        function autoGenerateEvery() {


            clearInterval(i);
            if (document.getElementById("autoGenerate").checked) {
                document.getElementById("buttonStop").style.display = "inline";
                document.getElementById("conTextGenerated").className = "col-md-8 mb-3";
                i = setInterval(function() {
                    generateCode();
                }, document.getElementById("numberEvery").value * 1000);
            } else {
                clearInterval(i);
                document.getElementById("buttonStop").style.display = "none";
                document.getElementById("conTextGenerated").className = "col-md-10 mb-3";
            }
        }

        function stopAutoGenerate() {
            document.getElementById("autoGenerate").checked = false;
            autoGenerateEvery();
        }
    </script>

    <script>
        generateCode();
        var slider = document.getElementById("myRange");
        var output = document.getElementById("totalRange");
        output.innerHTML = "Value: " + slider.value;

        slider.oninput = function() {
            output.innerHTML = "Value: " + this.value;
            generateCode();
        }
    </script>

</body>

</html>