<?php
    session_start();
    $_COOKIE['message'] += 1;
    setcookie('message', $_COOKIE['message']);

    echo $_COOKIE['message'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>design site html css </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/article.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <link rel="stylesheet" href="https://anijs.github.io/lib/anicollection/anicollection.css" />

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">




</head>


<body>

    <main class="container">

        <div class="row">
            <header>
                <?php include_once '../html/header.php'; ?>
            </header>
        </div>
    </main>

    <div class="projecteur">
        <h2>Welcolme to THE Blog</h2>
    </div>

    <div id="rssincl-box-container-1169349"></div>
    <script type="text/javascript">
        (function() {
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
            s.src = 'http://output95.rssinclude.com/output?type=asyncjs&id=1169349&hash=f0af039d035b7788f729db02544db2b1';
            document.getElementsByTagName('head')[0].appendChild(s);
        })();
    </script>

    <main class="container">

        <?php
            include_once 'wrapper.php'
        ?>

        <div class="zoneText">
            <?php
                include_once ('./afficheAllArticles.php');
            ?>
        </div>


    </main>
</body>



    <?php
        include_once 'script.php';
    ?>


</html>
