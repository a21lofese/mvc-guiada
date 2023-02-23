<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Index</title>
</head>

<body>
    <h1>MVC</h1>
    <ul>
        <?php
        foreach ($data['message'] as $value) {
            echo '<li>' . $value . '</li>';
        }
        ?>
    </ul>
</body>

</html>