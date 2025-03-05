<?php
include "connection.php";
$create_flag = false;
$delete_flag = false;

if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql_delete = "
    DELETE FROM task WHERE id = $id;
    ";
    if ($conn->query($sql_delete)) {
        $delete_flag = true;
    } else {
        echo "Deletion failed: " . $conn->error;
    }

    $sql_max_id = "SELECT MAX(id) AS max_id FROM task";
$result = $conn->query($sql_max_id);
if ($result) {
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];

    // Step 2: Set AUTO_INCREMENT to the next available value
    $sql_alter = "ALTER TABLE task AUTO_INCREMENT = " . ($max_id + 1);
    $conn->query($sql_alter); 
}
}

if (isset($_POST['title']) && isset($_POST['description'])) {
    $title = $_POST['title'];
    $desc  = $_POST['description'];


    $sql = "INSERT INTO task(title, description) VALUES ('$title', '$desc')";

    if ($conn->query($sql)) {
        $create_flag = true;
    } else {
        echo "Insert failed: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <section id="task-manager">
        <div class="heading">Task Manager</div>
        <?php
        if ($create_flag) {
            echo "Task inserted successfully";
        }

        if ($delete_flag) {
            echo "Task deleted successfully";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="title" placeholder="Enter Task Title" required>
            <input type="text" name="description" placeholder="Enter description" required>
            <button type="submit">Create Task</button>
        </form>
        <div id="read">
            <?php
            $sql = "SELECT * FROM task";
            $result = $conn->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo $row['id'] . ") Title: " . htmlspecialchars($row['title']) . "<br>";
                    echo "Description: " . htmlspecialchars($row['description']) . "<br>";
                    echo '<form action="index.php" method="POST">
                        <input type="hidden" name="id" value="' . $row["id"] . '">
                        <button type="submit" name="delete" value="true">Delete</button>
                    </form>';
                }
            } else {
                echo "Error: " . $conn->error;
            }
            ?>
        </div>
    </section>
</body>
</html>
