<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsTech</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }

        /* Header Styling */
        header {
            background: linear-gradient(to right, #222, #444);
            color: #fff;
            padding: 1rem 0;
            text-align: center;
            border-bottom: 4px solid #f39c12;
        }

        header .logo {
            font-size: 2.5rem;
            font-weight: bold;
        }

        header .logo strong {
            color: #f39c12;
        }

        /* Navigation Styling */
        nav {
            background: #333;
            color: #fff;
            padding: 0.5rem 0;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
        }

        nav ul li {
            margin: 0 0.5rem;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            background-color: #444;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        nav ul li a:hover {
            background-color: #f39c12;
            transform: scale(1.05);
        }

        /* Main Content Styling */
        .main-content {
            display: flex;
            gap: 1.5rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }

        .sidebar {
            background: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            flex: 1;
            min-width: 250px;
        }

        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid #f39c12;
            padding-bottom: 0.5rem;
            color: #333;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            margin: 1rem 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            background-color: #f39c12;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #d9831e;
            transform: translateX(5px);
        }

        .articles {
            flex: 2;
            background: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            height: auto;
        }

        .article {
            margin-bottom: 2rem;
            cursor: pointer;
        }

        .article img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .article img:hover {
            transform: scale(1.02);
        }

        .article h2 {
            margin: 1rem 0;
            font-size: 1.8rem;
            color: #333;
        }

        .article p {
            color: #666;
            margin-bottom: 0.5rem;
        }

        .article .read-more {
            color: #f39c12;
            text-decoration: none;
            cursor: pointer;
        }

        .article .read-more:hover {
            text-decoration: underline;
        }

        /* Small Articles Section */
        .small-articles {
            flex: 1;
            background: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-height: 600px;
            overflow-y: auto;
        }

        .small-article {
            display: flex;
            margin-bottom: 1rem;
            cursor: pointer;
        }

        .small-article img {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            margin-right: 1rem;
        }

        .small-article h3 {
            font-size: 1.2rem;
            color: #333;
        }

        .small-article p {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }

        /* Popup Styling */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .popup-content {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            max-width: 800px;
            width: 90%;
            position: relative;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            max-height: 80%;
            overflow-y: auto;
        }

        .popup-content img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .popup-content h2 {
            margin-bottom: 1rem;
            font-size: 2rem;
            color: #333;
        }

        .popup-content p {
            color: #555;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            color: #333;
            cursor: pointer;
            background: none;
            border: none;
        }

        .close-btn:hover {
            color: #f39c12;
        }

        footer {
            background: #222;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            border-top: 4px solid #f39c12;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            News<strong>Tech</strong>
        </div>
    </header>

    <nav>
        <ul id="navCategories">
            <!-- Categories will be inserted here by JavaScript -->
        </ul>
    </nav>

    <div class="container main-content">
        <aside class="sidebar">
            <h2>Categories</h2>
            <ul id="sidebarCategories">
                <!-- Categories will be inserted here by JavaScript -->
            </ul>
        </aside>

        <div class="articles" id="articlesContainer">
            <!-- Articles will be inserted here by JavaScript -->
        </div>

        <aside class="small-articles">
            <h2>All Articles</h2>
            <div id="allArticlesContainer">
                <!-- Small article boxes will be inserted here by JavaScript -->
            </div>
        </aside>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} NewsTech. All rights reserved.</p>
    </footer>

    <!-- Popup Overlay -->
    <div class="popup-overlay" id="popup">
        <div class="popup-content">
            <button class="close-btn" onclick="closePopup()">×</button>
            <img id="popupImage" src="" alt="Article Image">
            <h2 id="popupTitle"></h2>
            <p id="popupContent"></p>
        </div>
    </div>

    <script>
        const categories = @json($categories);
        const articles = @json($articles);

        function renderCategories() {
            const navCategories = document.getElementById('navCategories');
            const sidebarCategories = document.getElementById('sidebarCategories');

            categories.forEach(category => {
                const categoryItem = `<li><a href="#" onclick="filterArticles(${category.id})">${category.name}</a></li>`;
                navCategories.innerHTML += categoryItem;
                sidebarCategories.innerHTML += categoryItem;
            });
        }

        function renderArticles(filteredArticles) {
            const articlesContainer = document.getElementById('articlesContainer');
            articlesContainer.innerHTML = '';

            filteredArticles.forEach(article => {
                const imageUrl = article.image ? `/images/${article.image}` : 'https://via.placeholder.com/600x400';
                const articleElement = `
                    <div class="article" onclick="openPopup(${article.id})">
                        <img src="${imageUrl}" alt="${article.title}">
                        <h2>${article.title}</h2>
                        <p>${article.excerpt || article.content.substring(0, 150) + '...'}</p>
                        <a href="#" class="read-more" onclick="openPopup(${article.id})">Read more</a>
                    </div>
                `;
                articlesContainer.innerHTML += articleElement;
            });
        }

        function renderSmallArticles() {
            const allArticlesContainer = document.getElementById('allArticlesContainer');
            allArticlesContainer.innerHTML = '';

            articles.forEach(article => {
                const imageUrl = article.image ? `/images/${article.image}` : 'https://via.placeholder.com/70x70';
                const smallArticleElement = `
                    <div class="small-article" onclick="openPopup(${article.id})">
                        <img src="${imageUrl}" alt="${article.title}">
                        <div>
                            <h3>${article.title}</h3>
                            <p>${article.excerpt || article.content.substring(0, 50) + '...'}</p>
                        </div>
                    </div>
                `;
                allArticlesContainer.innerHTML += smallArticleElement;
            });
        }

        function filterArticles(categoryId) {
            const filteredArticles = articles.filter(article => article.category_id === categoryId);
            renderArticles(filteredArticles);
        }

        function openPopup(articleId) {
            const article = articles.find(article => article.id === articleId);
            document.getElementById('popupTitle').innerText = article.title;
            document.getElementById('popupContent').innerText = article.content;
            document.getElementById('popupImage').src = article.image ? `/images/${article.image}` : 'https://via.placeholder.com/800x600';
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        // Initialize
        renderCategories();
        renderArticles(articles); // Show all articles initially
        renderSmallArticles();
    </script>
</body>
</html>
