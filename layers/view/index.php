<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }

    .dynamic-background {
        content: "";
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        height: 738px;
        opacity: 0.6;
        z-index: -1;
        animation: change-background 30s ease-in-out infinite;
    }

    @keyframes change-background {
        0% {
            background-image: url("https://images.unsplash.com/photo-1679319002522-0e3a7614ea7b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80");
        }

        22.22% {
            background-image: url("https://images.unsplash.com/photo-1679319002522-0e3a7614ea7b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80");
        }

        33.33% {
            background-image: url("https://images.unsplash.com/photo-1595790158079-6121d81db672?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWgelinHx8fHx8fauto=format&fit=crop&w=1974&q=80");
        }

        44.44% {
            background-image: url("https://images.unsplash.com/photo-1595790158079-6121d81db672?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWgelinHx8fHx8fauto=format&fit=crop&w=1974&q=80");
        }

        55.55% {
            background-image: url("https://images.unsplash.com/photo-1559584871-75b70fa0d19a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80");
        }

        66.66% {
            background-image: url("https://images.unsplash.com/photo-1559584871-75b70fa0d19a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80");
        }

        77.77% {
            background-image: url('https://images.unsplash.com/photo-1638780506095-3d61a4f0edd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80');
        }

        88.88% {
            background-image: url('https://images.unsplash.com/photo-1638780506095-3d61a4f0edd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80');
        }

        100% {
            background-image: url("https://images.unsplash.com/photo-1679319002522-0e3a7614ea7b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80");
        }
    }



    .main-section {
        height: 600px;
        display: flex;
        align-items: center;
        justify-content: right;
        padding: 0px 0px 90px 50px;
        color: black;
    }

    .custom-shadow {
        box-shadow: 0px 0px 10px darkgray;
    }

    .centralize {
        justify-content: center;
        align-items: center;
        text-align: center;
    }


</style>

<body>
    <div class="container">
        <div class="dynamic-background">
        </div>
        <header id="header">
            <nav class="navbar navbar-expand-lg py-5 px-5">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="https://i.ibb.co/sJzDT3j/logo-removebg-preview.png" alt="Logo MIMO" width="auto" height="30">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item px-2">
                                <a class="nav-link active" aria-current="page" href="#">Menu</a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="#">Cliente</a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="#">Associado</a>
                            </li>
                            <li class="nav-item dropdown px-2">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sobre Nós
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <button class="btn" style="background-color: white">ENTRAR</button>
                            <div style="padding: 6px 0px 0px 20px;">registrar-se</div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <div class="container">
        <div class="main-section">
            <section style="padding-left: 140px;">
                <div style="font-size:40px; margin:0; padding-right:70px; font-family:Verdana, Geneva, Tahoma, sans-serif; font-weight:bold;">
                    MEU INVENTÁRIO
                </div>
                <div style="text-align:right; margin: 0; padding-right:80px; font-size:30px; color:black; font-style:italic; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight:bold;">
                    MEU ORGANIZADOR
                </div>
            </section>
        </div>
    </div>
    <div class="custom-shadow">
        <div class="container">
            <div style="display:flex;">
                <div style="display:inline-flex; width:60%; padding-top:40px; box-sizing: border-box;">
                    <h1>O MIMO É UM SISTEMA BACANA!</h1>
                </div>
                <div style="display:inline-flex; width:40%; padding:10px 0px 0px 10px;">
                    <div style="padding: 20px 20px 20px 20px;">
                        <div style="padding:20px 0px 20px 0px;">
                            <h2 style="padding-left:40px;">
                                RAZÕES PARA USAR
                            </h2>
                        </div>
                        <div class="animated-container" style="padding:0px 40px 15px 40px;">
                            <section class="animated-section" style="padding-bottom:25px;">
                                <div style="background-color:white; display:flex;">
                                    <div style="width:25%; display: inline-flex; justify-content:center; align-items:center;">
                                        <img src="images/handshake.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px 10px 10px 10px;">
                                    </div>
                                    <div style="width:75%; display:inline-flex; align-items:center;">
                                        <div style="display:block; padding: 0px 20px 0px 20px;">
                                            <div class="" style="height:25%; border-bottom: 2px solid paleturquoise;">
                                                <h4>SEGURO</h4>
                                            </div>
                                            <div style="height:75%; padding:10px 20px 0px 10px;">
                                                Porque o sistema é muito seguro, confia!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="animated-section" style="padding-bottom:25px;">
                                <div style="background-color:white; display:flex;">
                                    <div style="width:25%; display: inline-flex; justify-content:center; align-items:center;">
                                        <img src="images/safe.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px 10px 10px 10px;">
                                    </div>
                                    <div style="width:75%; display:inline-flex; align-items:center;">
                                        <div style="display:block; padding: 0px 20px 0px 20px;">
                                            <div class="" style="height:25%; border-bottom: 2px solid paleturquoise;">
                                                <h4>GRATUITO</h4>
                                            </div>
                                            <div style="height:75%; padding:10px 20px 0px 10px;">
                                                Porque o sistema é muito seguro, confia!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="animated-section" style="padding-bottom:25px;">
                                <div style="background-color:white; display:flex;">
                                    <div style="width:25%; display: inline-flex; justify-content:center; align-items:center;">
                                        <img src="images/innovative.jpg" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px 10px 10px 10px;">
                                    </div>
                                    <div style="width:75%; display:inline-flex; align-items:center;">
                                        <div style="display:block; padding: 0px 20px 0px 20px;">
                                            <div class="" style="height:25%; border-bottom: 2px solid paleturquoise;">
                                                <h4>INOVADOR</h4>
                                            </div>
                                            <div style="height:75%; padding:10px 20px 0px 10px;">
                                                Porque o sistema é muito seguro, confia!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>