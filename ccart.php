<?php
// تحديد اسم الملف بناءً على الصفحة الحالية
$filePath = "data/offers.json";

// قراءة المنتجات من الملف
$products = [];
if (file_exists($filePath)) {
    $products = json_decode(file_get_contents($filePath), true);
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>المنتجات - العروض</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f9f9f9; }
        .product { border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; background: #fff; border-radius: 8px; width: 250px; display: inline-block; vertical-align: top; margin-right: 10px; }
        .product img { max-width: 100%; height: auto; border-radius: 5px; }
        .product h3 { margin: 10px 0 5px; }
    </style>
</head>
<body>
    <h2>🛍️ المنتجات - قسم العروض</h2>

    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="product">
                <?php if (!empty($product['image'])): ?>
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="صورة المنتج">
                <?php endif; ?>
                <h3><?= htmlspecialchars($product['name']) ?></h3>
                <p>الكمية: <?= htmlspecialchars($product['count']) ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>لا توجد منتجات حالياً في هذا القسم.</p>
    <?php endif; ?>
</body>
</html>
