<?php
$response = [
              'success' => false,
              'status'  => STATUS_BAD_REQUEST,
              'message' => 'Bad Request',
              'data' => []
            ];

echo json_encode($response); exit;
?>
