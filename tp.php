<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP - TP tableaux</title>
  <link rel="stylesheet" href="styles/minimal-table.css">
</head>

<body>
  <?php
    // initialisation du tableau des noms
    $etudiants = [
      "Alice",
      "Bob",
      "Christine",
      "Denis",
      "Eve",
      "Francis",
      "Gisèle",
      "Henri",
      "Isabelle",
      "Jacques"
    ];

    // initialisation du tableau des notes
    $notes = [
      2, 2, 14, 10, 10, 20, 2, 10, 10, 20
    ];

    // on s'assure que les deux tableaux sont de même longueur
    if (count($etudiants) != count($notes))
    {
      echo "
      <p>Attention : les deux tableaux ne sont pas de la même longueur !</p>
      ";
    }

    // -------------------------------------------------------------------------

    // affichage du tableau des notes des étudiants
    // grâce à un tableau HTML

    echo "<h1>Tableau des notes</h1>";

    // en-tête du tableau
    echo "
    <table>
      <tr>
        <th>Nom</th>
        <th>Note</th>
      </tr>
    ";

    // pour chaque étudiant, on crée une ligne dans le tableau
    // et on y afficher le nom et la note
    for ($i = 0; $i < count($etudiants); $i++)
    {
      echo "
      <tr>
        <td>$etudiants[$i]</td>
        <td>$notes[$i]</td>
      </tr>
      ";
    }

    // on ferme le tableau
    echo "</table>";

    // -------------------------------------------------------------------------

    // calcul de la moyenne
    $somme = 0;
    foreach ($notes as $note)
    {
      $somme += $note;
    }
    $moyenne = $somme / count($notes);

    // affichage d'icelle
    echo "
    <p>La moyenne des notes obtenues est <strong>$moyenne</strong>.</p>
    ";

    // affichage de la ou des personnes qui ont éventuellement obtenu exactement
    // la moyenne

    // on trouve les index de la note moyenne
    $cles_moyenne = array_keys($notes, $moyenne);
    // on va chercher les noms correspondants
    $etudiants_moyenne = [];
    foreach ($cles_moyenne as $cle)
    {
      array_push($etudiants_moyenne, $etudiants[$cle]);
    }

    // affichage du résultat
    $message = "";
    if (count($etudiants_moyenne) == 0)
    {
      $message .= "Personne n'a";
    }
    elseif (count($etudiants_moyenne) == 1)
    {
      $message .= $etudiants_moyenne[0] . " a";
    }
    else
    {
      $tous_sauf_un = array_slice(
        $etudiants_moyenne, 0, count($etudiants_moyenne) - 1
      );
      $dernier = $etudiants_moyenne[count($etudiants_moyenne) - 1];
      $message .= implode(", ", $tous_sauf_un) . " et $dernier ont";
    }
    $message .= " obtenu la note moyenne.";

    echo "<p>$message</p>";

    // -------------------------------------------------------------------------

    // on recherche les notes minimale et maximale

    $note_min = min($notes);
    // on trouve les index de la note minimale
    $cles_min = array_keys($notes, $note_min);
    // on va chercher les noms correspondants
    $etudiants_min = [];
    foreach ($cles_min as $cle)
    {
      array_push($etudiants_min, $etudiants[$cle]);
    }

    $note_max = max($notes);
    // on trouve les index de la note maximale
    $cles_max = array_keys($notes, $note_max);
    // on va chercher les noms correspondants
    $etudiants_max = [];
    foreach ($cles_max as $cle)
    {
      array_push($etudiants_max, $etudiants[$cle]);
    }

    // on affiche les résultats

    // minimale
    echo "<p>La note minimale est <strong>$note_min</strong>.</p>";
    $message = "";
    if (count($etudiants_min) == 1)
    {
      $message .= "$etudiants_min[0] l'a";
    }
    else
    {
      $tous_sauf_un = array_slice($etudiants_min, 0, count($etudiants_min) - 1);
      $dernier = $etudiants_min[count($etudiants_min) - 1];
      $message .= implode(", ", $tous_sauf_un) . " et $dernier l'ont";
    }
    $message .= " obtenue.";

    echo "<p>$message</p>";

    // maximale

    echo "<p>La note maximale est <strong>$note_max</strong>.</p>";
    
    $message = "";
    if (count($etudiants_max) == 1)
    {
      $message .= "$etudiants_max[0] l'a";
    }
    else
    {
      $tous_sauf_un = array_slice($etudiants_max, 0, count($etudiants_max) - 1);
      $dernier = $etudiants_max[count($etudiants_max) - 1];
      $message .= implode(", ", $tous_sauf_un) . " et $dernier l'ont";
    }
    $message .= " obtenue.";

    echo "<p>$message</p>";
  ?>
</body>

</html>