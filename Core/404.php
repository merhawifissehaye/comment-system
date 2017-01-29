<html>
<style>
    body {
        background: url(http://barbmayer.com/images/backgrounds/trees.jpg) #ccc no-repeat;
        -webkit-background-size: cover;
        background-size: cover;
        font-family: sans-serif;
        color: #888;
    }
    .box {
        background: rgba(255, 255, 255, 0.5);
        width: 760px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
        border-radius: 4px;
    }

    h1 {
        font-size: 24px;
        text-align: center;
        margin-top: 30px;
    }

    p {
        text-align: center;
        padding: 20px;
        line-height: 1.6;
    }

    a {
        color: #208be6;
        text-decoration: none;
    }
</style>
<body>
    <div class="box">
        <h1>Uh oh... Something didn't work</h1>
        <p>This page doesn't seem to exist. You might have followed a bad link or mistyped the address, feel free to try again. Alternatively, you can return to the <a href="/">Home</a> page.</p>
        <p><?php echo $stackTrace ?></p>
    </div>
</body>
</html>