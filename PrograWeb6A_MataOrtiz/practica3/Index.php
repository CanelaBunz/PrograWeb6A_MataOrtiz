<?php
include 'Usuario.php';
include 'UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO();

// Crear usuarios
$bugs = new Usuario();
$bugs->setNombres('Bugs');
$bugs->setApellidos('Bunny');
$bugs->setCorreo('bugsbunny@wb.com');
$bugs->guardar();

$lola = new Usuario();
$lola->setNombres('Lola');
$lola->setApellidos('Bunny');
$lola->setCorreo('lolabunny@wb.com');
$lola->guardar();

$lucas = new Usuario();
$lucas->setNombres('Duffy');
$lucas->setApellidos('Duck');
$lucas->setCorreo('patolucas@wb.com');
$lucas->guardar();

$perky = new Usuario();
$perky->setNombres('Perky');
$perky->setApellidos('Pig');
$perky->setCorreo('perkypig@wb.com');
$perky->guardar();

// Obtener todos los usuarios
$usuarios = $usuarioDAO->buscarTodos();

foreach ($usuarios as $usuario) {
    echo $usuario->getNombres() . ' ' . $usuario->getApellidos() . ' ' . $usuario->getCorreo() . '<br>';
}

// Actualizar el correo de Porky Pig
$perky->setCorreo('porkypig@sb.com');
$perky->actualizar();

// Eliminar a Bugs Bunny
$bugs->eliminar();

// Obtener todos los usuarios después de las actualizaciones
$usuarios = $usuarioDAO->buscarTodos();

foreach ($usuarios as $usuario) {
    echo $usuario->getNombres() . ' ' . $usuario->getApellidos() . ' ' . $usuario->getCorreo() . '<br>';
}
?>