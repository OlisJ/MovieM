<?php
    include "../includes/db.php";
    include "../includes/header.php";

    session_start();
    

    // Ensures that the user is logged in

    if(!isset ($_SESSION['user_id']) || $_SESSION['role'] !='user'){
        header("Location: ../login.php");  // Redirect to login if user is not authorized
        exit;
    }

    // get the movie id from the query string

    if(!isset($_GET['movie_id'])) {
        echo'<div class="container"><p class="alert alert-danger">Invalid movie selection </p></div>';
        include '../includes/footer.php';
        exit;
    }

    $movie=$result->fetch_assoc();

    if($_SERVER["REQUEST_METHOD"]== 'POST') {
        $user_id =$_SESSION['user_id'];
        $show_date =$_POST['show_date'];
        $show_time =$_POST['show_time'];
    
        $sql= "INSERT INTO bookings (user_id , movie_id , show_date , show_time , status) 
        VALUES ($user_id , $movie_id , "$show_date" , "$show_time" , 'pending') ";


        if($conn->query($sql) == TRUE){
            echo"<div class='container'><p class='alert alert-success'>Booking Sucesful! Your booking is pending to be approved</p></div>";
        }else{
            echo"<div class='container><p class='alert alert-danger'>Error  " .$conn->error ."</p></div>";
        }
    }


?>

<div class='container'>
    <h1 class='text-center'>Book Movie </h1>
    <div class="card">
        <h3><?php echo $movie['title'] ?></h3>
        <p><?php echo $movie['description'] ?></p>
        <p><strong>Genre:</strong><?php echo $moive['genre'] ?></p>
        <p><strong>Language</strong><?php echo $movie['language'] ?></p>
        <p><strong>Duration</strong><?php echo $movie['duration'] ?></p>
    </div>
</div>

<form method='POST' class='mt-4'>
    <div class="mt-3">
        <label for="show_date" class='form-label'>Show Date</label>
        <input type="date" name="show_date" id='show_date' class='form-control' required>
    </div>

    <div class="mt-3">
        <label for="show_time" class='form-label'>Show time</label>
        <input type="time" name="show_time" id='show_time' class='form-control' required>
    
        <button type='submit' class='btn btn-primary'>Confirm Booking</button>
    </div>
</form>

<?php
    include '../includes/footer.php';
?>