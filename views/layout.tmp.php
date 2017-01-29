<html>

<head>
    <title>Commenting System</title>
    <link rel="stylesheet" type="text/css" href="/public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>

<body>
<div class="container">
    <ul class="nav nav-pills">
        <li><a href="#" >Blogs</a></li>
        <li><a href="#">All Comments</a></li>
        <li class="active"><a href="#">Approved</a></li>
        <li><a href="#">Pending</a></li>
        <li><a href="#">Spam</a></li>
    </ul>
    <?php echo $yield; ?>
</div>
</body>
<script type="text/javascript" src="/public/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/public/js/app.js"></script>
</html>