<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get file URL and file name from the form
    $fileUrl = $_POST['fileUrl'];
    $fileName = $_POST['fileName'];

    // Check if the file URL is not empty
    if (!empty($fileUrl)) {
        // Set headers for the download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fileUrl));

        // Read the file and output it to the browser
        ob_clean();
        flush();
        readfile($fileUrl);
        exit;
    } else {
        // Handle error if file URL is empty
        die('Error: File URL is required');
    }
}
?>
