<?php
// Include database connection file
include("../include/connect.php");

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch message details from the database based on the ID
    $query = "SELECT * FROM contact_responses WHERE id = $id";
    $result = mysqli_query($con, $query);

    // Check if message exists
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $message = $row['message'];
        $created_at = $row['created_at'];

        // Display message details
        ?>
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Message Details</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            </head>
            <body>
                <div class="container mt-5">
                    <h2>Message Details</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="5" readonly><?php echo $message; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Received At:</label>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="<?php echo $created_at; ?>" readonly>
                    </div>
                </div>

                <!-- Reply form -->
                <div class="container mt-5">
                    <h2>Reply</h2>
                    <div class="mb-3">
                        <a href="mailto:<?php echo $email; ?>?subject=Reply%20to%20Your%20Inquiry&body=" class="btn btn-primary">Send Reply</a>
                    </div>
                </div>

                    <!-- Back to Home button -->
                <div class="container mt-3">
                    <a href="index.php?inbox" class="btn btn-secondary">Back to Home</a>
                </div>
            </body>
            </html>
        <?php
    } else {
        echo "Message not found.";
    }
} else {
    echo "Invalid request.";
}
?>
