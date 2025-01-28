<?php

header('content-type: application/json');

require_once("../db_conn.php");

try {
    // Get the raw POST data
    $rawData = file_get_contents('php://input');
    $data = json_decode($rawData, true);

    // Validate input
    if (!isset($data['name'], $data['email'], $data['address'], $data['no_phone'], $data['id'])) {
        throw new Exception("Invalid input. All fields (name, email, address, phone, id) are required.");
    }

    // Sanitize input
    $name = htmlspecialchars($data['name']);
    $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
    $address = htmlspecialchars($data['address']);
    $no_phone = htmlspecialchars($data['no_phone']);
    $id = intval($data['id']);

    // Prepare the SQL query
    $sql = "UPDATE users SET name = ?, email = ?, address = ?, no_phone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception('Failed to prepare the SQL statement.');
    }

    // Bind parameters to the query
    $stmt->bind_param('ssssi', $name, $email, $address, $no_phone, $id);

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
