
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Final Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
    <style> .card{
            width:200px;
        }</style>


</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item ms-auto">
                        <a class="nav-link active" aria-current="page" href="view-index.php">Notes</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<div class="container">
    <h1>Final Project </h1>

    <div class="container">
        <div class="py-1"  <?php include "new-to-do.php";?>         </div>
        <div class="row row-cols-6">
    <?php
    // Fetch notes from the database
    $notes = getNotes(); // Assume getNotes() retrieves notes from the database

    // Loop through notes and display them as cards
    foreach ($notes as $note) {
        ?> <div class="col-md mb-2 d-flex align-items-stretch">
    <?php
        echo '<div class="card">';
        echo '<div class="card-body d-flex flex-column">';
        echo '<h5 class="card-title">' . $note['Name'] . '</h5>';
        echo '<p class="card-text d-inline-block text-truncate">' . $note['Contents'] . '</p>';
        echo '<p class="card-text"><strong>Due Date:</strong> ' . $note['Due Date'] . '</p>';
        echo '<p class="card-text"><strong>Priority:</strong> ' . $note['Priority'] . '</p>';     ?>
        <a><?php include "edit-to-do.php";?></a>      <?php
    echo '</div></div>'; ?></div><?php
    }
    ?>
        </div>
    </div>

</div>
</body>
<script>

</script>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1" href="/">
                    <svg class="bi" height="24" width="30"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <span class="mb-3 mb-md-0 text-body-secondary">©Sawyer Hays <small><del>hey this counts as a row right??</del></small></span>
            </div>
        </footer>
    </div>
</html>