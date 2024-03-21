<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>World of Pets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            include "inc/head.inc.php";
        ?>
        <!-- Custom JS -->
        <script src="js/main.js"></script>
    </head>
    <body>
        <?php
            include "inc/nav.inc.php";
            include "inc/header.inc.php";
        ?>
        <main class="container">
            <section id="dogs">
                <h2>All About Dogs!</h2>
                <div class="row">
                <article class="col-sm">
                    <h3>Poodles</h3>
                    <figure>
                        <img src="images/Albino 'Lucy' Stingray.jpg" alt="als" class="img-thumbnail"
                        title="View larger image..."/>
                        </a>
                        <figcaption>Albino 'Lucy' Stingray</figcaption>
                    </figure>
                    <p>
                    Albino Lucy Stingray are a group of formal dog breeds, the Standard
                    Poodle, Miniature Poodle and Toy Poodle...
                    </p>
                </article>
                <article class="col-sm">
                    <h3>Chihuahua</h3>
                    <figure>
                        <img src="images/chihuahua_small.jpg" alt="Chihuahua" class='img-thumbnail'
                        title="View larger image..."/>
                        </a>
                        <figcaption>Chihuahua</figcaption>
                    </figure>
                    <p>
                        The Chihuahua is the smallest breed of dog, and is named
                        after the Mexican state of Chihuahua...
                    </p>
                </article>
                <article class="col-sm">
                    <h3>Mongrel</h3>
                    <figure>
                        <img src="images/mydog_small.jpg" alt="My Dog" class = 'img-thumbnail'
                        title="View larger image..."/>
                        </a>
                        <figcaption>My Dog</figcaption>
                    </figure>
                    <p>
                        This is my own dog, she was a very naughty dog,
                        she passed in 2022, I still miss her.
                    </p>
                </div>
            </section>
            <section id = "cats">
                <h2>All About Cats!</h2>
                <div class="row">
                <article class="col-sm">
                    <h3>Tabby</h3>
                    <figure>
                        <img src="images/tabby_small.jpg" alt="Tabby" class="img-thumbnail"
                        title="View larger image..."/>
                        </a>
                        <figcaption>Tabby Cat</figcaption>
                    </figure>
                    <p>
                        A tabby is any domestic cat that has a coat featuring
                        distinctive stripes, dots, lines or swirling patterns,
                        usually together with a mark resembling an 'M' on its
                        forehead...
                    </p>
                    <figure>
                        <img src="images/mycat_small.jpg" alt="My Cat" class='img-thumbnail'
                        title="View larger image..."/>
                        </a>
                        <figcaption>My Cat</figcaption>
                    </figure>
                    <p>
                        This is my own cat, she is a very cute orange tabby,
                        She was a stray for the majority of her life. 
                    </p>
                </article>
                <article class="col-sm">
                    <h3>Calico</h3>
                    <figure>
                        <img src="images/calico_small.jpg" alt="Calico" class="img-thumbnail"
                        title="View larger image..."/>
                        </a>
                        <figcaption>Calico Cat</figcaption>
                    </figure>
                    <p>
                        Calico cats are domestic cats with a spotted or parti-
                        colored coat that is predominantly white, with patches
                        of two other colors...
                    </p>
                </article>
            </div>
            </section>
        </main>   
        <?php
            include "inc/footer.inc.php";
        ?>       
        <script src="main.js"></script>
    </body>
</html>
