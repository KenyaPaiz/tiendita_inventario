<?php
require('Conexion.php');
//Responsabilidad unica
class Marca extends Conexion{
    public $id;
    public $nombre;

    public function registrar(){
        $this->conexion();
        if(isset($_POST['marca'])){
            $this->nombre = $_POST['marca'];
            if(isset($_POST['registrar'])){
                $query = "INSERT INTO marca(nombre) VALUES ('$this->nombre')";
                $resultado = mysqli_query($this->con,$query);
                if(!empty($resultado)){
                    echo "Se agrego";
                }
            }
        }
    }

    public function consultar(){
        $this->conexion();
        $query = "SELECT * FROM marca";
        $resultado = mysqli_query($this->con, $query);
        while($imprimir = mysqli_fetch_array($resultado)){
            $tabla = "<tr>";
                $tabla .= "<td>".$imprimir['id']."</td>";
                $tabla .= "<td>".$imprimir['nombre']."</td>";
                $tabla .= "<form action='ver_marca.php' method='POST'>";
                    $tabla .= "<td><button type='submit' name='idmarca' value='".$imprimir['id']."'>Actualizar</button></td>";
                $tabla .= "</form>";
            $tabla .= "</tr>";
            echo $tabla;
        } 
    }

    public function obtenerId(){
        //esta es la para conexion de base de datos
        $this->conexion();
        if(isset($_POST['idmarca'])){
            $this->id = $_POST['idmarca'];
            $query = "SELECT * FROM marca WHERE id=$this->id";
            $resultado = mysqli_query($this->con, $query);
            while($imprimir = mysqli_fetch_array($resultado)){
                $form = "<label>Nombre: </label>";
                $form .= "<input type='hidden' name='id' value='".$imprimir['id']."'>";
                $form .= "<input type='text' name='nombre_marca' value='".$imprimir['nombre']."'>";
                echo $form;
            }
        }
    }

    public function actualizar(){
        $this->conexion();
        if(isset($_POST['id'])){
            if(isset($_POST['actualizar'])){
                $this->id = $_POST['id'];
                $this->nombre = $_POST['nombre_marca'];
                $query = "UPDATE marca SET nombre='$this->nombre' WHERE id=$this->id";
                $resultado = mysqli_query($this->con, $query);
                if(!empty($resultado)){
                    header("location:marca.php");
                }
                else{
                    echo "Error al actualizar la marca";
                }
            }
        }
    }
    
}
?>

// xd 