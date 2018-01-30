<head>

    <title>design site html css </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/articleMiniature.css">





</head>

<body>

<div class="admin-panel clearfix">
    <div class="slidebar">
        <div class="logo">
            <a href=""></a>
        </div>
        <ul>
            <li><a href="#menuPrincipal" id="targeted">Menu Principal</a></li>
            <li><a href="#mesArticles">Mes Articles</a></li>
            <li><a href="#commentaires">Mes Commentaires</a></li>
            <li><a href="#informations">Mes Informations</a></li>
            <li><a href="#contactAdmin">Contacter un Admin</a></li>
            <li><a href="#messagerie">Messagerie</a></li>
            <li><a href="#mdp">Changer son MDP</a></li>
            <li><a href="../php/main.php">Mon Blog</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="mainContent clearfix">

            <div id="menuPrincipal">
                <?php include_once '../php/admin/menuPrincipal.php'; ?>
            </div>

            <div id="mesArticles">
                <span id="zone-articles">
                    <?php include_once '../php/admin/mesArticles.php'; ?>
                </span>

                <div class="zone-button">

                    <button class="prev-button"><<- PREV</button>
                    <button class="next-button">NEXT ->></button>

                </div>

            </div>

            <div id="commentaires" class="content-admin">
                <?php include_once '../php/admin/commentaires.php'; ?>
            </div>

            <div id="informations" class="content-admin">
                <?php include_once '../php/admin/informations.php'; ?>
            </div>

            <div id="contactAdmin" class="content-admin">
                <?php include_once '../php/admin/contactAdmin.php'; ?>
            </div>

            <div id="messagerie" class="content-admin">
                <?php include_once '../php/admin/messagerie.php'; ?>
            </div>

             <div id="mdp" class="content-admin">
                 <?php include_once '../php/admin/mdp.php'; ?>
            </div>
        </div>

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript permet d'utiliser les fonctionalité avancer de bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="../js/adminButton.js"></script>
<script src="../js/adminFullArticle.js"></script>
<script src="../js/admin.js"></script>



</body>