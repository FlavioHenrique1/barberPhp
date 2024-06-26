<?php
namespace Classes;
class ClassRequestHandler {

    public static function getJsonInput() {
        // Definir o cabeçalho para JSON
        header('Content-Type: application/json');

        // Recuperar os dados enviados pelo JavaScript
        $input = file_get_contents('php://input');

        // Decodificar os dados JSON
        $data = json_decode($input, true);

        // Verificar se a decodificação foi bem-sucedida
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
            exit;
        }

        return $data;
    }
}
?>
