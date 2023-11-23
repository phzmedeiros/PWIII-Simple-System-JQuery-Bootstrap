<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../estilo.css"/>
    <title>Cadastro Carro</title>
</head>
<style>
    /*Fonte utilizada*/
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
    /* estilos globais e reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    /* definição das cores por variaveis */
    :root {
      --blue: #2b75cf;
      --white: #fff;
      --grey: #f5f5f5;
      --black1: #222;
      --black2: #999;
    }

    body {
      min-height: 100vh;
      overflow-x: hidden;
    }

    .container {
      position: relative;
      width: 100%;
    }

    /* barra de navegação lateral */
    .navigation {
      position: fixed;
      width: 300px;
      height: 100%;
      background: var(--blue);
      border-left: 10px solid var(--blue);
      transition: 0.5s;
      overflow: hidden;
    }
    .navigation.active {
      width: 80px;
    }
    .navigation ul {
      padding-top: 80%;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }
    .navigation ul li {
      position: relative;
      width: 100%;
      list-style: none;
      border-top-left-radius: 30px;
      border-bottom-left-radius: 30px;
    }
    .navigation ul li:hover,
    .navigation ul li.hovered {
      background: var(--white);
    }
    .navigation ul li a {
      position: relative;
      display: block;
      width: 100%;
      display: flex;
      text-decoration: none;
      color: var(--white);
    }
    .navigation ul li:hover a,
    .navigation ul li.hovered a {
      color: var(--blue);
    }
    .navigation ul li a .icon {
      position: relative;
      display: list-item;
      min-width: 60px;
      height: 60px;
      line-height: 75px;
      text-align: center;
    }
    .navigation ul li a .icon ion-icon {
      font-size: 1.75rem;
    }
    .navigation ul li a .title {
      position: relative;
      display: block;
      padding: 0 10px;
      height: 60px;
      line-height: 60px;
      text-align: center;
      white-space: nowrap;
    }
    .navigation ul li:hover a::before,
    .navigation ul li.hovered a::before {
      content: "";
      position: absolute;
      right: 0;
      top: -50px;
      width: 50px;
      height: 50px;
      background: transparent;
      border-radius: 50%;
      box-shadow: 35px 35px 0 10px var(--white);
      pointer-events: none;
    }
    .navigation ul li:hover a::after,
    .navigation ul li.hovered a::after {
      content: "";
      position: absolute;
      right: 0;
      bottom: -50px;
      width: 50px;
      height: 50px;
      background: transparent;
      border-radius: 50%;
      box-shadow: 35px -35px 0 10px var(--white);
      pointer-events: none;
    }


    /* conteudo principal - topbar, cards e content */
    .main {
      position: absolute;
      width: calc(100% - 300px);
      left: 300px;
      min-height: 100vh;
      background: var(--white);
      transition: 0.5s;
    }
    .main.active {
      width: calc(100% - 80px);
      left: 80px;
    }

    /* parte da barra de pesquisa, toggle e adicionar */
    .topbar {
      margin-top: 10px;
      width: 100%;
      height: 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 10px;
    }

    /* botão da sidebar */
    .toggle {
      position: relative;
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 2.5rem;
      cursor: pointer;
      color: var(--blue);
    }

    
    @media (max-width: 991px) {
      /* barra lateral - sidebar */
      .navigation {
        left: -300px;
      }
      .navigation.active {
        width: 300px;
        left: 0;
      }

      /* conteudo principal */
      .main {
        width: 100%;
        left: 0;
      }
      .main.active {
        left: 300px;
      }
    }

    @media (max-width: 480px) {
      /* barra lateral - sidebar */
      .navigation {
        width: 100%;
        left: -100%;
        z-index: 1000;
      }
      .navigation.active {
        width: 100%;
        left: 0;
      }

      /* botão de ação da sidebar */
      .toggle {
        z-index: 1001;
      }
      .main.active .toggle {
        position: fixed;
        right: 0;
        left: initial;
        color: var(--white);
      }
    }

    /* main-content layout do conteudo, ex: tabela */
    .content {
      display: flex;
      flex-direction: column;
      height: 100vh;
    }
    .main-content {
      flex: 1;
      overflow: visible;
      padding: 20px; /* Ajuste o espaçamento conforme necessário */
    }
    label {
      color: var(--blue);
    }

    /* imagem logo */
    .imglogo {
      position: absolute;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      top: 0;
      padding-right: 10%;
      min-width: 200px;
      z-index: 1; /* Adicione esta linha */
    }
    .imglogo.hidden {
      display: none;
    }
  </style>
