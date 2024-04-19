<?php
include 'header.php';
?>
<script type="text/javascript" src="../../public/assets/js/api.js"></script>
</head>
<body>
<div class="container fixed-top">
    <div class="row">
        <div class="col-12">
            <?php include 'navbar.php'; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 firstRow">
            <button type="button" class="btn btn-primary" onclick="sendQuery()">Test order API</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12" id="status"></div>
    </div>
</div>

</body>
</html>