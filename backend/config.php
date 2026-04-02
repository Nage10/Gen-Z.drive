<?php
// Gen-Z Drive Configuration
// Security, Database, and Feature Settings

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// =========================
// DATABASE CONFIGURATION
// =========================
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'gen_z_drive');
define('DB_PORT', getenv('DB_PORT') ?: 3306);

// =========================
// APPLICATION SETTINGS
// =========================
define('APP_NAME', 'Gen-Z Drive');
define('APP_VERSION', '1.0.0');
define('APP_ENV', getenv('APP_ENV') ?: 'development');
define('APP_URL', getenv('APP_URL') ?: 'http://localhost');
define('API_URL', APP_URL . '/api');

// =========================
// SECURITY KEYS & TOKENS
// =========================
define('JWT_SECRET', getenv('JWT_SECRET') ?: 'your-super-secret-jwt-key-change-this-in-production');
define('JWT_ALGORITHM', 'HS256');
define('JWT_EXPIRY', 86400); // 24 hours
define('JWT_REFRESH_EXPIRY', 604800); // 7 days

// =========================
// ENCRYPTION SETTINGS
// =========================
define('ENCRYPTION_KEY', getenv('ENCRYPTION_KEY') ?: 'your-32-char-encryption-key-change-this');
define('ENCRYPTION_ALGORITHM', 'AES-256-GCM');

// =========================
// FILE UPLOAD SETTINGS
// =========================
define('MAX_FILE_SIZE', 5 * 1024 * 1024 * 1024); // 5GB
define('MAX_UPLOAD_CHUNK', 100 * 1024 * 1024); // 100MB chunks
define('ALLOWED_EXTENSIONS', ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'jpg', 'jpeg', 'png', 'gif', 'mp4', 'mp3', 'zip', 'rar', 'txt', 'csv']);
define('UPLOAD_DIR', __DIR__ . '/../storage/uploads/');
define('TEMP_DIR', __DIR__ . '/../storage/temp/');
define('THUMBNAIL_DIR', __DIR__ . '/../storage/thumbnails/');

// =========================
// USER & STORAGE SETTINGS
// =========================
define('DEFAULT_STORAGE_QUOTA', 15 * 1024 * 1024 * 1024); // 15GB default
define('MIN_PASSWORD_LENGTH', 8);
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900); // 15 minutes

// =========================
// 2FA SETTINGS
// =========================
define('TOTP_ENABLED', true);
define('TOTP_WINDOW', 1);
define('BACKUP_CODES_COUNT', 10);

// =========================
// RATE LIMITING
// =========================
define('RATE_LIMIT_ENABLED', true);
define('RATE_LIMIT_REQUESTS', 100);
define('RATE_LIMIT_WINDOW', 3600); // 1 hour

// =========================
// EMAIL SETTINGS
// =========================
define('MAIL_HOST', getenv('MAIL_HOST') ?: 'smtp.gmail.com');
define('MAIL_PORT', getenv('MAIL_PORT') ?: 587);
define('MAIL_USERNAME', getenv('MAIL_USERNAME') ?: '');
define('MAIL_PASSWORD', getenv('MAIL_PASSWORD') ?: '');
define('MAIL_FROM', getenv('MAIL_FROM') ?: 'noreply@gen-z-drive.com');
define('MAIL_FROM_NAME', 'Gen-Z Drive');

// =========================
// CORS SETTINGS
// =========================
define('ALLOWED_ORIGINS', [
    'http://localhost:3000',
    'http://localhost:5173',
    getenv('APP_URL') ?: 'http://localhost'
]);

// =========================
// SESSION & COOKIE SETTINGS
// =========================
define('SESSION_TIMEOUT', 1800); // 30 minutes
define('REMEMBER_ME_DURATION', 2592000); // 30 days
define('COOKIE_SECURE', APP_ENV === 'production');
define('COOKIE_HTTPONLY', true);
define('COOKIE_SAMESITE', 'Strict');

// =========================
// API PAGINATION
// =========================
define('DEFAULT_PAGE_SIZE', 20);
define('MAX_PAGE_SIZE', 100);

// =========================
// FEATURE FLAGS
// =========================
define('FEATURE_SHARING', true);
define('FEATURE_2FA', true);
define('FEATURE_ENCRYPTION', true);
define('FEATURE_COMMENTS', true);
define('FEATURE_ACTIVITY_LOG', true);
define('FEATURE_VERSION_HISTORY', true);
define('FEATURE_SEARCH', true);
define('FEATURE_NOTIFICATIONS', true);
define('FEATURE_ADMIN_PANEL', true);
define('FEATURE_API', true);

// =========================
// LOGGING
// =========================
define('LOG_DIR', __DIR__ . '/../logs/');
define('LOG_LEVEL', APP_ENV === 'production' ? 'error' : 'debug');
define('LOG_MAX_SIZE', 10 * 1024 * 1024); // 10MB

// =========================
// THUMBNAIL SETTINGS
// =========================
define('THUMBNAIL_WIDTH', 200);
define('THUMBNAIL_HEIGHT', 200);
define('THUMBNAIL_QUALITY', 85);

// =========================
// PREVIEW SETTINGS
// =========================
define('PREVIEW_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'mp4', 'mp3']);
define('PREVIEW_MAX_FILE_SIZE', 500 * 1024 * 1024); // 500MB

// =========================
// TIMEZONE
// =========================
define('TIMEZONE', getenv('TIMEZONE') ?: 'UTC');
date_default_timezone_set(TIMEZONE);

// =========================
// DEBUG MODE
// =========================
define('DEBUG_MODE', APP_ENV !== 'production');

// Create necessary directories
$dirs = [UPLOAD_DIR, TEMP_DIR, THUMBNAIL_DIR, LOG_DIR];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

?>