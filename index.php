<!DOCTYPE html>
<html dir="rtl" lang="fa-IR">
<head>
	<meta charset="utf-8">
    <link href="/static/styles.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1, width=device-width">
	<title>index</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style>
        text{
            color: white;
        }
        .bold {
            font-weight: bold;
        }
        th,
        td {
            text-align: right;
            font-weight: bold;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        tr:nth-child(odd) {
            background-color: #ffff
        }
        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: right;
            background-color: #04AA6D;
            color: white;
        }
        @font-face {
            font-family: vazir;
            font-style: normal;
            font-weight: 100;
            src: url("fonts/Vazir-Thin.eot");
            src: url("fonts/Vazir-Thin.woff") format("woff"),
            url("fonts/Vazir-Thin.ttf") format("ttf"),
            url("fonts/Vazir-Thin.woff2") format("woff2");
        }
        @font-face {
            font-family: vazir;
            font-style: normal;
            font-weight: 300;
            src: url("fonts/Vazir-Light.eot");
            src: url("fonts/Vazir-Light.woff") format("woff"),
            url("fonts/Vazir-Light.ttf") format("ttf"),
            url("fonts/Vazir-Light.woff2") format("woff2");
        }

        @font-face {
            font-family: vazir;
            font-style: normal;
            font-weight: 400;
            src: url("fonts/Vazir-Regular.eot");
            src: url("fonts/Vazir-Regular.woff") format("woff"),
            url("fonts/Vazir-Regular.ttf") format("ttf"),
            url("fonts/Vazir-Regular.woff2") format("woff2");
        }
        @font-face {
            font-family: vazir;
            font-style: normal;
            font-weight: 950;
            src: url("fonts/Vazir-Black.eot");
            src: url("fonts/Vazir-Black.woff") format("woff"),
            url("fonts/Vazir-Black.ttf") format("ttf"),
            url("fonts/Vazir-Black.woff2") format("woff2");
        }

        body {
            font-family: vazir;
            direction: rtl;
            background-color:  #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="page-header text-center"><b>سامانه ارسال و ارزیابی آنلاین گزارش پروژه دانشجویی </b></h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span><h7 class="bold"> ثبت نمره جدید</h7></a>
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
			<table class="table table-bordered table-striped" style="margin-top:20px;" id="customers">
				<thead>
					<th>شناسه</th>
					<th>نام اعضای گروه</th>
					<th>موضوع پروژه</th>
					<th>میانگین</th>
					<th>درصد</th>
                    <th>ویرایش/حذف</th>

                </thead>
				<tbody>
					<?php
						//include our connection
						include_once('connection.php');

						$database = new Connection();
    					$db = $database->open();
						try{	
						    $sql = 'SELECT * FROM members ORDER BY avg DESC';
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row['id']; ?></td>
						    		<td><?php echo $row['gpname']; ?></td>
						    		<td><?php echo $row['pjname']; ?></td>
						    		<td><?php echo $row['avg']; ?></td>
                                    <td><?php echo $row['percent']; ?></td>
                                    <td>
						    			<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> <b>ویرایش</b></a>
						    			<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> <b>حذف</b></a>
                                    </td>
                                        <?php include('edit_delete_modal.php'); ?>


                                </tr>
						    	<?php 
						    }
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						//close connection
						$database->close();

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>