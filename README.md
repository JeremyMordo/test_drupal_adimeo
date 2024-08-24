# Test drupal Adimeo

Bonjour Mr, Mme,

J'espère que vous lirez ceci avant de commencer la review de code.

Dans un premier temps, je tiens à vous dire que je n'ai pas pu réaliser ce test de la meilleure des façons.

Je n'ai en effet pas pu installer correctement le projet.

Problème : Lors de mes tentatives de lancement des commandes drush afin d'installer la DB, nettoyer le cache (ou n'importe quelle autre commande), celles-ci faisaient gonfler la mémoire utilisée par mon CPU de façon exponentielle et faisait crasher mon ordinateur.

Malgré des heures à rechercher une solution, je n'en ai malheureusement pas trouvé de concluante.

J'ai donc pris la décision de développer sans pouvoir tester, en mettant sur "papier" ma façon de comprendre l'attendu et de le mettre en forme.  
Je suis persuadé que le code fourni ne fonctionne pas, mais je préfère vous proposer quelque chose, plutôt que vous dire que je n'ai pas réalisé le test.

Je m'excuse donc par avance si beaucoup d'erreurs de synthaxe / dépendances / configurations sont présentes.

Egalement, je tiens à vous préciser que mon expérience sur Drupal se trouve être de 4 mois "plein".

-------------------------------------

Concernant mon développement :

1°) Comprenant que vous ne désiriez pas de fichier de configuration, j'ai donc développer, comme demandé un module pour le bloc custom, mais ayant déjà fait l'expérience, j'aurais plutôt créé une vue sous forme de bloc avec un filtre contextuel pour ressortir les événements en lien avec l'événement courant (sur la base d'une même taxonomie). Je l'aurais ensuite ajouté à la mise en place des blocs dans la partie "caché" et disposé dans mon template.

2°) N'ayant jamais utilisé le queueworker, je pense que mon développement n'est pas suffisant, mais ne pouvant tester, je n'ai pas pu aller plus loin.  
Merci à votre blog pour m'avoir permis de posé les "bases" : https://www.adimeo.com/blog-technique/creer-queue-worker-drupal .  
Usuellement, j'ai été amené à utiliser un système de batch pour mettre en attente une file de tâches (même pour des crons).  
Si vous pouviez me communiquer les différents avantages du QueueWorker par rapport aux batches, cela m'aiderait à me perfectionner.

3°) J'ai préféré dissocier les 2 features dans deux modules différents afin d'être plus scallable si l'un des deux n'était plus d'actualité.

Temps de lecture / compréhension de l'attendu : 20 min.  
Temps de recherche pour le problème me concernant : 5h.  
Temps de réalisation du développement : 1h (Possiblement 2 voir 3 avec la possibilité de tester).  

Merci d'avance de m'avoir lu et veuillez encore m'excuser pour ce résultat.

En vous souhaitant une bonne journée.

Mr Mordo Jérémy
