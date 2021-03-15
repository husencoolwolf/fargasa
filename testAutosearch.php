<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="stylesheet" href="css/style.css"/>-->
    <link rel="icon" type="image/png" href="/assets/Fargasa Logo Circle.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/dist/css/bootstrap.css">

    <title>Input Pembelian</title>
  </head>
<body>
        <div class="container">
                <div class="row">
                        <div class="col-md">
                            <div class="container">
                                <input type="text" id="gSearchSimple" class="form-control input-lg" placeholder="Search"/>
                                <div class="list-group" id="option">
                                        
                                </div>
                            </div>    
                        </div>
                </div>
        </div>



<script src="/dist/js/jquery-3.5.1.js"></script>
<script src="/dist/js/bootstrap.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="/dist/js/jquery.autocomplete.js"></script>
</body>
</html>

<script type="text/javascript">
            $(document).ready(function(){

                $('#gSearchSimple').on('keyup', function(){
                //pke $.get
                    var query = $('#gSearchSimple').val();
                    $.get('testAutoScript.php?query='+query, function(data){
//                        debugger;
                       $('#option').html(data);
                       $('#hasil.src-value').on('click', function(){
                                alert($(this).html());
                                var selected = $(this).html();
                                $('#gSearchSimple').val(selected);
                        });


                    });


                });
                
                
                  
                
//                $('.list-group-item.src-value').click(function(){
//                    alert($(this).html());
//                    var selected = $(this).html();
//                    $('#gSearchSimple').val(selected);
//                });
                
            });
        </script>