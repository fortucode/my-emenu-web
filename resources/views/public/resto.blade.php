<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Restaurantly Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('templatemenu/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('templatemenu/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('templatemenu/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('templatemenu/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('templatemenu/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('templatemenu/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('templatemenu/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('templatemenu/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('templatemenu/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('templatemenu/assets/css/style.css')}}" rel="stylesheet">
  <style>
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* fond noir transparent */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.popup-content {
    background-color: #222;
    color: white;
    padding: 30px;
    border-radius: 10px;
    width: 500px;
    max-width: 90%;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
    position: relative;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 25px;
    cursor: pointer;
    color: white;
}
</style>


  <!-- =======================================================
  * Template Name: Restaurantly - v3.1.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= --
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>En</li>
          <li><a href="#">De</a></li>
        </ul>
      </div>
    </div>
  </div>-->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">GoMenu</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo me-auto me-lg-0"><img src="templatemenu/assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!--<li><a class="nav-link scrollto @yield('accueilactive')" href="{{url('/')}}">Home</a></li>-->
          {{-- <li><a class="nav-link scrollto" href="{{url('/restauran')}}">About</a></li> --}}
          <!--<li><a class="nav-link scrollto" href="#menu">Menu</a></li>-->
          <li><a class="nav-link scrollto @yield('promoactive')" href="{{url('/promo')}}">Nos Promotions</a></li>
         <!--<li><a class="nav-link scrollto" href="#events">Events</a></li>-->
          <li><a class="nav-link scrollto @yield('restoactive')" href="{{route('restaurants.liste')}}">catalogue</a></li>
          
 <!-- Menu déroulant Se connecter -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
             Se connecter
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="{{ url('/login') }}">
                <i class="bi bi-shop"></i> Restaurant
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('client.login') }}">
                <i class="bi bi-person"></i> Client
              </a>
            </li>
          </ul>
        </li>          
        
        <li><button onclick="openPopup()" class="book-a-table-btn scrollto d-none d-lg-flex">Espace client</button>
</li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <!-- Bouton pour ouvrir le popup -->

<!-- Contenu du popup btn btn-primary  -->
<div id="clientPopup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        
        <div id="popup-inner-content">
            Chargement...
        </div>
    </div>
</div>


    </div>
  </header><!-- End Header -->

    
        @yield('contentresto')

    {{-- <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Saturday:<br>
                  11:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section --> --}}

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>GoMenu</h3>
              <p>
               Lomé, TOGO <br><br>
                <strong>Phone:</strong> +228 70 51 61 04<br>
                <strong>Email:</strong> fortunaakpadji@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div> 
          </div>

          <!--<div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>--

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>-->

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

    <!--<script>
      document.addEventListener('DOMContentLoaded', function () {
          const modal = document.getElementById('clientDashboardModal');
          modal.addEventListener('show.bs.modal', function () {
              const content = document.getElementById('clientDashboardBody');
              content.innerHTML = 'Chargement...';
      
              fetch("{{ route('client.dashboard.ajax') }}")
                  .then(res => res.text())
                  .then(html => {
                      content.innerHTML = html;
                  })
                  .catch(() => {
                      content.innerHTML = '<p class="text-danger">Erreur de chargement</p>';
                  });
          });
      });
      </script>-->

      <!--<script>
        $(document).on('click', '.btn-ouvrir-dashboard', function(e) {
    e.preventDefault();
    $.ajax({
        url: '/client/dashboard-partial',
        method: 'GET',
        success: function(data) {
            $('#clientModalContent').html(data);
            $('#clientModal').modal('show');
        },
        error: function() {
            alert('Erreur lors du chargement du tableau de bord');
        }
    });
});

      </script>-->

      <script>
        function openPopup() {
         const popup = document.getElementById("clientPopup");
          popup.style.display = "flex";

        const content = document.getElementById("popup-inner-content");
          content.innerHTML = "Chargement...";

          fetch("{{ route('client.dashboard.ajax') }}")
          .then(res => res.text())
          .then(html => {
            content.innerHTML = html;
            })
          .catch(() => {
            content.innerHTML = "<p class='text-danger'>Erreur de chargement</p>";
           });
}

function closePopup() {
    document.getElementById("clientPopup").style.display = "none";
}
</script>

      
  </footer><!-- End Footer -->

  <!--<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>-->

  <!-- Vendor JS Files -->
  <script src="{{asset('templatemenu/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('templatemenu/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('templatemenu/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('templatemenu/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('templatemenu/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('templatemenu/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="templatemenu/assets/js/main.js"></script>
  
  <script src="{{ asset('templatemenu/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var menuIsotope = new Isotope('.menu-container', {
        itemSelector: '.menu-item',
        layoutMode: 'fitRows'
      });
  
      const filters = document.querySelectorAll('#menu-flters li');
      filters.forEach(function (el) {
        el.addEventListener('click', function () {
          filters.forEach(x => x.classList.remove('filter-active'));
          this.classList.add('filter-active');
  
          const filterValue = this.getAttribute('data-filter');
          menuIsotope.arrange({ filter: filterValue });
        });
      });
    });
//   </script>
{{-- // <!-- ✅ Modale Bootstrap proprement fermée -->
// <div class="modal fade" id="clientModal" tabindex="-1" aria-hidden="true">
//   <div class="modal-dialog modal-dialog-centered modal-lg">
//     <div class="modal-content">
//       <div class="modal-header">
//         <h5 class="modal-title">Mon espace client</h5>
//         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
//       </div>
//       <div class="modal-body" id="clientModalContent">
//         <!-- Contenu chargé par AJAX ici -->
//       </div>
//     </div>
//   </div>
// </div> --}}

<script>
document.addEventListener('DOMContentLoaded', function() {

    // --- Boutons "Ajouter au panier" ---
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;
            const nom = this.dataset.nom;
            const prix = parseFloat(this.dataset.prix);
            const prix_reduit = parseFloat(this.dataset.prix_reduit || prix);

            let panier = [];

            try {
                panier = JSON.parse(getCookie('panier') || '[]');
            } catch (e) {
                console.error("Erreur de parsing du cookie panier", e);
            }

            // Vérifie si l'article est déjà présent
            let item = panier.find(i => i.type === type && i.id == id);
            if (item) {
                item.quantite += 1;
            } else {
                panier.push({
                    type,
                    id,
                    nom,
                    prix,
                    prix_reduit,
                    quantite: 1
                });
            }

            // Sauvegarde le panier dans le cookie
            // document.cookie = "panier=" + JSON.stringify(panier) + ";path=/;max-age=" + (7 * 24 * 60 * 60);
            document.cookie = "panier=" + encodeURIComponent(JSON.stringify(panier)) + "; path=/; max-age=" + (7 * 24 * 60 * 60) + "; SameSite=Lax";

            alert("✅ Produit ajouté au panier !");
        });
    });

    // --- Fonction pour lire un cookie ---
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }
});
</script>

</body>

</html>