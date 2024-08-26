<?php
namespace Classes;
class ClassRequestHandler {

    public static function getJsonInput() {
        $contentType = array_key_exists('CONTENT_TYPE', $_SERVER) ? $_SERVER['CONTENT_TYPE'] : '';

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $_GET; // Para query parameters
        }
        if ($contentType !== 'application/json') {
            return null;
        }
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
