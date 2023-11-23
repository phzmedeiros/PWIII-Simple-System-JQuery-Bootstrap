<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../estilo.css"/>
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

    /* cards */
    .cardBox {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(4,1fr);
      grid-gap: 30px;
    }
    .cardBox .card{
      position: relative;
      background: var(--white);
      padding: 30px;
      border-radius: 20px;
      display: flex;
      justify-content: space-between;
      cursor: pointer;
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.158);
    }
    .cardBox .card .numbers
    {
      position: relative;
      font-weight: 500;
      font-size: 2.5em;
      color: var(--blue);
    }
    .cardBox .card .cardName{
      color: var(--black2);
      font-size: 1.1em;
      margin-top: 5px;
    }
    .cardBox .card .iconBx
    {
      font-size: 3.5em;
      color: var(--black2);
    }
    .cardBox .card:hover{
      background: var(--blue);
    }
    .cardBox .card:hover .numbers,
    .cardBox .card:hover .cardName,
    .cardBox .card:hover .iconBx{
      color: var(--white);
    }

  </style>
  <body>
    <!-- toda a página -->
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
        <?php
// Conectar ao banco de dados (substitua com suas próprias configurações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carros";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultas SQL
$query_usuarios = "SELECT COUNT(*) as total_usuarios FROM usuarios";
$query_carros = "SELECT COUNT(*) as total_carros FROM carro";
$query_modelos_diferentes = "SELECT COUNT(DISTINCT carro_modelo) as total_modelos FROM carro";
$query_carros_excluidos = "SELECT COUNT(*) as total_carros_excluidos FROM carro_excluido";

// Executar as consultas
$result_usuarios = $conn->query($query_usuarios);
$result_carros = $conn->query($query_carros);
$result_modelos_diferentes = $conn->query($query_modelos_diferentes);
$result_carros_excluidos = $conn->query($query_carros_excluidos);

// Verificar se as consultas foram bem-sucedidas
if ($result_usuarios && $result_carros && $result_modelos_diferentes && $result_carros_excluidos) {
    // Obter os resultados como arrays associativos
    $row_usuarios = $result_usuarios->fetch_assoc();
    $row_carros = $result_carros->fetch_assoc();
    $row_modelos_diferentes = $result_modelos_diferentes->fetch_assoc();
    $row_carros_excluidos = $result_carros_excluidos->fetch_assoc();

    // Imprimir os resultados nos cards
    echo '<div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">' . $row_usuarios['total_usuarios'] . '</div>
                    <div class="cardName">Usuários</div>
                </div>
                <div class="iconBx">
                <ion-icon name="person"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">' . $row_carros['total_carros'] . '</div>
                    <div class="cardName">Carros</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="car"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">' . $row_modelos_diferentes['total_modelos'] . '</div>
                    <div class="cardName">Modelos Diferentes</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="list"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">' . $row_carros_excluidos['total_carros_excluidos'] . '</div>
                    <div class="cardName">Carros Excluídos</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="trash"></ion-icon>
                </div>
            </div>
        </div>';
} else {
    echo "Erro na consulta: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>


    <!-- framework dos icones - ionicons.com -->
    <script type="text/javascript" src="../../controller/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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