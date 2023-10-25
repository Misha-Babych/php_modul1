<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Студент не знайдений.";
        exit();
    }
} else {
    echo "Не вказано Id студента.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $course = $_POST['course'];
    $specialty = $_POST['specialty'];

    $update_sql = "UPDATE students SET full_name = '$full_name', course = $course, specialty = '$specialty' WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: students.php");
    } else {
        echo "Помилка під час оновлення запису: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Редагування студента</title>
</head>
<body>
    <h1>Редагування студента</h1>
    <form method="post">
        <label for="full_name">ПІБ:</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>"><br><br>
        <label for="course">Курс:</label>
        <input type="number" id="course" name="course" value="<?php echo $row['course']; ?>"><br><br>
        <label for="specialty">Спеціальність:</label>
        <input type="text" id="specialty" name="specialty" value="<?php echo $row['specialty']; ?>"><br><br>
        <input type="submit" value="Зберегти">
    </form>
</body>
</html>
