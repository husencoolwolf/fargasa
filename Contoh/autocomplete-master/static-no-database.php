<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <title>Autocomplete Input Tanpa Database &minus; MasRud.com</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <style>
            body {
            	font-family: 'Roboto', Arial, Sans-serif;
            	font-size: 15px;
            	font-weight: 400;
            }
            .container {
                left: 50%;
                position: absolute;
                top: 7.5%;
                transform: translate(-50%, -7.5%);
            }
            input[type=text] {
                border: 2px solid #bdbdbd;
                font-family: 'Roboto', Arial, Sans-serif;
            	font-size: 15px;
            	font-weight: 400;
                padding: .5em .75em;
                width: 300px;
            }
            input[type=text]:focus {
                border: 2px solid #757575;
            	outline: none;
            }
            .autocomplete-suggestions {
                border: 1px solid #999;
                background: #FFF;
                overflow: auto;
            }
            .autocomplete-suggestion {
                padding: 2px 5px;
                white-space: nowrap;
                overflow: hidden;
            }
            .autocomplete-selected {
                background: #F0F0F0;
            }
            .autocomplete-suggestions strong {
                font-weight: normal;
                color: #3399FF;
            }
            .autocomplete-group {
                padding: 2px 5px;
            }
            .autocomplete-group strong {
                display: block;
                border-bottom: 1px solid #000;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Autocomplete Input Tanpa Database</h3>
            <form action="" method="post">
                <input type="text" id="buah" name="buah" placeholder="Nama Buah">
            </form>
        </div>

        <!-- Memanggil jQuery.js -->
        <script src="jquery-3.2.1.min.js"></script>

        <!-- Memanggil Autocomplete.js -->
        <script src="jquery.autocomplete.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                // Data yang ditamilkan pada autocomplete.
                var buah = [
                    { value: 'Anggur', data: 'Anggur' },
                    { value: 'Apple', data: 'Apple' },
                    { value: 'Jeruk', data: 'Jeruk' },
                    { value: 'Mangga', data: 'Mangga' },
                    { value: 'Melon', data: 'Melon' },
                    { value: 'Manggis', data: 'Manggis' },
                    { value: 'Nanas', data: 'Nanas' },
                    { value: 'Semangka', data: 'Semangka' },
                    { value: 'Durian', data: 'Durian' },
                    { value: 'Peer', data: 'Peer' },
                    { value: 'Alpukat', data: 'Alpukat' },
                    { value: 'Nangka', data: 'Nangka' },
                    { value: 'Pepaya', data: 'Pepaya' },
                    { value: 'Sawo', data: 'Sawo' },
                    { value: 'Salak', data: 'Salak' },
                    { value: 'Pisang', data: 'Pisang' },
                    { value: 'Klengkeng', data: 'Klengkeng' },
                    { value: 'Rambutan', data: 'Rambutan' }
                ];

                // Selector input yang akan menampilkan autocomplete.
                $( "#buah" ).autocomplete({
                    lookup: buah
                });
            })
        </script>
    </body>
</html>
