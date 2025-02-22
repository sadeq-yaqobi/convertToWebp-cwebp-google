# Image Converter to WebP

This repository provides two scripts—one in PHP and another in JavaScript—to convert images from PNG, JPEG, and JPG formats to WebP format using the `cwebp` command-line tool. These scripts allow you to optimize images for web usage by reducing their file size while maintaining quality.

## Features

- Converts `.png`, `.jpeg`, and `.jpg` images to WebP format.
- Supports custom quality settings (default: 80).
- Allows additional options such as lossless conversion, resizing, near-lossless compression, and specifying the compression method.
- Automatically creates the output directory if it doesn't exist.
- Provides detailed success and error messages for each image conversion.
- Validates input parameters and ensures the source directory exists before execution.
- Can be run with command-line arguments for dynamic source and output directories.

## Requirements

- **cwebp**: The command-line tool for converting images to WebP format. Install it via:
  - **Linux**: `sudo apt-get install webp`
  - **macOS**: `brew install webp`
  - **Windows**: Download the WebP binaries from [Google WebP](https://developers.google.com/speed/webp/download) and add the `cwebp` executable to your system's PATH.

- **PHP**: Required if you plan to use the `convertToWebp.php` script.
- **Node.js**: Required if you plan to use the `convertToWebp.js` script.

## Directory Structure

Depending on whether you choose to use the PHP or JavaScript approach, you only need one of `convertToWebp.php` or `convertToWebp.js`.

```plaintext
project-root/
├── assets/
│   ├── img/ # Directory containing the images to be converted
│   │   ├── example.jpg
│   │   ├── webp/ # Directory where converted WebP images will be saved
│   │   │   ├── example.webp
├── convertToWebp.php # PHP script for image conversion
└── convertToWebp.js # Node.js script for image conversion
```

## Usage

### Using the PHP Script

The PHP script `convertToWebp.php` can be used to convert images in a specified directory.

#### Step 1: Run the PHP script

Navigate to the project root directory:
   ```bash
   cd /path/to/your/project-root  
   ```

Run the script with the required parameters:
   ```bash
   php convertToWebp.php source_directory output_directory [quality]
   ```

- **source_directory**: The directory where your source images are located.
- **output_directory**: The directory where converted WebP images will be saved.
- **quality** (optional): The WebP quality setting (default is 80).

Example usage:
   ```bash
   php convertToWebp.php assets/img/bamrose/2024/01 assets/img/bamrose/2024/01/webp 90
   ```

This will convert all `.jpg`, `.jpeg`, and `.png` images in the `assets/img/bamrose/2024/01` directory to WebP format and save them in `assets/img/bamrose/2024/01/webp` with a quality setting of 90.

### Using the Node.js Script

1. **Install necessary Node.js dependencies** (if required):
   ```bash
   npm install
   ```

2. **Run the Node.js script:**
   ```bash
   node convertToWebP.js
   ```

## Troubleshooting

- If you encounter an error during conversion, ensure that the `cwebp` command is properly installed and accessible in your terminal's PATH.
- Check file permissions to ensure the script can read images from the source directory and write to the output directory.
- Ensure you provide the correct number of arguments when running the PHP script.

---

This repository makes it easy to convert images to WebP format using either PHP or JavaScript. Choose the method that best fits your workflow and enjoy faster, optimized images! 🚀

