<?php
class Cart
{
    // Crear carrito
    public static function crearCarrito(): void
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
            echo "<br>";
            echo "Carrito creado";
        }
    }

    // Terminar carrito
    public static function terminarCarrito(): void
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
            echo "Sesión finalizada";
        }
    }

    // Validarcarrito
    private static function validarCarrito(): bool
    {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            return true;
        } else {
            return false;
        }
    }


    // Funcion para validar cantidad seleccionada vs stock disponible
    private static function validarStock(Producto $producto, $cantidadElegida): bool
    {
        if ($cantidadElegida > $producto->getStock()) {
            return true;
        } else {
            return false;
        }
    }
    // -------------------------------------------



    // Funcion para validar stock
    private static function validarCantidadContraStock(Producto $producto, $cantidadElegida): bool
    {
        if ($cantidadElegida > $producto->getStock()) {
            return true;
        } else {
            return false;
        }
    }

    // Funcion para detectar duplicacion en producto
    private static function validarProductoRepetido(Producto $productoAgregar): bool
    {

        foreach ($_SESSION['cart'] as &$item) {
            if ($item['codigo'] == $productoAgregar->getCodigo()) {
                return true;
            }
        }
        return false;
    }


    private static function actualizarCantidad(Producto $productoAgregar, $cantidadIngresada): bool
    {

        foreach ($_SESSION['cart'] as &$item) {
            if ($item['codigo'] == $productoAgregar->getCodigo() && $item['cantidad'] != $cantidadIngresada) {
                $item['cantidad'] = $cantidadIngresada;
                $item['precio_final'] = $item['precio'] * $cantidadIngresada;
                return true;
            }
        }
        return false;
    }

    // Funcion para agregar un producto al carrito
    private static function addProductoNuevo(Producto $productoAgregar, $cantidadIngresada): void
    {
        $nuevoProducto = [
            'codigo' => $productoAgregar->getCodigo(),
            'nombre' => $productoAgregar->getNombre(),
            'precio' => $productoAgregar->getPrecio(),
            'stock' => $productoAgregar->getStock(),
            'cantidad' => $cantidadIngresada,
            'precio_final' => $productoAgregar->getPrecio() * $cantidadIngresada
        ];
        $_SESSION['cart'][] = $nuevoProducto;
        echo "Producto " . $productoAgregar->getNombre() . " añadido al carrito";
        echo "<br>";
    }


    // Funcion final para agregar
    public static function put(Producto $productoAgregar, $cantidad)
    {
        // Vcalido si hay carrito, sino lo creo
        if (!self::validarCarrito()) {
            self::crearCarrito();
            echo "Carrito creado";
            echo "<br>";
        }

        if (self::validarCantidadContraStock($productoAgregar, $cantidad)) {
            echo "<br>Cantidad seleccionada (" . $cantidad . ") supera el stock disponible para " . $productoAgregar->getNombre() . " (" . $productoAgregar->getStock() . ").";
        } else {
            if (self::validarProductoRepetido($productoAgregar)) {
                if (self::actualizarCantidad($productoAgregar, $cantidad)) {
                    echo "<br>";
                    echo "<br>Se actualizara la cantidad del producto " . $productoAgregar->getNombre() . " a " . $cantidad;
                } else {
                    echo "<br>El producto " . $productoAgregar->getNombre() . " ya se encuentra en el carrito.";
                }
            } else {
                echo "<br>";
                self::addProductoNuevo($productoAgregar, $cantidad);
            }
        }
    }


    // Funcion para mostrar carrito
    public static function get()
    {
        if (self::validarCarrito()) {
            echo "<br>----------------------<br>";
            echo "Listado de carrito:";
            echo "<br>=======<br>";
            if (empty($_SESSION['cart'])) {
                echo "El carrito esta vacio";
            } else {
                foreach ($_SESSION['cart'] as $item) {
                    echo "Codigo: " . $item['codigo'];
                    echo "<br>";
                    echo "Nombre: " . $item['nombre'];
                    echo "<br>";
                    echo "Precio: $" . $item['precio'];
                    echo "<br>";
                    echo "Cantidad: " . $item['cantidad'];
                    echo "<br>";
                    echo "Total: $" . $item['precio_final'];
                    echo "<br>________<br>";
                }
                echo "<br>----------------------<br>";
                echo "Fin listado de carrito";
            }

        } else {
            echo "El carrito no se ha iniciado";
        }
    }

    // Funcion para borrar un producto especifico del carrito
    public static function remove($codigo)
    {
        if (self::validarCarrito()) {
            foreach ($_SESSION['cart'] as $i => $producto) {
                if ($producto['codigo'] == $codigo) {
                    echo "<br>El producto " . $producto['nombre'] . " ha sido eliminado de su carrito.";
                    unset($_SESSION['cart'][$i]);
                    break;
                } else {
                    echo "<br><br>Error al eliminar: <br>No se localiza producto bajo el codigo " . $codigo;
                }
            }
        } else {
            echo "El carrito no se ha iniciado";
        }
    }


    // Funcion para Vaciar el carrito
    public static function clear()
    {
        if (self::validarCarrito()) {

            if (empty($_SESSION['cart'])) {
                echo "<br><br>Vaciando Carrito: <br>El carrito ya estaba vacio";
                echo "<br>";
            } else {
                unset($_SESSION['cart']);
                echo "<br><br>Vaciando Carrito: <br>Carrito vaciado correctamente";
                echo "<br>";
            }

        } else {
            echo "<br>El carrito no se ha iniciado";
        }
    }
}
