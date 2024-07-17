<?php
require '../components/header.php';

$name = $email = $body = '';
$name_error = $email_error = $body_error = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $name_error = "Name is required";
    } else {
        $name = htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['email'])) {
        $email_error = "Email is required";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }
    if (empty($_POST['body'])) {
        $body_error = "Feedback is required";
    } else {
        $body = htmlspecialchars($_POST['body']);
    }

    $validate_success = empty($name_error) && empty($email_error) && empty($body_error);
    if ($validate_success) {
        $sql = "INSERT INTO feedback (name, email, body) VALUES (?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param("sss", $name, $email, $body);
        $statement->execute();
        header("Location: feedback_list.php");
    }
}
?>

<body>
    <h1>Enter your feedback here</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="What is your name?">
            <span class="text-danger"><?php echo $name_error; ?></span>
        </div>

        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Enter your email">
            <span class="text-danger"><?php echo $email_error; ?></span>
        </div>

        <div class="mb-3">
            <textarea class="form-control" name="body" placeholder="Enter your feedback" rows="2"></textarea>
            <span class="text-danger"><?php echo $body_error; ?></span>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="submit" value="Send">
        </div>
    </form>

    <?php include '../components/footer.php'; ?>
</body>
</html>
