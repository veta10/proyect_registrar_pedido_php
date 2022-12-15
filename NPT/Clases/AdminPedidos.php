<?php



class Pedido{
    private $IdPedido,$IdCliente,$IdEmpleado,$FechaPedido, 
        $FechaEntrega,$FechaEnvio,$IdEmpresasTransporte, 
        $Cargo,$Destinatario,$DireccionDestinatario, 
        $CiudadDestinatario,$RegionDestinatario, 
        $CodPostalDestinatario,$PaisDestinatario;
    function __construct($IdPedido, $IdCliente, $IdEmpleado, $FechaPedido, 
                     $FechaEntrega, $FechaEnvio, $IdEmpresasTransporte, 
                     $Cargo, $Destinatario, $DireccionDestinatario, 
                     $CiudadDestinatario, $RegionDestinatario, 
                     $CodPostalDestinatario, $PaisDestinatario) {
    $this->IdPedido = $IdPedido;
    $this->IdCliente = $IdCliente;
    $this->IdEmpleado = $IdEmpleado;
    $this->FechaPedido = $FechaPedido;
    $this->FechaEntrega = $FechaEntrega;
    $this->FechaEnvio = $FechaEnvio;
    $this->IdEmpresasTransporte = $IdEmpresasTransporte;
    $this->Cargo = $Cargo;
    $this->Destinatario = $Destinatario;
    $this->DireccionDestinatario = $DireccionDestinatario;
    $this->CiudadDestinatario = $CiudadDestinatario;
    $this->RegionDestinatario = $RegionDestinatario;
    $this->CodPostalDestinatario = $CodPostalDestinatario;
    $this->PaisDestinatario = $PaisDestinatario;
}
function getIdPedido() {
    return $this->IdPedido;
}

function getIdCliente() {
    return $this->IdCliente;
}

function getIdEmpleado() {
    return $this->IdEmpleado;
}

function getFechaPedido() {
    return $this->FechaPedido;
}

function getFechaEntrega() {
    return $this->FechaEntrega;
}

function getFechaEnvio() {
    return $this->FechaEnvio;
}

function getIdEmpresasTransporte() {
    return $this->IdEmpresasTransporte;
}

function getCargo() {
    return $this->Cargo;
}

function getDestinatario() {
    return $this->Destinatario;
}

function getDireccionDestinatario() {
    return $this->DireccionDestinatario;
}

function getCiudadDestinatario() {
    return $this->CiudadDestinatario;
}

function getRegionDestinatario() {
    return $this->RegionDestinatario;
}

function getCodPostalDestinatario() {
    return $this->CodPostalDestinatario;
}

function getPaisDestinatario() {
    return $this->PaisDestinatario;
}

function setIdPedido($IdPedido) {
    $this->IdPedido = $IdPedido;
}

function setIdCliente($IdCliente) {
    $this->IdCliente = $IdCliente;
}

function setIdEmpleado($IdEmpleado) {
    $this->IdEmpleado = $IdEmpleado;
}

function setFechaPedido($FechaPedido) {
    $this->FechaPedido = $FechaPedido;
}

function setFechaEntrega($FechaEntrega) {
    $this->FechaEntrega = $FechaEntrega;
}

function setFechaEnvio($FechaEnvio) {
    $this->FechaEnvio = $FechaEnvio;
}

function setIdEmpresasTransporte($IdEmpresasTransporte) {
    $this->IdEmpresasTransporte = $IdEmpresasTransporte;
}

function setCargo($Cargo) {
    $this->Cargo = $Cargo;
}

function setDestinatario($Destinatario) {
    $this->Destinatario = $Destinatario;
}

function setDireccionDestinatario($DireccionDestinatario) {
    $this->DireccionDestinatario = $DireccionDestinatario;
}

function setCiudadDestinatario($CiudadDestinatario) {
    $this->CiudadDestinatario = $CiudadDestinatario;
}

function setRegionDestinatario($RegionDestinatario) {
    $this->RegionDestinatario = $RegionDestinatario;
}

function setCodPostalDestinatario($CodPostalDestinatario) {
    $this->CodPostalDestinatario = $CodPostalDestinatario;
}

function setPaisDestinatario($PaisDestinatario) {
    $this->PaisDestinatario = $PaisDestinatario;
}
}
class DetallePedido{
    private $IdPedido,$IdProducto,$PrecioUnidad,$Cantidad,$Descuento;
    function __construct($IdPedido, $IdProducto, $PrecioUnidad, $Cantidad, $Descuento) {
        $this->IdPedido = $IdPedido;
        $this->IdProducto = $IdProducto;
        $this->PrecioUnidad = $PrecioUnidad;
        $this->Cantidad = $Cantidad;
        $this->Descuento = $Descuento;
    }
    function getIdPedido() {
        return $this->IdPedido;
    }

