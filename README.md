Wiki-API
========

**Réalisé par Mavillaz Rémi and Paul Girardin**

Github KizeRemi: https://github.com/KizeRemi  
GitHub PaulGirardin: https://github.com/PaulGirardin

Projet Wiki pour une école primaire. Le projet est décomposé en 2 parties : API et Interface utilisateur. Ce dépot comporte uniquement la partie API réalisée sous Symfony 3.2

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



