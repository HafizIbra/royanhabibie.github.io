<!DOCTYPE html>
<html lang="en">

<head>

    <title>EDIT VIEW</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">

</head>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    body {
        height: 100vh;
        align-items: center;
        justify-content: center;
        background: #0d6efd;
    }

    .login {
        width: 500px;
        margin: auto;
        margin-top: 10px;
        height: min-content;
        padding: 20px;
        border-radius: 12px;
        background: #ffffff;
    }

    .login h1 {
        font-size: 36px;
        margin-bottom: 25px;
    }

    .login form {
        font-size: 15px;
    }

    .login form .form-group {
        margin-bottom: 10px;
    }

    .login form input[type="submit"] {
        font-size: 20px;
        margin-top: 15px;
    }
</style>

<body>

    <div class="login">

        <h1 class="text-center">EDIT CV</h1>
        
        <form class="needs-validation" method="post" action='edit3337210014.php' enctype="multipart/form-data">
            <input type="hidden" name="nim" value=<?php echo $_GET['nim']; ?>>

            <div class="form-group">
                <label class="form-label">Front Name</label>
                <input class="form-control" type="text" id="fname" name="fname" value="<?=$fname?>" >
            </div>

            <div class="form-group">
                <label class="form-label">Last Name</label>
                <input class="form-control" type="text" id="lname" name="lname" value="<?=$lname?>" >
            </div>

            <div class="form-group">
                <label class="form-label">Address</label>
                <input class="form-control" type="text" id="alamat" name="alamat" value="<?=$alamat?>" >
            </div>

            <div class="form-group">
                <label class="form-label">About</label>
                <input class="form-control" type="text" id="about" name="about" value="<?=$about?>" >
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="<?=$email?>" >
            </div>

            <div class="form-group">
                <label class="form-label">Linked In Account (link)</label>
                <input class="form-control" type="text" id="link_in" name="link_in" value="<?=$link_in?>" >
            </div>

            <div class="form-group">
                <label class="form-label">GitHub Account (link)</label>
                <input class="form-control" type="text" id="link_git" name="link_git" value="<?=$link_git?>">
            </div>

            <div class="form-group">
                <label class="form-label">Twitter Account (link)</label>
                <input class="form-control" type="text" id="link_twit" name="link_twit" value="<?=$link_twit?>" >
            </div>
            
            <div class="form-group">
                <label class="form-label">Facebook Account (link)</label>
                <input class="form-control" type="text" id="link_fb" name="link_fb" value="<?=$link_fb?>">
            </div>

            <div class="form-group">
                <label class="form-label">Awards</label>
                <input class="form-control" type="text" id="award" name="award" value="<?=$award?>">
            </div>
            <div class="form-group">
                <label class="form-label">Interest</label>
                <input class="form-control" type="text" id="interest" name="interest" value="<?=$interest?>">
            </div>
            <div class="form-group">
                <label class="form-label">Skills</label>
                <input class="form-control" type="text" id="skill" name="skill" value="<?=$skill?>" >
            </div>

            
            <button class="btn btn-success w-100" type="submit" name="submit">EDIT</button>
            <button class="btn btn-success w-100 mt-10" href="../index.php">BACK</button>
        </form>

    </div>
<?php
    include_once("../config.php");
    //cek  
    if (isset($_POST['submit'])) {
        // ambil data dari formulir
        $nim = $_POST['nim'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $alamat = $_POST['alamat'];
        $about = $_POST['about'];
        $email = $_POST['email'];
        $link_in = $_POST['link_in'];
        $link_git = $_POST['link_git'];
        $link_twit = $_POST['link_twit'];
        $link_fb = $_POST['link_fb'];
        $award = $_POST['award'];
        $interest = $_POST['interest'];
        $skill = $_POST['skills'];
    
        // query
        $sql = "UPDATE about, interests, awards, skills SET
                    fname = '$fname',
                    lname = '$lname',
                    alamat = '$alamat',
                    about = '$about',
                    email = '$email',
                    link_in = '$link_in',
                    link_git = '$link_git',
                    link_twit = '$link_twit',
                    link_fb = '$link_fb',
                    award = '$award',
                    interest = '$interest',
                    skill = '$skill'
                    WHERE about.nim = $nim AND interests.nim = $nim  AND awards.nim = $nim AND skills.nim = $nim
                ";
        $query = mysqli_query($conn, $sql);
        // mengecek apakah query berhasil diubah
    
    }
    
    
    // Check if form is submitted for user update, then redirect to homepage after update
    if (!isset($_GET['nim'])) {
        header('Location: ../index.php');
    }
    // about
    $nim = $_GET['nim'];
    
    // update user data about
    $sql = "SELECT * FROM about WHERE nim=$nim";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    
    $fname = $row["fname"];
    $lname = $row["lname"];
    $alamat = $row["alamat"];
    $about = $row["about"];
    $email = $row["email"];
    $link_in = $row["link_in"];
    $link_git = $row["link_git"];
    $link_twit = $row["link_twit"];
    $link_fb = $row["link_fb"];
    
    //awards
    $sql = "SELECT * FROM awards WHERE nim=$nim";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    
    $award = $row['award'];
    
    //interest
    $sql = "SELECT * FROM interests WHERE nim=$nim";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    
    $interest = $row["interest"];
    
    //skills
    $sql = "SELECT * FROM skills WHERE nim=$nim";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    
    $skill = $row["skill"];
    
?>

</body>

</html>
