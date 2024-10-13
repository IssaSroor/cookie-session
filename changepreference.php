<?php
session_start();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store theme and language preferences in the session
    $_SESSION['theme'] = $_POST['theme'];
    $_SESSION['language'] = $_POST['language'];
}

// Set default preferences if not set
$theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light';
$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'en';
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Preferences</title>
    <!-- Apply CSS based on the selected theme -->
    <?php if ($theme == 'dark'): ?>
        <style>
            body {
                background-color: #333;
                color: #fff;
            }
        </style>
    <?php else: ?>
        <style>
            body {
                background-color: #fff;
                color: #000;
            }
        </style>
    <?php endif; ?>
</head>
<body>

<div class="container">
    <h1><?php echo ($language == 'en') ? 'User Preferences' : 'تفضيلات المستخدم'; ?></h1>
    
    <form method="post" action="">
        <!-- Theme Selection -->
        <label for="theme"><?php echo ($language == 'en') ? 'Select Theme' : 'اختر النمط'; ?>:</label>
        <select name="theme" id="theme">
            <option value="light" <?php echo ($theme == 'light') ? 'selected' : ''; ?>>
                <?php echo ($language == 'en') ? 'Light' : 'فاتح'; ?>
            </option>
            <option value="dark" <?php echo ($theme == 'dark') ? 'selected' : ''; ?>>
                <?php echo ($language == 'en') ? 'Dark' : 'داكن'; ?>
            </option>
        </select>
        
        <!-- Language Selection -->
        <label for="language"><?php echo ($language == 'en') ? 'Select Language' : 'اختر اللغة'; ?>:</label>
        <select name="language" id="language">
            <option value="en" <?php echo ($language == 'en') ? 'selected' : ''; ?>>English</option>
            <option value="ar" <?php echo ($language == 'ar') ? 'selected' : ''; ?>>العربية</option>
        </select>
        
        <button type="submit"><?php echo ($language == 'en') ? 'Save Preferences' : 'احفظ التفضيلات'; ?></button>
    </form>
    
    <!-- Display preferences -->
    <p><?php echo ($language == 'en') ? 'Your selected theme is: ' : 'النمط المختار هو: '; ?><?php echo $theme; ?></p>
    <p><?php echo ($language == 'en') ? 'Your selected language is: ' : 'اللغة المختارة هي: '; ?><?php echo $language; ?></p>
</div>

</body>
</html>
