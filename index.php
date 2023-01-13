<?php
session_start();
$Email = $_SESSION['Email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Requstes</title>

    <!-- bootstrap Lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .content{
            max-width: 800px;
            margin: auto;
        }

        h1{
            text-align: center;
            padding-bottom: 60px;
        }
    </style>

</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ROTA</a>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="Designer.php">Home</a></li>
                <li><a href="Information.php">My information </a></li>
                <li><a href="index.php"  > Requstes </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html"><span class="glyphicon glyphicon-log-in" data-toggle="modal" data-target="#myModal"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">
    <table id="requstes_table" class="table table-striped">
        <thead bgcolor="#a46cdc">
        <tr class="table-primary">
            <th width="30%">ID Client</th>
            <th width="50%">Description</th>
            <th width="30%">Date</th>
            <th scope="col" width="10%">View</th>
        </tr>
        </thead>
    </table>
    <br>


    <div id="userModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="course_form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="modal-title">Logo Request</h3>
                    </div>
                    <div class="modal-body">
                     <div style="border: none"><pre style="background-color: white"> <input type="text" name="email" id="email" style="border: none" width="100%"/>                              <input style="border: none" type="text" name="students" id="date" /></pre></div>
                        <input type="text" name="des" id="des" style="width: 550px;height: 300px" /><br>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="_id" id="_id"/>
                        <input type="hidden" name="operation" id="operation"/>
                        <button type="button" style="background-color: limegreen" data-dismiss="modal">Accept Request</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>



<script type="text/javascript">
    $(document).ready(function(){


        var dataTable = $('#requstes_table').DataTable({
            "paging":true,
            "processing":true,
            "serverSide":true,
            "order": [],
            "info":true,
            "ajax":{
                url:"fetch.php",
                type:"POST"
            },
            "columnDefs":[
                {
                    "target":[0,3,4],
                    "orderable":true,
                },
            ],
        });











        $(document).on('click', '.update', function(){
            var _id = $(this).attr("id");
            console.log(_id);
            $.ajax({
                url:"fetch_single.php",
                method:"POST",
                data:{_id:_id},
                dataType:"json",
                success:function(data)
                {console.log(data);
                    $('#userModal'
                    ).modal('show');
                    $('#id').val(data.id);
                    $('#des').val(data.Description);
                    $('#date').val(data.Date);
                    $('#email').val(data.Email);
                    $('.modal-title').text("Logo Request");
                    $('#UserNameClient').val(_id);
                    $('#action').val("ok");
                    $('#operation').val("View");
                }
            });
        });

        $(document).on('click','Delete', function(){

            var _id = $(this).attr("id");
            if(confirm("Are you sure want to delete this user?"))
            {
                $.ajax({
                    url:"delete.php",
                    method:"POST",
                    data:{_id:_id},
                    success:function(data)
                    {
                        dataTable.ajax.reload();
                    }
                });
            }
            else
            {
                return false;
            }
        });

    });
</script>