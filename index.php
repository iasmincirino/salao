<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!--Carousel-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" crossorigin="anonymous" />
	<script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script>
   
   <!--CSS-->
   <link rel="stylesheet" href="style.css">
   <title>Salão de Beleza</title>
   <link rel="shortcut icon" href="icon.png" type="image/x-icon">
</head>
<body>

<!--Navbar-->
<header class="header fixed-top">
  <div class="container">
     <div class="row align-items-center">
        <p class="logo mr-auto">SALÃO</p>

        <nav class="nav">
           <a href="#home" class="nav-menu">Inicio</a>
           <a href="#sobre" class="nav-menu">Sobre</a>
           <a href="#servico" class="nav-menu">Serviços</a>
           <a href="#gallery" class="nav-menu">Galeria</a>
           <a href="#footer" class="nav-menu">Contato</a>
        </nav>

        <div class="icons">
           <div id="menu-btn" class="fas fa-bars"></div>
           <div id="fechar-btn"></div>
        </div>
     </div>
  </div>
</header>

<!-- Fechar Navbar -->
<form action="" class="fechar-form">
    <div id="close-fechar-form"></div>
</form>

<!-- home section  -->
<section class="home" id="home">
  <div class="container">
     <div class="row align-items-center text-center text-md-left min-vh-100">
        <div class="col-md-6">
           <span>Salão de Beleza</span>
           <h3>Seja Bem Vindo!</h3>
           <a href="./loja/cart.php" class="link-btn">Loja</a>
        </div>
     </div>
  </div>
</section>

<!-- about section -->
<section class="about" id="sobre">
  <div class="container">
     <div class="row align-items-center">
        <div class="col-md-6">
           <img src="image/sobre.jpg" class="w-100" alt="sobre">
        </div>
        <div class="col-md-6">
           <span>O que fazemos?</span>
           <h3 class="title">Sobre Nós!</h3>
           <p>O salão fornece serviços de cabeleireiro, maquiagem e cuidados com a pele, lá você pode relaxar após um dia de trabalho exaustivo. <br>Nosso salão de cabeleireiro ganhou uma reputação incrível, pois nossa equipe profissional de cabeleireiros continua fazendo maravilhas no cabelo dos clientes e aprimorando seus ativos através da ampla gama de serviços oferecidos.</p>
        </div>
     </div>
  </div>
</section>

<!--Serviços-->
<section class="servico" id="servico">
   <h1 class="heading">Nossos Serviços</h1>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="news-slider" class="owl-carousel">
					<!-- 1 -->
					<div class="news-grid">
						<div class="news-grid-image"><img src="image/1.jpeg" alt="">
							<div class="news-grid-box">
							</div></div>
								<div class="news-grid-txt">
									<span>Salão</span>
									<h2>Cabelo</h2>
									<p>Tratamentos: corte, hidratação, coloração, reconstrução, cauterização, alisamentos e alongamentos.</p>
									<a href="./agenda/agenda.php">Agendar</a>
								</div>
							</div>
					<!-- 2 -->
					<div class="news-grid">
						<div class="news-grid-image"><img src="image/2.jpg" alt="">
							<div class="news-grid-box">
							</div></div>
								<div class="news-grid-txt">
									<span>Salão</span>
									<h2>Maquiagem</h2>
									<p>Estilos: sem cores fortes, maquiagem para noite, maquiagem para passarela, maquiagens coloridas...</p>
									<a href="./agenda/agenda.php">Agendar</a>
								</div>
							</div>
					<!-- 3 -->
					<div class="news-grid">
						<div class="news-grid-image"><img src="image/3.jpeg" alt="">
							<div class="news-grid-box">
							</div></div>
								<div class="news-grid-txt">
									<span>Salão</span>
									<h2>Manicure e Pedicure</h2>
									<p>Tratamentos: corte da unha, esmaltagem, enfeites, polimento, remoção da cutícula e unhas postiças.</p>
									<a href="./agenda/agenda.php">Agendar</a>
								</div>
							</div>
					<!-- 4 -->
					<div class="news-grid">
						<div class="news-grid-image"><img src="image/4.jpg" alt="">
							<div class="news-grid-box">
							</div></div>
								<div class="news-grid-txt">
									<span>Salão</span>
									<h2>Dia da Noiva</h2>
									<p>Tratamentos: cabelo, maquiagem suave e discreto, sobrancelhas, manicure, pedicure, estética e entre outros.</p>
									<a href="./agenda/agenda.php">Agendar</a>
								</div>
							</div>
					<!-- 5 -->
					<div class="news-grid">
						<div class="news-grid-image"><img src="image/5.jpg" alt="">
							<div class="news-grid-box">
							</div></div>
								<div class="news-grid-txt">
									<span>Salão</span>
									<h2>Sombrancelhas</h2>
									<p>Estilos: sombrancelhas arqueadas, angulares, semiangulares, reta, arredondada. Depende do rosto e de como o cliente deseja.</p>
									<a href="./agenda/agenda.php">Agendar</a>
								</div>
							</div>
					<!-- 6 -->
					<div class="news-grid">
						<div class="news-grid-image"><img src="image/6.jpg" alt="">
							<div class="news-grid-box">
							</div></div>
								<div class="news-grid-txt">
									<span>Salão</span>
									<h2>Estética</h2>
									<p>Tratamentos: estética facial, corporal, flacidez, redução da papada, estrias, gordura localizada e celulites</p>
									<a href="./agenda/agenda.php">Agendar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
      </section>
												
