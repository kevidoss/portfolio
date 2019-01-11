<!--Dit is home pagina-->
<?php get_header(); ?>

<?php if( is_home() || is_front_page() ) : ?>
  <div class="parallax"></div>
  <div class="wrapper-home">
    <section class="intro">
      <h3>Inleiding</h3>
      <p>Welkom op deze gloednieuwe website voor leerlingen Latijn. Deze site is bedoeld om op een overzichtelijke manier te helpen bij het aanbieden en studeren van de geziene teksten.</p>
      <p>Onderaan deze pagina vind je nog een klein schema met welke pagina's er zijn en wat je daar kan vinden. De belangrijkste pagina is natuurlijk het overzicht van de teksten. Daar vind je een lijst met alle geziene teksten en die pagina dient tevens ook als doorverwijs pagina om de gedetailleerde teksten en vertalingen te zien.</p>
      <p>Voor de leerkrachten is er na het schema nog een kleine handleiding te vinden met enkele belangrijke zaken voor het aanmaken van nieuwe inhoud.</p>
      <h5>Veel studeerplezier en succes!</h5>
    </section>

    <hr>

    <section class="guide">
      <h4>Overzicht</h4>
      <table>
        <tr>
          <th>Pagina</th>
          <th>Beschrijving</th>
        </tr>
        <tr>
          <td>Home</td>
          <td>Inleidende tekst en een overzicht van de pagina's (en instapgids voor leerkrachten)</td>
        </tr>
        <tr>
          <td>Teksten</td>
          <td>Oplijsting van alle teksten met links naar elke tekst in detail</td>
        </tr>
        <tr>
          <td>Woordenschat</td>
          <td>Oplijsting van alle teksten met links naar de woordenschat lijsten van elke tekst in detail</td>
        </tr>
        <tr>
          <td>Cultuur</td>
          <td>Oplijsting van alle teksten met links naar de bijhorende cultuur van elke tekst in detail</td>
        </tr>
        <tr>
          <td>Media</td>
          <td>Oplijsting van alle gebruikte afbeeldingen</td>
        </tr>
        <tr>
          <td>Oefenvragen</td>
          <td>Interactieve quiz met voorbeeldvragen gelinkt aan verschillende teksten</td>
        </tr>
        <tr>
          <td>Login</td>
          <td>Aanmeldpagina voor leerkrachten</td>
        </tr>
      </table>
    </section>

    <?php if ( is_user_logged_in() ) { ?>

        <h4>Gids voor leerkrachten</h4>
        <p>Enkele zaken om op te letten bij het aanmaken van een nieuwe tekst en vertaling:</p>
        <p>Na het aanmelden komt er bovenaan de pagina een zwarte balk bij met enkele links naar het administratie gedeelte. Klik op de link "Latijn" om naar de administratie te gaan. Hier kan je nieuwe teksten, vertalingen en afbeeldingen toevoegen.</p>
        <img src="<?php echo get_template_directory_uri(); ?>/images/gids0.png" class="gidsimage">
        <p>In het administratie gedeelte zie je rechts een menubalk, de twee belangrijkste onderdelen zijn "posts" en "media". Bij "media" kan je nieuwe afbeeldingen uploaden of reeds bestaande afbeeldingen verwijderen.</p>
        <img src="<?php echo get_template_directory_uri(); ?>/images/gids1.png" class="gidsimage">
        <p>Wanneer je op de "posts" link klikt krijg je een lijst te zien met alle teksten en vertalingen die reeds op de website te vinden zijn. Deze lijst bestaat uit zeven kolommen, de belangrijkste hier zijn: "titel", "categorie" en "ID".</p>
        <p>De "titel" kolom bevat de naam van de teksten en vertalingen, deze titel zal ook zichtbaar zijn op de pagina met het overzicht van de teksten. De "categorie" kolom is van minder groot belang, deze dient vooral om het overzicht te behouden in de administratie. Wanneer een tekst en vertaling dezelfde titel hebben, zou het zonder deze kolom niet mogelijk zijn om het verschil te zien zonder door te klikken naar die tekst.</p>
        <img src="<?php echo get_template_directory_uri(); ?>/images/gids2.png" class="gidsimage">
        <p>De belangrijkste kolom is misschien wel de "ID" kolom. Deze is vooral belangrijk omdat hier extra aandacht voor nodig is. Wanneer je een tekst toevoegt, moet je de ID-nummer van de vertaling invullen om ervoor te zorgen dat de juiste vertaling aan de juiste tekst gelinkt word. Als dit niet gebeurd zal de vertaling van die tekst niet zichtbaar zijn (of op de verkeerde plaats terecht komen).</p>
        <img src="<?php echo get_template_directory_uri(); ?>/images/gids3.png" class="gidsimage">
        <p>De gemakkelijkste manier is om de vertaling eerst toe te voegen, dan zie je in het overzicht de ID staan en kan je deze correct linken. Het linken is erg eenvoudig, je gaat op de pagina van de Latijnse tekst naar onderaan de pagina en daar vind je een tekstveldje met de naam "Vertaling tekst ID". Hier vul je de ID in van de juiste vertaling en dan sla je de tekst op.</p>
        <img src="<?php echo get_template_directory_uri(); ?>/images/gids4.png" class="gidsimage">
    <?php } else { ?>

    <?php }; ?>

  </div>
<?php endif; ?>

<?php get_footer(); ?>
