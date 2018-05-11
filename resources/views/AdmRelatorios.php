<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            $( function() {
                var dateFormat = "yy-mm-dd",
                from = $( "#from" ).datepicker({
                    dateFormat: "yy-mm-dd",
                    defaultDate: "-2m",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 2
                    })
                    .on( "change", function() {
                    to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#to" ).datepicker({
                    dateFormat: "yy-mm-dd",
                    defaultDate: "-1m",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 2
                })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });
            
                function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }
            
                return date;
                }
            } );
        </script>

        <style type="text/css">
            body{
                background-color: rgb(238, 238, 238);
            }

            .jumbotron{
                height: 100%;
            }

            .container{
                width: auto;
                left: 50%;
                position: absolute;
                transform: translateX(-50%);
                background-color: white;
            }

            .btn {
                margin: auto 50%;
                transform: translateX(-50%);
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <div class="container">
                <form action="relatorio" method="GET">
                    <fieldset>
                        <legend>Escolha o período</legend>
                        <label for="from">De</label>
                        <input type="text" id="from" name="from" class="form-control" >
                        <br/>
                        <label for="to">Até</label>
                        <input type="text" id="to" name="to" class="form-control" >

                        <br/><br/>
                        <button type="submit" class="btn btn-default">Gerar relatório</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>
