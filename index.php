<!DOCTYPE html>
<html lang="en">
<head>
    <title>Export table data to csv file in php - Coding Birds Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./website/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./website/js/vendor/jquery-3.5.0.min.js"></script>
    <script src="validation.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="./website/js/vendor/bootstrap.min.js"></script>
    <link rel="icon" href="./website/img/coding-birds-online/coding-birds-online-favicon.png" type="image/x-icon">
    <style>
        #thead>tr>th{ color: white; }
    </style>
</head>
<body>
<div style="margin-top: 20px;padding-bottom: 20px;">
    <center>
        <img width="100" src="./website/img/coding-birds-online/coding-birds-online-favicon.png"/>
        <h3>Export table data to csv file in php</h3>
    </center>
</div>
<div class="container">
    <form action="export-table-script.php" method="post">
        <table class="table table-bordered table-condensed">
            <thead id="thead" style="background-color:#ff195a">
            <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Class</th>
                <th>Total Markes</th>
                <th>Gender</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include "config.php";
            include_once "Common.php";
            $common = new Common();
            $records = $common->getAllRecords($connection);
            if ($records->num_rows>0){
                $sr = 1;
                while ($record = $records->fetch_object()) {
                    $recordId = $record->id;
                    $name = $record->name;
                    $class = $record->class;
                    $marks = $record->marks;
                    $gender = $record->gender;?>
                    <tr>
                        <td><?= $sr;?></td>
                        <td><?= $name;?></td>
                        <td><?= $class;?></td>
                        <td><?= $marks;?></td>
                        <td><?= $gender;?></td>
                    </tr>
                    <?php
                    $sr++;
                }
            }
            ?>
            </tbody>
        </table>
        <button type="submit" name="exportBtn" id="exportBtn" class="btn btn-primary"style="float: right">Export Data</button>
    </form>
</div>
</body>
</html>
