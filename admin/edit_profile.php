<?php
session_start();
include("../db_conn.php");



$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

$logged_in_user = $row[0];

if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
  echo "Access denied!";
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Note Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
</head>
<style>
  .progress-bar2 {
    width: 0% !important;
  }

  .progress-bar {
    transition: 2s !important;
  }
</style>

<body class="flex flex-col items-center justify-center min-h-screen text-white">
  <header class="w-full p-4 flex justify-between items-center bg-transparent">
    <h1 class="text-2xl font-bold">Welcome</h1>
    <nav class="navbar flex space-x-4">
      <a href="#">Home</a>
      <a href="list_note.php">List Note</a>
      <a href="list_user.php">List User</a>
      <a href="profile.php">Profile</a>
      <a href="../logout.php" class="border border-white px-4 py-2 rounded">logout</a>
    </nav>
  </header>

  <main class="flex flex-col items-center justify-center flex-grow">

    <div class="card-container" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 1rem; padding: 1rem;">

      <div class="container">
        <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../assets/img/<?= $id ?>/profile_pic.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4 style="color: black"><?= $logged_in_user['name'] ?></h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm"><?= $logged_in_user['address'] ?></p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>

            <div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" style="color: black;">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="name" name="name" class="form-control" value="John Doe">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" style="color: black;">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="email" name="email" class="form-control" value="john@example.com">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" style="color: black;">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="no_phone" name="no_phone" class="form-control" value="(239) 816-9029">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" style="color: black;">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" id="address" name="address" class="form-control" value="Bay Area, San Francisco, CA">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
                  <a class="btn btn-primary px-4" id="submit" target="__blank" href="submit.php?id=<?=$logged_in_user['id']?>">Save Changes</a>
								</div>
							</div>
						</div>
					</div>
          

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small class="text-secondary mb-1">Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-secondary mb-1">Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-secondary mb-1">One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-secondary mb-1">Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-secondary mb-1">Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small class="text-secondary mb-1">Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-secondary mb-1">Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-secondary mb-1">One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-secondary mb-1">Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small class="text-secondary mb-1">Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar2 progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
      </div>

    </div>




  </main>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      progressBarAnimation();
    });

    function progressBarAnimation() {
      setTimeout(function() {
        const slides = document.getElementsByClassName("progress-bar");
        for (let i = 0; i < slides.length; i++) {
          slides.item(i).classList.remove("progress-bar2");
        }
      }, 10);
    }
  </script>

</body>

</html>

<script>
    $(document).ready(function () {
        $('#submit').click(function () {
            // Collect data from the input fields
            var data = {
                name: $('#name').val(),
                email: $('#email').val(),
                no_phone: $('#no_phone').val(),
                address: $('#address').val(),
                id: '<?=$id?>', // Ensure you securely handle this server-side
            };

            console.log('Sending data:', JSON.stringify(data));

            $.ajax({
                url: 'submit.php', // Your server endpoint
                type: 'POST',
                contentType: 'application/json', // Sending JSON
                data: JSON.stringify(data),
                dataType: 'json', // Expecting JSON response
                success: function (response) {
                    console.log('Response:', response);

                    if (response.status === 'success') {
                        // Redirect to list_user.php on success
                        window.location.href = 'profile.php';
                    } else {
                        // Log the error and show an alert
                        console.error('Error:', response.message);
                        alert('Error: ' + response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', status, error);
                    alert('An unexpected error occurred. Please try again.');
                },
            });
        });
    });
</script>
