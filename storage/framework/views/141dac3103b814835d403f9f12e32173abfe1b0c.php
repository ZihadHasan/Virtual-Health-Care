<!DOCTYPE html>
<html>
<head>
    <title>Chats</title>
    <link href="<?php echo e(asset('../css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('../css/chats.css')); ?>" rel="stylesheet">
</head>
<body>

    <div class="col-lg-4 col-lg-offset-4">
        <h1 id="greeting">Hello, <span id="username"><?php echo e($username); ?></span></h1>

        <div id="chat-window" class="col-lg-12">

        </div>
        <div class="col-lg-12">
            <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
            <input type="text" id="text" class="form-control col-lg-12" autofocus="" onblur="notTyping()">
        </div>
    </div>

    <script src="<?php echo e(asset('../js/jquery-1.11.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('../js/chats.js')); ?>"></script>
</body>
</html>
