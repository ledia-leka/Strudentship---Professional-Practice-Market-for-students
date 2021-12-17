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
    align-items: center;
   height:30px;
  }
 
  a{
   margin-left:50px;
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
              <a class="nav-link" href="UniRegister.php">Register as University <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="StudentRegister.php">Register as Student</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="registercompany.php">Register as Employee</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          
          </ul>
        </div>
      </nav>
        
</body>
</html>
