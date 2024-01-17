<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Graze\TelnetClient\TelnetClient;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use phpseclib3\Net\SSH2;

class GameServerController extends Controller
{
    public function check(Server $server) {
        try {

            if (!isset($server)) return abort(403);

            if (empty($server)) return response()->json(['error' => true, 'message' => 'Server not Found!']);

            $fp = fsockopen($server->auh_ip, $server->auth_port, $errno, $errstr, 1);

            if (!$fp) {
                return 'Offline';
            } else {
                fclose($fp);
                return 'Online';
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'Unable to connect') !== false) return response()->json('Offline', 200);
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function console() {
        $ip = '127.0.0.1';  // Замените на IP-адрес вашего сервера
        $port = 44452;       // Замените на порт вашего сервера

        $client = TelnetClient::factory();
        $dsn = '127.0.0.1:44452';
        $client->connect($dsn);
        $command = 'genius';
        $commandNew = 'notice("test")';
        $client->execute($command);
        $client->execute($commandNew);
        $client->execute("# notice(\"Test\")");
        $client->execute("# insert_gold(500000000, \"Demon\")");
        $client->execute("# insert_item(101331, 1, 25, 20, 2)");
        // Получение текстового результата выполнения команды
        //$output = $resp->getResponseText();

        // Закрытие соединения

        return "ok";//$output;
    }
}
