<?php
require_once 'DataSource.php';
require_once 'IDao.php';
require_once 'Usuario.php';

class UsuarioDAO implements IDao {
    private $dataSource;

    public function __construct() {
        $this->dataSource = new DataSource();
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM usuarios";
        $resultados = $this->dataSource->ejecutarConsulta($sql);
        $usuarios = [];
        foreach ($resultados as $fila) {
            $usuario = new Usuario();
            $usuario->setId($fila['id']);
            $usuario->setNombres($fila['nombres']);
            $usuario->setApellidos($fila['apellidos']);
            $usuario->setCorreo($fila['correo']);
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }

    public function buscar($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $values = [':id' => $id];
        return $this->dataSource->ejecutarConsulta($sql, $values);
    }

    public function insertar(Usuario $usuario) {
        $sql = "INSERT INTO usuarios (nombres, apellidos, correo) VALUES (:nombres, :apellidos, :correo)";
        $values = [
            ':nombres' => $usuario->getNombres(),
            ':apellidos' => $usuario->getApellidos(),
            ':correo' => $usuario->getCorreo()
        ];
        return $this->dataSource->ejecutarActualizacion($sql, $values);
    }

    public function actualizar(Usuario $usuario) {
        $sql = "UPDATE usuarios SET nombres = :nombres, apellidos = :apellidos, correo = :correo WHERE id = :id";
        $values = [
            ':nombres' => $usuario->getNombres(),
            ':apellidos' => $usuario->getApellidos(),
            ':correo' => $usuario->getCorreo(),
            ':id' => $usuario->getId()
        ];
        return $this->dataSource->ejecutarActualizacion($sql, $values);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $values = [':id' => $id];
        return $this->dataSource->ejecutarActualizacion($sql, $values);
    }
}
?>