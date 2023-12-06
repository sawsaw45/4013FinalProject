
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Final Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
    <style>  .card {
            width: 200px;
        }
        .hoverable-card:not(.modal-open):hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 4px 8px rgba(0, 0, 0, 0.06);
        }
        .extra-urgent {
            animation: alternateAnimation 3s infinite; /* 3s duration, infinite loop */
        }
        @keyframes alternateAnimation {
            0% {
                background-color: #fff; /* White */
                border-width: 1px;
            }
            50% {
                background-color: #f8f9fa; /* Light gray */
                border-width: 2px;
            }
            100% {
                background-color: #fff; /* White */
                border-width: 3px;
            }
        }

    </style>


</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ToDo</a>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<div class="container">
    <h1>To-Do List</h1>

    <div class="container">
        <?php include "new-to-do.php";?>
        <div class="pt-1 row row-cols-6">
    <?php

    $notes = getNotes();


    foreach ($notes as $note) {
        $priority = $note['Priority'];
        $pri10 = '';
        if ($priority =10) {
            $pri10 = 'extra-urgent';
        }
        $priorityBg = '';
        if ($priority <= 0) {
            $priorityBg = 'border-secondary';

        }
        elseif ($priority <= 3) {
            $priorityBg = 'border-success';
        } elseif ($priority <= 6) {
            $priorityBg = 'border-warning';
        } elseif ($priority <= 9){
            $priorityBg = 'border-danger';
        }

        ?> <div class="col-md mb-2 d-flex align-items-stretch">

       <div class="card border hoverable-card <?php echo $priorityBg?> <?php echo $pri10?>" id="card-<?php echo $note['noteid']; ?>" >
           
       <div class="card-body d-flex flex-column" data-due-date="<?php echo date('Y-m-d',strtotime($note['Due Date']))?>">
       <h5 class="card-title"><?php echo $note['Name']?></h5>
       <p class="card-text d-inline-block text-truncate"><?php echo $note['Contents']?></p>
       <p class="card-text"><strong>Due Date: </strong> <?php echo $note['Due Date']?></p>
       <p class="card-text"><strong>Priority: </strong><?php echo $note['Priority']?></p>
        <div class="card-timer" id="timer-<?php echo $note['noteid']; ?>"></div>
           <div class="row mt-auto"><div class="col"><?php include "edit-to-do.php";?></div><div class="col"><?php include "delete-to-do.php";?></div></div>
           <script>    // Add modal-open class to the card when the modal is opened
               $('#editToDoModal<?php echo $note['noteid']; ?>').on('shown.bs.modal', function () {
                   $("#card-<?php echo $note['noteid']; ?>").addClass('modal-open');
                   console.log('Modal opened: #card-<?php echo $note['noteid']; ?>');
               });

               // Remove modal-open class from the card when the modal is closed
               $('#editToDoModal<?php echo $note['noteid']; ?>').on('hide.bs.modal', function () {
                   $("#card-<?php echo $note['noteid']; ?>").removeClass('modal-open')
                   console.log('Modal closed: #card-<?php echo $note['noteid']; ?>');
               });</script>

        <?php
    echo '</div></div>'; ?></div><?php
    }
    ?>
        </div>
    </div>

</div>


</body>

<script>


    function initializeCardCountdown(timerId, dueDate) {
        //var cardId = timerId.replace("timer-", ""); this should be unessesary but if i need it later its here
        var countDownDate = new Date(dueDate);
        var interval;

        function updateCountdown() {
            var now = new Date();
            var distance = countDownDate - now;
            //console.log('dueDate:', dueDate);
            //console.log('now:', now);
            //console.log('countDownDate:', countDownDate);
            //console.log('distance:', distance);

            if (distance > 0) {
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                //console.log('days:', days, 'hours:', hours, 'minutes:', minutes, 'seconds:', seconds);

                document.getElementById(timerId).innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
            } else {
                clearInterval(interval);
                document.getElementById(timerId).innerHTML = "EXPIRED";
            }
        }

        updateCountdown();
        interval = setInterval(updateCountdown, 1000);
    }


    var timers = document.querySelectorAll('.card-timer');
    // find each div with this class and put in array
    timers.forEach(function(timer) {
        var timerId = timer.id;
        var dueDate = timer.parentElement.dataset.dueDate; //make sure the data is actuall in this parent element
        initializeCardCountdown(timerId, dueDate);
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