<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Factura</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/icon-logo.png.webp" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        #prelouder {
            background-color: white;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 9999999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body id="page-top" onload="f_prelouder()">
    <div id="prelouder" class="fixed-top">
        <div class="spinner-grow text-primary" role="status"></div>
        <div class="spinner-border text-primary" role="status"></div>
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Factura.ma</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="my-2 nav-link" href="#about">À propos</a></li>
                    <li class="nav-item"><a class="my-2 nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="my-2  nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-primary " href="/login">Connexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h2 class="text-white font-weight-bold">Logiciel de facturation simple et
                        professionnel pour votre entreprise</h2>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Rédiger une facture n'a jamais été aussi simple. Avec
                        Factur.ma créez, éditez et imprimez facilement tous vos documents : devis, factures. Gagnez du temps et proposez des factures professionnelles à vos clients. Notre solution convient aussi bien aux auto-entrepreneurs, aux micro-entreprises et aux associations.</p>
                    <a class="btn btn-primary btn-xl" href="#about">En savoir plus</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Logiciel de Facturation au Maroc simple et intuitif</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Choisissez donc un logiciel de Facturation au Maroc simple d’utilisation et d’implémentation, et qui couvre toutes les étapes préalables à l’édition de facture. Votre objectif final est d’optimiser la gestion de la facturation de votre entreprise pour gagner un temps précieux.</p>
                    <a class="btn btn-light btn-xl" href="#services">Commencer</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">A votre service</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-award-fill fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Simple et <br> facile à utiliser</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-window fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Aucune <br> installation requise</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-shield-fill-check fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Sécurité & <br> sauvegarde des données</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">Votre outil de facturation et devis 100% gratuit</h2>
            <p>Gérez votre fichier client, établissez des devis et générez des factures gratuitement</p>
            <a class="btn btn-light btn-xl" href="/register">Créer un compte</a>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Contactez-nous</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Prêt à commencer votre prochain projet avec nous? Envoyez-nous un message et nous vous répondrons dès que possible!</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form id="contactForm" action="/contact" method="post">
                            @csrf
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" name="name" type="text" value="" required placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Nom Complet</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est requis.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" value="" required placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Adresse Email</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Un email est requis.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email n’est pas valide.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="phone" id="phone" type="tel" required value="" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Numéro de Téléphone</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Un numéro de téléphone est requis.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" required data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Un message est requis.</div>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl " id="submitButton" type="submit">Envoyer</button></div>
                        </form>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <i class="bi-phone fs-2 mb-3 text-muted"></i>
                    <div>+212 620858128</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; {{date('Y')}} - Factura.ma</div>
        </div>
    </footer>
    <script>
        var louder = document.getElementById("prelouder");

        function f_prelouder() {
            louder.style.display = "none";
        }
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>