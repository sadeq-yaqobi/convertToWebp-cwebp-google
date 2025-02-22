<?php
// Display a message to indicate the script has started.
echo "Starting WebP conversion...\n";

/**
 * Converts images from JPG, JPEG, or PNG format to WebP.
 *
 * @param string $sourceDir Directory containing source images.
 * @param string $outputDir Directory where converted WebP images will be saved.
 * @param int $quality Quality of the WebP images (default: 80).
 * @param string $options Additional options for the cwebp command.
 */
function convertToWebP(string $sourceDir, string $outputDir, int $quality = 80, string $options = '') {
    // Check if the source directory exists, otherwise exit with an error.
    if (!is_dir($sourceDir)) {
        die("Error: Source directory does not exist: $sourceDir\n");
    }

    // Create the output directory if it doesn't exist.
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0777, true);
        echo "Created output directory: $outputDir\n";
    }

    // Find all images with jpg, jpeg, or png extensions in the source directory.
    $images = glob("$sourceDir/*.{jpg,jpeg,png}", GLOB_BRACE);

    // If no images are found, exit with a message.
    if (!$images) {
        die("No images found in $sourceDir\n");
    }

    // Loop through each found image and convert it to WebP format.
    foreach ($images as $image) {
        // Extract image details: directory, filename, and extension.
        $imageInfo = pathinfo($image);
        // Define the output WebP file path (same name, different extension).
        $outputFile = $outputDir . '/' . $imageInfo['filename'] . '.webp';

        // Print which image is being converted.
        echo "Converting {$imageInfo['basename']}...\n";

        // Construct the cwebp command with quality, options, input file, and output file.
        $command = "cwebp -q $quality $options {$imageInfo['dirname']}/{$imageInfo['basename']} -o $outputFile";
        exec($command, $output, $return_var); // Execute the command.

        // Check if the command executed successfully.
        if ($return_var !== 0) {
            echo "❌ Error converting {$imageInfo['basename']} to WebP\n";
        } else {
            echo "✅ Successfully converted: $outputFile\n";
        }
    }
}

// Ensure the script is called with correct arguments.
if ($argc < 3) {
    die("Usage: php convertToWebp.php source_directory output_directory [quality]\n");
}

// Get command-line arguments: source directory, output directory, and optional quality.
$sourceDir = $argv[1];
$outputDir = $argv[2];
$quality = $argv[3] ?? 80; // Default quality is 80 if not provided.

// Call the conversion function.
convertToWebP($sourceDir, $outputDir, $quality);
