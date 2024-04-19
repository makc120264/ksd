<?php
include 'header.php';
?>
<script type="text/javascript" src="../../public/assets/js/testSelector.js"></script>
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
            <button type="button" class="btn btn-primary" onclick="testQuerySelector()">Test jQuery selector</button>
        </div>
        <div id="example">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" name="photoUsername" placeholder="Username"
                       aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" name="photoRecipient" placeholder="Recipient's username"
                       aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">@example.com</span>
                </div>
            </div>

            <label for="basic-url">Your vanity URL</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                </div>
                <input type="text" class="form-control" name="photoBasicUrl" id="basic-url"
                       aria-describedby="basic-addon3">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control" name="photoAmount" aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                </div>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">With textarea</span>
                </div>
                <textarea class="form-control" aria-label="With textarea"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12" id="status"></div>
    </div>
</div>

</body>
</html>