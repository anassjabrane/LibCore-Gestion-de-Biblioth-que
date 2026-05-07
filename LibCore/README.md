📚 LibCore — Système de Gestion de Bibliothèque
📌 Description
LibCore est une application développée en PHP orienté objet permettant de gérer une bibliothèque associative.
Le projet a été réalisé dans le cadre de la formation Développeur Web & Web Mobile afin d’appliquer les concepts de la programmation orientée objet (POO).
L’objectif principal est de remplacer la gestion manuelle des livres via des fichiers Excel par un système structuré, sécurisé et évolutif.

🎯 Objectifs
Le système permet de :
Gérer les livres
Gérer les membres
Emprunter des livres
Retourner des livres
Vérifier la disponibilité des ouvrages
Rechercher des livres
🛠️ Technologies Utilisées
PHP 8
Programmation Orientée Objet (POO)
UML
Git & GitHub
Interface Console (CLI)
📂 Structure du Projet
LibCore/│├── src/│   ├── Entities/│   │   ├── Book.php│   │   ├── User.php│   │   ├── Member.php│   │   └── Librarian.php│   ││   └── Services/│       └── Library.php│├── docs/│   ├── use-case.png│   ├── class-diagram.png│   └── er-diagram.png│├── mainAdmin.php├── mainMember.php├── README.md└── .gitignore

👥 Répartition des Tâches
👤 Sara
Développement de la classe Book
Développement de la classe User
Développement du menu console
Gestion des fonctionnalités Member
👨‍💻 Anass
Structuration du projet
Développement de Librarian
Gestion du catalogue
Organisation de l’architecture
🧱 Concepts POO Utilisés
🔒 Encapsulation
Toutes les propriétés sont privées ou protégées et accessibles via des getters.
🧬 Héritage
Les classes Member et Librarian héritent de la classe User.
🏗️ Composition
La classe Library contient plusieurs objets Book et Member.

⚙️ Fonctionnalités
📘 Gestion des Livres
Ajouter un livre
Vérifier la disponibilité
Rechercher un livre
👤 Gestion des Membres
Créer un membre
Afficher les livres empruntés
🔄 Gestion des Emprunts
Emprunter un livre
Retourner un livre
Empêcher l’emprunt si le livre est indisponible
▶️ Exécution du Projet
📌 Lancer le mode membre
php mainMember.php
📌 Lancer le mode administrateur
php mainAdmin.php
🧪 Exemple de Test
Ajouter un livre
Rechercher un livre
Emprunter un livre
Afficher les livres empruntés
Retourner un livre
📸 UML
Le dossier docs/ contient :
Use Case Diagram
Class Diagram
ERD
🚀 Améliorations Futures
Intégration MySQL
Utilisation de PDO
Interface Web
Authentification
Gestion des pénalités
✅ Conclusion
LibCore nous a permis d’appliquer les principes fondamentaux de la programmation orientée objet en PHP à travers un projet concret de gestion de bibliothèque.
Ce projet nous a aidés à mieux comprendre :
l’encapsulation,
l’héritage,
l’organisation d’un projet backend,
et la logique métier orientée objet.





