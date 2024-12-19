<?php
    include "../include/header.php";
    include "../include/db.php";

    // Ensure that the user is logged in
    if(!isset ($_SESSION['user_id']) || $_SESSION['role'] !='user'){
        header("Location: ../login.php");  // Redirect to login if user is not authorized
        exit;
    }

    //fetch user-specific from bookings

    $user_id = $_SESSION['user_id'];
    $sql="SELECT b.id, m.title, b.show_time, b.status 
    FROM bookings b
    INNER JOIN movies m ON b.movie_id = m.id
    WHERE b.user_id = $user_id
    ";

    $result = $conn->query($sql);
    
    
    ?>



<div class= 'container  mt-5 '>
    <h1 class="text-center">User Dashboard</h1>

    <h2 class="table tables-borded mt-3">My Bookings</h2>

    <table class="table">
  <thead>
    <tr>#</tr>
    <th>Movie</th>
    <th>Data</th>
    <th>Time</th>
    <th>Status</th>
  </thead>
</table>
</div>