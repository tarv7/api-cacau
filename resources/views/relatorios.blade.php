<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            body{
                background-color: rgb(238, 238, 238);
            }

            .jumbotron{
                height: 100%;
            }

            .container{
                left: 50%;
                position: absolute;
                transform: translateX(-50%);
                background-color: white;
            }

            .piechart{
                left: 50%;
                position: relative;
                transform: translateX(-50%);
                background-color: white;
            }

            .btn {
                margin: auto 50%;
                transform: translateX(-50%);
            }

            .panel-heading{
                font-size: 24px;
            }
        </style>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Categoria', 'Quantidade'],
                ['Feliz',     <?= $qAval[5]; ?>],
                ['Contente',      <?= $qAval[4]; ?>],
                ['Neutro',  <?= $qAval[3]; ?>],
                ['Descontente', <?= $qAval[2]; ?>],
                ['Infeliz',    <?= $qAval[1]; ?>]
                ]);

                var options = {
                title: 'Gráfico de avaliações',
                titleTextStyle: { fontSize: 24}
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div class="jumbotron" id="content">
            <div class="container" id="vaaai">
                <!-- Aqui sera o grafico -->
                <div id="piechart" style="width: 900px; height: 500px;" class="piechart"></div>

                <!-- Aqui sera a quantidade de cada voto -->
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Quantidade de votos</div>

                    <!-- Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Quantidade de votos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $categoria = array("", "Infeliz", "Descontente", "Neutro", "Contente", "Feliz");
                            ?>
                            @for($i = 5; $i >= 1; $i--)
                                <tr>
                                    <td>{{ $categoria[$i] }}</td>
                                    <td>{{ $qAval[$i] }}</td>
                                </tr>
                            @endfor
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><b>{{ array_sum($qAval) }}</b></td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <br/><br/><br/>
                <!-- Aqui sera as opnioes de cada pessoa -->
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Opniao das pessoas</div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                                <th scope="col">Opniao</th>
                                <th scope="col">Voto</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($avaliacoes as $avaliacao)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $avaliacao->opniao }}</td>
                                    <td>{{ $avaliacao->voto }}</td>
                                    <td>{{ $avaliacao->data }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </body>
</html>
