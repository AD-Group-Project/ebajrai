<?php
    include("config.php");
    
    $query = "SELECT jan, feb, march, april, may, june, july FROM saleschart";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) >= 1) {
        while ($row = mysqli_fetch_assoc($result)) {
    
            $jan = $row['jan'];
            $feb = $row['feb'];
            $march = $row['march'];
            $april = $row['april'];
            $may = $row['may'];
            $june = $row['june'];
            $july = $row['july'];
        }
    }
    else
    {
        echo "Hmm, something went wrong.";
    }
?>

<html>   
    <head>      
        <title> Sales Report </title>
        
        <link rel="stylesheet" href="base_style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet">
        
        <style>
            
            .base 
            {
                display: grid;
                grid-template-columns: 1fr 150px 150px 150px;
                grid-template-rows: 1fr;
                grid-row-gap: 15px;
                width: 850px;
                background-color: white;
                padding: 20px 20px 20px 50px;
                margin: auto;
                border: 1px solid #E5E4E2;
                border-radius: 0.8em 0.8em 0.8em 0.8em;
                line-height: 2.0;
            }
            
            .center
            {
                border: 2;
                padding-left: 125px ;
                padding: auto;
                width: 700px;
            }

        </style>

    </head>
    <body>
         
        <div class="top">
            <img src="images/logo.png" width="80px" height="80px">
            <div style="padding-top: 25px"> E-Bajrai Mini Market </div>
            <div class="menu">
                <div> <a href=""> Shop </a> </div>
                <div> <a href=""> Products </a> </div>
                <div> <a href=""> Orders </a> </div>
                <div> <a href=""> Analytics </a> </div>
            </div>
        </div>
        
        <div class="title">
            <b> Sales Report </b>
        </div>
        
        <br><br>
        
        <div class="base">
            <canvas id="myChart" style="height: auto; width: 500px;"></canvas>
        </div>
        <div class="base">
            <table class="center">
                <tr>
                    <th> Revenue </th>  
                    <th> Visitor </th>  
                    <th> Buyers </th>  
                    <th> Orders </th> 
                </tr>
                <tr>
                    <td align="center"> 11926 </td>
                    <td align="center"> 823 </td>
                    <td align="center"> 46 </td>   
                    <td align="center"> 35 </td> 
                </tr>
            </table>
        </div>
        
        <?php
            echo "<input type='hidden' id= 'jan' value = '$jan' >";
            echo "<input type='hidden' id= 'feb' value = '$feb' >";
            echo "<input type='hidden' id= 'march' value = '$march' >";
            echo "<input type='hidden' id= 'april' value = '$april' >";
            echo "<input type='hidden' id= 'may' value = '$may' >";
            echo "<input type='hidden' id= 'june' value = '$june' >";
            echo "<input type='hidden' id= 'july' value = '$july' >"; 
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <script>
            var jan = document.getElementById("jan").value;
            var feb = document.getElementById("feb").value;
            var march = document.getElementById("march").value;
            var april = document.getElementById("april").value;
            var may = document.getElementById("may").value;
            var june = document.getElementById("june").value;
            var july = document.getElementById("july").value;
        
            window.onload = function()
            {
                var randomScalingFactor = function() 
                {
                    return Math.round(Math.random() * 100);
                };
                var config = {
                    type: 'line',
                    data: {
                        borderColor : "#fffff",
                        datasets: 
                        [{
                            data: 
                            [
                                jan,
                                feb,
                                march,
                                april,
                                may,
                                june,
                                july
                            ],
                            borderColor : "green",
                            borderWidth : "2",
                            hoverBorderColor : "#000",
        
                            label: 'Bajrai Mini Market Monthly Sales Report',
        
                            backgroundColor: 
                            [
                                "#56d798",
                                "#56d798",
                                "#56d798",
                                "#56d798",
                                "#56d798",
                                "#56d798",
                                "#56d798"
                            ],
                            hoverBackgroundColor: 
                            [
                                "#f38b4a",
                                "#56d798",
                                "#ff8397",
                                "#6970d5",
                                "#ffe400"
                            ]
                        }],
                        labels: 
                        [
                            'Jan',
                            'Feb',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July'
                        ]
                    },
                    options: 
                    {
                        responsive: true
                    }
                };
                var ctx = document.getElementById('myChart').getContext('2d');
                window.myPie = new Chart(ctx, config);
            };
        </script>

    </body>

</html>