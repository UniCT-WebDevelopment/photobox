Project-V1.0
===
Repository Progetto Web Programming
---
**Idea**: Social network che permette ad ogni utente registrato di poter effettuare l'upload di immagini.
Ogni immagine pubblicata è possibile giudicarla con un tip positivo o negativo.
Nella sezione privata l'utente visualizzerà qualche indice statistico su come sono giudicati i suoi post.

---
**Requisiti**

* Registrazione utente (info personali e immagine)
    * Nome
    * Cognome
    * Email
    * Nickname
    * Password
    * Foto profilo
    * Biografia
* Login utente
* Upload immagini e ridimenzionamento quadrato
    * Descrizione
    * Geolocalizzaione estratta da EXIF (se disponibile)
* Tip positivo, negativo e delta (Like)
* Analisi EXIF immagini (chiamata a servizi terzi secondo me inutile e lunga da fare)
* Profilo utente con info personali e grafici per l'andamento dei post
    * ~~grafico con il resoconto dei tip (visualizzazione 1d, 1w, 1m, 1a)~~
    * ~~grafico col numero di immagini pubblicate (visualizzazione 1d, 1w, 1m, 1a)~~
    * grafico a barre ad esempio con i dispositivi utilizzati per scattare le immagini
    * grafico resoconto di like per ogni mese
    * grafico resoconto immagini pubblicate per ogni mese
* Gestione dello spazio web per l'upload delle immagini
* Funzione "Cerca Utenti"

---

**Link alle risorse**

Template: https://colorlib.com/preview/#cocoon

~~[Icon] Repo icone: https://www.flaticon.com/~~

[PHP] EXIF: https://www.php.net/manual/en/book.exif.php

[PHP] EXIF geo location: https://stackoverflow.com/questions/2526304/php-extract-gps-exif-data

[PHP] Image Optimization: https://cloudinary.com/blog/image_optimization_in_php

[PHP] Image compression: https://stackoverflow.com/questions/11418594/which-is-the-best-php-method-to-reduce-the-image-size-without-losing-quality

[Laravel] Upload Image and Crop: https://artisansweb.net/how-to-upload-and-crop-image-in-laravel-using-imgareaselect-intervention-image-library/

[JS] Libreria grafici: https://www.chartjs.org/

[HTML5] Upload drag and drop: https://css-tricks.com/drag-and-drop-file-uploading/

**Setup Applicazione**

* Lanciare: php artisan storage:link