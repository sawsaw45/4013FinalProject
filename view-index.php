
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Final Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
    <style> .card{
            width:200px;
        }</style>


</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Note Taking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item ms-auto">
                        <a class="nav-link active" aria-current="page" href="index.php">Notes</a>
                    </li>
                </ul>
                                                                    
            </div>
        </div>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<div class="container">
    <h1>Final Project</h1>

    <div class="container">
        <?php include "new-to-do.php";?>
        <div class="pt-1 row row-cols-6">
    <?php

    $notes = getNotes();


    foreach ($notes as $note) {
        $priority = $note['Priority'];
        $priorityBg = '';
        if ($priority <= 0) {
            $priorityBg = 'border-secondary';

        }
        elseif ($priority <= 3) {
            $priorityBg = 'border-success';
        } elseif ($priority <= 6) {
            $priorityBg = 'border-warning';
        } else {
            $priorityBg = 'border-danger';
        }

        ?> <div class="col-md mb-2 d-flex align-items-stretch">

       <div class="card border <?php echo $priorityBg?>">
           
       <div class="card-body d-flex flex-column">
       <h5 class="card-title"><?php echo $note['Name']?></h5>
       <p class="card-text d-inline-block text-truncate"><?php echo $note['Contents']?></p>
       <p class="card-text"><strong>Due Date:</strong> <?php echo $note['Due Date']?></p>
       <p class="card-text"><strong>Priority:</strong><?php echo $note['Priority']?></p>
           <div class="row mt-auto"><div class="col"><?php include "edit-to-do.php";?></div><div class="col"><?php include "delete-to-do.php";?></div></div>

        <?php
    echo '</div></div>'; ?></div><?php
    }
    ?>
        </div>
    </div>

</div>
</body>

                 <script>

                     // Function to initialize countdown for a specific modal
                     function initializeModalCountdown(modalId, dueDate) {
                         var countDownDate = moment(dueDate).toDate();

                         function updateCountdown() {
                             var now = moment();
                             var distance = moment(countDownDate).diff(now);

                             var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                             var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                             var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                             var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                             document.getElementById("timer").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                             if (distance <= 0) {
                                 clearInterval(interval);
                                 document.getElementById("timer").innerHTML = "EXPIRED";
                             }
                         }

                         updateCountdown();
                         var interval = setInterval(updateCountdown, 1000);
                     }


                     document.addEventListener('show.bs.modal', function (event) {
                         var modalId = event.target.id; // Get the ID of the opened modal
                         var dueDate = event.relatedTarget.dataset.dueDate; // Get the due date from the data attribute
                         initializeModalCountdown(modalId, dueDate); // Initialize countdown for the opened modal with due date
                     });
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