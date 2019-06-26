<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.css" />
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.js"></script>
    <title>TO DO List</title>
</head>

<body style="font-family: 'Permanent Marker', cursive;">
    
    <div class="container">

        <h1>EOL TO DO List</h1>

    </div>
    <div class="container">

        <form action="<?php echo base_url() ?>index.php/clist/savetask" method="POST">
            <input class="col-lg-8" type="text" name="task" placeholder="Insert new task">
            <button class="col-lg-3 btn btn-outline-light text-dark" id="btn" type="submit" value="save">Save</button>
        </form>

    </div>
    <div class="container center-block">
        <table id="tabletask" class="display table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>
            </thead>
            <tbody>
            </tbody>

        </table>

    </div>
    <script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
    </script>

    <script type="text/javascript">
    $('#tabletask').ready(function() {
        $.post(baseurl + "index.php/clist/gettask",
            function(data) {
                var p = JSON.parse(data);
                //test JSON 
                //alert(data)
                $.each(p, function(i, item) {
                    //filter elements by state
                    if (item.deleted == 0) {
                        $('#tabletask').append(

                            '<tr>' +
                            '<td>' + item.descripcion +
                            '<form action=' + baseurl +
                            'index.php/clist/deletetask method="POST">' +
                            '<input type="hidden" name="id" value="' + item.id + '"></input>' +
                            '<button class="float-right btn btn-outline-light text-dark" value="send" type="submit">remove</button></form>' +
                            '</td>' +
                            '</tr>'
                        );
                    }
                });
            });
    });
    </script>

</body>

</html>