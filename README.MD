# Image Converter to WebP

This repository provides two scripts—one in PHP and another in JavaScript—to convert images from PNG, JPEG, and JPG formats to WebP format using the `cwebp` command-line tool. These scripts allow you to easily optimize images for web usage by reducing their file size while maintaining quality.

## Features

- Converts `.png`, `.jpeg`, and `.jpg` images to WebP format.
- Supports custom quality settings.
- Allows additional options such as lossless conversion, resizing, near-lossless compression, and specifying the compression method.
- Automatically creates the output directory if it doesn't exist.
- Provides success and error messages for each image conversion.

## Requirements

- **cwebp**: The command-line tool for converting images to WebP format. You can install it via:
  - **Linux**: `sudo apt-get install webp`
  - **macOS**: `brew install webp`
  - **Windows**: Download the WebP binaries from [Google WebP](https://developers.google.com/speed/webp/download) and add the `cwebp` executable to your system's PATH.

- **PHP**: Required if you plan to use the `convertToWebp.php` script.
- **Node.js**: Required if you plan to use the `convertToWebp.js` script.

## Directory Structure

The scripts assume the following directory structure:

notic: depend to your choose to use php or js way, you need just one of convertToWebp.php or convertToWebp.js

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

 **Navigate to the root of your project**:
   ```bash
   cd /path/to/your/project-root  
  ```
### Using the PHP Script

The PHP script is convertToWebp.php and can be used to convert images in a specified directory.

  **Step 1:** Modify the Script (Optional)

   You can edit the script to change the source and output directories, quality, and options:
  
   ```
   convertToWebP('assets/img', 'assets/img/webp');
   ```

- sourceDir: The directory where your source images are located.
- outputDir: The directory where converted WebP images will be saved.
- quality: Quality of the WebP images (default is 80).
- options: Additional cwebp options such as :

   - -lossless: For lossless conversion of PNG images.

   - -resize width height: Resize the image during conversion.
  
   - -near_lossless: Near-lossless compression.
   - -m: Compression method (0 for fastest, 6 for best).


- **Step 1:** Run the PHP script:

   ```bash
   php convertToWebP.php
   ```

This will convert all .jpg, .jpeg, and .png images in the assets/img directory to WebP format and save them in the assets/img/webp directory.

### Using the Node.js Script

1. **Install necessary Node.js dependencies** (if required):

  ``` bash
  npm install
  ```

 2. **Run the Node.js script:**

  ```bash
  node convertToWebP.js
```

### Troubleshooting
 - If you encounter an error during conversion, ensure that the cwebp command is properly installed and accessible in your terminal's PATH.
   - Check file permissions to ensure the script can read images from the source directory and write to the output directory.