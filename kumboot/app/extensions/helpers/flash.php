<?php
/**
 * Clase para enviar mensajes a la vista utilizando los alerts de Bootstrap
 *
 * Envio de mensajes de advertencia, éxito, información
 * y errores a la vista.
 * Tambien envia mensajes en la consola, si se usa desde consola.
 *
 * @category   Kumbia
 * @package    Flash
 */
class Flash
{

    /**
     * Visualiza un mensaje flash
     *
     * @param string $name	Para tipo de mensaje y para CSS class='$name'.
     * @param string $text 	Mensaje a mostrar
     */
    public static function show($name, $text)
    {
        if (isset($_SERVER['SERVER_SOFTWARE'])) {
			//$code = '<div class="' . $name . ' flash">' . $text . '</div>' . PHP_EOL;
			if ($name == "warning"){
				$class = "";
			}else if ($name == "error"){
				$class = "alert-error";
			}else if($name == "info" || $name == "notice"){
				$class = "alert-info";
			}else if($name == "valid" || $name == "success"){
				$class = "alert-success";
			}else{
				$class = "";
			}
			
			$code = '<div class="alert ' . $class . '">' . PHP_EOL;
			$code .= '<button type="button" class="close" data-dismiss="alert">×</button>' . PHP_EOL;
			$code .= $text . PHP_EOL;
			$code .= '</div>';
			
			echo $code;
        } else {
            echo $name, ': ', strip_tags($text), PHP_EOL;
        }
    }

    /**
     * Visualiza un mensaje de error
     *
     * @param string $text
     */
    public static function error($text)
    {
        return self::show('error', $text);
    }

    /**
     * Visualiza un mensaje de advertencia en pantalla
     *
     * @param string $text
     */
    public static function warning($text)
    {
        return self::show('warning', $text);
    }

    /**
     * Visualiza informacion en pantalla
     *
     * @param string $text
     */
    public static function info($text)
    {
        return self::show('info', $text);
    }

    /**
     * Visualiza informacion de suceso correcto en pantalla
     *
     * @param string $text
     */
    public static function valid($text)
    {
        return self::show('valid', $text);
    }

    /**
     * Visualiza informacion en pantalla
     *
     * @param string $text
     *
     * @deprecated  ahora Flah::info()
     */
    public static function notice($text)
    {
        return self::show('info', $text);
    }

    /**
     * Visualiza informacion de Suceso en pantalla
     *
     * @param string $text
     *
     * @deprecated  ahora Flash::valid()
     */
    public static function success($text)
    {
        return self::show('valid', $text);
    }

}
