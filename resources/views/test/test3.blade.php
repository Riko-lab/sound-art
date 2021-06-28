
{{-- ///////////////////////////////////////////// --}}
<h2>TESTA CODICE STATISTICHE</h2>
<p>url: http://localhost:8000/test3 (get)</p>

DECOMMENTARE QUESTE RIGHE PER VEDERE I VALORI DELLE TABELLE
{{-- <h5>TABELLE DISPONIBILI</h5>
<p>$users = @dump($users)</p>
<p>$profiles = @dump($profiles)</p>
<p>$categories = @dump($categories)</p>
<p>$genres = @dump($genres)</p>
<p>$offers = @dump($offers)</p> --}}
{{-- <p>$messages = @dump($messages)</p>  --}}
{{-- <p>$reviews = @dump($reviews)</p> --}}
{{-- <p>$contracts = @dump($contracts)</p>
<p>$sponsorships = @dump($sponsorships)</p>
@dd('') --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
    <style>
        /* body {
            margin: 120px 100px 10px 100px;
            padding: 0;
            color:white;
            text-align:center;
            background-color: #555652; 
        } */
        /* .container  {
            color: #E8E9EB;
            background-color: #222;
            border: #555652 1px solid;
            padding:10px;
        } */
    </style>
</head>
<body>
    <div class="container">
        <canvas id="myCanvas" style="width: 100%; height:60v; background: orange; border: 1px solid yellow; margin-top: 10px; "></canvas>
    </div>
    {{-- per ogni utente stampami i suoi messaggi --}}
    <script>
        // javascript normale
        //codice che serve per creare il grafico charts.js
        let myCanvas = document.getElementById("myCanvas").getContext('2d');
        let month = ["gennagio","febbraio","marzo","aprile","maggio","giugno","luglio","agosto","settembre","ottobre","novembre","dicembre",];
        let n_messages = ["20","30","50","10","35","21","20","30","50","10","35","21",];
        
        let chart = new Chart(myCanvas, {
            type:'line',
            data: {
                labels:month, 
                datasets: [{
                    label: "messaggi",
                    data: n_messages,
                    backgroundColor: 'red'
                    
                }]

            },
            options: {

            }
        });
    </script>
</body>
</html>



{{-- ///////////////////////////////////////////// --}}
{{-- ///////// qua sopra scrivi in blade ///////// --}}
{{-- ///////////////////////////////////////////// --}}
{{-- 
// 1) per ogni utente stampami i suoi messaggi 
// SELECT * FROM `messages` ORDER BY `messages`.`user_id` ASC 
con questa prima istruzione ho chiesto di ordinarmi i messaggi per utente. or  SELECT * FROM `reviews` ORDER BY `reviews`.`user_id` ASC --}}
{{-- ORDER BY `reviews`.`user_id` ASC --}}
//  2) voglio tutti i messaggi di un solo utente
<?php $query ="SELECT * FROM `messages`"; ?>
<?php $result  = $mysqli ->query($query); ?>

<?php ORDER BY `reviews`.`user_id` ASC ; {

    
    
    ?>




  












{{-- ///////////////////////////////////////////// --}}
{{-- ///////// qua sopra scrivi in blade ///////// --}}
{{-- ///////////////////////////////////////////// --}}
@php
/////////////////////////////////////////////
////////// qua sotto scrivi in php //////////
/////////////////////////////////////////////














/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
@endphp


