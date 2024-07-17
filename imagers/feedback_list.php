<?php
require '../components/header.php';
echo "<h1>List of feedbacks here</h1>";

$sql = "SELECT name, email, body FROM feedback;";
$statement = $conn->prepare($sql);
$statement->execute();
echo '<ul class="list-group">';
$result = $statement->get_result(); 

while ($feedback = $result->fetch_assoc()) {
    $name = $feedback['name'] ?? '';
    $email = $feedback['email'] ?? '';
    $body = $feedback['body'] ?? '';

    // echo "<h3>$name, $email, $body</h3>";
    echo "<li class='list-group-item'> An item</li>";
    echo "<p>$name</p>";
    echo "<p>$email</p>";
    echo "<p>$body</p>";
}
echo'</ul>';
include '../components/footer.php';
?>

