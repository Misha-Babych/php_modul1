<?php
include "config.php";

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Список студентів</title>
</head>
<body>
    <h1>Список студентів</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>ПІБ</th>
            <th>Курс</th>
            <th>Спеціальність</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["full_name"] . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td>" . $row["specialty"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Немає записів про студентів.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
