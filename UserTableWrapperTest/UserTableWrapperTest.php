<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../UserTableWrapper/UserTableWrapper.php";
function autoload(string $className): void
{
  $filename = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
  if (is_file($filename)) {
    require_once($filename);
  }
}

spl_autoload_register('autoload');
require_once '../vendor/autoload.php';


class UserTableWrapperTest extends TestCase
{
  public function testGet(): void
  {
    $table = new UserTableWrapper();
    $table->insert([1,2,3,'Hello!']);
    $getter = $table->get();
    self::assertEquals([[1,2,3,'Hello!']], $getter);
  }
}