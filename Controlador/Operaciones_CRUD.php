<?php
require_once "../Modelo/Cliente.php";
 
class CRUD{
    private $pdo; 
    public function __CONSTRUCT()
    {
        try
        {
                $this->pdo = BaseDatos::Conectar();     
        }
        catch(Exception $e)
        {
                die($e->getMessage());
        }
    }

    public function Eliminar($Id)
    {    try 
            {
                $stm = $this->pdo->prepare("DELETE FROM cliente WHERE id = ?");			          
                $stm->execute(array($Id));
            } catch (Exception $e) 
            {
                die($e->getMessage());
            }
    }
    public function Actualizar(Cliente $cliente)
    {
        try 
        {
            $sql = "UPDATE cliente SET 
                                    dni= ?,
                                    Nombre= ?, 
                                    Apellido= ?,
                                    Correo= ?,
                                    Telefono= ?	
                                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                        array(
                        $cliente->getDni(), 
                        $cliente->getNombre(),
                        $cliente->getApellido(), 
                        $cliente->getCorreo(), 
                        $cliente->getTelefono(),
                        $cliente->getId()
                           )
                        );
        } catch (Exception $e) 
        {
                die($e->getMessage());
        }
    }
    public function Guardar(Cliente $cliente)
    {
        try 
        {
        $sql = "INSERT INTO cliente (dni,Nombre,Apellido,Correo,telefono) 
                VALUES (?, ?, ?, ?, ?)";
        $this->pdo->prepare($sql)
             ->execute(
            array(
                    $cliente->getDni(), 
                    $cliente->getNombre(),
                    $cliente->getApellido(), 
                    $cliente->getCorreo(), 
                    $cliente->getTelefono() 
                )
                );

        } catch (Exception $e) 
        {
                die($e->getMessage());
        }
    }
    public function Listar()
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM cliente");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
                die($e->getMessage());
        }
    }
}


