Base-API
========

**Réalisé par Mavillaz Rémi**

Github KizeRemi: https://github.com/KizeRemi  

Projet Symfony regroupant les bundles et configs afin de créer une API Restful 

## Installation

Pré-requis : Composer

Ouvrez le terminal de votre ordinateur, allez dans le dossier d'installation du projet et cloner le dépot

```
git clone https://github.com/KizeRemi/base-api.git

```

Puis
```
composer install

```

Ouvrez le terminal de votre ordinateur, allez dans le dossier d'installation du projet et cloner le dépot.

Allez dans le dépot et faites les commandes suivantes pour créer une clé SSL

```
cd base-api
mkdir -p app/var/jwt
openssl genrsa -out app/var/jwt/private.pem -aes256 4096
openssl rsa -pubout -in app/var/jwt/private.pem -out var/jwt/public.pem

```

## Connexion utilisateur

Pour créer un utilisateur, aller sur la route /user en POST avec en paramètre:
- username
- password
- password_confirmation
- email

Puis pour se log, aller sur le route /login_check en POST avec en paramètre:
- _username
- _password

L'api renvoit un token de connexion, nécessaire pour accéder à toutes les URL de l'api.
Il faut donc envoyer dans le header:
Authorization => Bearer montokenutilisateur



