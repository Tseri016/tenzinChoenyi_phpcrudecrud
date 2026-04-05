<!DOCTYPE html>
<html>
<head>
    <title>Northland Analytics PHP/MySQL Test Page</title>
</head>

<body>

    <h1>Tenzin Choenyi made PHP/MySQL Test Page</h1>

    <p>Database Records Found</p>
  <p>
        For more information on connecting PHP to MySQL,
        <a href="https://www.php.net/manual/en/book.mysqli.php" target="_blank">
            click here
        </a>.
    </p>
    <?php

    //this is the php object oriented style of creating a mysql connection
    $conn = new mysqli('localhost', 'choenyi', 'choenyi', 'employees' );

    //check for connection success
    if ($conn->connect_error) {
            die("MySQL Connection Failed: " . $conn->connect_error);
       }
    echo "MySQL Connection Succeeded<br><br>";

    //create the SQL select statement
    $sql = "SELECT first_name,last_name, hire_date FROM employees where last_name = 'Weedman'";

    //put the resultset into a variable
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
             echo "Employee: " . $row["first_name"]. " " . $row["last_name"]. "   " .$row["hire_date"]. "<br>";
       }
     } else {
             echo "No Records Found";
     }

    //always close the connection
    $conn->close();

    ?>

    <br><br>

    <p>
        For more information on connecting PHP to MySQL, 
        <a href="https://www.php.net/manual/en/book.mysqli.php" target="_blank">
            click here
        </a>.
    </p>

</body>
</html>
