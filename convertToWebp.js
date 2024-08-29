const { execSync } = require('child_process');
const fs = require('fs');
const path = require('path');

// Define the directory containing the source images and the output directory for WebP images.
const imgDir = path.join(__dirname, 'assets', 'img');
const webpDir = path.join(imgDir, 'webp');

// Optional cwebp command-line tool parameters to control the conversion process.
// -lossless: Enables lossless conversion for PNG files.
// -resize width height: Resizes the image to the specified width and height during conversion.
// -near_lossless: Provides near-lossless compression, balancing between compression and quality.
// -m: Specifies the compression method (0 = fastest, 6 = best). Higher values result in better compression at the cost of longer processing time.
let options = ''; // Default is an empty string. Modify this variable to include desired options.

/**
 * This script performs the following tasks:
 *
 * 1. Checks if the output directory (webpDir) exists. If it does not, it creates the directory.
 * 2. Reads all image files with extensions .png, .jpg, and .jpeg from the input directory (imgDir).
 * 3. For each image, constructs the full file paths for both the input and the output (WebP) files.
 * 4. Executes the `cwebp` command-line tool to convert each image to WebP format, applying the specified quality and additional options.
 * 5. Logs a success message for each successfully converted image and an error message if the conversion fails.
 *
 * **Usage:**
 * To use this script, set the appropriate `options` string variable to include any additional cwebp parameters you require.
 * Ensure the `cwebp` tool is installed and accessible in your system's PATH.
 */

// Create the webp directory if it doesn't exist
if (!fs.existsSync(webpDir)) {
    fs.mkdirSync(webpDir);
}

// Get all images from the directory
const images = fs.readdirSync(imgDir).filter(file => /\.(png|jpe?g)$/i.test(file));

// Convert each image to WebP format
images.forEach(image => {
    const imgPath = path.join(imgDir, image);
    const webpPath = path.join(webpDir, `${path.parse(image).name}.webp`);
    try {
        execSync(`cwebp -q 80 ${options} "${imgPath}" -o "${webpPath}"`);
        console.log(`Converted ${image} to WebP format.`);
    } catch (error) {
        console.error(`Error converting ${image}: ${error.message}`);
    }
});