<body>
<div class="container">
      <!-- side-bar -->
      <div class="navigation">
        <!-- lista das páginas -->
        <!-- logo aaano -->
        <div class="imglogo centralize">
          <img src="../../img/bubbleicon.png" alt="Logo Image" />
        </div>  
        <ul>
          <li>
            <a href="home.php">
              <span class="icon"><ion-icon name="sparkles"></ion-icon></span>
              <span class="title">Geral</span>
            </a>
          </li>

          <li>
            <a href="select.php">
              <span class="icon"><ion-icon name="car"></ion-icon></span>
              <span class="title">Carros</span>
            </a>
          </li>

          <li>
            <a href="novo.php">
              <span class="icon"><ion-icon name="add-circle"></ion-icon></ion-icon></span>
              <span class="title">Novo</span>
            </a>
          </li>

          <li>
            <a href="sair.php">
              <span class="icon"><ion-icon name="log-out"></ion-icon></span>
              <span class="title">Sair</span>
            </a>
          </li>
        </ul>
      </div>
    <!--main contendo a topbar e os cards-->
    <div class="main">
        <!-- parte de cima - toggle e botões de mudanças e etc -->
        <div class="topbar">
          <!-- botão toggle para reduzir e aumentar a side-bar -->
          <div class="toggle">
          <ion-icon name="menu"></ion-icon>
          </div>
        </div>
        <div class="main-content">
    <div class="row">
        <div class="card-panel"><br>
            <h1 style="color: var(--blue)">Cadastro de Novo Carro</h1><br>
            <div style="text-align: justify;">
            <form name="form_cliente" style="display: inline-block; width: 100%;">
                <div class="load"></div>
                <div class="input-field">
                    <label> Modelo </label><br>
                    <input type="text" placeholder="Modelo do Veículo" name="carro_modelo" class="form-control form-control-lg" style="border-radius:5px; width: 100%; height: 40px; font-size: 16px; padding: 10px; border: 1px solid #ccc; color: var(--blue);">
                </div><br>
                <div class="input-field">
                    <label> Placa </label><br>
                    <input type="text" placeholder="Placa do Veículo" name="carro_placa" class="form-control form-control-lg" style="border-radius:5px; width: 100%; height: 40px; font-size: 16px; padding: 10px; border: 1px solid #ccc; color: var(--blue);">
                </div><br>
                <input class="btn indigo" type="submit" value="Cadastrar" style="border-radius: 8px; width: 100%; height: 40px; font-size: 16px; background-color: var(--blue); color: #fff; padding: 10px; border: none;">
            </form>
            </div>
            <div class="msg" style="color: var(--blue)"></div>
        </div>
    </div>
</div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript" src="../../controller/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="../../controller/placa.js"></script>
<script type="text/javascript" src="../bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>
<script>
    //menu toggle
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");
    let logo = document.querySelector(".imglogo");
    //função do click no toggle
    toggle.onclick = function() {
      navigation.classList.toggle("active");
      main.classList.toggle("active");
      logo.classList.toggle("hidden");
    };

  //marca como selecionado o item da sidebar
  let list = document.querySelectorAll(".navigation li");
  function activeLink() {
    list.forEach((item) => item.classList.remove("hovered"));
    this.classList.add("hovered");
  }
  list.forEach((item) => item.addEventListener("mouseover", activeLink));
</script>
</html>