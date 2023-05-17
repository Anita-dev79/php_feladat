<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account admin page</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.1/dist/bootstrap-table.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.2/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" />
    <link rel="" href="https://flatlogic.github.io/awesome-bootstrap-checkbox/bower_components/Font-Awesome/css/font-awesome.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head>
<body>
    <center><div class="container" style="margin:auto;">
        <div class="d-flex flex-column" style="width:78%;">
            <!--list-->
            <div class="card" style="width:90%; height:500px; margin:10px;">
                <div class="c_list" style='overflow-x:auto;'>
                </div>
            </div>
            <div style="width:90%; margin:10px;">
                <center><button class="btn btn-dark" id="c_new" style="width:25%;">New</button></center>
            </div>
            <!--update or new account-->
            <div class="card c_detail d-none" style="width:90%; margin:10px;">
                <div class="container d-flex flex-column" style="text-align:left;">
                    <h1 id="admin_head">Customer update</h1>
                    <label id="id" class="d-none"></label>
                    <label for="name">Customer name:</label>
                    <input type="text" id="name" style="width:50%; margin:5px;">
                    <label for="address">Customer address:</label>
                    <input type="text" id="address" style="width:50%; margin:5px;">
                    <label for="customerId">Customer code:</label>
                    <input type="text" id="customerId" style="width:25%; margin:5px;">
                    <label for="contractDate">Customer contact date:</label>
                    <input type="date" id="contractDate" style="width:25%; margin:5px;">
                    <br>
                    <button class="btn btn-dark d-none" id="c_update" style="width:25%;">Update</button>
                    <button class="btn btn-dark d-none" id="c_insert" style="width:25%;">Insert</button>
                </div>
            </div>
        <div>
    </div></center>

    <div class="modal" id="myModal">
        <div class="modal-dialog modal-sm modal-dialog-centered"> <!--modal-lg-->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:black; color:white;">
                    <h4 class="modal-title">Error</h4>
                    <button type="button" class="close btn btn-warning" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="myModalText fs-3">Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="script.js"></script>    

</body>
</html>