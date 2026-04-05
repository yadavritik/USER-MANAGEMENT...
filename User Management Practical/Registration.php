<?php
session_start();
include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $age=$_POST["age"];
    $address=$_POST["address"];
    $email=$_POST["email"];
    $password=password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql=$conn->prepare("insert into registration(name,age,address,email,password) values(?,?,?,?,?)");
    $sql->bind_param("sisss", $name,$age,$address,$email,$password);

    if($sql->execute()){
        header("Location: Login.php");
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main >
            <h3><center>Registration form </center></h3>
            
           <form method="POST" class="border p-4 shadow rounded">
            <div
                class="container mt-4 col-md-4"
            >
                 <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder=""
                />
                <label for="name">Name</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="age"
                    id="age"
                    placeholder=""
                />
                <label for="age">Age</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="address"
                    id="address"
                    placeholder=""
                />
                <label for="addresss">Address</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder=""
                />
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder=""
                />
                <label for="password">Password</label>
            </div>
            <button
                type="submit"
                class="btn btn-primary"
            >
                Submit
            </button>
            
            </div>
            
           </form>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
