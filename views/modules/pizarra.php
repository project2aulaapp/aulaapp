<?php

if($_SESSION["rol"]==3){
    echo
    '<section id="piz">

    <h1>Pizarra</h1>



    <textarea id="pizarra" name="texto" readonly>


    </textarea>


    <script type="text/javascript" src="src/javascript/ajax/pizarra.js"></script>

    </section>';
}else{
        echo
        '<section id="piz">

        <h1>Pizarra</h1>



        <textarea id="pizarra" name="texto">


        </textarea>


        <script type="text/javascript" src="src/javascript/ajax/pizarra.js"></script>

        </section>';
}