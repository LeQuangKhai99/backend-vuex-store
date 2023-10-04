<?php
namespace App\Logging;

use App\Models\Logs;
use Monolog\Handler\AbstractProcessingHandler;

class DatabaseHandler extends AbstractProcessingHandler
{
  protected function write(array $record): void
  {
    Logs::create([
      'message' => $record['message'],
    ]);
  }
}