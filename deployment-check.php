<?php
/**
 * Deployment Check Script
 * Script sederhana untuk mengecek status deployment Laravel di cPanel
 * 
 * Akses: yourdomain.com/deployment-check.php
 * Hapus file ini setelah deployment berhasil untuk keamanan
 */

echo "<h1>Laravel Deployment Check</h1>";
echo "<hr>";

// Check PHP Version
echo "<h2>PHP Information</h2>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Server: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "<br>";

// Check Laravel Files
echo "<h2>Laravel Files Check</h2>";
$laravelFiles = [
    'artisan',
    'composer.json',
    '.env',
    'app',
    'bootstrap',
    'config',
    'database',
    'public',
    'resources',
    'routes',
    'storage',
    'vendor'
];

foreach ($laravelFiles as $file) {
    $status = file_exists($file) ? "✅ EXISTS" : "❌ MISSING";
    echo "$file: $status<br>";
}

echo "<br>";

// Check Permissions
echo "<h2>Permission Check</h2>";
$permissionCheck = [
    'storage' => 'storage',
    'bootstrap/cache' => 'bootstrap/cache',
    'public' => 'public'
];

foreach ($permissionCheck as $name => $path) {
    if (file_exists($path)) {
        $perms = substr(sprintf('%o', fileperms($path)), -4);
        $writable = is_writable($path) ? "✅ WRITABLE" : "❌ NOT WRITABLE";
        echo "$name ($perms): $writable<br>";
    } else {
        echo "$name: ❌ NOT FOUND<br>";
    }
}

echo "<br>";

// Check Environment
echo "<h2>Environment Check</h2>";
if (file_exists('.env')) {
    echo ".env file: ✅ EXISTS<br>";
    
    // Read .env safely
    $envContent = file_get_contents('.env');
    if (strpos($envContent, 'APP_KEY=') !== false) {
        preg_match('/APP_KEY=(.*)/', $envContent, $matches);
        $appKey = isset($matches[1]) ? trim($matches[1]) : '';
        echo "APP_KEY: " . ($appKey ? "✅ SET" : "❌ NOT SET") . "<br>";
    }
    
    if (strpos($envContent, 'APP_ENV=') !== false) {
        preg_match('/APP_ENV=(.*)/', $envContent, $matches);
        $appEnv = isset($matches[1]) ? trim($matches[1]) : '';
        echo "APP_ENV: " . ($appEnv ?: "NOT SET") . "<br>";
    }
} else {
    echo ".env file: ❌ NOT FOUND<br>";
    echo "Create .env file from .env.example<br>";
}

echo "<br>";

// Database Connection Test (optional)
echo "<h2>Database Connection</h2>";
if (file_exists('.env') && file_exists('vendor/autoload.php')) {
    try {
        require_once 'vendor/autoload.php';
        
        // Load environment variables
        if (class_exists('Dotenv\Dotenv')) {
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();
        }
        
        $host = $_ENV['DB_HOST'] ?? 'localhost';
        $dbname = $_ENV['DB_DATABASE'] ?? '';
        $username = $_ENV['DB_USERNAME'] ?? '';
        $password = $_ENV['DB_PASSWORD'] ?? '';
        
        if ($host && $dbname && $username) {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            echo "Database Connection: ✅ SUCCESS<br>";
            echo "Database: $dbname on $host<br>";
        } else {
            echo "Database Connection: ❌ Missing database configuration<br>";
        }
    } catch (Exception $e) {
        echo "Database Connection: ❌ FAILED<br>";
        echo "Error: " . $e->getMessage() . "<br>";
    }
} else {
    echo "Cannot test database connection: Missing .env or vendor files<br>";
}

echo "<br>";

// Laravel Artisan Check
echo "<h2>Laravel Artisan</h2>";
if (file_exists('artisan')) {
    echo "Artisan file: ✅ EXISTS<br>";
    
    // Try to run artisan command
    $output = shell_exec('php artisan --version 2>&1');
    if ($output) {
        echo "Artisan version: " . trim($output) . "<br>";
    } else {
        echo "Artisan execution: ❌ FAILED<br>";
    }
} else {
    echo "Artisan file: ❌ NOT FOUND<br>";
}

echo "<br>";
echo "<hr>";
echo "<p><strong>Note:</strong> Hapus file ini setelah deployment berhasil untuk keamanan!</p>";
echo "<p>File location: " . __FILE__ . "</p>";
?>
