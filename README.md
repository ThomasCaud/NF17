# NF17 - Projet UTC

## Liens

* Drive général https://drive.google.com/drive/u/1/folders/0Bxtsnr1ewxjgbzhTTjludFY3R1k
* Lien du backlog https://docs.google.com/accounts?continueUrl=https://docs.google.com/spreadsheets/u/1/d/1lDG2n2_jMouWff-4lZatNVSnHDGOi6_r1YBFRsXw9rk/edit?usp%3Ddrive_web#

## Commandes
* git status //Connaître l'état de votre repertoire
* git pull //Récupérer les datas distante
* git commit -m "Indiquer ce que votre commit fait" //Exemple "Permet à l'utilisateur d'ajouter un vin"
* git branch //Connaitre votre branche courante
* git checkout #NomBrancheExistante //Se placer sur une branche qui existe déjà
* git checkout -b #NomNouvelleBrance //Créer et aller sur une nouvelle branche
* git push origin #NomDeVotreBranche //Pousse vos data sur le git

## Bonnes pratiques
* Ne pas commit sur master svp
* Nom des branches : taskX (X = numéro de la tâche sur le backlog)

## Fichier de config de base
```json
{
    "connectionDataBase" : {
        "driver" : "pgsql",
        "host" : "localhost",
        "dbname" : "nf17",
        "username" : "root",
        "password" : null
    }
}
```
