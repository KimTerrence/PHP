//=======register.php=====

<?php

$db = new mysqli('localhost', 'root', '', 'kim');
    
if(isset($_POST['reg'])){
    $name = $_POST['name'];
    $role = $_POST['role'];

     $sql = "INSERT INTO user_info (name, role) VALUES ( '$name', '$role')";
        
        if ($db->query($sql) === TRUE) {
          //  header("Location: login.php");
            echo'<script>window.reload()>';
        }


}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form method="POST">
        <input type="text" name="name" placeholder="name">
        <select name="role">
            <option value="manager">Manager</option>
            <option value="user" default >User</option>
        </select>
        <button type="submit" name="reg">Register</button>
    </form>
    <div>
    <table class="table">
    <tr>
        <th>name</th>
        <th>role</th>
        <th>status</th>
        <th></th>
    </tr>
<?php

     $sql = "SELECT * FROM user_info";
            $result = $db->query($sql); // query
            while ($user = $result->fetch_assoc()) { //display data
?>


    <tr>
        <td><?php echo $user['name'];?></td>
        <td><?php echo $user['role'];?></td>
        <td><?php echo $user['status'];?></td>
        <td><a href="approve.php?id=<?php echo $user['id'];?>" >Approve</a></td>
    </tr>
        <p>
        
    </p>


    <?php
    }
?>
    </table>
    </div>
</body>
</html>



//====approve.php=====

<?php

$db = new mysqli('localhost', 'root', '', 'kim');

if(isset($_GET['id'])){

    $id =  $_GET['id'];

 $sql = "INSERT INTO logs (name, status) select name , 'Approved' from user_info where id = $id";
        
        if ($db->query($sql) === TRUE) {
          //  header("Location: login.php");
            echo'<script>window.location = "register.php">';
        }

}


?>
