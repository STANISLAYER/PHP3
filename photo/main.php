<?php
// Путь к директории с изображениями в файловой системе и URL-путь для <img>
$fsDir  = __DIR__ . '/image';
$webDir = 'image/';

// Проверяем, что директория существует и читается
if (!is_dir($fsDir)) {
    die('Ошибка: директория изображений не найдена: ' . htmlspecialchars($fsDir));
}

$files = scandir($fsDir);
if ($files === false) {
    die('Ошибка: не удалось прочитать директорию изображений: ' . htmlspecialchars($fsDir));
}

// Оставляем только файлы с расширениями изображений
$images = array_filter($files, function($file) use ($fsDir) {
    return is_file($fsDir . '/' . $file)
        && preg_match('/\.(jpe?g|png|gif)$/i', $file);
});


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея изображений</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>Галерея изображений</h2>
        <div class="gallery">
            <?php foreach ($images as $image): ?>
                <div class="gallery-item">
                    <img src="<?= htmlspecialchars($webDir . $image); ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
