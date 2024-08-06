<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <main class="container" style="align-items: flex-start">
        
    <?php
        include 'config.php';

        echo '<h1>Collection Dashboard</h1>';
        echo "<table class='table table-striped'>";
        echo "
                <tr>
                    <th>ID</th>
                    <th>Channel Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Timestamp</th>
                    <th>Channel Quality</th>
                    <th>Future Content</th>
                    <th>Feedback</th>
                </tr>
        ";
        $all_data_query = mysqli_query($db_connection, "SELECT * FROM `respondent_profiles` INNER JOIN `respondent_opinions` ON `respondent_profiles`.`ID` = `respondent_opinions`.`ID` ORDER BY `respondent_profiles`.`ID`");

        while($row = mysqli_fetch_assoc($all_data_query)) {
            echo "
                <tr>
                    <td>".$row['ID']."</td>
                    <td>".$row['Channel Name']."</td>
                    <td>".$row['Age']."</td>
                    <td>".$row['Gender']."</td>
                    <td>".$row['Role']."</td>
                    <td>".$row['Timestamp']."</td>
                    <td>".$row['Channel Quality']."</td>
                    <td>".$row['Future Content']."</td>
                    <td>".$row['Feedback']."</td>
                </tr>
            ";
        }
        echo "</table>";
    ?>

    </main>
</body>
</html>