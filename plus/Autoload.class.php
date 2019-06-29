<?php

/**
 * Description of autoload
 * @author rodrigo.pedroza
 */
class Autoload {

    private $path_list = array("//parte_cde/");

    public function __construct() {
        spl_autoload_register(array($this, 'searchFile'));
    }
   /**
     * Localiza o arquivo dentro dos paths pre-definidos.
     * @param string $class_name nome da classe sem require do aqui ou classe de origem da chamada.
     */
    private function searchFile($class_name) {
        $path = str_replace('\\', '/', str_replace('system', '', dirname(__DIR__)));

        foreach ($this->path_list as $dir) {
            if (file_exists("{$path}{$dir}{$class_name}.class.php")) {
                require_once("{$path}{$dir}{$class_name}.class.php");
            }
        }
    }
}
