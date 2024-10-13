<?php
// Check if form is submitted and set cookies for language and theme
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $language = $_POST['language'];
    $theme = $_POST['theme'];
    
    // Set cookies to expire in 30 days
    setcookie('language', $language, time() + (30 * 24 * 60 * 60), '/');
    setcookie('theme', $theme, time() + (30 * 24 * 60 * 60), '/');
    
    // Reload page to apply the new preferences
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Check if cookies are set and retrieve values
$language = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'English';
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie-based User Preferences</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Apply dark or light theme based on cookie value */
        body {
            background-color: <?php echo $theme == 'dark' ? '#333' : '#fff'; ?>;
            color: <?php echo $theme == 'dark' ? '#fff' : '#000'; ?>;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo ($language == 'English') ? 'User Preferences' : 'تفضيلات المستخدم'; ?></h1>
    
    <form method="post" action="">
        <!-- Theme Selection -->
        <label for="theme"><?php echo ($language == 'English') ? 'Select Theme' : 'اختر النمط'; ?>:</label>
        <select name="theme" id="theme">
            <option value="light" <?php echo ($theme == 'light') ? 'selected' : ''; ?>>
                <?php echo ($language == 'English') ? 'Light' : 'فاتح'; ?>
            </option>
            <option value="dark" <?php echo ($theme == 'dark') ? 'selected' : ''; ?>>
                <?php echo ($language == 'English') ? 'Dark' : 'داكن'; ?>
            </option>
        </select>
        
        <!-- Language Selection -->
        <label for="language"><?php echo ($language == 'English') ? 'Select Language' : 'اختر اللغة'; ?>:</label>
        <select name="language" id="language">
            <option value="English" <?php echo ($language == 'English') ? 'selected' : ''; ?>>English</option>
            <option value="Arabic" <?php echo ($language == 'Arabic') ? 'selected' : ''; ?>>العربية</option>
        </select>
        
        <button type="submit" class="btn btn-primary"><?php echo ($language == 'English') ? 'Save Preferences' : 'احفظ التفضيلات'; ?></button>
    </form>
    
    <!-- Display preferences -->
    <p><?php echo ($language == 'English') ? 'Your selected theme is: ' : 'النمط المختار هو: '; ?><?php echo htmlspecialchars($theme); ?></p>
    <p><?php echo ($language == 'English') ? 'Your selected language is: ' : 'اللغة المختارة هي: '; ?><?php echo htmlspecialchars($language); ?></p>
</div>

</body>
</html>
