<head>
    <link rel='stylesheet' href='../assets/css/header.css'>
</head>

<body>

    <header class='site-header'>

        <a href="../src/home.php">
            <img class='brand-icon' src='../assets/img/application_Icon.png'>
        </a>

        <a href="../src/home.php" class="center-icon">
            <img src='../assets/img/mugen_unagi.PNG'>
        </a>

        <div id="s_app">
            <input type='text' class='search-box' v-model="keyword">
            <button class='search-button' @click="fetchSearchThreads()">
                <img src='../assets/img/icons8-search-50.png'>
            </button>
        </div>
    </header>
</body>