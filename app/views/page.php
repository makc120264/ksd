<?php
include 'header.php';

$user = new app\models\User($helper);
$projectsByUser = $user->getUserProjects();
$x = 0;
?>
</head>
<body class="text-center">
<div class="container fixed-top">
    <div class="row">
        <div class="col-12">
            <?php include 'navbar.php'; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12">
            <h5 class="card-title">Projects</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Count projects</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($projectsByUser as $userName => $projects) { ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $userName ?></td>
                        <td>
                            <span class="badge badge-primary badge-pill"><?= $projects ?></span>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>