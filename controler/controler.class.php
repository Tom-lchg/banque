<?php 

abstract class AbstractController {
    public function render(string $vue, array $data = [])
    {
        ob_start();

        extract($data);
        include "./vue/".$vue.".php";

        $content = ob_get_clean();

        include "./vue/template.php";
    }
}