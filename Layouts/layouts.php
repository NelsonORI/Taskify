<?php
class layouts {
    public function heading($conf) {
        // Start the HTML document and add the Bootstrap links in the <head>
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $conf['site_name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="display-4 text-center"><?php echo $conf['site_name']; ?></h1>
        <p class="lead text-center">Welcome to our Platform!</p>
    </div>
    <?php
    }

    public function welcome($conf) {
        echo "<p class='text-center'>Sign up to checkout all our features.</p>";
    }

    public function footer($conf) {
        ?>
    <footer class="mt-5 text-center">
        Copyright &copy; <?php echo date("Y"); ?> <?php echo $conf['site_name']; ?>
        <br>Contact us at <a href='mailto:<?php echo $conf['site_email']; ?>'><?php echo $conf['site_email']; ?></a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
        <?php
    }
}
?>