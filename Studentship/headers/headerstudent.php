<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css"
   

</head> 
<style>
  .navbar{
    font-size:20px;
    font-weight:700;
   
  }
  a{
    width:200px;
    text-align: center;
    align-items: center;
  }
    .navbar-brand{
        margin-left:10%;
      }
      .navbar a:hover {
  font-size: 22px;
  background-color: rgb(228, 232, 235);
  
}
.navbar a.active{
  color:white;
}
    </style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href="studentfeed.php">Feed <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="employeePOV.php">Profile</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="logout.php">Log out</a>
            </li>
          
          </ul>
        </div>
      </nav>
        
</body>
</html>