    function getIdProducto() {
        return $this->IdProducto;
    }

    function getPrecioUnidad() {
        return $this->PrecioUnidad;
    }

    function getCantidad() {
        return $this->Cantidad;
    }

    function getDescuento() {
        return $this->Descuento;
    }

    function setIdPedido($IdPedido) {
        $this->IdPedido = $IdPedido;
    }

    function setIdProducto($IdProducto) {
        $this->IdProducto = $IdProducto;
    }

    function setPrecioUnidad($PrecioUnidad) {
        $this->PrecioUnidad = $PrecioUnidad;
    }

    function setCantidad($Cantidad) {
        $this->Cantidad = $Cantidad;
    }

    function setDescuento($Descuento) {
        $this->Descuento = $Descuento;
    }
}
class ProcPedido{
  public function insertPedido(Pedido $pedido){
      $con= mysqli_connect("containers-us-west-86.railway.app", "root", "9gxJ9ftY9Zk3AKM7S7Cm", "bdneptuno");
      if($con->connect_errno)echo 'Error de conexion';
      else{
        $IdPedido=$pedido->getIdPedido();
        $IdCliente=$pedido->getIdCliente();
        $IdEmpleado=$pedido->getIdEmpleado();
        $FechaPedido=$pedido->getFechaPedido(); 
        $FechaEntrega=$pedido->getFechaEntrega();
        $FechaEnvio=$pedido->getFechaEnvio();
        $IdEmpresasTransporte=$pedido->getIdEmpresasTransporte(); 
        $Cargo=$pedido->getCargo();
        $Destinatario=$pedido->getDestinatario();
        $DireccionDestinatario=$pedido->getDireccionDestinatario();
        $CiudadDestinatario=$pedido->getCiudadDestinatario();
        $RegionDestinatario=$pedido->getRegionDestinatario();
        $CodPostalDestinatario=$pedido->getCodPostalDestinatario();
        $PaisDestinatario=$pedido->getPaisDestinatario();  
        $stmt =$con->prepare("Insert into Pedido Values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('isisssidssssss',
                $IdPedido,
                $IdCliente,
                $IdEmpleado,
                $FechaPedido, 
                $FechaEntrega,
                $FechaEnvio,
                $IdEmpresasTransporte, 
                $Cargo,
                $Destinatario,
                $DireccionDestinatario, 
                $CiudadDestinatario,
                $RegionDestinatario, 
                $CodPostalDestinatario,
                $PaisDestinatario);
        $stmt->execute();
        if(!$stmt){
                echo ("Problemas al insertar" . mysqli_error($con));
              }
        mysqli_close($con);
      }
    }
    public function insertDetalle(DetallePedido $detalle){
      $con=  mysqli_connect("containers-us-west-86.railway.app", "root", "9gxJ9ftY9Zk3AKM7S7Cm", "bdneptuno",7510);
      if($con->connect_errno)echo 'Error de conexion';
      else{
          $IdPedido=$detalle->getIdPedido();
          $IdProducto=$detalle->getIdProducto();
          $PrecioUnidad=$detalle->getPrecioUnidad();
          $Cantidad=$detalle->getCantidad();
          $Descuento=$detalle->getDescuento();
          $stmt =$con->prepare("Insert into detalles_de_pedido Values(?,?,?,?,?)");
          $stmt->bind_param('iidid',$IdPedido,$IdProducto,$PrecioUnidad,$Cantidad,$Descuento);
          $stmt->execute();
          if(!$stmt){
                echo("Problemas al insertar" . mysqli_error($con));
            }
          mysqli_close($con);
      }   
    }
  public function getMaxIdPedido(){
        $con= mysqli_connect("containers-us-west-86.railway.app", "root", "9gxJ9ftY9Zk3AKM7S7Cm", "bdneptuno",7510);
        $consulta="select Max(IdPedido) As Maximo from Pedido";
        $resultado=$con->query($consulta);
        $Reg = mysqli_fetch_array($resultado);
        $Maximo = $Reg['Maximo'];
        return $Maximo;
    }   
}



