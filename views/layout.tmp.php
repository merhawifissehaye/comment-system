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
        <li <?php echo in_array($route, ['blog', 'index']) ? 'class="active"' : '' ?>><a href="/blog/">Blogs</a></li>
        <li <?php echo $route == 'comment' ? 'class="active"' : '' ?>><a href="/comment/">All Comments</a></li>
        <li <?php echo $route == 'comment/approved' ? 'class="active"' : '' ?>><a href="<?php echo BASE_URL ?>/comment/approved/">Approved</a></li>
        <li <?php echo $route == 'comment/pending' ? 'class="active"' : '' ?>><a href="/comment/pending/">Pending</a></li>
        <li <?php echo $route == 'comment/spam' ? 'class="active"' : '' ?>><a href="/comment/spammed/">Spam</a></li>
        <li><a href="/invalid/link">Invalid Link (404)</a></li>
    </ul>
    <?php echo $yield; ?>
</div>
</body>
<script type="text/javascript" src="/public/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/public/js/app.js"></script>
</html>