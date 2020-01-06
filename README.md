SocialBox-V1.0
===
Progetto Web Programming
---
**Idea**: Social network che permette ad ogni utente registrato di poter effettuare l'upload di immagini.
Ogni immagine pubblicata è possibile giudicarla con un tip positivo o negativo.
Nella sezione privata l'utente visualizzerà qualche indice statistico su come sono giudicati i suoi post.

---
**Requisiti**

* Registrazione utente
    * Nome
    * Cognome
    * Email
    * Nickname
    * Password
    * Foto profilo
    * Biografia
* Login utente
* Upload immagini, compressione e ridimenzionamento quadrato
* Tip positivo, negativo e delta (Like)
* Profilo utente con info personali e grafici per l'andamento dei post
* Gestione dello spazio web per l'upload delle immagini
* Funzione "Cerca Utenti"

---

**Link alle risorse**

Template: https://colorlib.com/preview/#cocoon

[PHP] Image Optimization and compression: http://image.intervention.io/getting_started/installation

[JS] Libreria grafici: https://www.chartjs.org/

[HTML5, JS] Upload drag and drop: https://itnext.io/integrating-dropzone-with-javascript-image-cropper-optimise-image-upload-e22b12ac0d8a

**Setup Applicazione**

Step:
* Clonare il repository GIT
* Installare XAMP/MAMP o simili con PHP 7.1 e MySQL 5.7
* Creare un DB chiamato "socialbox"
* Modificare il file .env di esempio sistemando i parametri per la connessione a DB e per l'APP_URL
* Aprire il terminale dentro la cartella del progetto e lanciare i comandi: 
    * php artisan migrate
    * php artisan storage:link
* Aprire il browser e collegarsi all'url inserito nel file .env sotto la voce APP_URL