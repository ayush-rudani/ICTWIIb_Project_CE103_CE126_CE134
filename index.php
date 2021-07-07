<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            box-sizing: border-box;
            width: 100%;
            /* background-image: url("bg3.jpg"); */
            background-image: url("Images/bg3.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        img.i1 {
            width: 80%;
            height: 400px;
            /* background-image: url('img_flowers.jpg'); */
            background-size: 100% 80%;
            margin: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>SRMS</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-secondary">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" style="margin-left:20px;margin-right:20px;" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="margin-left:20px;margin-right:20px;" href="dashboard.php">
                            Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="margin-left:20px;margin-right:20px;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Student
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Results</a></li>

                            <li><a class="dropdown-item" href="manage_results.php">Manage Results</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="#">Study Material</a></li>
                            <li><a class="dropdown-item" href="#">Academic Calendar </a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <center style="margin-top:20px; margin-bottom:30px; color:darkred;">
        <h1>Student Result Management</h1>
    </center>

    <div class="text-center">

    </div>
    <div class="col d-flex justify-content-center m-2 ">
        <div class="card" style="width: 90%;">
            <div class="card-body">
                <h4>About Dharmsinh Desai University</h4>
                <p>If you are at the cusp of taking a decision on the institute in which you wish to study, you have
                    reached the right place.
                    Our healthy placement record, well designed curriculum and alumni spread across the globe in top
                    companies are our strengths. For a holistic growth of the students, we also organize sports meets,
                    cultural events and community service programmes etc. Believe it or not, we also have a Guinness
                    Book of World Record in our name. If you wish to know more about it and the University, click the
                    video.</p>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->

    <div class=" container-fluid col d-flex container-fluid ">
        <div class="card m-3">
            <h5 class="card-header bg-secondary text-white">The various departments in the Faculty of Technology
            </h5>
            <div class="card-body">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Computer Engineering</li>
                    <li class="list-group-item">Chemical Engineering</li>
                    <li class="list-group-item">Information Technology</li>
                    <li class="list-group-item">Civil Engineering</li>
                    <li class="list-group-item">Electronics and Communication Engineering</li>
                    <li class="list-group-item">Mechanical Engineering</li>
                </ul>

            </div>
        </div>


        <div class="card  m-3" style="width: 45%;">

            <img class="card-img-top" src="https://www.ddu.ac.in/images/Technology/Infrastructurel-1.jpg" alt="Card image cap">

            <div class="card-body">
                <h5 class="card-title">Library</h5>
                <p class="card-text">The Faculty has a library that is both well-stocked as well as regularly
                    updated.
                    This includes books, journal, magazine and online resources</p>
                <p class="card-text">Library is fully computerized and using SOUL (Software for University
                    Libraries)
                    Library Automation Software.
                    Through this User can search Books Database and Other Database by Author, Title, Subject,
                    Accession
                    No., ISBN No., Publisher, Keyword, etc.</p>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">Books - 33287</li>
                <li class="list-group-item">Journals (Bound Volumes) - 6456</li>
            </ul>

            <ul class="list-group list-group-flush">
                <h5 class="m-3">Librarary Details</h5>
                <p class="m-3">The library is open from 8:30 am to 8:30 pm on weekdays and from 8:30 am to 1:30 pm
                    on Saturdays.During Examinations open from 8:30 am to 8:30 pm . Library Area is 10709 (In sq.
                    ft.),
                    994.88 (In sq. mt.) Seating Capacity is 378</p>
                <li class="list-group-item">On Working Days - <b>8:30 a.m to 8:30 p.m.</b></li>

            </ul>
        </div>

        <div class="card m-2">
            <h5 class="card-header bg-secondary text-white">News</h5>
            <div class="card-body">

                <ul class="list-group list-group-flush">
                    <a href="">
                        <li class="list-group-item">Sem-II Result available </li>
                    </a>

                    <a href="">
                        <li class="list-group-item">Admission Process for new students</li>
                    </a>
                    <a href="">
                        <li class="list-group-item">Placements</li>
                    </a>
                </ul>

            </div>
        </div>
    </div>
    <?php include('_footer.html'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>