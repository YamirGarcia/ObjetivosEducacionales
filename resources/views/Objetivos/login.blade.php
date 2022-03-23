<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendiendo CSS</title>
    <link rel="stylesheet" type="text/css" href="css/estiloLogin.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>

<body>
    <div class="imagen-svg">
    <svg class="topography-shape js-shape" preserveAspectRatio="none" width="100%" height="100%" viewBox="0 0 1200 580" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero"></path>
      <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1800, 60) scale(2.8, 2.8) skewX(30) " style="position: relative; z-index: 0; fill: rgb(214, 242, 255);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1650, 55) scale(2.65, 2.65) skewX(27.5) " style="position: relative; z-index: 1; fill: rgb(199, 225, 243);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1500, 50) scale(2.5, 2.5) skewX(25) " style="position: relative; z-index: 2; fill: rgb(184, 207, 230);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1350, 45) scale(2.3499999999999996, 2.3499999999999996) skewX(22.5) " style="position: relative; z-index: 3; fill: rgb(169, 190, 218);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1200, 40) scale(2.2, 2.2) skewX(20) " style="position: relative; z-index: 4; fill: rgb(154, 173, 206);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1050, 35) scale(2.05, 2.05) skewX(17.5) " style="position: relative; z-index: 5; fill: rgb(139, 155, 193);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-900, 30) scale(1.9, 1.9) skewX(15) " style="position: relative; z-index: 6; fill: rgb(125, 138, 181);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-750, 25) scale(1.75, 1.75) skewX(12.5) " style="position: relative; z-index: 7; fill: rgb(110, 121, 169);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-600, 20) scale(1.6, 1.6) skewX(10) " style="position: relative; z-index: 8; fill: rgb(95, 103, 156);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-450, 15) scale(1.45, 1.45) skewX(7.5) " style="position: relative; z-index: 9; fill: rgb(80, 86, 144);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-300, 10) scale(1.3, 1.3) skewX(5) " style="position: relative; z-index: 10; fill: rgb(65, 69, 132);"></path><path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-150, 5) scale(1.15, 1.15) skewX(2.5) " style="position: relative; z-index: 11; fill: rgb(50, 51, 119);"></path></svg>
    </div> 
    <div class="login">
        <H1 class="login__texto-bien">BIENVENIDO</H1>
        <div class="login__fondo">   
        </div>
        <div class="login__fondo-blanco"></div>
        <div class="login__fondousuario">
            <img class="login__fondousuario-icono" src="https://www.seekpng.com/png/full/138-1388073_login-icons-user-flat-icon-png.png"/>
        </div>
        <form method="POST" action="{{ route('login') }}">
            <div class="login__bordediv">
            <img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png"/><input type="text" placeholder="Usuario">
            </div>
            <div class="login__bordediv2">
                <img src="https://img.icons8.com/material-sharp/24/000000/key--v1.png"/><input type="password" placeholder="Contraseña">
            </div>
            <div class="login__boton">
                <button class="login__boton-submit">INICIAR SESIÓN</button>
                <button class="login__boton-recovery">¿Olvidaste tu constraseña?</button>
            </div>
        </form>
    </div>
    
    

</body>

</html>