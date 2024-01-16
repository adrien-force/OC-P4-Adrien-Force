# EN - The ArtBox

## Project Description
The ArtBox is a project aimed at creating an online art gallery. It allows users to browse and purchase artwork from various artists. This README file provides an overview of the project and instructions on how to clone the repository and import the database.

## Clone the Repository
To clone the repository, follow these steps:
1. Open your terminal or command prompt.
2. Navigate to the directory where you want to clone the repository.
3. Run the following command:
    ```
    git clone https://github.com/username/repo.git
    ```
    Replace `username` with your GitHub username and `repo` with the name of the repository.

## Import the Database
To import the database, follow these steps:
1. Make sure you have MySQL installed on your system.
2. Open your MySQL client (e.g., MySQL Workbench).
3. Create a new database with the desired name (e.g., `artbox_db`).
4. Import the database dump file provided in the repository. You can find the dump file in the `database` directory.
    ```
    mysql -u username -p artbox_db < path/to/dump/file.sql
    ```
    Replace `username` with your MySQL username, `artbox_db` with the name of the database, and `path/to/dump/file.sql` with the actual path to the dump file.

That's it! You have successfully cloned the repository and imported the database. You can now start exploring and working on The ArtBox project.

# FR - The ArtBox

## Description du projet
The ArtBox est un projet visant à créer une galerie d'art en ligne. Il permet aux utilisateurs de parcourir et d'acheter des œuvres d'art de différents artistes. Ce fichier README fournit un aperçu du projet et des instructions sur la façon de cloner le dépôt et d'importer la base de données.

## Cloner le dépôt
Pour cloner le dépôt, suivez ces étapes :
1. Ouvrez votre terminal ou votre invite de commande.
2. Naviguez jusqu'au répertoire dans lequel vous souhaitez cloner le dépôt.
3. Exécutez la commande suivante :
    ```
    git clone https://github.com/username/repo.git
    ```
    Remplacez `username` par votre nom d'utilisateur GitHub et `repo` par le nom du dépôt.

## Importer la base de données
Pour importer la base de données, suivez ces étapes :
1. Assurez-vous d'avoir MySQL installé sur votre système.
2. Ouvrez votre client MySQL (par exemple, MySQL Workbench).
3. Créez une nouvelle base de données avec le nom souhaité (par exemple, `artbox_db`).
4. Importez le fichier de sauvegarde de la base de données fourni dans le dépôt. Vous pouvez trouver le fichier de sauvegarde dans le répertoire `database`.
    ```
    mysql -u username -p artbox_db < path/to/dump/file.sql
    ```
    Remplacez `username` par votre nom d'utilisateur MySQL, `artbox_db` par le nom de la base de données et `path/to/dump/file.sql` par le chemin réel vers le fichier de sauvegarde.

C'est tout ! Vous avez réussi à cloner le dépôt et à importer la base de données. Vous pouvez maintenant commencer à explorer et à travailler sur le projet The ArtBox.