<!-- Script-Section -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#news-slider").owlCarousel({
			items:3,
			navigation:true,
			navigationText:["",""],
			autoPlay:true
		});
	});
</script>
 
<!--Galeria-->
<section class="gallery" id="gallery">
   <h1 class="heading">Nossa Galeria</h1>

   <div class="box-container container">
      <div class="box">
         <img src="image/img01.jpeg" alt="img1">
      </div>

      <div class="box">
         <img src="image/img02.jpg" alt="img2">
      </div>

      <div class="box">
         <img src="image/img03.jpeg" alt="img3">
      </div>

      <div class="box">
         <img src="image/img04.jpg" alt="img4">
      </div>

      <div class="box">
         <img src="image/img05.jpg" alt="img5">
      </div>

      <div class="box">
         <img src="image/img06.jpeg" alt="img6">
      </div>
   </div>
</section>

<!--Footer-->
<section id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 footer-box">
        <h1>Salão</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.2821842482854!2d-47.476360885398556!3d-22.976648646143175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c61dbc05f08ef1%3A0x43efeb66eb1a63f!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20de%20S%C3%A3o%20Paulo%2C%20Campus%20Capivari!5e0!3m2!1spt-BR!2sbr!4v1663203815736!5m2!1spt-BR!2sbr" width="330" height="250" style="border:0; border-radius:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="col-md-4 footer-box">
        <p><br>CONTATO<br></p>
        <p><i class="fa fa-map-marker"></i>Capivari, SP</p>
        <p><i class="fa fa-phone"></i>(99) 99999-9999</p>
        <p><i class="fa fa-envelope-o"></i>algumacoisa@gmail.com</p>
      </div>
      <div class="col-md-4 footer-box">
        <p><br>REDES SOCIAIS<br></p>
        <a href="#"><i class="fa fa-envelope-o"></i>E-mail</a><br><br>
        <a href="#"  target="_blank" rel="external"><i class="fa fa-linkedin"></i>Linkedin</a><br><br>
        <a href="https://github.com/iasmincirino" target="_blank" rel="external"><i class="fa fa-github"></i>GitHub</a>
      </div>
    </div>
      <hr>
      <p class="copyright">Criado pela Iasmin | <span class="fa fa-copyright"></span> 2022 All rights reserved.</p>
  </div>
</section>

<script src="script.js"></script>

</body>
</html>