<?php
// Include database connection
require_once 'db_connection.php';

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);

// Check if data exists
if (isset($data['name']) && isset($data['email']) && isset($data['message'])) {
    $name = $conn->real_escape_string($data['name']);
    $email = $conn->real_escape_string($data['email']);
    $message = $conn->real_escape_string($data['message']);
    $created_at = date('Y-m-d H:i:s');
    
    // Insert data into database
    $sql = "INSERT INTO contacts (name, email, message, created_at) 
            VALUES ('$name', '$email', '$message', '$created_at')";
    
    if ($conn->query($sql) === TRUE) {
        // Success response
        $response = array(
            'status' => 'success',
            'message' => 'Contact form submitted successfully'
        );
        echo json_encode($response);
    } else {
        // Error response
        $response = array(
            'status' => 'error',
            'message' => 'Error: ' . $conn->error
        );
        echo json_encode($response);
    }
} else {
    // Missing data response
    $response = array(
        'status' => 'error',
        'message' => 'Missing required fields'
    );
    echo json_encode($response);
}

// Close the database connection
$conn->close();
?>