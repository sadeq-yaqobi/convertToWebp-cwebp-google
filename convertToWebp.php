<?php
/**
 * Converts images from a source directory to WebP format and saves them in an output directory.
 *
 * @param string $sourceDir The directory where the source images (jpg, jpeg, png) are located.
 * @param string $outputDir The directory where the converted WebP images will be saved. If the directory doesn't exist, it will be created.
 * @param int $quality The quality of the WebP images, ranging from 0 (lowest) to 100 (highest). Defaults to 80 for a balance between quality and compression.
 * @param string $options Additional options for the cwebp command-line tool, such as -lossless, -resize width height, -near_lossless, and -m (compression method). Defaults to an empty string.
          * -lossless: If you're converting a PNG file and want a lossless WebP image, you can add the -lossless flag.
          * -resize width height: Resize the image to the specified width and height during conversion.
          * -near_lossless: This option gives you a near-lossless compression, which provides a balance between compression and quality.
          * -m: Sets the compression method (0 = fastest, 6 = best). The higher the method, the better the compression but at the cost of processing time.
 *
 * This function:
 * - Scans the $sourceDir for all images with extensions .jpg, .jpeg, and .png.
 * - Converts each image to WebP format using the cwebp tool.
 * - Saves the converted images in the $outputDir with the same filename but a .webp extension.
 * - Outputs a success or error message for each image conversion.
 */
function convertToWebP(string $sourceDir, string $outputDir, int $quality = 80, string $options = '') {
    // Check if the output directory exists; if not, create it with appropriate permissions.
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    // Find all jpg, jpeg, and png files in the source directory.
    $images = glob("$sourceDir/*.{jpg,jpeg,png}", GLOB_BRACE);

    // Loop through each image and convert it to WebP format.
    foreach ($images as $image) {
        // Get image information, including directory, filename, and extension.
        $imageInfo = pathinfo($image);
        // Define the output file path and name (same as input, but with .webp extension).
        $outputFile = $outputDir . '/' . $imageInfo['filename'] . '.webp';
        // Construct the cwebp command with quality, options, input file, and output file.
        $command = "cwebp -q $quality $options {$imageInfo['dirname']}/{$imageInfo['basename']} -o $outputFile";

        // Execute the command and capture the output and return status.
        exec($command, $output, $return_var);

        // Check if the command was successful (return status 0) or failed.
        if ($return_var !== 0) {
            echo "Error converting {$imageInfo['basename']} to WebP\n";
        } else {
            echo "{$imageInfo['basename']} converted successfully to WebP\n";
        }
    }
}

// convertToWebp function runs when you call convertToWebp.php in project's root terminal
convertToWebP('assets/img', 'assets/img/webp');
