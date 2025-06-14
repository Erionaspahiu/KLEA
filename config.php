<?php
session_start();

// Database connection
require_once 'db.php';

// Error handling
function handleError($message) {
    return json_encode(['error' => $message]);
}

// Success response
function handleSuccess($data) {
    return json_encode(['success' => true, 'data' => $data]);
}

// Sanitize input
function sanitizeInput($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Validate date format
function validateDate($date) {
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

// Check if room is available
function isRoomAvailable($roomId, $checkIn, $checkOut) {
    global $conn;
    
    $query = "SELECT COUNT(*) as count FROM bookings 
              WHERE room_id = ? 
              AND booking_status != 'cancelled'
              AND (
                  (check_in_date BETWEEN ? AND ?) 
                  OR (check_out_date BETWEEN ? AND ?)
                  OR (check_in_date <= ? AND check_out_date >= ?)
              )";
              
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "issssss", $roomId, $checkIn, $checkOut, $checkIn, $checkOut, $checkIn, $checkOut);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    
    return $row['count'] == 0;
}

// Calculate total price
function calculateTotalPrice($roomId, $checkIn, $checkOut, $adults, $children, $extras) {
    global $conn;
    
    // Get room price
    $query = "SELECT price_per_night FROM rooms WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $roomId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $room = mysqli_fetch_assoc($result);
    
    // Calculate number of nights
    $checkInDate = new DateTime($checkIn);
    $checkOutDate = new DateTime($checkOut);
    $nights = $checkInDate->diff($checkOutDate)->days;
    
    // Calculate room total
    $total = $room['price_per_night'] * $nights;
    
    // Calculate extras
    if (!empty($extras)) {
        $extraIds = implode(',', array_map('intval', $extras));
        $query = "SELECT * FROM extras WHERE id IN ($extraIds)";
        $result = mysqli_query($conn, $query);
        
        while ($extra = mysqli_fetch_assoc($result)) {
            if ($extra['is_per_person']) {
                $total += $extra['price'] * ($adults + $children);
            }
            if ($extra['is_per_day']) {
                $total += $extra['price'] * $nights;
            }
            if (!$extra['is_per_person'] && !$extra['is_per_day']) {
                $total += $extra['price'];
            }
        }
    }
    
    return $total;
}

// Generate booking reference
function generateBookingReference() {
    return strtoupper(uniqid('KLEA'));
}

// Send booking confirmation email
function sendBookingConfirmation($booking) {
    // Implement email sending functionality here
    // You can use PHPMailer or other email libraries
    return true;
}
?> 