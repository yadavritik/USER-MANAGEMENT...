<?php
session_start();
include 'db.php';

$sql=$conn->query("select * from employee");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"];
    $salary=$_POST["salary"];
    $designation=$_POST["designation"];
    $email=$_POST["email"];
    $yexp=$_POST["yexp"];

    $stmt=$conn->prepare("insert into employee(name,salary,designation,email,yexp) values(?,?,?,?,?)");
    $stmt->bind_param("sdsss", $name,$salary,$designation,$email,$yexp);

    if($stmt->execute()){
        header("Location: Home.php");   
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
            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                     <h4>Hello <?php echo $_SESSION["name"];?></h4>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="Edit.php" aria-current="page"
                                    >Edit
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="Delete.php" aria-current="page"
                                    >Delete
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >Dropdown</a
                                >
                         
                            </li>
                        </ul>
                        <form action="Login.php" class="d-flex my-2 my-lg-0">
                            <input
                                class="form-control me-sm-2"
                                type="text"
                                placeholder="Search"
                            />
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>
<div class="container mt-5 col-md-5">

    <form method="POST" class="border p-4 shadow rounded">

        <h4 class="text-center mb-3">Add Employee</h4>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="text" class="form-control" name="salary">
        </div>

        <div class="mb-3">
            <label class="form-label">Designation</label>
            <input type="text" class="form-control" name="designation">
        </div>

         <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
        </div>

         <div class="mb-3">
            <label class="form-label">Year of Expiry</label>
            <input type="text" class="form-control" name="yexp">
        </div>

        <button type="submit" class="btn btn-success w-100">
            Add Employee
        </button>

    </form>

</div>

<div class="container mt-5 col-md-8">

    <h3 class="text-center mb-4">Employee Table</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">

            <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>salary</th>
                    <th>designation</th>
                    <th>email</th>
                    <th>yexp</th>
                     <th>Action</th>
                     <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row=$sql->fetch_assoc()){ ?>
                <tr>
                    <td><?=$row["id"]?></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["salary"]?></td>
                    <td><?=$row["designation"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["yexp"]?></td>

                    <td>
                        <a href="Edit.php?id=<?=$row["id"]?>" class="btn btn-success btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="Delete.php?id=<?=$row["id"]?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

</div>
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
