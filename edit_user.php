<?php
header('Content-Type: application/json');

// Include database connection
require_once '../db_conn.php'; // Ensure this file contains $conn for your DB connection

try {
    // Get the raw POST data
    $rawData = file_get_contents('php://input');
    $data = json_decode($rawData, true);

    // Validate input
    if (!isset($data['name']) || !isset($data['id'])) {
        throw new Exception('Invalid input. Both name and id are required.');
    }

    $name = htmlspecialchars($data['name']); // Sanitize the name
    $id = intval($data['id']); // Ensure ID is an integer

    // Prepare the SQL query
    $sql = "UPDATE users SET name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception('Failed to prepare the SQL statement.');
    }

    // Bind parameters to the query
    $stmt->bind_param('si', $name, $id);

    // Execute the query
    if ($stmt->execute()) {
        // Check if a row was updated
        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => 'User updated successfully',
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'No rows updated. Please check the user ID.',
            ]);
        }
    } else {
        throw new Exception('Failed to execute the SQL query.');
    }

    // Close the statement
    $stmt->close();
} catch (Exception $e) {
    // Handle errors
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage(),
    ]);
}

// Close the database connection
$conn->close();

?>
