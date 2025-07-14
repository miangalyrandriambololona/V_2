<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        nav {
            background-color: #708238; /* olive verte */
            padding: 15px 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin: 50px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 40px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #556B2F; /* olive foncé */
        }

      
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="../pages/liste_objet.php">🏠 Home</a></li>
            <li><a href="../pages/fiche_objet.php">📄 Fiche Objet</a></li>
            <li><a href="../pages/login.php">🚪 Déconnexion</a></li>
        </ul>
    </nav>

  
</body>
</html>
